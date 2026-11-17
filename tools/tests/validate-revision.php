<?php
declare(strict_types=1);

function runCommand(array $args, ?int $expectedStatus = 0): string
{
    exec(implode(' ', array_map('escapeshellarg', $args)) . ' 2>&1', $lines, $status);
    $output = implode("\n", $lines);
    if ($expectedStatus !== null && $status !== $expectedStatus) {
        throw new RuntimeException("Expected exit {$expectedStatus}, got {$status}:\n{$output}");
    }
    return $output;
}

$root = sys_get_temp_dir() . '/doc-ne-revision-test-' . bin2hex(random_bytes(6));
mkdir($root . '/translation/tools', 0755, true);
copy(__DIR__ . '/../validate.php', $root . '/translation/tools/validate.php');

try {
    runCommand(['git', 'init', '-q', $root . '/source']);
    file_put_contents($root . '/source/sample.xml', '<section><title>English</title></section>');
    runCommand(['git', '-C', $root . '/source', 'add', 'sample.xml']);
    runCommand(['git', '-C', $root . '/source', '-c', 'user.name=Test', '-c', 'user.email=test@example.invalid', 'commit', '-qm', 'English fixture']);
    $hash = trim(runCommand(['git', '-C', $root . '/source', 'rev-parse', 'HEAD']));
    runCommand(['git', 'clone', '-q', '--no-checkout', $root . '/source', $root . '/no-checkout']);

    $translation = static fn(string $revision): string =>
        '<?xml version="1.0" encoding="utf-8"?>' . "\n" .
        "<!-- EN-Revision: {$revision} Maintainer: prateekbhujel Status: draft -->\n" .
        '<section><title>नेपाली</title></section>';
    $command = [PHP_BINARY, $root . '/translation/tools/validate.php', $root . '/no-checkout'];

    file_put_contents($root . '/translation/sample.xml', $translation($hash));
    runCommand($command);

    file_put_contents($root . '/translation/sample.xml', $translation(str_repeat('0', 40)));
    $output = runCommand($command, 1);
    if (!str_contains($output, "does not contain 'sample.xml'")) {
        throw new RuntimeException('Missing revision was not diagnosed.');
    }

    file_put_contents($root . '/translation/sample.xml', $translation($hash));
    file_put_contents($root . '/translation/missing.xml', $translation($hash));
    $output = runCommand($command, 1);
    if (!str_contains($output, "Source path 'missing.xml' not found")) {
        throw new RuntimeException('Missing source path was not diagnosed.');
    }

    echo "3 revision validation cases passed (no working checkout, missing revision, missing path).\n";
} finally {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($files as $file) {
        $file->isDir() ? rmdir($file->getPathname()) : unlink($file->getPathname());
    }
    rmdir($root);
}
