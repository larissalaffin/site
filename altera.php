<?php
session_start();
$servidor = "fdb20.awardspace.net";
$usuario = "3143144_projeto";
$senha = "larissa1110";
$dbname = "3143144_projeto";
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die('Falha na Conexão do Banco de
Dados');


$id = $_SESSION['id'];
$nome = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

if((!empty($nome)) AND (!empty($email))){
	
//Alterar o usuário no BD
 $query = "UPDATE usuario SET nome_usuario= '$nome', email='$email' WHERE id='$id'";
 
 if (mysqli_query($conn, $query)){
 $_SESSION['msg'] ="Sucesso: Atualizado corretamente!";
 $_SESSION['nome'] = $nome;
 $_SESSION['email'] = $email;
 header("Location: perfilusuario.php");
 }
 else
 $_SESSION['msg'] = "Aviso: Não foi atualizado!";
 
 }else
header("Location: login.html");
 
 
 mysqli_close($conn);
 
 ?>