<!DOCTYPE html>
<html>

<head>

<title>valida_login</title>
<meta charset="utf-8">

</head>

<body>

<h2>Validacao</h2>

 

<?php
session_start();
$_SESSION['autenticado'] = 'nao';

if(!isset($_POST['cpf']) && $_POST['senha'])
{
HEADER('Location:leitor.php');
}

$nam = $_POST['cpf'];

$sen = $_POST['senha'];
 
$abc = mysqli_connect('localhost', 'root', NULL, 'alunologin')
or die ('Erro ao se conectar ao banco de dados');

/* $consulta = "SELECT * FROM usu WHERE EXISTS (SELECT * FROM usu WHERE $nam = 'CPF' AND $sen = 'SENHA')";
*/
$consulta = "SELECT * FROM tb_usuario_aluno
WHERE CPF = '$nam' AND CAMPO_SENHA = '$sen'";



$result = mysqli_query($abc, $consulta);

if(!$result)
{
  HEADER('Location:leitor.php?log=erro');
  // exit;
}


if($arra = !mysqli_fetch_array($result))
{
    HEADER('Location:Cilbpagina.php?log=erro2');
}
 ELSE
     HEADER('Location:Cilbpagia.php');



if($arra = mysqli_num_rows($result) == 1)
{
    HEADER('Location:Cilbpagina.php');
}
ELSE
{
    HEADER('Location:leitor.php?log=erro2');
}


mysqli_close($abc);

?>




<?php

if (isset ($_GET ['log'])){
    switch ($_GET ['log']) {
        case 'erro':
            echo "<p> Falha na canexão </p>";
            break;

        case 'erro2':
            echo "<p> Usuário e senha inválida </p>";
            break;
        
        case 'erro3':
            echo "<p> Usuário já cadastrado </p>";
            break; 
        
        case 'cadastrado':
            echo "<p> Usuário cadastrado com sucesso! </p>";
            break; 
    }
    unset($_GET['log']);
    header("Refresh: 3; url=leitor.php");

}

?>
