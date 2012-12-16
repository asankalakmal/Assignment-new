<?php
require_once("db.php");
class baseObj extends db {
    public $mysql = null;
	private $table=null;
    function __construct ($tab)
    {
        $this->mysql = parent::getInstance();
		$this->table=$tab;
    }

    public function get ($id, $field)
    {
		$res=$this->mysql->query("SELECT $field FROM $this->table as a inner join property as b on a.PID=b.ID  WHERE a.ID = $id");
        return $res->fetch_row();
    }

    public function getAll ($id)
    {
        $res = $this->mysql->query("SELECT * FROM $this->table as a inner join property as b on a.PID=b.ID  WHERE a.ID = $id");
        return $res->fetch_assoc();
    }
}

class propertyData extends baseObj {
    public $id = null;
    public $type = null;
    public $title = null;
    public $address = null;
    public $bedroom = null;
    public $livingroom = null;
    public $diningroom = null;
    protected $hdbblock = null;
    private $swimmingPool = null;
	
	function __construct($tab='HDB') 
	{
	   parent::__construct($tab);// Call parent constructor and pass table name
    }
    public function getType ($ID) { $Type = $this->get( $ID, 'Type'); return $Type; }
    public function getTitle ($ID) { $Title = $this->get( $ID, 'Title') ; return $Type;}
    public function getAddress ($ID) { $Address = $this->get( $ID, 'Address') ; return $Address;}
    public function getBedroom ($ID) { $Bedroom = $this->get( $ID, 'Bedroom') ; return $Bedroom;}
    public function getLivingroom ($ID) { $livingroom = $this->get( $ID, 'Living_room') ; return $livingroom;}
    public function getDiningroom ($ID) { $diningroom = $this->get( $ID, 'Diningroom') ; return $diningroom;}
}

class hdbData extends propertyData {
    private $table = 'HDB';
	
	//Add constructure for call parent class construct
	function __construct() 
	{	
        parent::__construct($this->table);// Call parent constructor and pass table name
    }
	
    public function getHDBBlock ($ID)
	{
		$this->hdbblock = $this->get($ID, 'HDBBlock'); 
		return $this->hdbblock; 
	}
}

class condoData extends propertyData {
    private $table = 'ConDO';
	
	//Add constructure for call parent class construct
	function __construct() 
	{
        parent::__construct($this->table);// Call parent constructor and pass table name
    }
	
    public function gotSwimmingPool ($ID)
    {
        return $this->get($ID, 'SwimmingPool');
    }
}

?>