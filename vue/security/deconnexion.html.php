<?php 
session_start();
if (isset($_SESSION['userConnected'])) {
    session_destroy();
    header("location:".WEB_ROUTE."?controller=securityController&view=connexion");
}else{
    header("location:".WEB_ROUTE."?controller=securityController&view=connexion");
}


?>