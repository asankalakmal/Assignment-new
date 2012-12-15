<?php
require_once("data.php");

$id =$_POST['id'];
$data = new hdbData();
echo json_encode( $data->getType(1) );
echo json_encode( $data->getBedroom(1) );


?>