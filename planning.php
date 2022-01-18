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
    <title>Document</title>
</head>
<body>

    
    <?php 

    require 'include/header.php';
    
    require 'class/Month.php';
    
    try{
        
        $month = new Month($_GET['month'] ?? null, $_GET['years '] ?? null);
    
    }catch(\Exception $e){

        $month  = new Month();
    }

    ?>
    <?= $month->getWeeks();?>
    <table>

    

     <?php  for($i=0; $i < $month->getWeeks(); $i++):?> 

     <tr>
         <td>Lundi</td>
         <td>Mardi</td>
         <td>Mercredi</td>
         <td>Jeudi</td>
         <td>Vendredi</td>
         <td>Samedi</td>
         <td>Dimanche</td>
     </tr>
        <?php endfor; ?> <!-- enfore remplace les accolade php  -->
    </table>
    

    <h1><?= $month->toString()?></h1>
</body>
</html>