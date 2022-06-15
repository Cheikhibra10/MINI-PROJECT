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
    <link rel="stylesheet" href="css/style2.css">
    <title>Document</title>
    <nav class="navbar">
        <div class="logo">
         <img src="images/logo.jpeg" alt="">
        </div>
       <div class="titre"><h1>Le plaisir de jouer</h1></div>
       </nav>
</head>
<body>
    <div class="add-user">
    <form class="form" action="<?php echo WEB_ROUTE ?>" method="post">
    <input type="hidden" name="controller" value="securityController">
    <input type="hidden" name="action" value="connexion">
        <h1 class="text-center primary-color">
            Connexion
        </h1>
        <div class="form-container">
        
            <div class="form-group">
                <label>Email</label>
                <br>
                <input type="text" name="email"
                placeholder="Veuillez saisir votre email"
                class="form-input">
                <br>
                <span><?php echo isset($arrayError['email']) ? $arrayError['email'] : '' ?></span>
            </div>
            <br>
            <div class="form-group">
                <label>Mot de passe</label>
                <br>
                <input type="password" name="password"
                placeholder="Veuillez saisir un mot de passe" 
                class="form-input">
                <br>
                <span><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn">
                    Connexion
                </button>
            </div>
            <div  class="para1"><P">PAS DE COMPTE?
                <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=inscription' ?>">
                    S'inscrire
                </a>
                </P>
            </div>
        </div>

    </form>
    </div>
</body>
</html>