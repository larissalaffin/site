<?php

    session_start();

    require_once('config/config.php');

    $delete = 'DELETE FROM usuario WHERE cod_usuario = :codigo';
    $deleteData = $conexao -> prepare($delete);

    $deleteData -> bindValue(':codigo', $_SESSION['cod_usuario']);

    if ($deleteData -> execute()) {

        session_destroy();

        $_SESSION['estaLogado'] = false;
    
        header('Location: index.php');

    }

?>