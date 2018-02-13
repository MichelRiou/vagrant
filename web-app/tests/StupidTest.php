<?php
include __DIR__."../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
class StupidTest extends TestCase
{
public function testTrueIsTrue(){
    $result=false;
    // Assertion de PHPUnit
    $this->assertTrue($result,"Vrai est égal à vrai");
}
}