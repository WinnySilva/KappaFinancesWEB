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

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
          <h4 class="header col s12 orange-text">Faça o Upload de seu arquivo XML</h4>
      </div>
      <br>
    </div>
  </div>
  
  <!-- Botões principais -->
	<center>
		<form method="post" action= "?go=enviar" enctype="multipart/form-data">
			<input type="file"  name="arquivo"  id="download-button" class="btn waves-effect waves-light green" />
			<button class="btn waves-effect waves-light green" type="submit" title="Enviar Arquivo XML" name="action">
				 <i class="material-icons right">send</i> Enviar<br>	
			</button> 
	   </form>
	</center>
</body>
</html>

<?php
if(@$_GET['go']=='enviar'){    
    
	// Desabilita Warnings
    error_reporting(0);
    
    // Pega caminho do arquivo XML
    $filepath= $_FILES['arquivo']['tmp_name'];
    
    /* Conectar com o banco de dados da aplicação */
    $link = mysqli_connect('localhost', 'root', '') or die('Erro ao conectar');
    mysqli_select_db($link, 'KappaDB') or die('Erro ao conectar com o banco de dados');
    
    //Verifica se o arquivo existe
    if($filepath)
    {
        // Pega extensão do arquivo e verifica se é mesmo .xml
        $file_extension = substr($_FILES['arquivo']['name'], -3);
        session_start();
        if($file_extension == 'xml'){
            
            
            // Abre arquivo como um XML
            $xml = simplexml_load_file($filepath); /* Lê o arquivo XML e recebe um objeto com as informações */
            
            $userCPF = $_SESSION["CPF"];
            
            $query = sprintf("SELECT nome, data_nasc, ultimo_envio, sexo FROM Usuario WHERE cpf=".$userCPF); 
			$dados = mysqli_query($link, $query) or die(mysqli_error($link));
			// transforma os dados em um array
			$linha = mysqli_fetch_assoc($dados);
		
			$lastUpload = $linha['ultimo_envio'];
			//$lastUpload = "2016-06-06";
            $timeLastUpload = strtotime($lastUpload);   // TimeStamp do ultimo envio. 
            
            
            /* Percorre o XML e coloca no banco as informações */
            //Primeiro para as receitas
            $idReceita = 0;
            foreach ($xml  as $mes){
                foreach ($mes->financas->receita as $receita){
                    $data = $receita->data;
                    $timeData = strtotime($data);
                    
                    // Só adiciona no DB se for mais novo que o ultimo envio
                    if($timeData > $timeLastUpload)
                    {
                        $value =$receita->value;
                        $idCat = $receita->receita->categoriaReceita;

                        // Utilizamos a variável $sql como sendo a instrução SQL de inserção
                        $sql = "INSERT  INTO Receita (`valor`, `data`, `idReceita`,"
                                . " `idCategoriaReceita`, `usuario_cpf`) VALUES ($value, '$data', $idReceita, "
                                . " $idCat, $userCPF)";

                        mysqli_query ($link, $sql);
                        $idReceita = $idReceita +1;
                    }
                }
            }
            
            $idDespesa = 0;		// Receita autoIncrementa
            //Agora para as despesas
            foreach ($xml  as $mes){
                foreach ($mes->financas->despesa as $despesa){
                    $data = $despesa->data;
                    $timeData = strtotime($data);   // Calcula timestamp da data
                    
                    // Só adiciona se a data for mais nova que a do ultimo envio
                    if($timeData > $timeLastUpload)
                    {
                        //Pega valores do XML
                        $value =$despesa->value;
                        $idCat = $despesa->despesa->categoriaDespesa;

                        // Utilizamos a variável $sql como sendo a instrução SQL de inserção
                        $sql = "INSERT INTO Despesa (`valor`, `data`, `idDespesa`,"
                                . " `idCategoriaDespesa`, `usuario_cpf`) VALUES ($value, '$data', $idDespesa, "
                                . " $idCat, $userCPF)";

                        mysqli_query ($link, $sql);
                    }
                        
                }
            }
            
            
            // Atualiza data de último envio
            $hoje = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
            $hoje = date("Y-m-d", $hoje);
            $query = sprintf("UPDATE `Usuario` SET `ultimo_envio`= '".$hoje."' WHERE cpf=".$userCPF);
            mysqli_query($link, $query) or die(mysqli_error($link));
            
            echo '<p></p><b><center><font color=\'#006400\'> Registros inseridos
            com sucesso! :).</font></center><b>';
            ?>
            <html>
				<center>
					<a href= "home.php" class="waves-effect waves-light green btn-large" 
						title="Fazer login no site..." ><i class="material-icons right">label_outline</i>Continuar</a>
				</center>
            </html>
            
           <?php
        }
        else{
            echo '<p><b><center><font color=\'#FF0000\'> Você não selecionou um arquivo XML. '
            . 'Por favor selecione um arquivo válido :).</font></center><b>';
        }
    }
    else{
        echo '<p><b><center><font color=\'#FF0000\'> Você não selecionou nenhum arquivo. '
        . 'Por favor selecione um arquivo válido :).</font></center><b>';
        
    }

} 
else
{
	 ?>
	<html>
		<center>
			<br><a class="btn-large disabled tooltipped" data-position="bottom"
				data-delay="100" data-tooltip="Primeiro você deve enviar o arquivo XML"  
					><i class="material-icons right">label_outline</i>Continuar</a>
		</center>
    </html>		
            
    <?php
}
   ?>

<html>

  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  
</html>
<?php

include '../Back/html.inc.php';
session_start();
if(!isset($_SESSION['admin'])){
     echo "<script>window.location.href='login.php';</script>";    
} 
Temp::template($_SESSION['admin'],$_SESSION['logado']);
