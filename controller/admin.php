<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == 'create.admin') {
            require_once(ROUTE_DIR . 'vue/admin/create.admin.html.php');
        } elseif ($_GET['view'] == 'create.question') {
            require(ROUTE_DIR . 'vue/admin/create.question.html.php');
        } elseif ($_GET['view'] == 'liste.joueur') {
            $users = get_list_user();
            require(ROUTE_DIR . 'vue/admin/liste.joueur.html.php');
        } elseif ($_GET['view'] == 'create.admin') {
            require(ROUTE_DIR . 'vue/admin/create.admin.html.php');
        }
        elseif ($_GET['view'] == "edit") {
            $user=get_user_by_id($_GET['id']);
            require_once(ROUTE_DIR.'vue/security/inscription.html.php');
        } elseif ($_GET['view'] == 'tableau.bord') {
            require(ROUTE_DIR . 'vue/admin/tableau.bord.html.php');
        } elseif ($_GET['view'] == 'liste.admin') {
            require(ROUTE_DIR . 'vue/admin/liste.admin.html.php');
        } elseif ($_GET['view'] == 'edit') {
            $id = $_GET['id'];
            $user = find_user_by_id($id);
            require(ROUTE_DIR . 'vue/admin/create.admin.html.php');
        } elseif ($_GET['view'] == 'editerquestion') {
            $id = $_GET['id'];
            $question = find_question_id($id);
            /*  var_dump($question);
            die(); */
            require(ROUTE_DIR . 'vue/admin/create.question.html.php');
        } elseif ($_GET['view'] == 'delete') {
            $id = $_GET['id'];
            require_once(ROUTE_DIR . 'vue/admin/confirmation.html.php');
        } elseif ($_GET['vue'] == 'confirme') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $question = delete_question($id);
                /* delet($_GET['id']); */
                require_once(ROUTE_DIR . 'vue/admin/liste.question.html.php');
            }
            /*  $user = find_user_by_id($id); */
        }
    }/* else {
        require_once(ROUTE_DIR.'vue/security/connexion.html.php');
    } */
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {

        if ($_POST['action'] =="inscription") {
            inscription_admin($_POST ,$_FILES);
    }elseif($_POST['action'] == 'create.question'){
            if (isset($_POST['btn_submit'])) {
                unset($_POST['controllers']);
                unset($_POST['action']);
                unset($_POST['bon_reponse']);
                question($_POST);
                header("location:" . WEB_ROUTE . '?controller=admin&view=create.question');
            } elseif (isset($_POST['btn_plus'])) {
                $nbr_reps = $_POST['nbr_reps'];
                $_SESSION['nbr_reps'] = $nbr_reps;
                $typrep = $_POST['typrep'];
                $_SESSION['typrep'] = $typrep;
                $reponseCorrecte = $_POST['reponseCorrecte'];
                $_SESSION['reponseCorrecte'] = $reponseCorrecte;
                header("location:" . WEB_ROUTE . '?controller=admin&view=create.question');
            }
        } elseif ($_POST['action'] == 'editerquestion') {

            if (isset($_POST['btn_submit'])) {
                unset($_POST['controller']);
                unset($_POST['action']);
                question($_POST);
                header("location:" . WEB_ROUTE . '?controller=admin&view=liste.question');
            } elseif (isset($_POST['btn_plus'])) {
                $id = $_POST['id'];
                $nbr_reps = $_POST['nbr_reps'];
                $_SESSION['nbr_reps'] = $nbr_reps;
                $typrep = $_POST['typrep'];
                $_SESSION['typrep'] = $typrep;
                $_SESSION['id'] = $id;
                $_SESSION['question'] = find_question_id($id);
                header("location:" . WEB_ROUTE . '?controller=admin&view=editerquestion&id=' . $id);
            }
            /* var_dump($_POST);
        die(); */
            unset($_POST['controller']);
            unset($_POST['action']);
            header("location:" . WEB_ROUTE . '?controller=admin&view=create.question');
        } 
}
}
function inscription_admin($inscription_admin ,$files){
    $arrayError = [];
    extract($inscription_admin);
    /*   validation_login($login, 'login', $arrayError); */
    valid_champ_user($arrayError,$nom, 'nom');
    valid_champ_user($arrayError,$prenom, 'prenom');

    valid_champ_user($arrayError, $login,'login' );
    valid_champ_user($arrayError, $password,'password' );
    valid_champ_user($arrayError, $confirmpassword,'confirmpassword' );


  
       if (empty($arrayError)) {
        if (to_uploads($files)) {
            $data['fileToUpload'] = $files['fileToUpload']['name'];
        } 
                $user = [
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "login" => $login,
                    "password" => $password,
                    "avatar" =>  $files['fileToUpload']['name'],
                    "role" => "ROLE_ADMIN"
                ];
    // if (login_exists($login)) {
    //     $arrayError['login'] = 'ce est déjà login enregistrer';
    //     $_SESSION['arrayError'] = $arrayError;
    //     header("location:".WEB_ROUTE.'?controllers=admin&vue=liste.question');
    // }
    // $extentions = ['jpg','png','jpeg','gif'];
    // if(empty($files['avatar']['name'])){
    //     $arrayError['avatar'] = 'le champ est obligatoire';
    // }elseif ($files['avatar']['size'] > 70000) {
    //     $arrayError['avatarsize'] = 'la taille est grande';
    // }
    addUser($user);
    $_SESSION['userConnected'] = $user;
        header("location:" . WEB_ROUTE . '?controller=admin&view=create.question');
    }  else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:" . WEB_ROUTE . '?controller=admin&view=create.admin');
    } 
 } 
 /* else {
        header("location:" . WEB_ROUTE . '?controller=admin&view=liste.question');
    }else{
        header("location:" . WEB_ROUTE . '?controller=admin&view=liste.question');
    }
}

/*function question(array $data): void
{
    $arrayError = [];
    extract($data);
    valid_input($question, 'question', $arrayError);
    valid_point($point, 'nbre_reps', $arrayError);
    if (form_valid($arrayError)) {
        add_question($data);
        header("location:" . WEB_ROUTE . '?controller=admin&view=liste.question');
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:" . WEB_ROUTE . '?controller=admin&view=create.question');
    }
}
function pagination($data, $position)
{
    $nbrPage = 0;
    $page = 1;
    $suivant = 2;
    $nbrElement = NOMBRE_PAR_PAGE;
    $precednt = 0;



    if (!isset($position)) {
        $page = 1;
        $_SESSION['user_admin'] =  $data;
        $nbrPage = nombre_page_total($_SESSION['user_admin'], NOMBRE_PAR_PAGE);
        $list_user = paginer($_SESSION['user_admin'], $page, NOMBRE_PAR_PAGE);
    }

    if (isset($position)) {
        $page = $position;
        $suivant = $page + 1;
        $precednt = $page - 1;
        if (isset($_SESSION['user_admin'])) {
            $_SESSION['user_admin'] =  $data;
            $nbrPage = nombre_page_total($_SESSION['user_admin'], NOMBRE_PAR_PAGE);
            $list_user = paginer($_SESSION['user_admin'], $page, NOMBRE_PAR_PAGE);
        }
    }
    return [

        'precednt' => $precednt,
        'suivant' => $suivant,
        'nbrPage' => $nbrPage,
        'data' => $list_user,

    ];
}*/
function delet(array $data): void
{
    $id = $_SESSION['id'];
    $ok = suppression_user($id);
    if ($ok) {
        unset($data[$id]);
        header("location:" . WEB_ROUTE . '?controller=admin&view=liste.admin');
    }
}

         /*  $json = file_get_contents(ROUTE_DIR.'data/question.json');
          $arrayQuestion = json_decode($json, true);  
          $nombrePage = 0;
          $page = 0;
          $suivant = 2;
          $precedent = 0;
          
          if (!isset($_GET['page'])) {
            $page = 1;
            $_SESSION['questionlist'] = $arrayQuestion;
            $nombrePage = nombrePageTotal($_SESSION['questionlist'] , 3);
            $listquestions = get_element_to_play($_SESSION['questionlist'], 3 ,$page);
          }

          if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $suivant = $page+1;
            $precedent = $page-1;
            $nombrePage = nombrePageTotal($_SESSION['questionlist'] , 3);
            $listquestions = get_element_to_play($_SESSION['questionlist'], 3 ,$page);
          } */
