<?php
    /**
     * テキストをそのまま表示する
     *
     * 例：{$str|entity}
     *
     * @author Kazuya Ueoka
     * @copyright ATGS corp.
     * @package atFramework
     */
    function smarty_modifier_entity($string) {
        return nl2br(htmlspecialchars($string, ENT_QUOTES));
    }