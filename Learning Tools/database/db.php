<?php

$host = 'localhost';
$port = '3306';
$pass = '';
$database = 'db_learningtools';

$dsn = "mysql:host=$host;port=$port;dbname=$database";
$pdo = new PDO($dsn, 'root', $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
