<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Inscription</title>
</head>

<body>
    <header>
        <?php require 'include/header.php'; ?>
    </header>

    <main>

        <h1>Inscription</h1>

        <?php

        require 'class/form.php';

        require 'class/User.php';

        $form = new Form($_POST);



        if (isset($_POST['envoyer'])) {



            if (isset($_POST['login'], $_POST['password'], $_POST['ConfirmPassword']) && !empty($_POST['login']) && !empty($_POST['password'])  && !empty($_POST['ConfirmPassword'])) {




                $login = $_POST['login'];
                $password = $_POST['password'];

                $user = new User($login, $password);


                if ($user->checkUserSignup($login)) {


                    if ($password == $_POST['ConfirmPassword']) {

                        $user->signup($password);
                        $msg = 'inscription validée';
                    } else {
                        $msg = 'les mot de passes ne sont pas identique';
                    }
                } else {

                    $msg = 'utilisateur déjà pris';
                }
            } else {

                $msg = 'veuillez remplir tout les champs';
            }
        }
        ?>

        <form action="#" method="post">

            <?php
            if (isset($msg)) {

                echo $msg;
            }
            echo $form->input('login', 'Entrez un nom d\'utilisateur');
            echo $form->password('password', 'Entrez un mot de passe');
            echo $form->ConfirmPassword('ConfirmPassword', 'Confirmez le mot de passe');
            echo $form->submit('envoyer');


            ?>

        </form>
    </main>

    <footer>
        <?php require 'include/footer.html'; ?>
    </fooer>
</body>

</html>