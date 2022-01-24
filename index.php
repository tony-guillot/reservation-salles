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
    <title>Document</title>
</head>
<body>
    
    <?php 
    require 'include/header.php';


    require 'class/Db_connect.php';
    require 'class/form.php';

    var_dump($_SESSION['id']);


    ?>


<h1>Reservation salles</h1>

    <?php
     
     if(isset($_SESSION['id'])){

        ?> <h3>Bienvenue <?= $_SESSION['login'];?></h3>
     <?php }

        if(!isset($_SESSION['id'])){

        ?> <h5>veuillez vous connecter pour reserver un crénaux </h3>
        <?php
         }else{

        ?> <p>Cliquez <a href="reservation.php">ici</a> pour reserver une salle </p>

       <?php }  ?>         
        
    



    
    

    
  

    
    <?php
    require 'include/footer.html';
    ?>
    
</body>
</html>