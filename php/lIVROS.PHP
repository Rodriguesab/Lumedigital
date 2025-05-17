<?php
require_once("conecta.php");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Armazenando imagens no banco de dados Mysql</title>
</head>
<body>
<h2>Selecione um novo arquivo de imagem</h2>

<form enctype="multipart/form-data" action="upload.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
    <div><input name="nome_evento" type="text"/></div>
    <div><input name="descricao_evento" type="textarea"/></div>
    <div><input name="imagem" type="file"/></div>
    <div><input type="submit" value="Salvar"/></div>
</form>
<br />
<table border="1">
    <tr>
        <td align="center">
            Código
        </td>
        <td align="center">
            Evento
        </td>
        <td align="center">
            Descrição
        </td>
        <td align="center">
            Nome da imagem
        </td>
        <td align="center">
            Tamanho
        </td>
        <td align="center">
            Visualizar imagem
        </td>
<td align="center">
            Excluir imagem
        </td>
    </tr>
    <?php

    $querySelecao = "SELECT codigo, nome_evento, descricao_evento,
    nome_imagem, tamanho_imagem, imagem FROM tabela_imagens";
    $resultado = mysql_query($querySelecao);

    while ($aquivos = mysql_fetch_array($resultado)) { ?>
        <td align="center">
        <?php echo $aquivos[‘codigo’]; ?>
    </td>
        <td align="center">
        <?php echo $aquivos['nome_evento']; ?>
    </td>
        <td align="center">
        <?php echo $aquivos['descricao_evento']; ?>
    </td>
        <td align="center">
        <?php echo $aquivos['nome_imagem']; ?>
    </td>
        <td align="center">
        <?php echo $aquivos['tamanho_imagem']; ?>
    </td>
        <td align="center">
        <?php echo '<a href="ver_imagem.php?id='.$aquivos[‘codigo’].
        '">Imagem '.$aquivos[‘codigo’].'</a>'; ?>
    </td>
    <td align="center">
        <?php echo '<a href="excluir_imagem.php?id='.$aquivos[‘codigo’].
        '">Imagem '.$aquivos[‘codigo’].'</a>'; ?>
    </td>
    <?php } ?>
</table>
</body>
</html>