<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "create.question") {
            require_once(ROUTE_DIR.'vue/admin/create.question.html.php');
        } elseif ($_GET['view'] == "question") {
            $Questions = get_list_question();
            require_once (ROUTE_DIR.'vue/admin/liste.question.html.php');
        }
    }
}elseif($_SERVER['REQUEST_METHOD'] == "POST"){
    if ($_POST['action'] == "CREER") {
        unset($_POST["controller"]);
        unset($_POST["action"]);
        Questionnaire($_POST);
    }
}

function Questionnaire($questionnaire):void{
    $arrayError=array();
    extract($questionnaire);
    $newquestion= [];
    $questionnaire['id'] = uniqid();
    AddQuestion($questionnaire);


    valid_input($arrayError, $quest, 'question');
    valid_input($arrayError, $typeQuestion, 'typequestion');
    valid_input($arrayError, $reponse, 'Reponse');
    valid_input($arrayError, $numb, 'number1');

    if(!isset($arrayError)){
        if ($result != null){
            $_SESSION['questionAjouter'] = $result;}
            if ($data['id'] != ""){
                modificationQuestion($data);
            } else {
                $newquestion = [
                    "question" => $quest,
                    "typequestion" => $typedequestion,
                    "Reponse" => [
                        $reponse
                    ],
                    "bonneReponse" => [
                        $bonneReponse
                    ],
                    "number1" => $numb,
                    "id" => uniqid()
                ];
            }
            AddQuestion($newquestion);

            $_SESSION['questionAJOUTER']=$Question;
            header("location:" . WEB_ROUTE . "?controller=questionController&view=question");
        } else {
        header("location:" . WEB_ROUTE . '?controller=admin&view=create.question');
    }
}

?>        