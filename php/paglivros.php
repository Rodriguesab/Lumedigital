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

<form method="post" action="ima.php">
<form id="cpfForm" action="../php/con">

<label for="name"> Nome: </label>
<input type="text" id="name" name="name" size="50" maxlength="50" /> <br>

<label for="autor">Autor: </label>
<input type="autor" id="autor" name="autor" size="50" maxlength="50" /><br>

<label for="unidade">Unimade: </label>
<input type="" id="idioma" name="idioma" size="50" maxlength="50" /><br>

<label for="linguas">Linguas: </label>
<input type="" id="unidade" name="unidade" size="50" maxlength="50" /><br>

<label for="descrisçao">Descrisçao: </label>
<input type="" id="dscricsao" name="descriscao" size="50" maxlength="50" /><br>

<input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
    <div><input name="imagem" type="file"/></div>

<button type="submit">Adicionar</button><br>             

<br>
</form><br>

</form>
    </center>
 
</body>

</html>