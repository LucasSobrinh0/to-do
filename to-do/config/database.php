<?php

// Configurar diretório config.php para pegar as informações do banco de dados
$config = require __DIR__ . 'config.php';

// Configurando váriavel que pega os dados do config.php
$db = $config ['db'];

// Pega o host do db. Pega o nome do db. Pega o charset do db.
$dsn = "mysql:host{$db['host']};
dbname={$db['dbname']};
charset={$db['charset']}";

// Coloca a senha e tenta entrar no banco de dados com as credenciais.
try{
    return new PDO($dsn, $db['user'], $db['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
}catch (PDOException $e){
    die('Erro na conexão: ' . $e->getMessage());
}

