<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 13/02/2018
 * Time: 12:25
 */

namespace m2i\Validators;


class EmailValidator
{
    public function validate($value)
    {
        if ($value == null) {
            throw new\InvalidArgumentException("L'adresse email ne peut être nulle");
        }
        $email = filter_var($value, FILTER_VALIDATE_EMAIL);
        return ($email != null); // True si c'est OK
    }
}