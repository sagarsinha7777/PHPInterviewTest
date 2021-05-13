<?php
require_once "../bootstrap.php";
$oMaster = init();

if($oMaster->oSessionMan->checkSession()){
    header('Location: /todos/');
    die();
}
header('Location: /login/');