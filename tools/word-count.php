<?php
declare(strict_types=1);

/** Count Unicode word tokens in prose, excluding code, output and XML metadata. */
function countProseWords(string $xml): int
{
    $text = preg_replace(
        '~<(programlisting|screen|literallayout)\b[^>]*>.*?</\1>~s',
        ' ',
        $xml
    );
    $text = preg_replace('~<!--.*?-->|<\?.*?\?>|<!\[CDATA\[.*?\]\]>~s', ' ', $text);
    $text = preg_replace('~<[^>]+>~s', ' ', $text);
    // Entity names and URLs are not translated words.
    $text = preg_replace('~&(?:[\w.:-]+|\#\d+|\#x[\da-fA-F]+);|https?://\S+~u', ' ', $text);

    return preg_match_all('/[\p{L}\p{N}][\p{L}\p{M}\p{N}]*/u', $text);
}
