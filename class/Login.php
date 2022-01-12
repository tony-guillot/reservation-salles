<?php 
require 'class/Bdd.php';

class Login extends Bdd{

    private $login;
    private $password;



    public function __construct($login, $password){

        $this->login = $login;
        $this->password = $password;

        

    }

    public function Login($login){


        $log = $this->connect()->prepare('SELECT * FROM utilisateurs where login = ?');
        $log->execute(array($this->login));
        $userinfo = $log->fetch();
        $res = $userinfo->rowCount($log);

        $password_verify = $userinfo['password'];

        if($res == 1 ){

            
            // $_SESSION['login'] = $userinfo['login'];
            // $_SESSION['id'] = $userinfo['id'];
            
    
        }

        return $userinfo;
    }

    

    public function PasswordVerify($hashed_password,  $password_verify){


        
        if(password_verify($hashed_password, $password_verify)){
            
            
            return true;
        }
        
        return false;
        
    }

    public function checkUser($login, $password){

        $stmt = $this->connect()->prepare('SELECT login, password FROM utilisateurs WHERE login = ? OR password = ? ');

        $stmt->execute(array($login, $password));

        $res =  $stmt->rowCount();

        if($res > 0){

            return false;
        }
       
        return $res;

    }

    public function isConnect($login, $password){


        $_SESSION['id'];
        
    }

}
