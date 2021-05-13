<?php

$rStderr = fopen('php://stderr', 'w');

$aHostParts = explode(':', getenv('APP_DB_HOST'), 2);
$strHost = $aHostParts[0];

$intPort = null;
if (isset($aHostParts[1]) && is_numeric($aHostParts[1])) {
    $intPort = (int) $aHostParts[1];
}
$strUser = getenv('APP_DB_USER');
$strPass = getenv('APP_DB_PASSWORD');
$strDBName = getenv('APP_DB_NAME');

$intMaxRetries = 10;
do {
    $oDB = new mysqli($strHost,$strUser, $strPass, '', $intPort);
    if ($oDB->connect_error) {
        fwrite($rStderr, "\n" . 'MySQL Connection Error: (' . $oDB->connect_errno . ') ' . $oDB->connect_error . "\n");
        --$intMaxRetries;
        if ($intMaxRetries <= 0) {
            exit(1);
        }
        sleep(3);
    }
} while ($oDB->connect_error);


if (!$oDB->query('CREATE DATABASE IF NOT EXISTS `' . $oDB->real_escape_string($strDBName) . '`')) {
    fwrite($rStderr, "\n" . 'MySQL "CREATE DATABASE" Error: ' . $oDB->error . "\n");
    $oDB->close();
    exit(1);
}

$oDB->query('USE `' . $oDB->real_escape_string($strDBName) . '` ');


$bAdded = $oDB->query("CREATE TABLE `Users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if($bAdded) {
    $oDB->query("insert into Users (name,password_hash) VALUES ('admin','".sha1("admin")."')");
}

$bAdded = $oDB->query("CREATE TABLE `Todos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

if($bAdded) {
    $oDB->query("insert into Todos (title, completed) VALUES ('Buy milk', 0), ('Buy eggs', 1),('Complete this project', 0),('Clean car', 1)");
}

$oDB->close();

echo "Completed setup";
exit(0);