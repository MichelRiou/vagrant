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
    private $validator2;

    public function setUp()
    {
        $this->validator = new Router("controleur/action/param1/param2/param3/param4");
        $this->validator2 = new Router("controleur/action/");
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
    public function testParamsZeroCount()
    {
        $returnValue = $this->validator2->getActionParameters();
        $this->assertEquals(count($returnValue),0);
    }
    public function urlProvider(){
        return [
            ["test",["controller"=>"TestController","action"=>"defaultAction","params"=>[]]],
            ["test/test",["controller"=>"TestController","action"=>"testAction","params"=>[]]],
            ["test/test/test",["controller"=>"TestController","action"=>"testAction","params"=>["test1","test2"]]]
        ];
    }

    /**
     * @dataProvider urlProvider
     * @param $input
     * @param $output
     */
    public function testRouter($input,$output){
        $router= new Router($input);
        $this->assertEquals($output["controller"],$router->getControllerName());
        $this->assertEquals($output["action"],$router->getActionName());
        $this->assertEquals($output["params"],$router->getActionParameters());
    }
}
