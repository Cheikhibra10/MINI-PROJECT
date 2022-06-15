<?php
$arrayError = [];


if (isset($_SESSION['arrayError'])) {
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Document</title>
   
</head>
<body>
<nav class="navbar">
        <div class="logo">
         <img src="images/logo.jpeg" alt="">
        </div>
       <div class="titre"><h1>Le plaisir de jouer</h1></div>
       </nav>
    <div class="add-user">
    <form class="form" action="<?php echo WEB_ROUTE ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="controller" value="securityController">
    <input type="hidden" name="action" value="inscription">
        <h1 class="text-center primary-color">
            Inscription
        </h1>

        <div class="form-container">
        <div class="form-group">
                <label>Prénom</label>
                <br>
                <input type="text" name="prenom"
                placeholder="Veuillez saisir votre prénom"
                class="form-input">
                <br>
                <span><?php echo isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ?></span>
            </div>
        <div class="form-group">
                <label>Nom</label>
                <br>
                <input type="text" name="nom"
                placeholder="Veuillez saisir votre nom"
                class="form-input">
                <br>
                <span><?php echo isset($arrayError['nom']) ? $arrayError['nom'] : '' ?></span>
            </div>
          
            <div class="form-group">
                <label>Téléphone</label>
                <br>
                <input type="text" name="telephone"
                placeholder="Veuillez saisir votre numero de téléphone"
                class="form-input">
                <br>
                <span><?php echo isset($arrayError['telephone']) ? $arrayError['telephone'] : '' ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <br>
                <input type="text" name="email"
                placeholder="Veuillez saisir votre email"
                class="form-input">
                <br>
                <span><?php echo isset($arrayError['email']) ? $arrayError['email'] : '' ?></span>
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <br>
                <input type="password" name="password"
                placeholder="Veuillez saisir un mot de passe" 
                class="form-input">
                <br>
                <span><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
            </div>

            <div class="form-group">
                <label>Confirmez le mot de passe</label>
                <br>
                <input type="password" name="confirmPassword"
                placeholder="Veuillez confirmer votre mot de passe" 
                class="form-input">
                <br>
                <span><?php echo isset($arrayError['confirmPassword']) ? $arrayError['confirmPassword'] : '' ?></span>
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn">
                    Enregistrer
                </button>
            </div>
            <div  class="para1"><P">DÉJÀ UN COMPTE?
                <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=connexion' ?>">
                    CONNECTER
                </a>
                </P>
            </div>
        </div>
    </form>
    </div>
</body>
</html>