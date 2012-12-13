<?php

Class logicGenerator {
	
	public $final_result=null;
	public function __construct (){}
	
	public function resultGenerate ($val)
	{
		$is_printed=false;
		$result=null;
		if( $val%3 == 0 ) {
			$result='fuzz';
			$is_printed=true;
		}
		if( $val%5 == 0 ) {
			$result.='buzz';
			$is_printed=true;
		}
		
		if( !$is_printed ) {
			$result=$val;
		}
		return $result;
	}
	
	public function logicGenerate ($val1,$val2)
	{
		for( $i=$val1; $i<=$val2; $i++ )
		{
			$this->final_result.=$this->resultGenerate ($i).'  ';
		}
		return $this->final_result;
	}

}