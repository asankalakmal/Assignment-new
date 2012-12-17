<?php
require_once "PHPUnit/Autoload.php";
require_once "functionHandler.php";
/**
 * Title           Function handler test
 * @author         Asanka - <<asankalakmal[at]gmail[dot]com>>
 * created on      12-16-2012, 11:00AM by Asanka
 * updated on      
 *
 * Description     This file have functions associate with  functionHandler Unit test
 *
 * */

class functionHandlerTest extends PHPUnit_Framework_TestCase {
	
	public $fun_obj=null;
	
	public function __construct (){}
	
	/**
	 * Set the create object before run ( this function run every test run before)
	 * */
	public function setUp() {
	
		$this->fun_obj= new functionHandler();
	}
	
	/**
	 * Unset the created object after run ( this function run every test run after)
	 * */
	public function tearDown() {
		unset($this->fun_obj);
	}
	
	/**
	 * Test checkErrors method 
	 * */
	function testcheckErrors ()
	{	
		// use assertEquals to ensure result is correct
        $expected = false;
        $actual = $this->fun_obj->checkErrors(10,7);
        $this->assertEquals($expected, $actual);
	}
	
	/**
	 * Test actionHandle method 
	 * */
	function testactionHandle()
	{	
		// use assertEquals to ensure result is correct
        $expected =json_encode(array('success'=>true,'result'=>'4  buzz  fuzz  bazz  8  fuzz  buzz  bazz  ')); 
        $actual = $this->fun_obj->actionHandle(4,11);
        $this->assertEquals($expected, $actual);
	}
}