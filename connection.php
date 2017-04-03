<?php

session_start();

$host = 'localhost';
$username = 'root';
$password = 'root';
$databaseName = 'sia_hp';

$databaseConnection = mysqli_connect($host, $username, $password, $databaseName);
