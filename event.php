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
    <?php require 'include/header.php';

     require 'class/calendar_class/Events.php';

    $events = new Events();
   

    if(!isset($_GET['id'])){

        header('Location: 404.php');
    }
    
    ?>

    <h1>Reservation</h1>
    
    <?php $event = $events->find($_GET['id']); 

        $user_resa = $events->getUserRes();
    ?>

    <div class="reservation">

    <h4> <?=$event['titre']; ?></h1>
    <ul>
        <li>Reservé par : <?= $user_resa['login']; ?></li>
        <li>Du : <?=(new DateTime($event['debut']))->format('d/m/y H:i');?></li>
        <li>Au : <?=(new DateTime($event['fin']))->format('d/m/y H:i');?></li>

    </ul>

    <ul>
        <li>Description : <?= $event['description'];?></li>
     

    </ul>

    </div>
    
    <?php require 'include/footer.html'; ?>
</body>
</html>