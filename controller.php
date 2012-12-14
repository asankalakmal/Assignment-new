<?php
require_once('functionHandler.php');
// Check this form submit from our request (our form request)
if(isset( $_POST['submit'] ) && $_POST['submit']== "logcalculate")
{
	$from=$_POST['from'];// Catch the input 'from' value
	$to=$_POST['to'];// Catch the input 'to' value
	
	$functionHandler = new functionHandler();// Create a object functionHandler class
    echo $functionHandler->actionHandle($from, $to); // Call actionHandle function and get the result
}