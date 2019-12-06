<?php
session_start();
unset($_SESSION['nome'], $_SESSION['email'],$_SESSION['id'],$_SESSION['mensagem'],$_SESSION['msg']);
header("Location: login.html");
?>