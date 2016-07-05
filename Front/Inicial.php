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
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m4">
                        <br>
                    </div>
                    <div class="col s12 m4" >
                        <form method="post" action="?go=login ">
                            <p><input type="text" name="login" value="" placeholder="CPF"></p>
                            <p><input type="password" name="password" value="" placeholder="Password"></p>    
                            <input type="submit" class="btn-large waves-effect waves-light orange submit" name="commit" value="Login"/>
                        </form>
                    </div>

                </div>


                <div>
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
                </div>
            </div>
        </div>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
<?php
include '../Back/usuario.php';
if (@$_GET['go'] == "login") {
    $cpf = $_POST["login"];
    $senha = $_POST["password"];
    $query = "SELECT cpf,senha,ultimo_envio FROM Usuario WHERE cpf = " . $cpf;
    $conn = new AdmDB;
    $result = $conn->executeQuery($query);
    if (($senha == null) || ($cpf == null) || ($result == null)) {
        echo "<script> alert(\"O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA;\");</script>";
        return;
    }
    $line = $result->fetch(PDO::FETCH_ASSOC);
    //foreach($result as $line){
    $senha2 = $line["senha"];
    $ultimo_envio = $line["ultimo_envio"];
    if (($senha2 == $senha)) {
        session_start();
        $_SESSION["CPF"] = $cpf;

        $query1 = "SELECT usuario_cpf FROM Admin WHERE usuario_cpf = " . $cpf;
        $conn2 = new AdmDB;
        $result1 = $conn2->executeQuery($query1);
        $line1 = $result1->fetch(PDO::FETCH_ASSOC);
        if ($line1["usuario_cpf"] == $cpf) {
            echo "ADM";
            $_SESSION["admin"] = true;
            header('Location: PaginaAdministrador.php');
        } else {
            $_SESSION["admin"] = false;
            date_default_timezone_set('America/Sao_Paulo');
            $ultienv = strtotime($ultimo_envio);
            $hoje = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
            $trintadias = strtotime($ultimo_envio . "+ 30 days");
            echo "ULTIMO ENVIO: " . date("Y-m-d", $ultienv) . "<p>";
            echo "HOJE: " . date("Y-m-d", $hoje) . "<p>";
            echo "PRAZO: " . date("Y-m-d", $trintadias) . "<p>";
            if ($hoje <= $trintadias) {
                echo "no prazo";
                header('Location: PaginaUsuario.php');
            } else {
                echo "fora do prazo";
                header('Location: envio.php');
            }
        }
    } else {
        echo "<red>O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA;";
    }
}
?>        
