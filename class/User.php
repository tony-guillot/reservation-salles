<?php
require 'class/Db_connect.php';

class User{

    private $login;
    private $password;
  
   
    
    public function __construct($login, $password)

    {  

        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
        $this->login = $login;
        $this->password = $password;
        

        

        
    }


    public function signup ( $password){

    
            
            $stmt = $this->db->prepare('INSERT INTO utilisateurs(login,password)VALUES(?,?)');
            
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            
            if($stmt->execute(array( $this->login, $hashed_password))){
                
                return $stmt;
                
            }
            
        }

      public function login($password){

        $stmt = $this->db->prepare('SELECT * FROM utilisateurs WHERE login = ?');
        $stmt->execute(array( $this->login));
        $row_count = $stmt->rowCount();
        $userinfo = $stmt->fetch();

            if($row_count == 1){

               $_SESSION['login'] = $userinfo['login'];
               
               password_verify($password, $userinfo['password']);
                return true;
            }
        
      }
            
    public function checkUser(){

        $stmt = $this->db->prepare('SELECT * FROM utilisateurs WHERE login = ?');
        $stmt->execute(array( $this->login));


          $row_count = $stmt->rowCount();

        if($row_count == 0 ){

            return True;

    }else{

        return false;
    }
    
    }
    
    public function NotemptyInput(){

        if(isset($this->login, $this->password) && !empty($this->login) && !empty($this->password)){

            return true;

        }else{

        return false;
    }
}

}