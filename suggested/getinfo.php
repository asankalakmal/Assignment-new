<?php
require_once("data.php");

$id =$_POST['id'];
$data = new hdbData();
echo json_encode( $data->getAddress(1) );


?>