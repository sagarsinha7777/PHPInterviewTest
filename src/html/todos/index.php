<?php
require_once "../../bootstrap.php";
$oMaster = init();

require_once ROOT_DIR."/controllers/CLASS_TodosPage.php";
$oPage = new CTodosPage($oMaster);

$oPage->process($_GET, $_POST);
