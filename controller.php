<?php

require_once('functionHandler.php');

$error=null;
$result=null;
if(isset( $_POST['submit'] ) && $_POST['submit']== "logcalculate")
{
	$from=$_POST['from'];
	$to=$_POST['to'];
	
	$functionHandler = new functionHandler();
    echo $functionHandler->actionHandle($from, $to);
}