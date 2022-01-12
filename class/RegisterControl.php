<?php




class RegisterControl extends Register{

    private $login ;

    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

        
    }

    public function  signupUser(){

            if($this->emptyInput() == false){

                header("location: index.php?error=emptyinput");
                exit();
            }

            $this->setUser($this->login, $this->password);
    }

    

    private function emptyInput(){

        $result;

        if(empty($this->login) || empty($this->password)){

            $result = false;
        }else{

            $result = true;

        }

        return $result;
    }

}


  