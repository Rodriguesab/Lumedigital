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

    $uploadDir = "../uploads/";

    // Cria a pasta uploads se não existir
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $destino = $uploadDir . basename($imagemNome);

    if (move_uploaded_file($imagemTmp, $destino)) {
        echo "Imagem enviada com sucesso!<br>";
        echo "<img src='$destino' width='150'><br>";
    } else {
        die("Erro ao mover a imagem para o destino.");
    }
} else {
    die("Erro: Nenhuma imagem enviada ou erro no upload.");
}

echo "Nome: $nome <br/>";
echo "Autor: $autor <br/>";
echo "Unidade: $unidade <br/>";
echo "Idiomas: $idioma <br/>";
echo "Descrição: $descricao <br/>";

// Conexão PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=planilha1;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar e executar insert
    $sql = "INSERT INTO planilha1 (nome, autor, idioma, unidade, descricao, imagem) VALUES (:nome, :autor, :idioma, :unidade, :descricao, :imagem)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':autor' => $autor,
        ':idioma' => $idioma,
        ':unidade' => $unidade,
        ':descricao' => $descricao,
        ':imagem' => $imagemNome,
    ]);

    echo "Livro cadastrado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao cadastrar o livro: " . $e->getMessage();
}
?>
R