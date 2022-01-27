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
    
    require 'class/calendar_class/Month.php';
    require 'class/calendar_class/Events.php';
    
        $events = new Events;
        $month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null); // si GET['month'] ou GET['years'] n'est pas défini, il prend la valeur null
        $start = $month->getFirstDay()->modify('last monday');
        $weeks = $month->getWeeks();
        $end = (clone $start)->modify('+' . (6 + 7 * ($weeks -1)). 'days');
        
        $events = $events->getEventsBetweenByDay($start, $end);
        $user_res = new Events;
        $user_result = $user_res->getUserRes();
   
 
    
    ?>  
        
        <div class="calendar_btn">
        <p id="calendar_p">Planning des reservations des salles</p>
        <p>Les reservations sont ouvertes du Lundi au Vendredi de 8h à 9h</p>
        <h1 ><?= $month->toString()?></h1>
            <div>
                <a href="planning.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->years; ?>" class="btn btn-primary">&lt;</a>

                <a href="planning.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->years;?>" class="btn btn-primary">&gt;</a>

            </div>
        </div>

        
   


    

    <table class="calendar_table calendar_table--<?=$weeks;?>weeks">

     <?php  for($i=0; $i < $weeks; $i++):?> 
        <!-- boucle les jour de la semaine selon le nombres de semaines dans le mois  -->
     <tr>
         <?php  foreach ($month->days as $k => $day):  // $k recupère la valeur des jour en int 


        
        $date = (clone $start)->modify("+". ($k + $i *7). "days");
        $eventsForDay = $events[$date->format('Y-m-d')] ?? []; // si ce n'est pas defini prend un tableau vide comme valeur
        ?>  

            <!-- $k stock la valeur du jour -->
         <td class ="<?= $month->WithinMonth($date) ? '' : 'calendar_othermonth'; ?>">  <!-- si c'est vrais on met rien sinon la class calendar_othermonth -->

           <?php if($i === 0): ?>
            <div class="calendar_weekday"> <?= $day ;?></div>
            <?php endif; ?>
           <div class="calendar_day"><?= $date->format('d');?></div>
           <?php  foreach($eventsForDay  as $event): ?>
            
            <div class="calendar_events">

            <?= $user_result['login']?> - <?=(new Datetime($event['debut']))->format('H:i')?> -<?=(new Datetime($event['fin']))->format('H:i'); ?> -<a href="event.php?id=<?=$event['id'];?>"> <?= $event['titre'];?> 
            </div></a>
            <?php endforeach; ?>    
         </td>
         <?php endforeach; ?>
     </tr>
        <?php endfor; ?> <!-- endfor remplace les accolade php  -->
    </table>

    <a href="reservation-form.php" class="calendar_button">+</a>
    
    
    <?php require 'include/footer.html' ?>
</body>
</html>