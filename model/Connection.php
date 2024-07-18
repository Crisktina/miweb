<?php

class Connection {

    protected function connect(){
        try {
            $con = new PDO('mysql:host=localhost;dbname=db_test_model', 'root','');
            return $con;
        } catch (PDOException $e) {
            return "Error!: ". $e->getMessage()."<br>";
        }
    }
}