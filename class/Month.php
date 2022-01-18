<?php

class Month{
    
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout','Septembre','Octobre', 'Novembre', 'Decembre'];
    private $month;
    private $years;

    /**
     * @param int $month mois compris entre 1  et 12
     * @param int $years l'année 
     * @throws Execption 
     */
    public function __construct( ?int $month = null, ?int $years = null){

        if($month === null){

            $month = intVal(date('m'));
        }

        if($years === null){

            $years = intval(date('Y')); // si le mois est strictement inferieur 1 ou superieur a 12 
        }
        if($month < 1 || $month > 12){

            throw new Exception("Le mois n'est pas valide");
        }
        if($years <  1970){

            throw new Exception("L'année est inférieur à 1970");

        }

        $this->month = $month;
        $this->years = $years;
    }

 

    
    /** retourn le mois en toute lettre 
     * @return string
     */
    public function toString(): string{

        return $this->months[$this->month - 1]. ' '.$this->years;
    }
    
    public function getWeeks(): int{

        $start = new \Datetime("{$this->years}-{$this->month}-01");
        $end = (clone $start)->modify('+1 month -1 day');

        $weeks =  intval($end->format('W')) - intVal($start->format('W')) +1;
        if($weeks < 0){

            $weeks = intval($end->format('W'));

            
        }
        return $weeks;
    }
}