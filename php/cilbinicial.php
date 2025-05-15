<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="stylesheet" href="../css/barra.css">
  <link rel="php" href="../php/pesquisa.php">
  
  
  
</head>
<body>

  <nav class="navbar">
    <div class="logo">Lume Digital</div>
    <center>

      <form class="search-box"method="post">
        <input type="text" name="pesquisa" placeholder="Pesquisar...">
        <button type="submit"></button>
    </form> 
    
</center>

   <li> <h2>BIBLIOTECA</h2></li>
       


    </ul>
  </nav>


</div>
</li>


    <div class="sidebar_menu">
        <div class="sidebar_titulo">
             <a href="#">Painel de Controle</a>
        </div>
  


    <nav class="menu">
        <ul>
            <li>
                <i class="fas fa-key"></i>
                <a href="biblioteca.php">Bibliotecário</a>
            </li>
            <br>
            <li>
                <i class="fa-solid fa-user"></i>
                <a href="leitor.php">Aluno</a>
            </li>
            <br>
            <li>
                <i class="fa-solid fa-book"></i>
                <a href="#">Meus livros</a>
            </li>
            <br>
            <li>
                <i class="fas fa-stream"></i>
                <a href="#">Mensagem</a>
            </li>
            <br>
            <li>
                <i class="fas fa-question-circle"></i>
                <a href="#">Suporte</a>
            </li>
        </ul>
    </nav>
    </div> 
    </div>
    </div>
    </div>

    <div class="menu">
      <input type="checkbox" id="check">
      <div class="menu-icon">
        <li>
          <label for="check">
              <i class="fas fa-bars"></i>
          </label>
     
</div>
</li>


  <div class="sidebar_menup">
      <div class="sidebar_titulop">
           <a href="#"></a>
    
      </div>

      <center>

           <div class="photo-container">
        
             <img src="../php/imagem.png" 
              height="250"
              width="280">

          </div>
</center>
  
  </nav>
  </div> 
  </div>
  </div>
  </div>
  <center>
  <?php
      $servername = "localhost";
      $username = "root";
      $password = "biblio";
      $dbname = "livros";

      $conn= new mysqli("localhost", "root", "biblio", "livros");


      if ($conn->connect_error) {
          die("Conexão falhou: " . $conn->connect_error);
      }

      $termo = $_POST['pesquisa'];

      $sql = "SELECT * FROM planilha1 WHERE C LIKE'%" . $termo . "%'";

      $resultado = $conn->query($sql);
      $result = $conn->query($sql);

if ($result === false) {
    echo "Erro na consulta: " . $conn->error;
} elseif ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        echo "LIVRO EXISTENTE: " . $row["C"] . "<br>";
    }
} else {

    echo "Nenhum resultado encontrado.";
}



 ?>
<center>
 
</body>
</html>
