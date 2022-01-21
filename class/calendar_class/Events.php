<?php
require 'class/Db_connect.php';
class Events{


    /**
     * connexion a la bdd dans le construc
     */
    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    /**
     * recupere les reservations entre deux date 
     * @param DateTime $start
     * @param DateTime $end
     * 
     * @return array
     */
    public function getEventsBetween(DateTime $start, DateTime $end): array{

        $req = $this->db->prepare("SELECT * from reservation INNER JOIN utilisateurs ON reservation.id_utilisateur = utilisateurs.id WHERE debut BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'");
        $req->execute();

        $results = $req->fetchall();

      
      
        return $results;
    }

    /**
     * recupere les reservations entre deux date indexer par jour
     * @param DateTime $start
     * @param DateTime $end
     * 
     * @return array
     */
    public function getEventsBetweenByDay(DateTime $start, DateTime $end): array{

        $events = $this->getEventsBetween($start,$end);
        $days = [];

        foreach($events as $event){

            $date = explode(' ', $event['debut'])[0];

            if(!isset($days[$date])){  

                   $days[$date] = [$event] ;                        //si ça n'existe pas , créer un tableu qui contient l'évenement 
            }else{

                $days[$date] [] = $event; // si ça existe déjà, prend le tableau et rajoute l'evenement 
            }
        }

        return $days;

    }

  
    /**
     * récupere une reservation 
     * @param int $id
     * 
     * @return array
     */
    public function find(int $id){

        return  $this->db->query("SELECT * FROM reservation  WHERE id = '$id'")->fetch();
        
       
        

    }

    public function getUserResa(){

        return  $this->db->query("SELECT * FROM reservation as r INNER JOIN utilisateurs on r.id_utilisateur = utilisateurs.id")->fetch();
    }
}   
