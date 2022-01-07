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
    require 'include/header.html';
    require 'class/bdd.php';
    require 'class/form.php';
    ?>


<h1>Reservation salles</h1>

    
    <?php
    
     $form = new Form($_POST);

    // $db = new Bdd('reservationsalles');

    // $datas = $db->query('SELECT * FROM utilisateurs');
    
    // var_dump($datas);
    ?>

    <form action="#" method="post">

    <?php

    echo $form->input('login');
    echo $form->password('password');
    echo $form->submit();




    
    ?>

    </form>

    
    <?php
    require 'include/footer.html';
    ?>
    
</body>
</html>