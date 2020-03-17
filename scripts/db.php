<?php

$servername = "54.38.189.178"; //ip bazy danych
$databasename = "pyszne"; //nawa bazy;
$username = "pyszne_log"; //nazwa uzytkownika
$password = "69m02b1C"; // haslo

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
        echo "Connection failed: ".$e->getMessage();
    }