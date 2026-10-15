#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * PHP Manual (Nepali) - Translation Status Reporter
 */

$rootDir = realpath(__DIR__ . '/..');
$enDir = realpath($rootDir . '/../phpdoc-build/en') ?: realpath($rootDir . '/../en');

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootDir, RecursiveDirectoryIterator::SKIP_DOTS)
);

$files = [];
$totalWords = 0;
$ready = 0;
$draft = 0;

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'xml') {
        $path = $file->getPathname();
        if (str_contains($path, '/tools/') ||
            str_contains($path, '/temp/') ||
            str_contains($path, '/output/') ||
            str_contains($path, '/preview/') ||
            str_contains($path, '/.git/')) {
            continue;
        }
        $relPath = substr($path, strlen($rootDir) + 1);
        if ($relPath === 'translation.xml') {
            continue;
        }

        $content = file_get_contents($path);
        preg_match('/<!--\s*EN-Revision:\s*([a-f0-9]{40})\s+Maintainer:\s*([a-zA-Z0-9_\-]+)\s+Status:\s*([a-zA-Z0-9_\-]+)\s*-->/i', $content, $matches);
        $status = isset($matches[3]) ? strtolower($matches[3]) : 'unknown';
        $hash = isset($matches[1]) ? $matches[1] : 'unknown';

        if ($status === 'ready') {
            $ready++;
        } else {
            $draft++;
        }

        $textOnly = strip_tags($content);
        $wordCount = str_word_count($textOnly);
        $totalWords += $wordCount;

        $files[] = [
            'file' => $relPath,
            'status' => $status,
            'hash' => substr($hash, 0, 8),
            'words' => $wordCount,
        ];
    }
}

usort($files, fn($a, $b) => strcmp($a['file'], $b['file']));

echo "# PHP Manual — नेपाली Translation Status Report\n\n";
echo "- **Total Translated Files**: " . count($files) . "\n";
echo "- **Human Proofread (`ready`)**: {$ready}\n";
echo "- **Pending Review (`draft`)**: {$draft}\n";
echo "- **Approximate Words Translated**: ~{$totalWords}\n\n";
echo "| # | File | Status | EN-Rev | Approx Words |\n";
echo "|---|---|---|---|---|\n";
foreach ($files as $idx => $f) {
    $num = $idx + 1;
    echo "| {$num} | `{$f['file']}` | `{$f['status']}` | `{$f['hash']}` | {$f['words']} |\n";
}
