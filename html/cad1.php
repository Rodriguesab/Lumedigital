<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
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
    
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    form {
        display: flex;
        flex-direction: column;
    }
    label {
        margin-bottom: 5px;
        font-weight: bold;
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
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #ca45c4;
    }
</style>



</head>
<body>





    <div class="container">
        <h2>Cadastro Aluno </h2>

        <form action="valida_cad_aluno.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
           <input type="email" id="email" name="email" required>

          <div>
            <label for="telefone">Tel:</label>
            <input type="text" id="telefone" name="telefone" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required></div>



          <div><label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="confirmaSenha">Confirmação:</label>
            <input type="password" id="confirmaSenha" name="confirmaSenha" required></div>
   

  

            <button type="submit">Cadastrar</button><br>

            <form method="post" action="cad1.php">
<INPUT type="hidden" name="cadastro"/>
<button type="submit">Editar</button><br>

<form method="post" action="editar_excluir.php">
<INPUT type="hidden" name="edit_excl"/>
<button type="submit">Excluir</button><br><br>

<br /> <br />
</form>
</form>
</div>
    </li>
    </div>
    
   


</body>
</html>



    