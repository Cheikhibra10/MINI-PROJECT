<?php
function AddQuestion(array $Question){
    $Question = get_file_contentQuestion();
    if(isset($Question)){
        $Question = [];
    }
    array_push($Questions, $Question);
    ajouter_Question($Questions);

}
function get_list_question(){
    $Questions = get_file_contentQuestion();
    if(isset($Questions)){
        $Questions = [];
    }
    return $Questions;
}


function get_question_by_id(string $id){
    $Questions = get_list_question();
    foreach ($Questions as $key => $value) {
        if ($value['id'] == $id) {
          return $value;
        }
}
}

function get_file_contentQuestion(){
    $json = file_get_contents(ROUTE_DIR.'data/question.data.json');
    return json_decode($json, true);
}
function ajouter_Question(array $array){
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/question.data.json'. $json);
}

function modificationQuestion(array $Question){
    $modifQuestion = get_file_contentQuestion();
    foreach ($modifQuestion as $key => $value) {
        if ($value['id'] == $Question ['id']) {
            $modifQuestion['key'] = $Question;
        }
}
    ajouter_Question($modifQuestion);
}

?>