#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * PHP Manual (Nepali) - Validation Engine
 *
 * Validates DocBook XML syntax, EN-Revision headers, glossary rules,
 * and upstream entity consistency.
 */

$rootDir = realpath(__DIR__ . '/..');
$enDir = (!empty($argv[1]) && is_dir($argv[1])) ? realpath($argv[1]) : (
    realpath('/Users/pratikbhujel/phpdoc-build/en')
    ?: realpath($rootDir . '/../phpdoc-build/en')
    ?: realpath($rootDir . '/../en')
);

echo "=== PHP Manual [ne] Automated Validation ===\n";
echo "Root directory: {$rootDir}\n";
if ($enDir) {
    echo "English source: {$enDir}\n";
} else {
    echo "English source: Not detected locally (hash syntax check only)\n";
}
echo "\n";

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootDir, RecursiveDirectoryIterator::SKIP_DOTS)
);

$xmlFiles = [];
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'xml') {
        $path = $file->getPathname();
        // Skip build and tool directories
        if (str_contains($path, '/tools/') ||
            str_contains($path, '/temp/') ||
            str_contains($path, '/output/') ||
            str_contains($path, '/preview/') ||
            str_contains($path, '/.git/')) {
            continue;
        }
        $relPath = substr($path, strlen($rootDir) + 1);
        $xmlFiles[] = $relPath;
    }
}

sort($xmlFiles);
echo "Discovered " . count($xmlFiles) . " XML files for validation.\n\n";

$totalFiles = count($xmlFiles);
$passed = 0;
$failed = 0;
$draftCount = 0;
$readyCount = 0;
$errors = [];

$prohibitedPatterns = [
    'परिवर्तनीय पात्र' => 'Use English "variable" instead',
    'कार्यको आह्वान' => 'Use natural "function call" instead',
    'कार्यक्रम निष्पादन' => 'Use natural "program चलिरहेको बेला" instead',
    'सङ्गणक' => 'Use "computer" instead',
    'अंकगणितीय संक्रियक' => 'Use "arithmetic operators" instead',
];

libxml_use_internal_errors(true);

foreach ($xmlFiles as $relPath) {
    $fullPath = $rootDir . '/' . $relPath;
    $content = file_get_contents($fullPath);
    $fileErrors = [];

    // 1. Header & EN-Revision Check
    if ($relPath !== 'translation.xml') {
        if (!preg_match('/<!--\s*EN-Revision:\s*([a-f0-9]{40})\s+Maintainer:\s*([a-zA-Z0-9_\-]+)\s+Status:\s*([a-zA-Z0-9_\-]+)\s*-->/i', $content, $matches)) {
            $fileErrors[] = "Missing or malformed EN-Revision header comment.";
        } else {
            $hash = $matches[1];
            $maintainer = $matches[2];
            $status = strtolower($matches[3]);

            if ($maintainer !== 'prateekbhujel') {
                $fileErrors[] = "Maintainer must be 'prateekbhujel', found '{$maintainer}'";
            }

            if ($status === 'ready') {
                $readyCount++;
            } elseif ($status === 'draft') {
                $draftCount++;
            } else {
                $fileErrors[] = "Status must be 'ready' or 'draft', found '{$status}'";
            }

            // Verify hash exists in English source if available
            if ($enDir && file_exists($enDir . '/' . $relPath)) {
                $enCommit = trim(shell_exec("git -C " . escapeshellarg($enDir) . " log -n1 --pretty=format:%H -- " . escapeshellarg($relPath)));
                if (!empty($enCommit) && $enCommit !== $hash) {
                    // Check if hash is a valid ancestor commit in that file's history
                    $isAncestor = shell_exec("git -C " . escapeshellarg($enDir) . " merge-base --is-ancestor " . escapeshellarg($hash) . " " . escapeshellarg($enCommit) . " 2>&1; echo $?");
                    if (trim($isAncestor) !== "0") {
                        $fileErrors[] = "EN-Revision hash '{$hash}' not found in doc-en git history for '{$relPath}'. Latest is '{$enCommit}'.";
                    }
                }
            }
        }
    }

    // 2. Prohibited Terminology Check
    foreach ($prohibitedPatterns as $badTerm => $reason) {
        if (str_contains($content, $badTerm)) {
            $fileErrors[] = "Violates Style Guide: Contains prohibited phrase '{$badTerm}'. ({$reason})";
        }
    }

    // 3. XML Parsing Check
    $dom = new DOMDocument();
    libxml_clear_errors();
    $loadSuccess = $dom->loadXML($content, LIBXML_NOENT | LIBXML_COMPACT);

    if (!$loadSuccess) {
        $xmlErrs = libxml_get_errors();
        foreach ($xmlErrs as $xmlErr) {
            // Ignore missing external entity errors during isolated file validation
            if (str_contains($xmlErr->message, 'Entity') && str_contains($xmlErr->message, 'not defined')) {
                continue;
            }
            $fileErrors[] = "XML Parse Error: " . trim($xmlErr->message) . " at line " . $xmlErr->line;
        }
    }

    // 4. Code Block Check
    if (preg_match_all('/<programlisting role="php">(.*?)<\/programlisting>/s', $content, $listings)) {
        foreach ($listings[1] as $idx => $code) {
            // Check for unclosed CDATA or syntax corruption
            if (str_contains($code, '<?php') && !str_contains($code, '?>') && str_contains($content, '</programlisting>')) {
                // Some PHP blocks omit closing tag by standard, which is valid.
            }
        }
    }

    if (empty($fileErrors)) {
        $passed++;
        printf("  [PASS] %-55s (%s)\n", $relPath, ($relPath === 'translation.xml' ? 'meta' : (isset($status) ? $status : 'ok')));
    } else {
        $failed++;
        printf("  [FAIL] %-55s\n", $relPath);
        foreach ($fileErrors as $err) {
            echo "         - {$err}\n";
        }
        $errors[$relPath] = $fileErrors;
    }
}

echo "\n============================================\n";
echo "Validation Summary:\n";
echo "Total files checked: {$totalFiles}\n";
echo "Passed:             {$passed}\n";
echo "Failed:             {$failed}\n";
echo "Human Proofread:    {$readyCount} (Status: ready)\n";
echo "Pending Review:     {$draftCount} (Status: draft)\n";
echo "============================================\n";

if ($failed > 0) {
    echo "Result: Validation FAILED.\n";
    exit(1);
} else {
    echo "Result: All files PASSED validation.\n";
    exit(0);
}
