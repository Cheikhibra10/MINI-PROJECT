

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/joueur.css">
    <title>Document</title>
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
    <br>
    <div>
    <?php require_once(ROUTE_DIR . "vue/inc/menu.html.php"); ?>
    <?php if(empty($users)):?>
        <h1>Aucun résultat</h1>
    <?php endif;?>
    <?php if(!empty($users)):?>
            <table border="2">
                <tr>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Téléphone</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
                <?php foreach ($users as $key => $val):?>
                    <tr>
                        <td><?php echo $val['nom'];?></td>
                        <td><?php echo $val['prenom'];?></td>
                        <td><?php echo $val['telephone'];?></td>
                        <td><?php echo $val['email'];?></td>
                        <td>
                            <a href="<?= WEB_ROUTE.'/?controller=userController&view=delete&id='.$val['id']?>">effacer</a>
                            <a href="<?= WEB_ROUTE.'/?controller=admin&view=edit&id='.$val['id']?>">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
    <?php endif;?>
    </div>
</body>

</html>