<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "inscription") {
            require_once(ROUTE_DIR.'vue/security/inscription.html.php');
        } elseif ($_GET['view'] == "list.user") {
            $users = get_list_user();
            require_once(ROUTE_DIR.'vue/admin/liste.joueur.html.php');
        }elseif ($_GET['view'] == "delete") {
            if(isset($_GET['id'])){
                delete($_GET['id']);
                header("location:".WEB_ROUTE."?controller=userController&view=list.user");
            }
        }elseif ($_GET['view'] == "edit") {
            $user=get_user_by_id($_GET['id']);
            require_once(ROUTE_DIR.'vue/add_user.html.php');

        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "add.user") {
           add($_POST);
        }elseif ($_POST['action'] == "edit") {
            add($_POST);
         }
    }
}

//FONCTION POUR AJOUTER OU MODIFIER
function add(array $data){
    $arrayError = [];
    extract($data);
    valid_champ_user($arrayError, $_POST['nom'], 'nom');
    valid_champ_user($arrayError, $_POST['prenom'], 'prenom');
    valid_champ_user($arrayError, $_POST['telephone'], 'telephone');
    valid_champ_user($arrayError, $_POST['email'], 'email');
    valid_champ_user($arrayError, $_POST['password'], 'password');
    valid_champ_user($arrayError, $_POST['confirmPassword'], 'confirmPassword');
    if (empty($arrayError)) {
        
        

        if($data['id'] != ""){

            modification($data);
        }else{
            
            $user = [
                "nom" => $_POST['nom'],
                "prenom" => $_POST['prenom'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "id"=>uniqid()
            ];
            addUser($user);
        }

       
    } else {
        $_SESSION['arrayError'] = $arrayError;
    }

    header("location:".WEB_ROUTE."?controller=userController&view=list.user");
}


?>