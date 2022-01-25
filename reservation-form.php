<?php
session_start();
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

    

    <title>Document</title>
</head>
<body>
    <?php require 'include/header.php';
    require 'class/form.php';
    require 'class/calendar_class/Calendar_form.php';
    

    ?>

    <h1> Reserver un crénau</h1>

    <?php $form = new Form();
    
    if(isset($_POST['envoyer'])){


        if(isset($_POST['titre'],$_POST['description'],$_POST['debut'],$_POST['fin']) && !empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['debut']) && !empty($_POST['fin'])){

            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $debut = $_POST['debut'];
            $fin = $_POST['fin'];
            $heure_debut = $_POST['heure_debut'];
            $heure_fin = $_POST['heure_fin'];


            $id_utilisateur = $_SESSION['id'];
            
            $heure_debut = intval((new DateTime($heure_debut))->format('H'));
            $heure_fin = intval((new DateTime($heure_fin))->format('H'));
            


            
            var_dump($heure_debut);
            var_dump($heure_fin);

            var_dump($_POST['debut']);

                    

            $insert = new Calendar_form();

            
            
           
            
            
            if($heure_debut < 8 && $heure_fin > 19){

             echo 'erreur horraire';
           
            }else{

                $insert->calendarInsert($titre,$description,$debut,$fin,$id_utilisateur);
                
                var_dump($insert);

            }
                
   
        
               
        }else{

            $msg = "veuillez remplir tout les champs";

        }
            
    
        
        }   
    
    ?>
    <form action="" method="post" class="form_resa">
    <?php

    if(isset($msg)){

        echo $msg;
    }
    
    echo $form->input_titre('titre','titre de la reservation');
    echo $form->input_description('description', 'description de reservation');
    echo $form->input_date_debut('debut');
    echo $form->input_date_fin('fin');
    echo $form->input_heure_debut('heure_debut');
    echo $form->input_heure_fin('heure_fin');
    echo $form->submit('envoyer');

    ?>

    </form>

</body>
</html>