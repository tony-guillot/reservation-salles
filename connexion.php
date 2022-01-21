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
    include 'include/header.php';
    ?>

        <h1>Connexion</h1>


<?php

    require 'class/form.php';
    require 'class/User.php';
    

    $form = new Form($_POST);
    
    if(isset($_POST['envoyer'])){


        if(isset($_POST['login'],$_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){
            $login = $_POST['login'];
            $password = $_POST['password']; 
            
            $login = new User($login, $password);
            
            if($login->checkUserLogin()){

                if($login->login($password)){

                    $msg = 'vous êtes connecté';
                    header( "refresh:2;url=index.php" );
                
                }

            }else{

                $msg = 'mauvais nom d\utilisateur ou mot de passe';
            }

        }else{

            $msg = 'veuillez remplir tout les champs';
        }
}
    ?>
     
    <form action="#" method="post">
    
     <?php

    if(isset($msg)){

    echo $msg;

    }
 
     echo $form->input('login');
     echo $form->password('password');
     echo $form->submit('envoyer');
     
     ?>

    </form>
    <?php 
    if(isset($_SESSION['login'])){ 
   
        ?>
         <h1> Bienvenue <br/> <?php echo  $_SESSION['login']  ?> </h1>

    <?php } ?>


</body>
</html>