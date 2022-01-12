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
    include 'include/header.php';
    ?>

        <h1>Connexion</h1>


<?php

    require 'class/form.php';
    require 'class/Login.php';
    require 'class/register.php';
    
    if(isset($_POST['envoyer'])){


        $log = $_POST['login'];
        $password = $_POST['password'];
        
        
        $login = new Login($log, $password);
        $connect = new Register($log, $password);
        
        $password_verify = $login->Login($login, $password);
        var_dump($password_verify);

        if($connect->checkUser($log, $password)){

            $msg = 'Utilisateur introuvable';
            
        }if($login->PasswordVerify($password, $password_verify )){

           

        }
        
        
        
        
    
        
        // else($login->Login($log, $password)){

        //     $msg = 'connexion reussie';
        // }
        
    
    
    }
    

    
    $form = new Form($_POST);


    
    ?>
     
    <form action="#" method="post">
 
     <?php
 
     echo $form->input('login');
     echo $form->password('password');
     echo $form->submit();
     
     ?>

    </form>
    <?php 
    if(isset($_SESSION['id'])){ 
   
        ?>
         <h1> Bienvenue <br/> <?php echo  $res['login'] ?> </h1>

    <?php } ?>


</body>
</html>