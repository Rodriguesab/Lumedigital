<!DOCTYPE html>
<html>
<head>
<title>valida_login</title>
<meta charset="utf-8">
</head>
<body>
<h2>Cadastro</h2>
<?php

if(!isset($_POST['nome'])) 
{ 
  HEADER('Location:cad1.php');
} 

$servidor = 'localhost';
$usuario = 'usuario';
$senha = '';
$banco = 'cad1'

$link = mysqli_connect($servidor, $usuario, $senha, $banco)
or die ('Nao foi possivel conectar: '.mysqli_connect($link));

if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "adicionar")
  {
    

$v1 = $_POST['cad_nome'];
$v2 = $_POST['cad_tel'];
$v3 = $_POST['cad_cpf'];
$v4 = $_POST['cad_usu'];
$v5 = $_POST['cad_email'];
$v6 = $_POST['cad_senha'];
$senha = password_hash($_POST['cad_senha'], PASSWORD_DEFAULT); // Criptografar a senha


$cad_usuario = $_POST['cad_usu'];
$cpf_usuario = $_POST['cad_cpf'];
$abc = mysqli_connect('localhost', 'root', NULL, 'cadastrobiblio')
or die ('Erro ao se conectar ao banco de dados');

$consulta = "SELECT * FROM cad1
WHERE CAMPO_USUARIO = '$v4' OR CPF = '$v3'";

$result = mysqli_query($abc, $consulta);

if(!$result)
{
  HEADER('Location:cad1.php?log=erro');
}
/*
while ($tbl = mysqli_fetch_array($result)) 
  {
    $cod = $tbl["ID"];
    $nom = $tbl["NOME"];
    $cp = $tbl["CPF"];
    $tel = $tbl["TEL"];
    $emai = $tbl["EMAIL"];


	$usu = $tbl["CAMPO_USUARIO"];
	$senh = $tbl["CAMPO_SENHA"];
  }
  */

if(mysqli_num_rows($result) == 1) 
{
HEADER('Location:cad1.php?log=erro3');
}

if(mysqli_num_rows($result) < 1)  
{


$sql = "INSERT INTO cad1 (ID, NOME, EMAIL, TEL , CPF, CAMPO_USUARIO, CAMPO_SENHA) 
VALUES (NULL, '$v1', '$v2', '$v3', '$v4', '$v5')";

$result2 = mysqli_query($abc, $sql);

if(!$result2)
{
HEADER('Location:cad1.php?log=erro');
}
else
{
	// $mes = "Usuario cadastrado com sucesso!";
	// echo "<script>alert('$mes');</script>";
	mysqli_close($abc);
	HEADER('Location:cad1.php?log=cadastrado'); 
}

} 

mysqli_close($abc);

?>

falta fazer:

> fazer um botao em login para excluir/editar cadastro, e uma nova pagina pra isso
> colocar botão de voltar e de sair