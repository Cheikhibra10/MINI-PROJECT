
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/18da67eb36.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="main">
  <div class="profil">
    <img src="images/avatar.png" alt="profil photo" class="image">
  </div>
  <div class="menu-container">
  <div class="menu">
  <a href="<?php echo WEB_ROUTE.'?controller=admin&view=create.admin'?>">
        Créer admin
        </a>
        <i class="fa-solid fa-plus"></i>
    </div>  
        <br>
        <div class="menu1">
        <a href="<?php echo WEB_ROUTE.'?controller=admin&view=liste.question'?>">
        Liste questions</a>
        <i class="fa-solid fa-book"></i>
        </div>
        <br>
        <div class="menu2">
        <a href="<?php echo WEB_ROUTE.'?controller=admin&view=create.question'?>">
        Créer questions
        </a>
        <i class="fa-solid fa-plus"></i>
        </div>
        <br>
        <div class="menu4">
        <a href="<?php echo WEB_ROUTE.'?controller=admin&view=liste.admin'?>">
        Liste admins
        </a>
        <i class="fa-solid fa-book"></i>
        </div>
        <br>
        <div class="menu3">
        <a href="<?php echo WEB_ROUTE.'?controller=admin&view=liste.joueur'?>">
        Liste joueurs
        </a>   
</div> 
        </div>
  </div>
</body>
</html>
