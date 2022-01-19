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

    <link rel="stylesheet" href="include/calendar.css">

    

    <title>Document</title>
</head>
<body>

    
    <?php 

    require 'include/header.php';
    
    require 'class/Month.php';
    
    try{
        
        $month = new Month($_GET['month'] ?? null, $_GET['years '] ?? null);
        $start = $month->getFirstDay()->modify('last monday');
    
    }catch(\Exception $e){

        $month  = new Month();
    }
    
    ?>  
        
        <div class="calendar_btn">
        <p id="calendar_p">Planning des reservations des salles</p>
        <h1 ><?= $month->toString()?></h1>
            <div>
                <a href="planning.php?month=<?= $month->previousMonth()->month; ?>&years=<?= $month->previousMonth()->years; ?>" class="btn btn-primary">&lt;</a>

                <a href="planning.php?month=<?= $month->nextMonth()->month; ?>&years=<?= $month->nextMonth()->years;?>" class="btn btn-primary">&gt;</a>

            </div>
        </div>

        
   

    

  
    

    <table class="calendar_table calendar_table--<?=$month->getWeeks();?>weeks">

     <?php  for($i=0; $i < $month->getWeeks(); $i++):?> 
        <!-- boucle les jour de la semaine selon le nombres de semaines dans le mois  -->
     <tr>
         <?php  foreach ($month->days as $k => $day): 
            
           $date = (clone $start)->modify("+". ($k + $i *7). "days")  ;?>  
            
            <!-- $k stock la valeur du jour -->
         <td class ="<?= $month->WithinMonth($date) ? ' ' : 'calendar_othermonth' ?>">  <!-- si c'est vrais on met rien sinon la class calendar_othermonth -->

           <?php if($i === 0): ?>
            <div class="calendar_weekday"> <?= $day ;?></div>
            <?php endif; ?>
           <div class="calendar_day"><?= $date->format('d');?> </div>
         </td>
         <?php endforeach; ?>
     </tr>
        <?php endfor; ?> <!-- endfor remplace les accolade php  -->
    </table>
    

    
</body>
</html>