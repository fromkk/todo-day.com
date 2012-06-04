<?php

function smarty_modifier_wordbreak($str, $width = 80, $break = "\n", $delimiter = "\n")
{
    $strList = explode( $delimiter, $str );
    $cntStr  = count($strList);

    for ( $i = 0; $i < $cntStr; $i++ ) {
        $curStr = trim($strList[$i]);
        $curStr = smarty_mb_chunk_split($curStr, $width, $break, 'UTF-8');

        $strList[$i] = $curStr;
    }

    return implode($delimiter, $strList);
}

function smarty_mb_chunk_split($body, $chunklen = 76, $end = "\n", $encoding = 'UTF-8')
{
    $strLen = mb_strlen($body, $encoding);
    $result = '';

    //長さが満たない場合はそのまま帰す　
    if ( $strLen <= $chunklen ) {
        return $body;
    }

    $cntLoop = ceil( $strLen / $chunklen );
    for ( $i = 0; $i < $cntLoop; $i++ ) {
        $currentStr = trim(mb_substr( $body, $i * $chunklen, $chunklen, $encoding ));

        $result .= sprintf('%s%s', $currentStr, $end);
    }

    return $result;
}