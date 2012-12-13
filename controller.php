<?php

require_once('logicGenerator.php');
require_once('formValidator.php');

$error=null;
if($_POST['submit']== "logcalculate")
{
	$from=$_POST['from'];
	$to=$_POST['to'];
	//$generatotr = new logicGenerator();
    //$generatotr->logicGenerate ($val1,$val2);
	
}

function checkErrors ($from, $to)
{	
	$validator= new formValidator();
	//Check from value is positive integer or not
	if(!$validator->isPositiveInteger ($from))
	{
		$this->error="From value should be positive integer !";
	}
	if(!$validator->isPositiveInteger ($to))
	{
		$this->error="To value should be positive integer !";
	}
}