<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $pisID = $_POST["pis_id"];
    $userID = $_POST["user_id"];


    require "autoload.models.php";
    require "autoload.controlers.php";


    $reservar = new ReservaContr($userID, $pisID);
    $reservar->newReserva();

    //Volver a la pagina inicial
    header("Location: ../view/pisos.php");
}
?>