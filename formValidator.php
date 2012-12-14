<?php
/**
 * Title           Form validation 
 * @author         Asanka - <<asankalakmal[at]gmail[dot]com>>
 * created on      12-13-2012, 04:30PM by Asanka
 * updated on      
 *
 * Description     This file have functions associate with Form validation
 *
 * */
 
class formValidator {

	function __construct (){}
	
	/**
	 * Check the value is numeric or not
	 *
	 * @return boolean
	 * */
	function isPositiveInteger ($val)
	{
		if(!preg_match('/^[1-9][0-9]*$/',$val)){
			return false;
		}
		return true;
	}
	
	/**
	 * Check the value format is correct or not ( to value should be higher than the from value)
	 *
	 * @return boolean
	 * */
	function isCorrectFormat ($val1,$val2)
	{	
		if($val1 > $val2){
			return false;
		}
		return true;
	}
	
	/**
	 * Check the value is empty or not
	 *
	 * @return boolean
	 * */
	function isEmpty ($val)
	{	
		if(empty($val1)){
			return false;
		}
		return true;
	}
	
}