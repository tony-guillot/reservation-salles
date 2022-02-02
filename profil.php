<?php session_start();

if (!isset($_SESSION['id'])) {

    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
</head>

<body>

        

    <?php require "include/header.php";


    require "class/form.php";

    require 'class/User.php';

    $form = new Form;
    

    $id_utilisateur = $_SESSION['id'];



    //  $userinfo = $update->Update($new_login, $new_password, $id_utilisateur);
    
    
    if(isset($_POST['new_login'], $_POST['new_password'], $_POST['new_password_conf'])) {

        $update = new User($new_login, $new_password);
        
       $new_login = $_POST['new_login'];
       $new_password = $_POST['new_password'];
       $new_password_conf = $_POST['new_password_conf'];

        $new_password = password_hash($new_password, PASSWORD_BCRYPT);
        $new_password_conf = password_hash($new_password_conf, PASSWORD_BCRYPT);

        if ($new_password = $new_password_conf) {

            
            
                if ($update->Update($new_login, $new_password, $id_utilisateur)) {
                    
                    
                    $msg = 'modification effetuée';
                } else {
                    
                    $msg = 'erreur l\'ors de la modification';
                }

        }else{

            $msg = "Les mots de passe se correspondent pas";

        }
    }


  

    ?>

    <h1>modifier le profil </h1>


    <?php if (isset($msg)) {

        echo '<div class="message">' . $msg . '</div>';
        
    } ?>

    <form action="#" method="post" class='form_profil'>

        <label class="label">Modifier votre nom d'utilisateur</label><br>

        <input type="text" name="new_login" class="col-auto" value="<?= $_SESSION['login'] ?>">

        <label class="label">Modifier votre mot de passe</label><br>
        <input type="password" name="new_password" class="col-auto" value="password">

        <label class="label">Confirmer le mot de passe</label><br>
        <input type="password" name="new_password_conf" class="col-auto"value="password">

        <input type="submit" name="modifier" class="submit" >



    </form>

    <footer>
    <?php require 'include/footer.html' ?>
    </footer>
</body>

</html>