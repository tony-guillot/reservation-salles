<?php
require 'class/Db_connect.php';
class Modifier_profil{


    public function __construct()

    {  
        
        
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }


    
    
              
        

}