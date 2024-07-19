<?php 
require "autoload.models.php";
require "autoload.controlers.php";

$objeto = new PisContr();
$pisos = $objeto->showPisosList();

?>