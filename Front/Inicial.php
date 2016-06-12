<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Kappa Finances</title>
  <link rel="stylesheet" href="style.css">
  <style>
     body{
       text-align: center;
     }
  </style>
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Kappa Finances</h1>
      <form method="post" action="?go=login ">
        <p><input type="text" name="login" value="" placeholder="CPF"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>    
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Cadastre-se <a href="Cadastro.php">aqui</a>.</p>
    </div>
  </section>
</body>
</html>
<?php
    include '../Back/usuario.php';
    session_start();
    if(@$_GET['go']=="login"){
        $cpf = $_POST["login"];
        $senha =  $_POST["password"];    
        $query = "SELECT cpf,senha,ultimo_envio FROM Usuario WHERE CPF = ".$cpf;    
        $conn = new AdmDB;
        $result = $conn->executeQuery($query);
     //   $senha2 = null;
        echo $senha."<p>";
        if(($senha == null)||($cpf == null) || ($result == null) ){
             echo "<red>O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA;";
            return;
        }
        $line = $result->fetch(PDO::FETCH_ASSOC);
        //foreach($result as $line){
            $senha2 = $line["senha"]; 
            $ultimo_envio = $line["ultimo_envio"];
        //}
        /*
        echo "<p>".$ultimo_envio."<p>";
        $diff1Day = new DateInterval('P30D');
        $ultimo_envio->add($diff1Day);
        
       
        echo "<p>".$ultimo_envio."<p>";
        */
        
        echo $senha."<p>";
        echo $senha2."<p>";
        
        if(($senha2==$senha)){
            $_SESSION["CPF"] = $cpf;
            header('Location: envio.php');
        }
        else{
            echo "<red>O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA;";
        }
    
    }
        
