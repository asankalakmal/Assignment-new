<?php
require_once "PHPUnit/Autoload.php";
require_once "logicGenerator.php";
/**
 * Title           Logic Generator
 * @author         Asanka - <<asankalakmal[at]gmail[dot]com>>
 * created on      12-13-2012, 10:30AM by Asanka
 * updated on      
 *
 * Description     This file have functions associate with logicGenerator Unit test
 *
 * */
 
Class logicGeneratorTest extends PHPUnit_Framework_TestCase{
	
	public $logic_obj=null;
	
	public function __construct (){}
	
	/**
	 * Set the create object before run ( this function run every test run before)
	 * */
	public function setUp() {
	
		$this->logic_obj= new logicGenerator();
	}
	
	/**
	 * Unset the created object after run ( this function run every test run after)
	 * */
	public function tearDown() {
		unset($this->logic_obj);
	}
	
	/**
	 * Test resultGenerate method 
	 * */
	public function testresultGenerate ()
	{
		// use assertEquals to ensure result is correct
        $expected = 'fuzz';
        $actual = $this->logic_obj->resultGenerate(3);
        $this->assertEquals($expected, $actual);
	}
	
	/**
	 * Test logicGenerate method 
	 * */
	public function testlogicGenerate ()
	{	
		// use assertEquals to ensure result is correct
        $expected = 'fuzz  13  14  fuzzbuzz  16  ';
        $actual = $this->logic_obj->logicGenerate(12,16);
        $this->assertEquals($expected, $actual);
	}

}