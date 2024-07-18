<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $username = $_POST["uid"];
    $password = $_POST["pwd"];


    require "autoload.models.php";
    require "autoload.controlers.php";
    
    // regenera el token de la session perpetua por defecto
    session_regenerate_id();
                    
    // almacenar usuario en la session 
    session_start();
    if($username=='admin'){
        $_SESSION['login'] = 1;
    } else {
        $_SESSION['login'] = 2;
    }
    $_SESSION['username'] = $username;

    $login = new UserContr($username, $password);
    $login->loginUser();

    //Volver a la pagina inicial
    header("Location: ../view/pisos.php");

}