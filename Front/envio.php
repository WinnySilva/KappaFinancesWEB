<html>
<head>
     <link rel="stylesheet" href="style.css">
        <style>
        form{
            margin-top: 30px;
        }
        fieldset#inicio{
            width:400px;
            margin-top:20px;
        }
        input#botaoenviar{
            margin-left:240px;
            margin-top:20px;
            width: 250px;
        }
        label#titulo{
            font-size: 20pt;
            font-weight: bold;
                    }
        label#arquivo{
            font-size:14pt;
            font-weight: normal;
        }
    </style>
</head>
<body>
<form method="post" action= "?go=enviar" enctype="multipart/form-data">
	<center>
        <label id="titulo">Faça o Upload de seu arquivo XML<p></label>
	<fieldset id="inicio">
    <label id="arquivo">Arquivo:</label>
        <input type="file" name="arquivo" /> <br/>
	</center>
    </fieldset>
    <input type="submit" value="Enviar" id="botaoenviar"/>
</form>
</body>
</html>
<?php
if(@$_GET['go']=='enviar'){    
    
    $filepath= $_FILES['arquivo']['tmp_name'];
    
    /* Conectar com o banco de dados da aplicação */
    $link = mysqli_connect('localhost', 'root', '') or die('Erro ao conectar');
    mysqli_select_db($link, 'KappaDB') or die('Erro ao conectar com o banco de dados');
    
    //Verifica se o arquivo existe
    if($filepath)
    {
        // Pega extensão do arquivo e verifica se é mesmo .xml
        $file_extension = substr($_FILES['arquivo']['name'], -3);
        
        if($file_extension == 'xml'){
            
            
            // Abre arquivo como um XML
            $xml = simplexml_load_file($filepath); /* Lê o arquivo XML e recebe um objeto com as informações */
            
            
            $userCPF = 2491785080; //precisa passar como 'parametro' esse CPF
            $lastUpload = "2016-06-06";
            $timeLastUpload = strtotime($lastUpload);   // TimeStamp do ultimo envio. 
            
            /* Percorre o XML e coloca no banco as informações */
            //Primeiro para as receitas
            $idReceita = 1;
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

                        echo $sql.'<p>';

                        mysqli_query ($link, $sql);
                        $idReceita = $idReceita +1;
                        echo 'Inserção de registro realizada com sucesso!!!';
                    }
                }
            }
            
            $idDespesa = 1;             // TEM QUE MUDAR ISSO
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

                        echo $sql.'<p>';

                        mysqli_query ($link, $sql);
                        $idDespesa= $idDespesa +1;
                        echo 'Inserção de registro realizada com sucesso!!!';
                    }
                        
                }
            }
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
