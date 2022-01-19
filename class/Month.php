<?php

class Month{
    
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout','Septembre','Octobre', 'Novembre', 'Decembre'];
    public $days = ['Lundi', 'Mardi', 'Mercredi','Jeudi','Vendredi','Samedi', 'Dimanche'];
    public  $month;
    public  $years;

    /**
     * @param int $month mois compris entre 1  et 12
     * @param int $years l'année 
     * @throws Execption 
     */
    public function __construct( ?int $month = null, ?int $years = null){

        if($month === null){

            $month = intVal(date('m')); // si le mois est null , month = mois en cours : intavl = retourne un int à la place d'une string
        }

        if($years === null){

            $years = intval(date('Y')); // si le mois est strictement inferieur 1 ou superieur a 12 
        }
        if($month < 1 || $month > 12){

            throw new Exception("Le mois n'est pas valide"); // créer l'exeption a afficher que l'on récupère apres avec un try et un catch 
        }

        $this->month = $month;
        $this->years = $years;
        
    }

    /**
     * @return \DateTime renvoie le premieyr jour du mois 
     */
    public function getFirstDay(): \DateTime{

        return new \Datetime("{$this->years}-{$this->month}-01"); 


    }
 

    
    /** retourn le mois en toute lettre 
     * @return string
     */
    
    public function toString(): string{

        return $this->months[$this->month - 1]. ' '.$this->years;
        
    }
    
    /**
     * @return int permet de recuperer le nombre de semaine dans le mois en un entier 
     */
    
     public function getWeeks(): int{

        $start = $this->getFirstDay(); 
        $end = (clone $start)->modify('+1 month -1 day'); // clone la variable $start pour pas la modifier et ajoute un mois et un jour pour arriver a la fin du mois en cours

        $weeks =  intval($end->format('W')) - intVal($start->format('W')) +1;
        if($weeks < 0){

            $weeks = intval($end->format('W')); // format retourne la date formaté au format voulu , ici W = jours de la semaine au fromat numérique

            
        }
        return $weeks;
    }

    /**
     * est-ce que le jour est dans le mois en cours
     * @param DateTime $date
     * 
     * @return bool
     */
    
    
    public function WithinMonth( \DateTime $date): bool {

        return $this->getFirstDay()->format('Y-m') === $date->format('Y-m');

    }

    /**
     * Renvoi le mois nuivant
     * @return month
     */
    public function nextMonth(): month{

        $month = $this->month +1;
        $years = $this->years;
       
        if($month > 12){

            $month = 1;
            $years = $years++;
            

        } 
        return new Month($month, $years);
    }

   
    /**
     * renvoie le mois precedent
     * @return month
     */
    public function previousMonth(): month{

        $month = $this->month - 1;
        $years = $this->years;

        if($month < 1){

            $month = 12;
            $years -= 1;
        }
        return new Month($month,$years);
    }
}