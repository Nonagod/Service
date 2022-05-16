<?php
use Nonagod\Service\_functions\Logger\Exceptions\AddEntryToLogException;

/*
 * TODO:
 *  1 - Вывести подходящий формат логов (нап. "[Y.m.d H:i:s <TYPE>] <OBJECT> <DATA_STR>")
 * */
if( !function_exists('addLogEntry') ) {
    function addLogEntry( $data, string $path_to_log_file = null ) {
        if( !$path_to_log_file ) $path_to_log_file = $_SERVER['DOCUMENT_ROOT'] . '/common.log';
        if( !is_string($data) ) $data = var_export($data, true);

        if(
            false === @file_put_contents(
                $path_to_log_file,
                time() . ' --- ' . $data,
                FILE_APPEND
            )
        ) throw new AddEntryToLogException( error_get_last()['message'] );
    }
}