<!DOCTYPE html>
<html>

<head>

<title>Cadastro</title>
<meta charset="utf-8">

</head>

<body>

<h2>Dados recebidos para cadastro</h2>

 

<?php

 

$name = $_POST['name'];

$email = $_POST['email'];

$date_birth = $_POST['birth'];

$cpf = $_POST['cpf'];

$s_phone = $_POST['phone'];

$senha = $_POST['senha'];

$codigo = $_POST['codigo'];

$area = $_POST['other'];

 

// echo "<h2> Bem vindo(a)! <h2/> <br/> <br/>";

echo "Seu nome: $name <br/>";

echo "Seu e-mail: $email <br/>";

echo "Sua data de nascimento: $date_birth <br/>";

echo "Seu cpf: $cpf <br/>";

echo "Seu telefone: $s_phone <br/>";

echo "Sua senha: $senha <br/>";

echo "Seu comentario sobre voce: $area <br/> <br/> <br/>";



$abc = mysqli_connect('localhost', 'root', NULL, 'cad11')
or die ('Erro ao se conectar ao banco de dados');


$insere =  "INSERT INTO cad11(nome, email, data_nasc, cpf, tel, 
senha,comentario) VALUES ('$name','$email','$date_birth','$cpf','$s_phone','$senha','$codigo','$area')";

mysqli_query($abc, $insere);




mysqli_close($abc);


echo "REGISTRO INCLUIDO COM SUCESSO. <br />";


/* acima, mysql_connect faz a conexao com o banco de dados. Entre parenteses, colcoa-se, na ordem: 
o servidor, o usuario, a senha e o banco de dados. Quando não há senha usa-se NULL.
O padrão do Xampp é o local como localhost e o usuario como root.

A funcao die() eh solicitada caso a conexao nao tenha sido estabelecida.
Tudo eh armazenado na variavel $abc, para uso posterior

Apos se conectar, agora se faz uso das querys do sql, e se armazena em uma variavel tambem.

Depois, usamos a funcao mysqli_query() para executar a instrucao. Colocamos tambem em outra variavel.
  mysql_query(conexao, instrucao sql);
  
  E, por último, fechamos a conexão com o banco de dados, apos a instrucao. Isso eh importante, para evitar grande trafego, 
  ja que varios usuarios podem estar usando ao mesmo tempo. 
      mysqli_close($abc); */


 // mail(endereco_email, assunto, mensagem); para enviar email. Para enviar e-mail...

?>

 

</body>
 </html>