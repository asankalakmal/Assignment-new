<?php

require_once('logicGenerator.php');
require_once('formValidator.php');

$error=null;
$result=null;
if(isset( $_POST['submit'] ) && $_POST['submit']== "logcalculate")
{
	$from=$_POST['from'];
	$to=$_POST['to'];
	if(!$this->checkErrors ($from, $to)) {
	echo 'errors';
		return json_encode(array('success'=>false,'error'=>$this->error));
	}
	$generatotr = new logicGenerator();
    $this->result=$generatotr->logicGenerate ($from, $to);
	return json_encode(array('success'=>true,'result'=>$this->result));
}

function checkErrors ($from, $to)
{	
	$validator= new formValidator();
	//Check from value is positive integer or not
	if(!$validator->isEmpty ($from) || !$validator->isEmpty ($to))
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
	if(!isCorrectFormat ($from, $to))
	{
		$this->error="To value should be higher than the from value !";
		return false;
	}
	return true;
}