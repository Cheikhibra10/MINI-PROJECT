<?php 
function addUser(array $user) {
    $users = get_file_content();
    if (!isset($users)) {
        $users = [];
    }

    array_push($users, $user);
    ajouter_fichier($users);
}

function get_list_user() {
    $users = get_file_content();
    if (!isset($users)) {
        $users = [];
    }

    return $users;
}

function get_user_by_id(string $id) {
    $users = get_list_user();
    foreach ($users as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
}

function get_file_content() {
    $json = file_get_contents(ROUTE_DIR.'data/user.data.json');
    return json_decode($json, true);
}

function ajouter_fichier(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/user.data.json'. $json);
}
function delete(string $id):bool{
    $data = get_file_content();
    $tab=[];
    $yes=false;
    foreach ($data as $value) {
        if ($value['id'] == $id) {
            $yes = true;
        }else{
            $tab [] = $value;
        }
    }
    if($yes){
        ajouter_fichier($tab);
    }
    return $yes;
     
}
function modification(array $user){
    $modif = get_file_content();
    foreach ($modif as $key => $value) {
        if($value['id'] == $user['id']){
            $modif[$key] = $user;
        }
    }
    ajouter_fichier($modif);
}

function donne(array $data){
    $data=get_file_content();
}

function login_password_exist($login, $password) {
    $users = get_file_content();

    foreach ($users as $key => $value) {
        if ($value['email'] == $login && $value['password'] == $password) {
            return $value;
        }
    }

    return null;
}





/* function delete(string $id):bool{
    $data =get_file_content();
    $tab=[];
    $yes=false;
    foreach ($data as $value){
        if ($value['id']==$id) {
            $yes= true;
        }else {
            $tab [] =$value;
        }
    }
    if ($yes) {
      ajouter_fichier($tab);
    }
    return $yes;
} */
?>