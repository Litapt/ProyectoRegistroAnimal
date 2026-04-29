<?php
session_start();
function require_login(){
    if(!isset($_SESSION['username'])){
        header('Location: index.php?error=2');
        exit;
    }
}
function require_rol($rol){
    require_login();
    if($_SESSION['role']!==$rol){
        header('Location: index.php?error=3');
        exit;
    }
}
?>