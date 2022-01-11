<?

if( !function_exists('_p') ) {
    function _p( $data, $force_print = false ) {
        ?><pre><?print_r( $data );?></pre><?php
    }
}