<?php
require_once "PHPUnit/Autoload.php";
require_once "formValidator.php";
/**
 * Title           Form validation Unit Testing
 * @author         Asanka - <<asankalakmal[at]gmail[dot]com>>
 * created on      12-16-2012, 06:30PM by Asanka
 * updated on      
 *
 * Description     This file have functions associate with Form validation Unit test
 *
 * */
 
class formValidatorTest extends PHPUnit_Framework_TestCase{
	
	public $validator_obj=null;

	/**
	 * Set the create object before run ( this function run every test run before)
	 * */
	public function setUp() {
	
		$this->validator_obj= new formValidator();
	}
	
	/**
	 * Unset the created object after run ( this function run every test run after)
	 * */
	public function tearDown() {
		unset($this->validator_obj);
	}
	
	/**
	 * Test isPositiveInteger method 
	 * */
	public function testisPositiveInteger ()
	{
		
		// use assertEquals to ensure the greeting is what you
        $expected = true;
        $actual = $this->validator_obj->isPositiveInteger(5);
        $this->assertEquals($expected, $actual);
	}
	
	/**
	 * Test isCorrectFormat method 
	 * */
	public function testisCorrectFormat()
	{	
		// use assertEquals to ensure the greeting is what you
        $expected = true;
        $actual = $this->validator_obj->isCorrectFormat(20,40);
        $this->assertEquals($expected, $actual);
	}
	
	/**
	 * Check the value is empty or not
	 * */
	public function testisEmpty ()
	{	
		// use assertEquals to ensure the greeting is what you
        $expected = false;
        $actual = $this->validator_obj->isEmpty(' ');
        $this->assertEquals($expected, $actual);
	}
	
}