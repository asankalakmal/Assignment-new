<?php
require_once('logicGenerator.php');
require_once('formValidator.php');
/**
 * Title           Function handler
 * @author         Asanka - <<asankalakmal[at]gmail[dot]com>>
 * created on      12-14-2012, 10:30AM by Asanka
 * updated on      
 *
 * Description     This file have functions associate with function handler
 *
 * */

class functionHandler {
	
	public $error=null;
	public $result=null;
	function __construct (){}
	
	/**
	 * Check if input fields have error or not
	 *
	 * @return boolean
	 * */
	function checkErrors ($from, $to)
	{	
		$validator= new formValidator();
		//Check from value is positive integer or not
		if($validator->isEmpty ($from) || $validator->isEmpty ($to))
		{
			$this->error="All fields are mandatory!";
			return false;
		}
		//Check from value is positive integer or not
		if(!$validator->isPositiveInteger ($from) || !$validator->isPositiveInteger ($to))
		{
			$this->error="All value should be positive integer !";
			return false;
		}
		//Check from value is positive integer or not
		if(!$validator->isCorrectFormat ($from, $to))
		{
			$this->error="To value should be higher than the from value !";
			return false;
		}
		return true;
	}
	
	/**
	 * Handle the input and out put then send the result
	 *
	 * @return json array
	 * */
	function actionHandle($from, $to)
	{	//Check 'from' and 'to' input fildes does not have errors
		if(!$this->checkErrors ($from, $to)) {
			return json_encode(array('success'=>false,'error'=>$this->error));// Return the json format
		}
		$generatotr = new logicGenerator();
		$this->result=$generatotr->logicGenerate ($from, $to);
		return json_encode(array('success'=>true,'result'=>$this->result));// Return the json format
	}
}