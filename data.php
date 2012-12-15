<?php

class baseObj {
    public $mysql = null;
    public $table = null;

    public function __construct ()
    {
        $this->mysql = new mysqli("localhost", "root", "", "assignment");
        if ($this->mysql->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->mysql->connect_errno . ") " . $this->mysql->connect_error;
        }
    }

    public function get ($id, $field, $table)
    {
        $res=$this->mysql->query("SELECT $field FROM $table WHERE ID = $id");
		return $res->fetch_row();
    }

    public function getAll ($id, $table)
    {
        $res = $this->mysql->query("SELECT * FROM $table WHERE ID = $id");
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

    private $table = 'Property';
    public function getType ($ID) { $Type = $this->get( $ID, 'Type', $this->table); return $Type; }
    public function getTitle ($ID) { $Title = $this->get( $ID, 'Title', $this->table) ; return $Type;}
    public function getAddress ($ID) { $Address = $this->get( $ID, 'Address', $this->table) ; return $Address;}
    public function getBedroom ($ID) { $Bedroom = $this->get( $ID, 'Bedroom', $this->table) ; return $Bedroom;}
    public function getLivingroom ($ID) { $livingroom = $this->get( $ID, 'Living_room', $this->table) ; return $livingroom;}
    public function getDiningroom ($ID) { $diningroom = $this->get( $ID, 'Diningroom', $this->table) ; return $diningroom;}
}

class hdbData extends propertyData {
    private $table = 'HDB';
    public function getHDBBlock ($ID) { $this->hdbblock = $this->get($ID, 'HDBBlock', $this->table); return $this->hdbblock; }
}

class condoData extends propertyData {
    private $table = 'ConDO';
    public function gotSwimmingPool ($ID)
    {
        return $this->get($ID, 'SwimmingPool', $this->table);
    }
}

?>