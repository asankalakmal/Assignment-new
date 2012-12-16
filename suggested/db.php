<?php

class db {
	private static $instance=null;
	private function __construct ()//Private constructure
    {
        self::$instance=$this->mysql = new mysqli("localhost", "root", "", "assignment");//Mysql commcetion
        if ($this->mysql->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->mysql->connect_errno . ") " . $this->mysql->connect_error;
        }
    }

	public static function getInstance(){//Static function
		if(self::$instance){
			return self::$instance;
		}else {
			new db();
			return self::$instance;
		}
	}
}