<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  
     <nav class="light-green lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"></a><img src ="09.jpg" style = "width:150px;height:60px;">
                <ul class="right hide-on-med-and-down">
                    <li><a href="../Front/index.html"><h5>Home</h5></a></li>
                    
                    <li><a href="../Front/Inicial.php"><h5>Login</h5></a></li>
                    <li><a href="../Front/Cadastro.php"><h5>Criar Conta</h5></a></li>
                    <li><a href="#"><h5>Download</h5></a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
          <h4 class="header col s12 orange-text">Digite aqui o CPF do usuário que desejar administrar (somente números):</h4>
      </div>

    </div>
  </div>

<head>
	<center>
	<form method="post" action="?go=cpf ">

  
 <div class="row">
    <div class="col s12 m4 l3"><p> </p></div>
    <div class="col s12 m4 l4"><p><input type="text" style= "ppadding-left: 1.8em " id="first_name" name="cpf" placeholder="Buscar Usuário..."/>
	</p></div>
    <div class="col s12 m4 l2"><p> <button class="btn center waves-effect waves-light green" type="submit" name="action">Procurar
    <i class="material-icons right">send</i>
  </button>
  </p></div>
  </div>
 

 
    
    
	
	</center>
</div>

</head>

<style>
#txtBusca{
    float:left;
    background-color:white;
    padding-left:5px;   
    font-size:18px;
    border:none;
    height:35px;
    width:226px;
}
 
#btnBusca{
    float:left;
    cursor:pointer;
}
 
#divBusca img{
    float:left;
}
 
#divBusca{
    border:solid 10px rgba(47, 79, 79, 0.8);
    border-radius:10px;
    height:37px;
    width:400px;
}

#retorno {
	border: 2px solid #FFF000;
	padding-left:5px; 
	width:290px;
}

</style>

</html>
<?php
	
if(@$_GET['go']=="cpf"){
    $cpf = $_POST["cpf"];
    
    // Testa se o campo é vazio, se possui só letras ou tem valor negativo
    if ($cpf==""||!($cpf>0))
    {
		echo '<p></p><b><center><font color=\'#FF0000\'> Insira algum CPF (somente números). :)</font></center><b>';
	}
    else
    {
		// Inicia uma sessão e pega o CPF advindo da sessão anterior
		session_start();
		$_SESSION["CPFADMIN"] = $cpf;
		
		/* Conectar com o banco de dados da aplicação */
		$link = mysqli_connect('localhost', 'root', '') or die('Erro ao conectar');
		mysqli_select_db($link, 'KappaDB') or die('Erro ao conectar com o banco de dados');
		
		// Retorna usuário com o CPF informado.
		$query = sprintf("SELECT nome, data_nasc, ultimo_envio, sexo FROM Usuario WHERE cpf=".$cpf); 
		$dados = mysqli_query($link, $query) or die(mysqli_error($link));
		// transforma os dados em um array
		$linha = mysqli_fetch_assoc($dados);
		// calcula quantos dados retornaram
		$total = mysqli_num_rows($dados);
		
		if ($total >0)
		{
			?>
			<html>
				<center>
					<p><p>Usuário encontrado!<p>
						(Se não for esse usuário, você pode pesquisar novamente)
						<div id="retorno">
					<p> Nome: <?=$linha['nome']?> <p>Data de Nascimento: <?=$linha['data_nasc']?>
					<p>Último Envio do XML: <?=$linha['ultimo_envio']?><p>Sexo: <?=$linha['sexo']?></p>
					<form method="post" action="?go=excluir">
						<i class="material-icons">delete</i> <input type= "submit" value = "Excluir Usuário" class="waves-effect waves-light green btn-large" > <i class="material-icons">delete</i> <p>
						
					</form>
					<form method="post" action="?go=editar">
						<i class="material-icons">mode_edit</i> <input type= "submit" value = "Editar Usuário" class="waves-effect waves-light green btn-large" > <i class="material-icons">mode_edit</i> <p>
						
					</form>
					</div>
				</center>
				
			</html>
			<?php
		}
		else
		{
			 echo '<p></p><b><center><font color=\'#FF0000\'> Não existe nenhum usuário
			  com este CPF, favor pesquisar novamente. :)</font></center><b>';
		}
	}
}
	if(@$_GET['go']=="excluir"){
		session_start();
		$cpf = $_SESSION["CPF"];
		echo '<p></p><b><center><font size="140" color=\'#FF0000\'> O usuário de CPF ' .$cpf.' será excluído.</font></center><b>';
		?>
		<html>
		<center>
			<form method="post" action="?go=delete">
					<input type="image" src="Imagens/bottoes/excluir.png" width="160" height="50" >
			</form>
			<form method="post" action="?go=cancel">
					<input type="image" src="Imagens/bottoes/cancelar.png" width="160" height="50" >
			</form>
		</center>
		</html>
		<?php
		
		
	}
	else if (@$_GET['go']=="editar"){
		session_start();
		$cpf = $_SESSION["CPFADMIN"];
		header('Location: EditarUsuarioADM.php');
	}
	if (@$_GET['go']=="delete"){
		// Aqui excuímos o usuário
		
		session_start();
		$cpf = $_SESSION["CPFADMIN"];
		
		/* Conectar com o banco de dados da aplicação */
		$link = mysqli_connect('localhost', 'root', '') or die('Erro ao conectar');
		mysqli_select_db($link, 'KappaDB') or die('Erro ao conectar com o banco de dados');
		
		// Exclui Despesas do usuário
		$query = sprintf("DELETE FROM Despesa WHERE usuario_cpf=".$cpf);
		mysqli_query($link, $query) or die(mysqli_error($link));
		
		// Exclui Receitas do usuário
		$query = sprintf("DELETE FROM Receita WHERE usuario_cpf=".$cpf);
		mysqli_query($link, $query) or die(mysqli_error($link));
		
		// Exclui Usuário
		$query = sprintf("DELETE FROM Usuario WHERE cpf=".$cpf);
		mysqli_query($link, $query) or die(mysqli_error($link));
		
		echo '<p></p><b><center><font color=\'#006400\'> Usuário deletado com sucesso.</font></center><b>';
	}
	if (@$_GET['go']=="cancel"){
		// Usuário clica em voltar
		header('Location: PaginaUsuario.php');
	}
	
	?>





  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        
        <div class="col l6 s12">
          <h5 class="white-text">Quem somos</h5>
          <p class="grey-text text-lighten-4">Estudantes da Universidade Federal de Pelotas que pretendem tirar uma nota razoável no trabalho de Desenvolvimento de Software e se formar no futuro!</p>
        </div>
          
      </div>
    </div>
      
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      Edited by <a class="orange-text text-lighten-3" href="#">Eduardo Lemos, o pró dos TimPleit</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
