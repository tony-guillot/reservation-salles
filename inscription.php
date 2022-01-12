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

<h1>Inscription</h1>

<?php 

    require 'class/Form.php';

    if(isset($_POST['envoyer'])){

        // if(!isset($_POST['login'],$_POST['password']) && !empty($_POST['login'])&& !empty($_POST['password '])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        require 'class/Bdd.php';
        require 'class/Register.php';
        
        
        $singup = new Register($login, $password);
        
        if($singup->checkUser($login,$password)){
            
            $msg = 'Nom d\'utilisateur déjà pris' ;
            
                }if($singup->emptyInput($msg)){

                    $msg = 'Veuillez remplir tous les champs';

                }else{
                
                    $singup->signupUser();
                }
    
          }

         
       
    
          
             
        // }
        
    
        $form = new Form($_POST);
        
        ?>

    <form action="#" method="post">

    <?php
    if(isset($msg)){

        echo $msg;
    }
    echo $form->input('login');
    echo $form->password('password');
    echo $form->submit();

    ?>
    </form>
</body>
</html>