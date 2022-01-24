<?php 
require 'class/Db_connect.php';

class Calendar_form{



        public function __construct()
        {
            
            $this->db = new Db_connect();
            $this->db = $this->db->return_connect();
        }

        public function  calendarInsert($titre,$description,$debut,$fin,$id_utilisateur){


            $sql = $this->db->prepare('INSERT INTO reservation (titre,description,debut,fin,id_utilisateur)VALUES(?,?,?,?,?)' );
            
            
            if($sql->execute(array($titre,$description,$debut,$fin,$id_utilisateur))){

                return $sql;
            }

            

        }       
}