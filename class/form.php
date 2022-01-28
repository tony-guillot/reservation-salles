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

    public function input($name,$placeholder){
    
    return $this->surround('<label  class="label">Nom d\'utilisateur</label></br><input type="text" required name="'.$name.'" placeholder="'.$placeholder.'">');
    
    }
    
    
    public function password($name,$placeholder){
        
        return  $this->surround(
            
            '<label class="label">Mot de passe</label></br><input type="password" name="'.$name.'" class="col-auto" required placeholder="'.$placeholder.'"');

    }

    public function ConfirmPassword($name,$placeholder){
        
        return  $this->surround(
            
            '<label class="label">Confirmer le Mot de passe</label></br><input type="password" required name="'.$name.'" class="col-auto"placeholder="'.$placeholder.'"');

    }


    public function submit($name){

        return  $this->surround('<button type="submit" class="btn btn-primary" name="'.$name.'">Envoyer</button>');
    }

    public function input_titre($name,$placeholder){

        return $this->surround(

            '<label class="label">Titre de la reservation</label></br><input type="text" name="'.$name.'" class="col-auto" required  placeholder="'.$placeholder.'">'
        );
    }
    

    public function input_description($name, $placeholder){

        return $this->surround(

            '<label class="label">Description de la reservation</label></br><input type="text" name="'.$name.'" class="col-auto" required placeholder="'.$placeholder.'">'
        );
    }

    public function input_date_debut($name){

        return $this->surround(

            '<label class="label">Date et heure de début</label></br><input type="datetime-local" required name="'.$name.'" class="col-auto"  min="08:00" max="10:00">'
        );
    }

    public function input_date_fin($name){

        return $this->surround(

            '<label class="label">Date  et heure de fin</label></br><input type="datetime-local" required name="'.$name.'" class="col-auto">'
        );
    }


   
    public function Modifier_login($name,$value){

        return $this->surround(

            '<label class="label">Modifier votre nom d\'utilisateur<label></br><input type="text"required name="'.$name.'" class="col-auto" "value="'.$value.'">'
        );
    }

    public function Modifier_password($name){

        return $this->surround(

            '<label class="label">Modifier votre mot de passe</label></br><input type="text"required name="'.$name.'" class="col-auto" >'
        );
    }

    public function Modifier_password_conf($name){

        return $this->surround(

            '<label class="label">Confirmer le  mot de passe</label></br><input type="text"required name="'.$name.'" class="col-auto" >'
        );
    }
}