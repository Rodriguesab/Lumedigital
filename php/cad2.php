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
<h2>Cadastro Aluno </h2>


<form method="post" action="concad2.php">

<label for="name"> NOME: </label>
<input type="text" id="name" name="name" size="50" maxlength="50" /> <br>

<label for="email">E-mail: </label>
<input type="email" id="email" name="email" size="50" maxlength="50" /><br>

<label for="birth">Data de nascimento: </label>
<input type="date" id="birth" name="birth" size="10" maxlength="10"  /><br>

<label for="cpf">CPF</label>
<input type="text" id="cpf" name="cpf" size="10" maxlength="10"  /> 


<script>
        function validaCPF(cpf) {
            cpf = cpf.replace(/\D+/g, '');
            if (cpf.length !== 11) return false;

            let soma = 0;
            let resto;
            if (/^(\d)\1{10}$/.test(cpf)) return false;

            for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
            resto = (soma * 10) % 11;
            if ((resto === 10) || (resto === 11)) resto = 0;
            if (resto !== parseInt(cpf.substring(9, 10))) return false;

            soma = 0;
            for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
            resto = (soma * 10) % 11;
            if ((resto == 10) || (resto === 11)) resto = 0;
            if (resto !== parseInt(cpf.substring(10, 11))) return false;

            return true;
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('cpfForm').addEventListener('submit', function(e) {
                var cpf = document.getElementById('cpf').value;
                if (!validaCPF(cpf)) {
                    e.preventDefault();
                    alert('CPF inválido. Verifique o número digitado.');
                    document.getElementById('cpf').focus();
                }
            });

            document.getElementById('cpf').addEventListener('input', function(e) {
                var value = e.target.value;
                var cpfPattern = value.replace(/\D/g, '')
                                      .replace(/(\d{3})(\d)/, '$1.$2')
                                      .replace(/(\d{3})(\d)/, '$1.$2')
                                      .replace(/(\d{3})(\d)/, '$1-$2')
                                      .replace(/(-\d{2})\d?$/, '$1');
                e.target.value = cpfPattern;
            });
        });
    </script>

<label for="phone"> Telefone: </label>
<input type="phone" id="phone" name="phone" size="12" maxlength="12"  /> <br /> 


<label for="senha">Senha</label>
<input type="password" id="senha" name="senha" size="40" maxlength="40"  /> <br /> 

<label for="codigo">Cógido Institucional:</label>
<input type="password" id="codigo" name="codigo" size="30" maxlength="30"  /> <br /> 

<label for= "other" > Comente sobre você: </label>
<textarea name= "other" rows="2" cols="30"> </textarea>  <br /> <br /> 


<button type="submit">Cadastrar</button><br>

</form>
<p><h5> Outras opções: </h5> </p>

<form method="post" action="altera.php">
<button type="submit">Alterar</button><br>
</form><br>

<form method="post" action="exclui.php">
<button type="submit">Excluir</button><br>
</form> <br>

<form method="post" action="pesquisa.php">
<button type="submit">Pesquisar</button><br>
</form>
    </center>

</body>
<<<<<<< HEAD

=======
>>>>>>> 8b4763277bc5e9015daa0de407a589fc7275fc83
</html>