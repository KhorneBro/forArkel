<?php

$userBD = "admin";
$passwordBD = "admin";
$dsn = "mysql:host=localhost;dbname=test_task";

$db = new PDO($dsn, $userBD, $passwordBD);

