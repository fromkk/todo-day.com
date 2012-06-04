<?php
/**
     * HTMLタグが渡されてきた場合、Attributesを追加する(複数のタグに対応)
     *
     * 例：{$tag|attr:id:value}
     *
     * @author Kazuya Ueoka
     * @copyright ATGS corp.
     * @package atFramework
     */
    function smarty_modifier_allattr($html, $name, $value = null, $tagname = null)
    {
        if ( preg_match_all("/<([a-zA-Z0-9]+)(.*?)>/", $html, $matches) ) {
            $cntMatch = count($matches[0]);

            for ( $i = 0; $i < $cntMatch; $i++ ) {
                $tag = $matches[0][$i];

                $currentTagName = $matches[1][$i];

                if ( null !== $tagname && $tagname === $currentTagName ) {
                    $html = str_replace($tag, smarty_modifier_attr($tag, $name, $value), $html);
                } else if ( null === $tagname ) {
                    $html = str_replace($tag, smarty_modifier_attr($tag, $name, $value), $html);
                }
            }
        }

        return $html;
    }