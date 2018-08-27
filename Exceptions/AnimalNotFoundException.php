<?php

namespace Exceptions;

/**
 * Class AnimalNotFoundException
 * @package Exceptions
 */
class AnimalNotFoundException extends \Exception
{
    protected $message = 'Animal not found';
}