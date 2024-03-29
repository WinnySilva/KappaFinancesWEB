<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Login</title>
        <link href="css/material-icons.css" rel="stylesheet">
        <!-- CSS  -->
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="icon" href="09.png" type="image/x-icon" />
        <link rel="shortcut icon" href="09.jpg" type="image/x-icon" />
        <!--  Scripts-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m4">
                        <br>
                    </div>
                    <div id="logform" class="col s12 m4" >
                        <form method="post" action="?go=login ">
                            <p><input type="text" name="login" value="" placeholder="CPF"></p>
                            <p><input type="password" name="password" value="" placeholder="Password"></p>    
                            <button type="submit" class="btn-large waves-effect waves-light orange submit" name="commit" value="Login" id="btinput"/>
                            <label for="btinput"> <font color="FFFFFF">Login </label>
                        </form>
                    </div>

                </div>

            </div>
        </div>


    </body>

    <?php
    error_reporting(0); // desativa as mensagens de erro
    include '../Back/usuario.php';
    include '../Back/html.inc.php';

    session_start();
    if (isset($_SESSION['logado'])) {
        if ($_SESSION['logado'] == true) {
            echo "<script>window.location.href='home.php';</script>";
        }
    }
    Temp::template(NULL, NUll);

    if (@$_GET['go'] == "login") {
        $cpf = $_POST["login"];
        $senha = $_POST["password"];
        $query = "SELECT cpf,senha,ultimo_envio FROM Usuario WHERE cpf = " . $cpf;
        $conn = new AdmDB;
        $result = $conn->executeQuery($query);
        if (($senha == null) || ($cpf == null) || ($result == null)) {
            echo "<script>document.getElementById(\"logform\").innerHTML +=\"<p><b><center><font color=\'#FF0000\'>O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA</font></center><b>\";</script>";
            return;
        }
        $line = $result->fetch(PDO::FETCH_ASSOC);
        //foreach($result as $line){
        $senha2 = $line["senha"];
        $ultimo_envio = $line["ultimo_envio"];
        if (($senha2 == $senha)) {
            $_SESSION['logado'] = true;

            $_SESSION["CPF"] = $cpf;

            $query1 = "SELECT usuario_cpf FROM Admin WHERE usuario_cpf = " . $cpf;
            $conn2 = new AdmDB;
            $result1 = $conn2->executeQuery($query1);
            $line1 = $result1->fetch(PDO::FETCH_ASSOC);
            if ($line1["usuario_cpf"] == $cpf) {
                $_SESSION["admin"] = true;
                // header('Location: PaginaAdministrador.php');
                echo "<script>window.location.href='home.php';</script>";
            } else {
                $_SESSION["admin"] = false;
                date_default_timezone_set('America/Sao_Paulo');
                $ultienv = strtotime($ultimo_envio);
                $hoje = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
                $trintadias = strtotime($ultimo_envio . "+ 30 days");
                if ($hoje <= $trintadias) {
                    //header('Location: PaginaUsuario.php');
                    echo "<script>window.location.href='home.php';</script>";
                } else {
                    echo "<script>window.location.href='envio.php';</script>";
                    //header('Location: envio.php');
                }
            }
        } else {
            //    echo "<script> alert(\"O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA;\");history.back();</script>";
            //
        echo "<script>document.getElementById(\"logform\").innerHTML +=\"<p><b><center><font color=\'#FF0000\'>O USUARIO NÃO EXISTE OU A SENHA ESTÁ ERRADA</font></center><b>\";</script>";
        }
    }
    ?>        
