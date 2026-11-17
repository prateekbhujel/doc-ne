<?php
declare(strict_types=1);

require_once __DIR__ . '/../word-count.php';

$cases = [
    'Nepali combining marks' => ['<para>तपाईँ आफैँ पढ्नुहोस्।</para>', 3],
    'Mixed technical prose' => ['<para>function मा value राख्नुहोस्।</para>', 4],
    'Code and output excluded' => [
        '<para>उदाहरण हेर्नुहोस्।</para><programlisting role="php"><![CDATA[<?php echo "hello world"; ?>]]></programlisting><screen>hello world</screen><literallayout>ignored output</literallayout>',
        2,
    ],
    'Metadata and entity names excluded' => [
        '<?xml version="1.0"?><!-- English revision header --><para xml:id="example">PHP &true; &url.example; राम्रो छ।</para>',
        3,
    ],
    'Punctuation and empty text' => ['<para>। , !</para>', 0],
];

foreach ($cases as $name => [$xml, $expected]) {
    $actual = countProseWords($xml);
    if ($actual !== $expected) {
        fwrite(STDERR, "FAIL: {$name}: expected {$expected}, got {$actual}\n");
        exit(1);
    }
}

echo count($cases) . " word-count regression cases passed.\n";
