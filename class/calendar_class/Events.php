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

        $req = $this->db->prepare("SELECT * from reservation  WHERE debut BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:00')}'");
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

    /**
     * @return string permet de récuperer le login des personnes qui ont reservé
     */
    public function getUserRes(){

        $sql = $this->db->prepare("SELECT id_utilisateur FROM reservation");
        $sql->execute();
        $res = $sql->fetch();

        $user = $this->db->prepare("SELECT * FROM utilisateurs WHERE id  = ?");
        $user->execute(array($res['id_utilisateur']));
        $result = $user->fetch();

        return $result;
    }

}