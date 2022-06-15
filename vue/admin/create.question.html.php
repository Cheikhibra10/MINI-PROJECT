<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/question.css">
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
    <div class="add-user1">
<?php require_once(ROUTE_DIR . "vue/inc/menu.html.php"); ?>
       far
       <form action="<?= WEB_ROUTE ?>" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="controller" value="admin">
           <input type="hidden" name="action" value="create.question">
           <div class="contain">
            <div class="questionsaisie">
                Question: <textarea name="question" id="" cols="30" rows="10"></textarea>
                <span><?php echo isset($arrayError['question']) ? $arrayError['question'] : '' ?></span>
                <br>
                Nombre de point: <input type="number" name="number1" class="long">
                <br>
                Type de réponses:
                <select name="typequestion" id="typequestion" class="long1">
                    <option value="">Donner le type de réponse</option>
                    <option value="simple">Réponse simple</option>
                    <option value="unique">Réponse unique</option>
                    <option value="multiple">Réponse à choix multiple</option>
                </select> 
                <span id="plus">
                <i class="fa-solid fa-plus ber"></i>
                </span>
                <label id="error"></label>
                <div id ="answer">

                </div>
               <button Type="submit" class="btnq">
              Enregistrer
               </button>
            </div>
</form>
</div>
</body>
</html>