<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $username = $_POST["uid"];
    $password = $_POST["pwd"];


    require "autoload.models.php";
    require "autoload.controlers.php";

    //atraer datos para almacenar en sessión

    $session = new UserContr($username, $password);
    $usarioAllData = $session->idUser();

    foreach ($usarioAllData as $usuario) {
        // regenera el token de la session perpetua por defecto
        session_regenerate_id();
                        
        // almacenar usuario en la session 
        session_start();
        if($usuario['users_uid']=='admin'){
            $_SESSION['login'] = 1;
        } else {
            $_SESSION['login'] = 2;
        }
        

        $_SESSION['username'] = $usuario['users_uid'];
        $_SESSION['userID'] = $usuario['users_id'];
        
    }
    
    

    $login = new UserContr($username, $password);
    $login->loginUser();

   

    //Volver a la pagina inicial
    header("Location: ../view/pisos.php");

}