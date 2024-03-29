<?php


namespace App\Exceptions;

use App\Constants\ErrorConstants;
use App\Http\Resources\ExceptionResource;
use Exception;
use Throwable;

/**
 * Class ValidationException
 *
 * @package App\Exceptions
 * @author Simon Peter Calamno
 * @since 2022.05.21
 */
class ValidationException extends Exception
{
    /**
     * ValidationException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Renders the exception resource that will be returned by the API
     * @return ExceptionResource
     */
    public function render()
    {
        return new ExceptionResource([
            ErrorConstants::ERROR_MESSAGE => $this->getMessage(),
            ErrorConstants::ERROR_CODE    => $this->getCode()
        ]);
    }
}
