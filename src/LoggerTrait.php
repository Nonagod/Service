<?php
namespace Nonagod\Service;


trait LoggerTrait {
    protected string $path_to_log_file = __DIR__ . DIRECTORY_SEPARATOR . __CLASS__ . '.log';

    /**
     * @param $data
     * @throws \Nonagod\Service\_functions\Logger\Exceptions\AddEntryToLogException
     */
    protected function addToLog( $data ) {
        addLogEntry( $data, $this->path_to_log_file );
    }
}