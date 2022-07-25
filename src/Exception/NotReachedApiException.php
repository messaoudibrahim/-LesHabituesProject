<?php


namespace App\Exception;


use Throwable;

/**
 * Class NotReachedApiException
 * @package App\Exception
 */
class NotReachedApiException extends \Exception
{
    /**
     * NotReachedApiException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = 'Api not reachable! check your url';
        parent::__construct($message, $code, $previous);
    }
}