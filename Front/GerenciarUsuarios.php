<!DOCTYPE html>
<head>
	<center>
	Digite aqui o CPF do usuário que desejar administrar (somente números):
	<form method="post" action="?go=cpf ">
	<div id="divBusca">
	<!--<link rel="stylesheet" href="style.css">-->
    <img src="Imagens/search3.png" alt=""/>
    <input type="text" id="txtBusca" name="cpf" placeholder="Buscar Usuário..."/>
    <input type="image" src="Imagens/search4.png" type="submit" alt="Buscar Usuário..." id="btnBusca" value="Submeter"/>
    </form>
</div>
	</center>
</div>

</head>

<style>
#txtBusca{
    float:left;
    background-color:transparent;
    padding-left:5px;   
    font-size:18px;
    border:none;
    height:32px;
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
    
    if ($cpf=="")
    {
		echo '<p></p><b><center><font color=\'#FF0000\'> Insira algum CPF. :)</font></center><b>';
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
						<input type="image" src="Imagens/excluir.png" width="80" height="110" >
							
					</form>
					<form method="post" action="?go=editar">
						<input type="image" src="Imagens/editar.png" width="80" height="110" 	>
						
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
		$cpf = $_SESSION["CPFADMIN"];
		echo '<p></p><b><center><font size="140" color=\'#FF0000\'> O usuário de CPF ' .$cpf.' será excluído.</font></center><b>';
		?>
		<html>
		<center>
			<form method="post" action="?go=delete">
					<input type="image" src="Imagens/delete.png" width="230" height="80" >
			</form>
			<form method="post" action="?go=cancel">
					<input type="image" src="Imagens/cancel.png" width="230" height="80" >
			</form>
		</center>
		</html>
		<?php
		
		
	}
	else if (@$_GET['go']=="editar"){
		header('Location: EditarUsuario.php');
	}
	if (@$_GET['go']=="delete"){
		// Aqui excuímos o usuário
		
		session_start();
		$cpf = $_SESSION["CPF"];
		
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
		header('Location: GerenciarUsuarios.php');
	}
	
	?>
	<html>
	<center>
		<a href= "Administracao.php" <p></p><img src="Imagens/voltar.gif"	height="50px" width="100px"	/></a>
	</center>	
	</html>
