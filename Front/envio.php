<html>
<head>
     <link rel="stylesheet" href="style.css">
    <label><center>Faça o Upload de seu arquivo XML<p> </center></label>
</head>
<body>
<form method="post" action= "?go=enviar" enctype="multipart/form-data">
	<center>    
	<label>Arquivo:</label>
    	<input type="file" name="arquivo" /> 
    	<input type="submit" value="Enviar" />    
	</center>
</form>
</body>
</html>
<?php
if(@$_GET['go']=='enviar'){    
    
    $filepath= $_FILES['arquivo']['tmp_name'];
    
    /* Conectar com o banco de dados da aplicação */
    //$link = mysqli_connect('localhost', 'root', '') or die('Erro ao conectar');
    //mysql_select_db('KappaDB',$link) or die('Erro ao conectar com o banco de dados');
    
    //Verifica se o arquivo existe
    if($filepath)
    {
        // Pega extensão do arquivo e verifica se é mesmo .xml
        $file_extension = substr($_FILES['arquivo']['name'], -3);
        
        if($file_extension == 'xml'){
            
            $file = file($filepath);    
            
            // IMPRIME ARQUIVO. AQUI TEM QUE ADICIONAR NO BANCO.
            // Não está imprimindo as tags do XML. Acho que tem que usar
            // um método diferente de ler arquivo, exemplo simplexml_load_file()
            foreach($file as $line_num){ 
                echo $line_num."<p>";
            }
            
            // Abre arquivo como um XML
            //$xml = simplexml_load_file($filepath); /* Lê o arquivo XML e recebe um objeto com as informações */
            
            /* Percorre o objeto e imprime na tela as informações */
            //foreach ($xml as $nome_da_tag){
                //$a = "Id: " . $contato->idcontato . "<br>";
                //$a .= "Nome: " . $contato->nome . "<br>";
                //$a .= "Email: " . $contato->email. "<br><br>";
                //echo $a;
            //}
        }
        else{
            echo '<b><center><font color=\'#FF0000\'> Você não selecionou um arquivo XML. '
            . 'Por favor selecione um arquivo válido :).</font></center><b>';
        }
    }
    else{
        echo '<b><center><font color=\'#FF0000\'> Você não selecionou nenhum arquivo. '
        . 'Por favor selecione um arquivo válido :).</font></center><b>';
        
    }

}
    ?>
