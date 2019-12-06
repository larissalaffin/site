<?php

        require_once('config/config.php');
        
        $_SESSION['estaLogado'] = false;
        
        session_destroy();
        
        header('login.php');

?>