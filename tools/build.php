#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * PHP Manual (Nepali) - Build and Preview Automation Script
 *
 * Automates the upstream doc-base and PhD build pipeline.
 */

$docNeDir = realpath(__DIR__ . '/..');
$buildBase = getenv('PHPDOC_BUILD_DIR') ?: ($argv[1] ?? (is_dir('/Users/pratikbhujel/phpdoc-build') ? '/Users/pratikbhujel/phpdoc-build' : sys_get_temp_dir() . '/phpdoc-build'));

echo "=== PHP Manual [ne] Build Runner ===\n";
echo "Source: {$docNeDir}\n";
echo "Build Environment: {$buildBase}\n\n";

if (!is_dir($buildBase)) {
    echo "Creating build environment at {$buildBase}...\n";
    mkdir($buildBase, 0755, true);
}

// Ensure repositories exist in build environment
if (!is_dir("{$buildBase}/doc-base")) {
    echo "Cloning doc-base...\n";
    passthru("git clone --depth 50 https://github.com/php/doc-base.git " . escapeshellarg("{$buildBase}/doc-base"));
}

if (!is_dir("{$buildBase}/phd")) {
    echo "Cloning phd...\n";
    passthru("git clone --depth 50 https://github.com/php/phd.git " . escapeshellarg("{$buildBase}/phd"));
}

if (!is_dir("{$buildBase}/en")) {
    echo "Cloning doc-en (depth 1)...\n";
    passthru("git clone --depth 1 https://github.com/php/doc-en.git " . escapeshellarg("{$buildBase}/en"));
}

// Sync ne into buildBase/ne
$buildNeDir = "{$buildBase}/ne";
echo "Syncing doc-ne into build environment...\n";
if (!is_dir($buildNeDir)) {
    mkdir($buildNeDir, 0755, true);
}
passthru("rsync -av --exclude='.git' --exclude='temp' --exclude='output' --exclude='preview' --delete " . escapeshellarg("{$docNeDir}/") . " " . escapeshellarg("{$buildNeDir}/"));

// Ensure PhD has Nepali UI strings
$phdLangsDir = "{$buildBase}/phd/phpdotnet/phd/data/langs";
if (is_dir($phdLangsDir) && file_exists("{$docNeDir}/resources/phd/langs/ne.ini")) {
    copy("{$docNeDir}/resources/phd/langs/ne.ini", "{$phdLangsDir}/ne.ini");
    echo "Installed ne.ini to PhD languages.\n";
}

// Run doc-base/configure.php
echo "\n--- Step 1: Configuring with doc-base ---\n";
$cmdConfig = "cd " . escapeshellarg($buildBase) . " && php doc-base/configure.php --with-lang=ne";
passthru($cmdConfig, $retConfig);

if ($retConfig !== 0) {
    echo "\nError: doc-base configuration failed with code {$retConfig}.\n";
    exit($retConfig);
}

// Run PhD
echo "\n--- Step 2: Rendering with PhD ---\n";
$outputDir = "{$docNeDir}/preview";
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}

$cmdPhd = "php " . escapeshellarg("{$buildBase}/phd/render.php") .
    " -d " . escapeshellarg("{$buildBase}/doc-base/temp/manual.xml") .
    " -P PHP -f xhtml -L ne -o " . escapeshellarg($outputDir);

passthru($cmdPhd, $retPhd);

if ($retPhd !== 0) {
    echo "\nError: PhD rendering failed with code {$retPhd}.\n";
    exit($retPhd);
}

echo "\nBuild complete!\n";
echo "Preview output generated at: {$outputDir}/php-chunked-xhtml/index.html\n";
