<?php

    session_start();

    session_destroy();

    $_SESSION['estaLogado'] = false;

    header('Location: index.php');

?>