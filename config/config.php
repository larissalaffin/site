<?php

$host = "fdb20.awardspace.net";
$user = "3143144_projeto";
$pass = "larissa1110";
$dbname = "3143144_projeto";

    try {

        $conexao = new PDO("mysql:host={$host};dbname={$dbname};", $user, $pass);

    } catch (PDOException $error) {

        print 'Conexão falhou! ' . $error -> getMessage();

    }

?>