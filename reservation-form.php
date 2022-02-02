<?php
session_start();

if(!isset($_SESSION['id'])){

    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="calendar.css">



    <title>Reservation</title>
</head>

<body>

    <?php
    require 'include/header.php';
    require 'class/form.php';
    require 'class/calendar_class/Calendar_form.php';
    ?>

    <h1> Reserver un créneau</h1>

    <?php $form = new Form();


    if (isset($_POST['debut'], $_POST['fin'],$_POST['titre'],$_POST['description'])) {

        $now = new DateTime();
        $result_now = $now->format('Y-m-d H:i:s');
        $debut_int = intval((new DateTime(($_POST['debut'])))->format('H'));
        $fin_int = intval((new DateTime(($_POST['fin'])))->format('H'));


        $debut = (new DateTime($_POST['debut']))->format('Y-m-d H:i:s');
        $fin = (new DateTime(($_POST['fin'])))->format('Y-m-d H:i:s');

        $day = intval((new DateTime(($_POST['debut'])))->format('w'));
        
        $interval =   $fin_int - $debut_int;
        
            
        if($debut >= $result_now){

            
            if($debut_int >= 8 && $fin_int <= 19){
                
                if($interval == 1){
                    
                    
                    if($day <= 5){
                        
                        if(isset($_POST['envoyer'])){
                            
                            $titre = $_POST['titre'];
                            $description = $_POST['description'];
                            $id_utilisateur = $_SESSION['id'];
                            
                            $insert = New   Calendar_form();
                            
                            if($insert->resatNotExist($debut)){
                                
                                if($insert->calendarInsert($titre, $description,$debut,$fin,$id_utilisateur)){
                                    
                                    $msg = 'Réservation validée';
                                    header( "refresh:2;url=planning.php" );
                                }else{
                                    
                                    $msg = 'erreur inscription';
                                }
                                
                            }else{
    
                                $msg = 'date déjà prise';
                            }
                            
                        }
                    }else{
                        
                        $msg = 'Nous sommes fermé le Weekend';
                    }

            }else{
                
                $msg = ' seul les creneaux de 1h sont disponible';
            }
            
        }else{
            
            $msg = 'Nous sommes ouvert uniquement de 8h à 19h';
        }
        
    }else{

        $msg = 'Veuillez entrer une date valide';
    }
    
}
    
    ?>
    <form action="" method="post" class="form_resa">
        <?php

        if (isset($msg)) {

            echo '<div class="message">' . $msg . '</div>';
        }

        echo $form->input_titre('titre', 'titre de la reservation');
        echo $form->input_description('description', 'description de reservation');
        echo $form->input_date_debut('debut');
        echo $form->input_date_fin('fin');
        echo $form->submit('envoyer');



        ?>

    </form>
    <?php require 'include/footer.html'; ?>
</body>
</html>