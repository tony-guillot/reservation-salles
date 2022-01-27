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
        

            if($row_count == 1){

                $userinfo = $stmt->fetch();
                $_SESSION['login'] = $userinfo['login'];
                $_SESSION['id'] = $userinfo['id'];

                password_verify($password, $userinfo['password']);
                return true;
            }else{

                return false;
            }
        
      }
            
    public function checkUserSignup(){

        $stmt = $this->db->prepare('SELECT * FROM utilisateurs WHERE login = ?');
        $stmt->execute(array( $this->login));


          $row_count = $stmt->rowCount();

        if($row_count == 0 ){

            return True;

    }else{

        return false;
    }
    
    }

    public function checkUserLogin(){

        $stmt = $this->db->prepare('SELECT * FROM utilisateurs WHERE login = ?');
        $stmt->execute(array( $this->login));


          $row_count = $stmt->rowCount();

        if($row_count == 1){

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

public function Update($new_login, $new_password, $id_utilisateur){


    $sql = $this->db->prepare(" UPDATE utilisateurs SET login = ? , password = ? WHERE id = ?");

    if($sql->execute(array($new_login, $new_password, $id_utilisateur))){

        
        $new_login = $_SESSION['login'];
        

    }


    
        

}

}