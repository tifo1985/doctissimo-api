<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class AbstractException extends HttpException
{
    public const STATUS = "";
}