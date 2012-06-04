<?php
    /**
     * Smarty plugin
     * @package atFramework
     */

    /**
     * Smarty modifier wrap_tag
     *
     * @param string $string
     * @param string $tag
     * @return string
     */
    function smarty_modifier_wrap_tag( $args, $tag )
    {
        if ( true === is_array($args) ) {
            $args = array();

            foreach ( $args as $key => $string ) {
                $args[$key] = smarty_modifier_wrap_tag($string, $tag);
            }
        } else {
            $args = sprintf( '<%s>%s</%s>', $tag, $args, $tag );
        }

        return $args;
    }