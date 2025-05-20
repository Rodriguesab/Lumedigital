<?php
$nome = $_POST['name'] ?? '';
$autor = $_POST['autor'] ?? '';
$idioma = $_POST['idioma'] ?? '';
$unidade = $_POST['unidade'] ?? '';
$descricao = $_POST['descriscao'] ?? '';

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $imagemNome = $_FILES['imagem']['name'];
    $imagemTmp = $_FILES['imagem']['tmp_name'];
    $extensao = strtolower(pathinfo($imagemNome, PATHINFO_EXTENSION));

    // Verifica se é um formato de imagem permitido
    if (!in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'])) {
        header('Location: editar_usuario_f.php?log=erro6');
        exit();
    }

    // Diretório de destino
    $uploadDir = "../uploads/";

    // Cria a pasta se ela não existir
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $destino = $uploadDir . basename($imagemNome);

    // Move o arquivo
    if (move_uploaded_file($imagemTmp, $destino)) {
        echo "Imagem enviada com sucesso!<br>";
        echo "<img src='$destino' width='150'><br>";
    } else {
        die("Erro ao mover a imagem para o destino.");
    }
} else {
    die("Erro: Nenhuma imagem enviada ou erro no upload.");
}

// Exibe os dados
echo "Nome: $nome <br/>";
echo "Autor: $autor <br/>";
echo "Unidade: $unidade <br/>";
echo "Idiomas: $idioma <br/>";
echo "Descrição: $descricao <br/>";

// Conexão com banco de dados
$con = mysqli_connect('localhost', 'root', '', 'planilha1') or die('Erro ao se conectar ao banco de dados');

$sql = "INSERT INTO planilha1 (nome, autor, idioma, unidade, descricao, imagem) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 'ssssss', $nome, $autor, $idioma, $unidade, $descricao, $imagemNome);
mysqli_stmt_execute($stmt);

// Verifica o resultado
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Livro cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o livro.";
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>
