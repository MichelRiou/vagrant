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
    /**   // ANNOTATION COMMENCE PAR @
     * @var EmailValidator
     */
    private $validator;

    public function setUp()
    {
        $this->validator = new EmailValidator();
    }

    public function testValidateEmailReturnsTrue()
    {
        $returnValue = $this->validator->validate("moi@moi.com");
        $this->assertTrue($returnValue);
    }

    /**
     *
     */
    public function testEmailWithNullValueReturnException()
    {
        $this->validator->validate(null);
    }

    /*
     *  @expectedException
     *      */
    public function testEmailWithEmptyStringReturnsException()
    {
        $this->validator->validate("");
    }

    /**
     *  Retourne un tableau des valeurs testées et des retours attendus.
     * @return array
     */
    public function emailProviders(){
        return array(
            array('moi@moi.com', true),
            array('moi', false),
            array('moi @ moi.com', false),
        );
    }
    /**
     * @dataProvider testProviders
     */
    public function testEmailFromProvider($input, $output){
        $test = $this->validator->validate($input);
        $this->assertEquals($output, $test);
    }
}
