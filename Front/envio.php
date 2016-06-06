<html>
<head>
     <link rel="stylesheet" href="style.css">
    <title>Upload de Arquivos com PHP</title>
</head>
<body>
<form method="post" action= "?go=enviar" enctype="multipart/form-data">
    <label>Arquivo:</label>
    <input type="file" name="arquivo" /> 
    <input type="submit" value="Enviar" />    
</form>
</body>
</html>
<?php
if(@$_GET['go']=='enviar'){    
       
    $filepath= $_FILES['arquivo']['tmp_name'];    
    $file = file($filepath);
        
        foreach($file as $line_num){
            echo $line_num."<p>";
        }



}
    ?>