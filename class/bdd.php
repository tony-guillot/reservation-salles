<?php

class Bdd{

    
    protected function connect(){

        try{
            
            $username = "root";
            $password = "";

            $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles',$username,$password);
            return $bdd;
            
        }catch(PDOException $e){

            echo 'erreur : '. $e->getMessage();

        }
    }
}

