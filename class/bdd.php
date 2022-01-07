<?php

class Bdd{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host='localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;

    }
    
    private function getPDO(){
        
        if($this->pdo === NULL){

            $pdo = new PDO('mysql:dbname=reservationsalles;host=localhost', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        

            return $pdo;
    }

    public function query($statement){

        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);

        return $datas;

    }

    public function userRegister($login,$password){

        $password = password_hash($password, PASSWORD_BCRYPT);
        
        $insert = $this->getPDO()->prepare('INSERT INTO utilisateurs (login,password)VALUES(:login, :password)');
        $insert->bindValue(':login', $login);
        $insert->bindValue(':password', $password);
        $insert->execut();
        
        return  $insert;

    }


   
}

