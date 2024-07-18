<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $pisname = $_POST["uidpis"];
    $tipus = $_POST["tipus"];
    $numHabitacions = $_POST["numHabitacions"];
    $numLavabos = $_POST["numLavabos"];


    require "autoload.models.php";
    require "autoload.controlers.php";
    

    $pis = new PisContr($pisname, $tipus, $numHabitacions, $numLavabos);
    $pis->createPis();

    //Volver a la pagina inicial
    header("Location: ../view/pisos.php");

}

