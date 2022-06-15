<?php

if (is_user_connect() || (isset($_REQUEST['controller']) && $_REQUEST['controller'] == "securityController")) {
    if (isset($_REQUEST['controller'])) {
        if($_REQUEST['controller'] == "admin") {
            require_once(ROUTE_DIR.'controller/admin.php');
        } elseif ($_REQUEST['controller'] == "questionController") {
            require_once(ROUTE_DIR.'controller/questionController.php');
        } elseif ($_REQUEST['controller'] == "securityController") {
            require_once(ROUTE_DIR.'controller/securityController.php');
        }
    } else {
        require_once(ROUTE_DIR.'vue/security/connexion.html.php');
    } 
} else {
    require_once(ROUTE_DIR.'vue/security/connexion.html.php');
} 
/*define("UPLOADIMAGE", ROUTE_DIR.'img/'.$saved_name);

function upload_image(string $files){
    $target_file = UPLOADIMAGE. basename($files["avatar"]["name"]);
    if (move_uploaded_file($files['avatar']['tmp_name'],$target_file)) {
        return true;
    } else {
        return false;
    }
}
if (isset($_POST['inscription'])){
    $target_file = UPLOADIMAGE. basename($files["avatar"]["name"]);
    if (move_uploaded_file($files['avatar']['tmp_name'],$target_file)) {
        return true;
    } else {
        return false;
    }
}*/

?>
