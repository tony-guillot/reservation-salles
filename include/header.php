
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#forum_navbar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Accueil<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">

          <?php if(!isset($_SESSION['id'])){?>

            <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="inscription.php">Inscription</a>
            </li>
         <?php } ?>

         <li class="nav-item">
          <a  class="nav-link" href="planning.php">Planning</a>
          </li>
            
         <?php if(isset($_SESSION['id'])){ ?>

          <li class="nav-item">
          <a  class="nav-link" href="reservation-form.php">Reservation</a>
          </li>

          <li class="nav-item">
          <a  class="nav-link" href="profil.php">Profil</a>
          </li>
      
      
    
        <li class="nav-item">
        <a  class="nav-link" href="disconnect.php">Déconnexion</a>
        </li>
        <?php } ?>

       
       
        </li>
      </ul>
    </div>
  </nav>