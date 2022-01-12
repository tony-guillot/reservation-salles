<?php 


class Register extends Bdd{

    private $login;
    private $password;

   

    
    public function __construct($login, $password)
    {
        
        $this->login = $login;
        $this->password = $password;
        
    }
    
    public function setUser($login, $password){
        
        $stmt = $this->connect()->prepare('INSERT INTO utilisateurs(login,password)VALUES(?,?)');
        
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        if(!$stmt->execute(array($login,$hashed_password))){
            
            $stmt = null; 
            
        }
    }

    public function signupUser(){

        $this->setUser($this->login, $this->password);
    }

    public  function emptyInput($msg){

        if(!isset($this->login,$this->hashed_password) || empty($this->login) || empty($this->hashed_password)){

            return $msg ;
            
        }       
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
}