#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * PHP Manual (Nepali) - Helper to review and promote drafts to ready
 *
 * Usage:
 *   php tools/mark-ready.php              (list all files in draft status)
 *   php tools/mark-ready.php <filepath>   (mark specific file as ready and update STATUS.md)
 */

$rootDir = realpath(__DIR__ . '/..');
$target = $argv[1] ?? null;

if (!$target) {
    echo "=== Staged Draft Files Awaiting Review ===\n\n";
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootDir, RecursiveDirectoryIterator::SKIP_DOTS)
    );
    $drafts = [];
    foreach ($it as $f) {
        if ($f->isFile() && $f->getExtension() === 'xml') {
            $path = $f->getPathname();
            if (str_contains($path, '/tools/') || str_contains($path, '/preview/') || str_contains($path, '/.git/')) {
                continue;
            }
            $rel = substr($path, strlen($rootDir) + 1);
            if ($rel === 'translation.xml') continue;
            $c = file_get_contents($path);
            if (preg_match('/Status:\s*draft/i', $c)) {
                $words = str_word_count(strip_tags($c));
                $drafts[] = ['file' => $rel, 'words' => $words];
            }
        }
    }
    usort($drafts, fn($a, $b) => strcmp($a['file'], $b['file']));
    foreach ($drafts as $idx => $d) {
        printf("  [%2d] %-55s (~%d words)\n", $idx + 1, $d['file'], $d['words']);
    }
    echo "\nTotal drafts: " . count($drafts) . "\n";
    echo "\nTo mark a file as ready:\n";
    echo "  php tools/mark-ready.php <file-path>\n";
    exit(0);
}

$fullPath = realpath($rootDir . '/' . $target) ?: realpath($target);
if (!$fullPath || !file_exists($fullPath)) {
    echo "Error: File not found: {$target}\n";
    exit(1);
}

$relPath = substr($fullPath, strlen($rootDir) + 1);
$content = file_get_contents($fullPath);

if (!preg_match('/<!--\s*EN-Revision:\s*[a-f0-9]{40}\s+Maintainer:\s*prateekbhujel\s+Status:\s*draft\s*-->/i', $content)) {
    if (str_contains($content, 'Status: ready')) {
        echo "File {$relPath} is already marked as 'ready'.\n";
        exit(0);
    }
    echo "Error: File does not contain standard 'Status: draft' header.\n";
    exit(1);
}

$updated = preg_replace(
    '/(Maintainer:\s*prateekbhujel\s+Status:\s*)draft/i',
    '${1}ready',
    $content
);

file_put_contents($fullPath, $updated);
echo "[SUCCESS] {$relPath} has been marked as 'ready'.\n";

// Regenerate STATUS.md
exec("php " . escapeshellarg(__DIR__ . '/status.php') . " > " . escapeshellarg($rootDir . '/STATUS.md'));
echo "[STATUS] STATUS.md updated.\n";
