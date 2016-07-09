<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!-- Pegar o nome do pais quando o usuario faz a troca de pais na pagina -->
<script type="text/javascript">

    /*function Show( pais ) {
     var label = pais.options[pais.selectedIndex].text;
     //alert( label );
     var div;
     div = document.getElementById("divEC");
     div.classList.add("escondido");
     if (label == "Brasil") {
     div.classList.remove("escondido");
     }
     }
     window.onload = function(){
     document.getElementById( 'idpais' ).onchange = function(){
     Show( this );
     }
     };*/
</script>
<html>
    <head>
        <link rel="icon" href="09.png" type="image/x-icon" />
   <link rel="shortcut icon" href="09.jpg" type="image/x-icon" />
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link href="css/material-icons.css" rel="stylesheet">

        
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/scriptEstado.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <link href="css/style.css" rel="stylesheet">        
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="stylesheet" href="css/style_1.css">
        

    </head>
    <body>
        <div id="interface">
            <form method="post" id="idcadastro" action="Cadastro.php">
                <fieldset id="cadastro"><legend>Identificação do Usuário</legend>
                    <p>Nome:&#160;&#160; <input type="text" name="tnome" id="idnome" size="25" maxlength="25" placeholder="Nome Completo"/>
                    <p>Senha:&#160; <input type="password" name="tsenha" id="idsenha" size="25" maxlength="25" placeholder="Máximo 15 Digitos"/>
                    <p>E-mail:&#160; <input type="email" name="temail" id="idemail" size="25" maxlength="20"/>
                    <p>CPF:&#160;&#160;&#160;&#160; <input type="text" class="text" name="tcpf" id="idcpf" size="25" maxlength="11" placeholder="Somente Numeros"/>
                    <p>Data Nascimento: <input type="date" name="tdata" id="iddata" placeholder="DD/MM/AAAA" </p>
                    <p><label for="idpais">País:</label>
                        <select name="nomepais" id="idpais">
                            <option>Selecione o País</option>
                            <?php
                            try {
                                $conexao = new PDO("mysql:host=localhost;dbname=KappaDB", "root", "");
                                $conexao->exec("SET CHARACTER SET utf8");
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                            $resultado = $conexao->prepare("SELECT idPais, nome FROM Pais");
                            $resultado->execute();
                            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                $paistabela = $linha['nome'];
                                $idpaistabela = $linha['idPais'];
                                echo "<option>$paistabela</option>";
                            }
                            ?>
                        </select>
                    <div id="divEC" class="escondido">
                        <p><label for="idestado">Estado:</label>
                            <select name="nestado" id="idestado">
                                <option>Selecione o Estado</option>
                                <?php
                                try {
                                    $conexao = new PDO("mysql:host=localhost;dbname=KappaDB", "root", "");
                                    $conexao->exec("SET CHARACTER SET utf8");
                                } catch (PDOException $e) {
                                    echo $e->getMessage();
                                }
                                //$variavelphp = "<script>document.write(label)</script>";
                                $idpaisselect = 1;
                                $resultado = $conexao->prepare("SELECT idestado, nome FROM Estado WHERE idPais = $idpaisselect");
                                $resultado->execute();
                                while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                    $estadotabela = $linha['nome'];
                                    $idestadotabela = $linha['idestado'];
                                    echo "<option value='$idestadotabela'>$estadotabela</option>";
                                }
                                ?>
                            </select>
                        <div id="resultado">
                        </div>
                    </div>
                    <fieldset id="sexo"><legend>Sexo</legend>
                        <input type="radio" name="tsexo" id="idmasc" checked value=2 /><label for="idmasc">Masculino</label><br/>
                        <input type="radio" name="tsexo" id="idfem" value=1 /><label for="idfem">Feminino</label>
                    </fieldset>
                    <button class="btn waves-effect waves-light green"  type="submit" 
                            title="Cadastrar" value="Cadastrar" id="idcadastrar" name="enviar">
                              <i class="material-icons right">done_all</i>Cadastrar<br>	  
                    </button>
                        
<!--                        <input type="submit" value="Voltar" id="idbvoltar" name= "enviar">-->
                </fieldset>

            </form>
            
        </div>
    </body>
</html>

<?php
include '../Back/usuario.php';
include '../Back/html.inc.php';
Temp::template(false, false);
if (@$_POST['enviar'] == 'Cadastrar') {
    $nome = $_POST['tnome'];
    $senha = $_POST['tsenha'];
    $email = $_POST['temail'];
    $cpf = $_POST['tcpf'];
    $data_nasc = $_POST['tdata'];
    $estado = $_POST['nestado'];
    $cidade = $_POST['ncidade'];
    $sexo = $_POST['tsexo'];
    $pais = $_POST['nomepais'];

    // como recebemos o id do estado temos que pegar o nome do mesmo para poder inserir no banco
    $resultado = $conexao->prepare("SELECT idestado, nome FROM Estado WHERE idestado = $estado");
    $resultado->execute();
    while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $estadoFinal = $linha['nome'];
    }
    if ($pais !== "Brasil") {
        $estadoFinal = $pais;
        $cidade = $pais;
    }

    if (empty($nome)) {
        echo "<script>alert('Preencha o nome para se cadastrar.'); history.back();</script>";
    } elseif (empty($senha)) {
        echo "<script>alert('Preencha a senha para se cadastrar.'); history.back();</script>";
    } elseif (empty($email)) {
        echo "<script>alert('Preencha o e-mail para se cadastrar.'); history.back();</script>";
    } elseif (empty($cpf)) {
        echo "<script>alert('Preencha o CPF de nascimento para se cadastrar.'); history.back();</script>";
    } elseif (empty($data_nasc)) {
        echo "<script>alert('Preencha a data para se cadastrar.'); history.back();</script>";
    } elseif (empty($pais)) {
        echo "<script>alert('Preencha o Pais para se cadastrar.'); history.back();</script>";
    } elseif (empty($estadoFinal)) {
        echo "<script>alert('Preencha o estado para se cadastrar.'); history.back();</script>";
    } elseif (empty($cidade)) {
        echo "<script>alert('Preencha a cidade para se cadastrar.'); history.back();</script>";
    } elseif (empty($sexo)) {
        echo "<script>alert('Preencha sexo para se cadastrar.'); history.back();</script>";
    } else {
        $usuario = new Usuario($cpf, $nome, $cidade, $estadoFinal, $pais, $sexo, $data_nasc, $senha, "2015-04-23", $email);
        $usuario->cadastroUsuarioDB();
    }
}
if (@$_POST['enviar'] == "Voltar") {
    echo "<script>window.location.href='login.php';</script>";
}
?>
