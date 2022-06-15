<?php
$arrayError = [];


if (isset($_SESSION['arrayError'])) {
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
/* if (est_admin()) {
    require_once(ROUTE_DIR.'vue/inc/menu.html.php');
  } */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<nav class="navbar">
        <div class="logo">
         <img src="images/logo.jpeg" alt="">
        </div>
       <div class="titre"><h1>Le plaisir de jouer</h1></div>
       </nav>
       <div class="btn-container">  
           <button class="btn"> 
        <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>">
            Déconnexion
        </a>
    </button>
    </div>
<body>


<div class="add-user">
        <?php require_once(ROUTE_DIR . "vue/inc/menu.html.php"); ?>
       
                <form action="<?= WEB_ROUTE ?>" method="POST" enctype="multipart/form-data" class="form">
                    <input type="hidden" name="controller" value="admin" />
                    <input type="hidden" name="action" value="<?= !isset($users['id']) ? 'inscription' : 'edit'; ?>" />
                    <input type="hidden" name="id" value="<?= isset($users['id']) ? $users['id'] : ''; ?>" />
                    <h1 class="text-center primary-color">
                     Inscription
                    </h1>
                    <?php if (isset($arrayErrors['arrayConnexion'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo isset($arrayErrors['arrayConnexion']) ? $arrayErrors['arrayConnexion'] : ''; ?>
                            <strong>danger</strong>
                        <?php endif; ?>
                     <div class="form-container">
                            <div class="form-group">
                                <label for="" class="lab">Prenom</label>
                                <br>
                                <input type="text" name="prenom" class="form-input" placeholder="Entrez votre prenom">
                                <span><?php echo isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="lab">Nom</label>
                                <br>
                                <input type="text" name="nom" class="form-input" placeholder="Entrez votre nom">
                                <span><?php echo isset($arrayError['nom']) ? $arrayError['nom'] : '' ?></span>
                            </div>
                
                            <div class="form-group">
                                <label for="" class="lab">Email</label>
                                <br>
                                <input type="text" name="login" class="form-input" placeholder="Entrez votre email">
                                <span><?php echo isset($arrayError['login']) ? $arrayError['login'] : '' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="lab">Mot de passe</label>
                                <br>
                                <input type="password" name="password" class="form-input" placeholder="Entrez votre mot de passe">
                                <span><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="lab">Confirmer le mot de passe</label>
                                <br>
                                <input type="password" name="confirmpassword" class="form-input" placeholder="Entrez de nouveau votre mot de passe">
                                <span><?php echo isset($arrayError['confirmpassword']) ? $arrayError['confirmpassword'] : '' ?></span>
                            </div>
                            <div class="form-group">password
                                <label for="" class="lab">Avatar</label>
                                <br>
                                <input type="file" name="fileToUpload"  class="form-input">
                            </div>
                        </div>
                        <div class="btn-container">
                            <button class="btn1" type="submit">Enregistrer
                         </button>
                    </div>
                    <div  class="para1"><P">DÉJÀ UN COMPTE?
                <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=connexion' ?>">
                    CONNECTER
                </a>
                </P>
                    </div>
                    </form>
                    </div>   
                        <div class="img-container">
                        <img src="images/avatar.png" alt="avatar" class="imge">
                        </div>
               
</body>
</html>