<?php 

/**
 * Class qui premet de génerer un formulaire rapidement 
 */
class Form{

    /**
     * @var $data array qui stock les valeurs du formulaire 
     */
    protected $data;

    /**
     * @var entour l'html
     */
    public $surround = 'p';


    


    public function __construct($data = array() )
    {
        $this->data = $data ; 
        
    }


    private function surround($html){

        return "<{$this->surround}>{$html}</{$this->surround}>";

    }

    // private function getValue($index){

    //     return $this->data[$index];
    // }

    public function input($name){
    
    return $this->surround('<label>Nom d\'utilisateur</label></br><input type="text" name="'.$name.'" >');
    
    }
    
    
    public function password($name){
        
        return  $this->surround(
            
            '<label class="label">Mot de passe</label></br><input type="password" name="'.$name.'" class="col-auto">');

    }

    public function ConfirmPassword($name){
        
        return  $this->surround(
            
            '<label class="label">Confirmer le Mot de passe</label></br><input type="password" name="'.$name.'" class="col-auto">');

    }


    public function submit($name){

        return  $this->surround('<button type="submit" class="btn btn-primary" name="'.$name.'">Envoyer</button>');
    }

    public function input_titre($name){

        return $this->surround(

            '<label class="label">Titre de la reservation</label></br><input type="text" name="'.$name.'" class="col-auto">'
        );
    }
    

    public function input_description($name){

        return $this->surround(

            '<label class="label">Description de la reservation</label></br><input type="text" name="'.$name.'" class="col-auto">'
        );
    }

    public function input_date_debut($name){

        return $this->surround(

            '<label class="label">Date de début</label></br><input type="datetime-local" name="'.$name.'" class="col-auto">'
        );
    }

    public function input_date_fin($name){

        return $this->surround(

            '<label class="label">Date de fin</label></br><input type="datetime-local" name="'.$name.'" class="col-auto">'
        );
    }
}