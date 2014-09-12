<?php
/**
 * Created by PhpStorm.
 * User: sven
 * Date: 03.06.14
 * Time: 09:31
 */

namespace Ipunkt\Permissions\Exceptions;


use Exception;

class InvalidPermissionCheckerPathException extends Exception {
    public function __construct($message) {
        $this->message = $message;
    }
} 