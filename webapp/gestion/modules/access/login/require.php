<?php 
namespace Home;

@session_destroy();
unset($_GET);
unset($_POST);
$params = PARAMS::findLastId();

$title = "GPV | Espace de connexion";
?>