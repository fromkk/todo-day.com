<?php
    function smarty_modifier_age($date)
    {
        $date = str_replace('-', '', $date);
        $date = str_replace('/', '', $date);

        return (int)( (date('Ymd', time()) - $date) / 10000 );
    }