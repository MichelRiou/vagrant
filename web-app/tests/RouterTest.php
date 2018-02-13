<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 13/02/2018
 * Time: 14:58
 */
include __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use m2i\framework\Router;

class RouterTest extends TestCase
{
    /**
     * @var Router
     */
    private $validator;

    public function setUp()
    {
        $this->validator = new Router("controleur/action/param1/param2/param3/param4");
    }
    public function testValidateControllerName()
    {
        $returnValue = $this->validator->getControllerName();
        $this->assertEquals($returnValue,'ControleurController');
    }
    public function testValidateActionName()
    {
        $returnValue = $this->validator->getActionName();
        $this->assertEquals($returnValue,'actionAction');
    }
    public function testParamsCount()
    {
        $returnValue = $this->validator->getActionParameters();
        $this->assertEquals(count($returnValue),4);
    }

}
