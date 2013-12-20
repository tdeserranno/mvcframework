<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ftsupport\Exception;

/**
 * Description of unknownmethodexception
 *
 * @author cyber02
 */
class DispatcherException extends \Exception
{
     function __construct($message = '', $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
