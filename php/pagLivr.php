<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

$nome = $_POST['name'] ?? '';
$autor = $_POST['autor'] ?? '';
$idioma = $_POST['idioma'] ?? '';
$unidade = $_POST['unidade'] ?? '';
$descriscao = $_POST['descriscao'] ?? '';

$imagemNome = $_FILES['imagem']['name'];
$imagemTmp = $_FILES['imagem']['tmp_name'];
$destino = "../uploads/" . basename($imagemNome);


    echo "Nome: $nome <br/>";
    echo "Autor:$autor <br/>";
    echo "Idioma: $idioma <br/>";
    echo "Unidade: $unidade <br/>";
    echo "Descrição: $descriscao <br/>";

    echo "Imagem enviada com sucesso!";
    echo "<img src='../uploads/$imagemNome";



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

|| filesize($_FILES['foto'] < 1) // se não existe a foto ou se o arquivo está vazio, menor que 1 byte. */
if($_FILES['foto']['size'] < 1)
{
HEADER('Location:editar_usuario_f.php?log=erro5');      // erro de Arquivo inválido
}

$nomedoarquivo = $_FILES['foto']['name'];  // variável recebendo o nome do arquivo
$path_parts = pathinfo($nomedoarquivo);  // variável recebendo propriedades do arquivo
$extensao = $path_parts['extension'];  // variável recebendo a propriedade extensão do arquivo

If($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'gif') // se não for arquivo de imagem.
{
HEADER('Location:editar_usuario_f.php?log=erro6');  // erro de tipo de arquivo inválido

}
/* abaixo, usamos str_replace paara eliminar espaços em branco no inicio, no meio e no fim do nome do arquivo,
   caso houver. Usamos, para isso, a função str_replace */
$to = str_replace(' ', '', $arq_reduzido);

$from = $_FILES["foto"]["tmp_name"]; // variavel recebendo a localização temporária do arquivo após o post.

/* a função abaixo irá fazer o upload do arquivo de foto escolhido. Como ficará na mesma pasta, basta colocar o novo
   nome. Se for ficar em outra pasta, colocar o nome da pasta seguido de barra e a variavel do novo nome do arquivo.
   Esta função requer dois parâmetros: de onde o arquivo está para aonde ele irá, entre vírgula.   */
if(!move_uploaded_file($from, $to))  // se não foi possível fazer o upload...
{         
   HEADER('Location:editar_usuario_f.php?log=erro7');  // erro no envio do arquivo
}
// $novo_nome = rename("$to", "foto." . $extensao); // renomear o nome do arquivo, mantendo a extensão

$abc = mysqli_connect('localhost', 'root', NULL, 'db_login')
or die ('Erro ao se conectar ao banco de dados');

$alterar = "UPDATE tb_usuario SET FOTO = '$to' WHERE CAMPO_USUARIO = '$usuario'";

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