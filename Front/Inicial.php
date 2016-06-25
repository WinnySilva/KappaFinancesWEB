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
        <p class="submit">
            <input type="image" src="Imagens/bottoes/login.png" height="30px" width="100px"
             type="submit" name="commit" value="Login"
              	/>
        </p>
    <!-- src="Imagens/bottoes/login.png"	
      -->
      </form>
    </div>

    <div class="login-help">
        <a href="Cadastro.php"> 
            <img src="Imagens/bottoes/cadastrar.png"	height="30px" width="100px"	/>
        </a>
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
        $query = "SELECT cpf,senha,ultimo_envio FROM Usuario WHERE cpf = ".$cpf;    
        $conn = new AdmDB;
        $result = $conn->executeQuery($query);        
        if(($senha == null)||($cpf == null) || ($result == null) ){
             echo "<red>O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA;";
            return;
        }
       
        $line = $result->fetch(PDO::FETCH_ASSOC);
        //foreach($result as $line){
            $senha2 = $line["senha"]; 
            $ultimo_envio = $line["ultimo_envio"];
        
        if(($senha2==$senha)){
            $_SESSION["CPF"] = $cpf;
            
            $query1 = "SELECT usuario_cpf FROM admin WHERE usuario_cpf = ".$cpf;
            $conn2 = new AdmDB;
            $result1 = $conn2->executeQuery($query1);
            $line1 = $result1->fetch(PDO::FETCH_ASSOC);
            if($line1["usuario_cpf"]== $cpf){
                echo "ADM";
                $_SESSION["admin"] = true;
               header('Location: PaginaAdministrador.php');
            }else{
                $_SESSION["admin"] = false;
                date_default_timezone_set('America/Sao_Paulo');
                $ultienv = strtotime($ultimo_envio);
                $hoje  = mktime (0, 0, 0, date("m")  , date("d"), date("Y"));
                $trintadias = strtotime($ultimo_envio."+ 30 days");
                echo "ULTIMO ENVIO: ".date("Y-m-d",$ultienv) ."<p>"; 
                echo "HOJE: ".date("Y-m-d",$hoje)."<p>";
                echo "PRAZO: ".date("Y-m-d",$trintadias)."<p>";
                if($hoje <= $trintadias){
                   echo "no prazo";
                    header('Location: PaginaUsuario.php');
                }else{
                 echo "fora do prazo";
                    header('Location: envio.php');
                }
            }
        }
        else{
            echo "<red>O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA;";
        }
    
    }
        
