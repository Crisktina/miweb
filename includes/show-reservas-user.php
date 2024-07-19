<?php 
require "autoload.models.php";
require "autoload.controlers.php";
$userID = $_SESSION['userID'];


$objeto = new ReservaContr($userID);
$pisosUser = $objeto->showPisosUserList();

$objeto2 = new ReservaContr($userID);
$dataPis = $objeto2->showDataReserva();


?>