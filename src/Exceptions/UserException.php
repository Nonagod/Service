<?php
namespace Nonagod\Exceptions;

class UserException extends \Exception {
    protected string $symbolic_code;
    protected ?array $additional_info = null;

    public function __construct( string $symbolic_code, string $message = null, array $additional_info = null, Throwable $previous = null ) {
        parent::__construct($message, 0, $previous);

        $this->symbolic_code = $symbolic_code;
        $this->additional_info = $additional_info;
    }

    public function getSymbolicCode( ): string {
        return $this->symbolic_code;
    }
    public function getAdditionalInfo( ): ?array {
        return $this->additional_info;
    }
}