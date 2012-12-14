<?php
/**
 * Title           Logic Generator
 * @author         Asanka - <<asankalakmal[at]gmail[dot]com>>
 * created on      12-13-2012, 10:30AM by Asanka
 * updated on      
 *
 * Description     This file have functions associate with Logic calculation 
 *
 * */
 
Class logicGenerator {
	
	public $final_result=null;// Final result 
	public $fuzz_print=false;
	public $buzz_print=false;
	public function __construct (){}
	
	/**
	 * Value conver to fuzz, buzz or itself
	 *
	 * @return string
	 * */
	public function resultGenerate ($val)
	{
		$is_printed=false;
		$result=null;
		if( $val%3 == 0 ) {// if value multiple of 3 then result is fuzz
			$result='fuzz';
			$is_printed=true;
			$this->fuzz_print=true;
		}
		if( $val%5 == 0 ) {// if value multiple of 5 then result is buzz
			$result.='buzz';
			$is_printed=true;
			$this->buzz_print=true;
		}
		// if value not a multiple of 5 or 3 and consecutive Fizzes/Buzzes then result is buzz
		if( ($this->buzz_print && $this->fuzz_print) &&  ( $val%5 != 0 && $val%3 != 0) ) {
			$result='buzz';
			$is_printed=true;
			$this->buzz_print=false;
			$this->fuzz_print=false;
		}

		if( !$is_printed ) {// if value is not a multiple of 5 or 3 result equal to value
			$result=$val;
		}
		return $result;
	}
	
	/**
	 * Logic generate 
	 *
	 * @return string
	 * */
	public function logicGenerate ($val1,$val2)
	{	//Loop the range
		for( $i=$val1; $i<=$val2; $i++ )
		{	
			$this->final_result.=$this->resultGenerate ($i).'  ';
		}
		return $this->final_result;
	}

}