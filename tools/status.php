#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * PHP Manual (Nepali) - Translation Status Reporter
 */

$rootDir = realpath(__DIR__ . '/..');
require_once __DIR__ . '/word-count.php';

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

        $wordCount = countProseWords($content);
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
echo "- **Marked `ready`**: {$ready}\n";
echo "- **Pending Review (`draft`)**: {$draft}\n";
echo "- **Approximate Prose Word Tokens**: ~{$totalWords}\n\n";
echo "Generated with `php tools/status.php > STATUS.md`. Counts exclude code examples, output, XML comments and entity names. Unicode letters and combining marks are counted together. English technical terms in prose are included; this is not a count of Nepali-only words or a coverage percentage.\n\n";
echo "Statuses come from XML headers. They do not independently verify human proofreading or readiness for php.net. Edited translations stay `draft` until the maintainer reviews them.\n\n";
echo "| # | File | Status | EN-Rev | Approx Words |\n";
echo "|---|---|---|---|---|\n";
foreach ($files as $idx => $f) {
    $num = $idx + 1;
    echo "| {$num} | `{$f['file']}` | `{$f['status']}` | `{$f['hash']}` | {$f['words']} |\n";
}
