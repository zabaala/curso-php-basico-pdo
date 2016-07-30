<?php
session_start();

// conexao com o banco de dados
$pdo = new PDO(
    'mysql:host=localhost;dbname=cursophp01',
    'root',
    null,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);