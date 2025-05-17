<!DOCTYPE html>

<head>
<title>Cadastro</title>
<meta charset="utf-8">
<style>
      
    body {
        font-family: Arial, sans-serif;
        background-color: #dab3e9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .container {
        background: #ab97d1;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 550px;
    }
   
    input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #414c87;
        border-radius: 4px;
    }
    button {
        background-color: #a879c7;
        color: white(26, 19, 214);
        border: none;
        padding: 10px;
        border-radius: 4px;
        cursor: pointer;
        width: 300px;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #ca45c4;
    }
</style>
</head>

<body>


<center>
<div class="container">
<h2>Adicionar Livros </h2>

<form id="cpfForm" action="../php/con">

<label for="name"> Nome: </label>
<input type="text" id="name" name="name" size="50" maxlength="50" /> <br>

<label for="email">Autor: </label>
<input type="autor" id="autor" name="autor" size="50" maxlength="50" /><br>

<label for="email">idioma: </label>
<input type="" id="idioma" name="idioma" size="50" maxlength="50" /><br>

<label for="email">Unidade: </label>
<input type="" id="unidade" name="unidade" size="50" maxlength="50" /><br>

<label for="email">Descrisçao: </label>
<input type="" id="dscricsao" name="descriscao" size="50" maxlength="50" /><br>

<input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
    <div><input name="imagem" type="file"/></div>

<button type="submit">Adicionar</button><br>

<br>

<form method="post" action="altera.php">
<button type="submit">Alterar</button><br>
</form><br>

</form>
    </center>

       
<?php
session_start();

// primeiro testamos se o usuário está autenticado.
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM')
{
	header('Location: login_f.php');
}
// abaixo, estamos excluindo a foto, caso o usuario já tenha alterado antes, para dar lugar à nova foto
if (isset($_SESSION['foto_atual']) && $_SESSION['foto_atual'] != 'logo.jpg')
{
  $arq_atual = $_SESSION['foto_atual'];
		unlink($arq_atual);
}

if(!isset($_POST['foto']))
{
HEADER('Location:editar_usuario_f.php?log=erro5');   // erro de não envio do arquivo

}

|| filesize($_FILES['foto'] < 1))  // se não existe a foto ou se o arquivo está vazio, menor que 1 byte. */
if($_FILES['foto']['size'] < 1)
{
HEADER('Location:editar_usuario_f.php?log=erro5');      // erro de Arquivo inválido
}

If($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'gif') // se não for arquivo de imagem.
{
HEADER('Location:editar_usuario_f.php?log=erro6');  // erro de tipo de arquivo inválido
}

$from = $_FILES["foto"]["tmp_name"]; // variavel recebendo a localização temporária do arquivo após o post.

if(!move_uploaded_file($from, $to))  // se não foi possível fazer o upload...
{         
   HEADER('Location:editar_usuario_f.php?log=erro7');  // erro no envio do arquivo
}

// $novo_nome = rename("$to", "foto." . $extensao); // renomear o nome do arquivo, mantendo a extensão

$abc = mysqli_connect('localhost', 'root', NULL, 'db_login')
or die ('Erro ao se conectar ao banco de dados');

	$result = mysqli_query($abc, $alterar);

if(!$result)
	{
		HEADER('Location:editar_usuario_f.php?log=erro8');
	}
mysqli_close($abc);

$_SESSION['foto_atual'] = $to;
$_SESSION['foto_alterada'] = $to;

HEADER('Location:editar_usuario_f.php');

// unlink('foto.
?>



 
</body>

</html>