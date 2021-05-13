<?php
require_once "../../bootstrap.php";
$oMaster = init();

require_once ROOT_DIR."/controllers/CLASS_LoginPage.php";
$oPage = new CLoginPage($oMaster);

$oPage->process($_GET, $_POST);
