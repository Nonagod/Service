<?php

namespace Nonagod;


/**
 * @param $namespace
 * @param $folder_path
 * @return void
 */
function initNewAutoload( $namespace, $folder_path ) {
    spl_autoload_register( function( $class_name ) use ( &$namespace, &$folder_path ) {
        $namespace = "$namespace\\";
        $namespace_symbols_number = strlen( $namespace );

        if( strncmp( $namespace, $class_name, $namespace_symbols_number ) !== 0 ) return;

        $path_to_class = str_replace( '\\', '/', substr( $class_name, $namespace_symbols_number ));
        $class_name = substr( $path_to_class, strrpos( $path_to_class, '/' ));

        $simple_class = $folder_path . DIRECTORY_SEPARATOR . $path_to_class . '.php';
        if( file_exists( $simple_class )) require_once $simple_class;

        $module_main_class = $folder_path . DIRECTORY_SEPARATOR . $path_to_class . DIRECTORY_SEPARATOR . $class_name . '.php';
        if( file_exists( $module_main_class )) require_once $module_main_class;
    });

    $functions_file_path = $folder_path . '/_functions.php';
    if( file_exists( $functions_file_path )) require_once $functions_file_path;

    $constants_file_path = $folder_path . '/_constants.php';
    if( file_exists( $constants_file_path )) require_once $constants_file_path;
}



/**
 * @param $data
 * @param bool $is_output_allowed
 * @return void
 */
function _p( $data, bool $is_output_allowed = true ) {
    if( $is_output_allowed ) ?><pre><? print_r($data) ?></pre><?php
}



function _log() {

}