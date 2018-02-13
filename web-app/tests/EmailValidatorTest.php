<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 13/02/2018
 * Time: 12:51
 */
include __DIR__ . "/../vendor/autoload.php";
use m2i\Validators\EmailValidator;
use PHPUnit\Framework\TestCase;


class EmailValidatorTest extends TestCase
{
    public function testValidateEmailReturnsTrue()
    {
        $validator = new EmailValidator();
        $returnValue= $validator->validate("moi@moi.com");
        $this->assertTrue($returnValue);
    }
}
