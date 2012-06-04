<?php
    /**
     * HTMLタグが渡されてきた場合、Attributesを追加する
     *
     * 例：{$tag|attr:id:value}
     * created 2010/12/20
     * updated 2010/12/21 閉じタグがあった場合にも対応
     * updated 2010/12/28 バグ修正
     * updated 2011/01/05 クォーテーションが無い場合、単一属性にも対応
     *
     * @author Kazuya Ueoka
     * @copyright ATGS corp.
     * @package atFramework
     */
    function smarty_modifier_attr( $tag, $name, $value = null )
    {
        if ( false !== strpos($tag, '<') && false !== strpos($tag, '>') ) {
            /*
             * $tagから最初のHTMLタグを抽出
             */
            if ( 0 !== preg_match('/<(\S+)\s?(.*?)([\/]?)>/', $tag, $match) ) {
                //タグ名
                $tagName    = $match[1];

                //Attributes
                $aryAttr    = array();

                //単一属性（require等）
                $aryOrgAttr = array();

                //単一タグか判定（<br />等）
                $isClosed   = '/' === $match[3];

                /*
                 * Attributes検索
                 */
                if ( preg_match_all('/([^=\s]+)=((:?[\'"]{1}.*?[\'"]{1})|\S+)|(\S+)/', $match[2], $attr) ) {
                    $cntAttr = count( $attr[0] );

                    for ($i = 0; $i < $cntAttr; $i++) {
                        $currentKey  = $attr[1][$i];
                        $currentVal  = $attr[2][$i];
                        $currentAttr = $attr[4][$i];

                        //単一属性
                        if ( 0 !== strlen($currentAttr) ) {
                            $aryOrgAttr[] = $currentAttr;
                        //通常属性
                        } else {
                            $aryAttr[$currentKey] = preg_replace('/^[\'"]{1}|[\'"]{1}$/', '', $currentVal);
                        }
                    }
                }

                //単一属性
                if ( null === $value ) {
                    $aryOrgAttr[] = $name;
                //通常属性
                } else {
                    $aryAttr[$name] = $value;
                }

                //属性リスト
                $aryResAttr = array();
                foreach ( $aryAttr as $atrName => $atrVal ) {
                    $aryResAttr[] = sprintf('%s="%s"', $atrName, $atrVal);
                }

                foreach ( $aryOrgAttr as $orgAttr ) {
                    $aryResAttr[] = $orgAttr;
                }

                if ( $isClosed ) {
                    $format = '<%s %s />';
                } else {
                    $format = '<%s %s>';
                }

                $tag = str_replace( $match[0], sprintf($format, $tagName, implode(' ', $aryResAttr)), $tag );
            }
        }

        return $tag;
    }