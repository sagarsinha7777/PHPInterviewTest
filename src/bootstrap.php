<?php

const ROOT_DIR=__DIR__;

function init():CMaster {
    $aHostParts = explode(':', getenv('APP_DB_HOST'), 2);
    $strHost = $aHostParts[0];

    $intPort = null;
    if (isset($aHostParts[1]) && is_numeric($aHostParts[1])) {
        $intPort = (int) $aHostParts[1];
    }
    $strUser = getenv('APP_DB_USER');
    $strPass = getenv('APP_DB_PASSWORD');
    $strDBName = getenv('APP_DB_NAME');

    $oDB = mysqli_connect($strHost, $strUser, $strPass, $strDBName, $intPort);
    if ($oDB == false){
        http_response_code(500);
        die("Failed to connect to database");
    }

    require_once "CLASS_SessionManager.php";
    $oSessionManager = new CSessionManager();

    require_once "views/CLASS_View.php";
    require_once "controllers/CLASS_Controller.php";
    require_once "models/CLASS_Model.php";
    require_once "CLASS_Master.php";
    return new CMaster($oDB, $oSessionManager);
}
