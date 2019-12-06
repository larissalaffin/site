<?php
session_start();
$servidor = "fdb20.awardspace.net";
$usuario = "3143144_projeto";
$senha = "larissa1110";
$dbname = "3143144_projeto";
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die('Falha na Conexão do Banco de
Dados');


$email = filter_input(INPUT_POST, 'tMail', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'tSenha', FILTER_SANITIZE_STRING);

if((!empty($email)) AND (!empty($senha))){

//Pesquisar o usuário no BD
$result_usuario = "SELECT id, nome_usuario, email, senha, mensagem FROM usuario WHERE email='$email' && senha =
'$senha'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
if($resultado_usuario){
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$_SESSION['email'] = $row_usuario['email'];
$_SESSION['id'] = $row_usuario['id'];
$_SESSION['nome'] = $row_usuario['nome_usuario'];
$_SESSION['mensagem'] = $row_usuario['mensagem'];
header("location:usuario.html"); //criar uma página logada alo Fulano
}else
 header("Location: login.html");

}
else{
header("Location: login.html");
}
?>