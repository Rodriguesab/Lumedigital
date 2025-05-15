  <?php 
  
  // Projeto do livro Construindo aplicações Web com PHP e MySQL.
  
   # Dados para a conexão com o banco de dados
	 $servidor = 'localhost'; 		# Nome DNS ou IP do seu servidor HTTP
	 $usuario = 'root';       # Nome de usuário para acesso ao MySQL
	 $senha = NULL;      	    # Senha de acesso
	 $banco = 'glauco';   		  # Nome do banco de dados
  
   # Executa a conexão com o MySQL
   $link = mysqli_connect($servidor, $usuario, $senha, $banco)
    or die('Não foi possivel conectar: '.mysqli_error($link));
  
  /* Em lista.php há um link para se alterar um registro, vindo com
  a variável editar. Abaixo se testa se esta pagina está vindo de lá */
  if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "editar")
  {
    # Cria a expressão SQL de consulta ao registro a ser alterado
    $sql = "SELECT * FROM LIVROS WHERE ID = ".$_REQUEST['buscacodigo'];
	/* buscacodigo é a variavel que recebeu o valor do registro 
	a ser modificado. */
   
    # Realiza a busca pelos dados do registro
    $result = mysqli_query($link, $sql);
   
    # Valida se o registro existe no banco de dados
    if($tbl = mysqli_fetch_array($result)) 
    {
      # Armazena os dados para preencher no formulário a seguir
      $Codigo  = $tbl["ID"];
      $Livro   = $tbl["LIVRO"];
      $Autor   = $tbl["AUTOR"];
      $Editora = $tbl["EDITORA"];
    }
   
    # Exibe mensagem de erro se não existir
    else
    { echo "Registro não encontrado."; }
  }
?>
   
<HTML>
 <HEAD>
  <TITLE>Gerenciando Registros</TITLE>
 </HEAD>
 <BODY>
  Preencha os campos abaixo:
<?php 
    if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "editar")
    { $AcaoForm = "alterar"; }
    else
    {
      $AcaoForm = "adicionar"; 
      $Codigo  = "";
      $Livro   = "";
      $Autor   = "";
      $Editora = "";
    } 
	/* isset() determina se uma variável é considerada definida, 
	isto é, está declarada e é diferente de null. */
?> 
  <FORM method="POST" action="gerencia-registro.php?acao=<?php echo $AcaoForm; ?>">
  <INPUT type="hidden" name="FormCodigoLivro" value="<?php echo $Codigo; ?>">

    <TABLE>
    <TR>
     <TD>Nome do Livro:</TD>
     <TD>
      <INPUT name="FormNomeLivro" maxlength=64 value="<?php echo $Livro; ?>">
     </TD>
    </TR>
    <TR>
     <TD>Nome do Autor:</TD>
     <TD>
      <INPUT name="FormNomeAutor" maxlength=32 value="<?php echo $Autor; ?>">
     </TD>
    </TR>
    <TR>
     <TD>Nome da Editora:</TD>
     <TD>
      <INPUT name="FormNomeEditora" maxlength=16 value="<?php echo $Editora; ?>">
     </TD>
    </TR>
    <TR>
     <TD colspan=2 align=right>
      <INPUT type="reset" value="Limpar">
 <?php 
    if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "editar")
    { $NomeBotao = "Alterar"; }
    else
    { $NomeBotao = "Cadastrar"; } 
/* Aqui, antes do INPUT abaixo, é novamente testado se a ação vai ser Editar ou Cadastrar.
Ou seja, se existir uma variável de nome ação que veio de outro formulário tendo recebido editar,
o botão recebe o valor Alterar. Senão, recebe Cadastrar */
?> 
      <INPUT type="submit" value="<?php echo $NomeBotao; ?>">
     </TD>
    </TR>
   </TABLE>
  </FORM>
 </BODY>
</HTML>