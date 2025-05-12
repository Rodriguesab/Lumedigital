<!DOCTYPE html>
<html lang="pt-br"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
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
            width: 300px;
            text-align: center;
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
            text-align: left;
        }
        input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #414c87;
            border-radius: 4px;
        }
        button {
            background-color: #a879c7;
            color: white;
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
        <h2>Login</h2>
        <form action="validalogin.php" method="post">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="Codigo da escola">Codigo da escola</label>
            <input type="password" id="Codigo da escola" required>

            <button type="submit">Entrar</button>
        </form>
        <a href="cad2.php">
        <h5> Fazer Cadrastro </h5><br>
        </a>

        
        </div>
    </div>
    
    

    <?php

    if(isset($_GET['log']) && $_GET['log'] == 'erro')
{
	echo "Falha na conexao!";
	unset($_GET['log']);
    // sleep(5);
	header("Refresh: 1; url=loginbiblio.php");
}

if(isset($_GET['log']) && $_GET['log'] == 'erro2')
{
	echo "Usuario ou senha invalido(a)!";
	unset($_GET['log']);
    // sleep(5);
	header("Refresh: 1; url=loginbiblio.php");
}

if(isset($_GET['log']) && $_GET['log'] == 'erro3')
{
	echo "Usuario ja cadastrado!";
	unset($_GET['log']);
    // sleep(5);
	header("Refresh: 1; url=loginbiblio.php");
}

if(isset($_GET['log']) && $_GET['log'] == 'cadastrado')
{
	echo "Usuario cadastrado com sucesso!";
	sleep(2);
	unset($_GET['log']);
	header("Refresh: 1; url=loginbiblio.php");
}

?>

</body>
</html>