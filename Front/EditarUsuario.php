<?php
    try {
        $conexao=new PDO("mysql:host=localhost;dbname=KappaDB","root", "");
        $conexao->exec("SET CHARACTER SET utf8");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    session_start();
    $cpflogado = $_SESSION["CPF"];
    //$cpflogado = "12";
    $resultado=$conexao->prepare("SELECT * FROM Usuario WHERE cpf =?");
    $resultado->execute(array($cpflogado));
    $linha=$resultado->fetch(PDO::FETCH_ASSOC);

    $nomeinput = $linha['nome'];
    $senhainput = $linha['senha'];
    $emailinput = $linha['email'];
    $cpfinput = $linha['cpf'];
    $nascinput = $linha['data_nasc'];
    $sexoinput = $linha['sexo'];
    $cidadeid = $linha['idcidade'];
    
    //Pegar nome da cidade
    
    $resultado2 = $conexao->prepare("SELECT * FROM Cidade WHERE id_cidade = ?");
    $resultado2->execute(array($cidadeid));
    $linha2 = $resultado2->fetch(PDO::FETCH_ASSOC);
    
    $cidadeinput = $linha2['nome'];
    $estadoid = $linha2['idEstado'];
    
    //Pegar nome do Estado
    
    $resultado3 = $conexao->prepare("SELECT * FROM Estado WHERE idestado = ?");
    $resultado3->execute(array($estadoid));
    $linha3 = $resultado3->fetch(PDO::FETCH_ASSOC);
    
    $estadoinput = $linha3['nome'];
    $paisid = $linha3['idPais'];
    
    //Pegar nome do Pais
    
    $resultado4 = $conexao->prepare("SELECT * FROM Pais WHERE idPais = ?");
    $resultado4->execute(array($paisid));
    $linha4 = $resultado4->fetch(PDO::FETCH_ASSOC);
    
    $paisinput = $linha4['nome'];
    ?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            function Show( pais ) {
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
            };
        </script>
        <meta charset="UTF-8">
        <title>Editar Usuário</title>
        <link rel="stylesheet" href="style.css">
        <style>
            input {
                font-family:sans-serif;
                font-weight: normal;
                font-size: 13pt;
            }
            input:hover{
                background-color: #dddddd;
            }
            legend {
                color: #888888;
                font-weight: bold;
                font-size: 13pt;
                font-family: sans-serif;
            }
            fieldset{
                border-color: #cecece;
                margin:20px;
                margin-left: 0px;
            }
            fieldset#sexo{
                width:200px;
                margin-top:20px;
                margin-left:20px;
            }
            div{
                margin-bottom: 15px;
                margin-top: 20px;
            }
            select#idestado{
                width: 267px;
            }
            select#idpais{
                width: 267px;
                margin-left: 20px;
            }
            #ideditar {
                font-size:18px;
                font-family:sans-serif;
                margin-left: 20px;
                margin-top: 5px;
            }
            #idbeditar{
                width:100px;
                font-size:18px;
                font-family:sans-serif;
                margin-left: 20px;
                margin-top: 5px;
            }
            #idbvoltar{
                font-size:18px;
                font-family:sans-serif;
                margin-left:30px;
                margin-bottom: 0px;
                width: 100px;
            }
        </style>
    </head>
    <body>
    <div id="interface">
        <form method="post" id="ideditar" action="EditarUsuario.php">
            <fieldset id="editar"><legend>Editar Usuário</legend>
                <p>Nome:&#160;&#160; <input type="text" name="tnome" id="idnome" size="25" maxlength="25" placeholder="Nome Completo" value="<?php print $nomeinput;?>"/>
                <p>Senha:&#160; <input type="password" name="tsenha" id="idsenha" size="25" maxlength="25" placeholder="Máximo 15 Digitos" value="<?php print $senhainput;?>"/>
                <p>E-mail:&#160; <input type="email" name="temail" id="idemail" size="25" maxlength="20"value="<?php print $emailinput;?>"/>
                <p>CPF:&#160;&#160;&#160;&#160; <input type="text" name="tcpf" id="idcpf" size="25" maxlength="11" placeholder="Somente Numeros" value="<?php print $cpfinput;?>"/>
                <p>Data Nascimento: <input type="date" name="tdata" id="iddata" value="<?php print $nascinput; ?>"</p>
                <p><label for="idpais">País:</label>
                <select name="nomepais" id="idpais">
                    <option>Selecione o País</option>
                    <?php
                        try {
                            $conexao=new PDO("mysql:host=localhost;dbname=kappadb","root", "");
                            $conexao->exec("SET CHARACTER SET utf8");
                        }catch(PDOException $e){
                            echo $e->getMessage();
                        }
                        $resultado=$conexao->prepare("SELECT idPais, nome FROM Pais");
                        $resultado->execute();
                        while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
                            $paistabela = $linha['nome'];
                            $idpaistabela = $linha['idPais'];
                            if ($paistabela == $paisinput){
                                echo "<option value='$paistabela' selected>$paistabela</option>";
                            }else echo "<option>$paistabela</option>";
                        }
                    ?>
                </select>
                    <div id="divEC" class="escondido">
                <p><label for="idestado">Estado:</label>
                    <select name="nestado" id="idestado">
                        <option>Selecione o Estado</option>
                        <?php
                        try {
                            $conexao=new PDO("mysql:host=localhost;dbname=kappadb","root", "");
                            $conexao->exec("SET CHARACTER SET utf8");
                        }catch(PDOException $e){
                            echo $e->getMessage();
                        }
                        $resultado=$conexao->prepare("SELECT idestado, nome FROM Estado");
                        $resultado->execute();
                        while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
                            $estadotabela = $linha['nome'];
                            $idestadotabela = $linha['idestado'];
                            if ($estadotabela == $estadoinput){
                                echo "<option value='$estadotabela' selected> $estadotabela</option>";
                            }else echo "<option value='$estadotabela'>$estadotabela</option>";
                        }
                        ?>
                        </select>
                    <p><label for="idcidade">Cidade:</label>
                        <input type="text" name="ncidade" id="idcidade" maxlength="20" size="25" placeholder="Digite sua Cidade" list="cidades">
                        <datalist id="cidades" >
                            <option value="pelotas">Pelotas</option>
                            <option value="porto alegre">Porto Alegre</option>
                            <option value="rio de janeiro">Rio de Janeiro</option>
                            <option value="sao paulo">São Paulo</option>
                            <option value="brasilia">Brasilia</option>
                            <option value="santa maria">Santa Maria</option>
                            <option value="rio grande">Rio Grande</option>
                            <option value="cacapava">Caçapava</option>
                            <option value="cangucu">Canguçu</option>
                            <option value="florianopolis">Florianopolis</option>
                        </datalist>
                </div>
                <fieldset id="sexo"><legend>Sexo</legend>
                    <?php
                        if ($sexoinput == "M") {
                            echo "<input type = 'radio' name = 'tsexo' id = 'idmasc' checked value = 2 /><label for='idmasc' > Masculino</label ><br />";
                            echo "<input type = 'radio' name = 'tsexo' id = 'idfem' value = 1 /><label for='idfem' > Feminino</label >";
                        }else{
                            echo "<input type = 'radio' name = 'tsexo' id = 'idmasc' value = 2 /><label for='idmasc' > Masculino</label ><br />";
                            echo "<input type = 'radio' name = 'tsexo' id = 'idfem' checked value = 1 /><label for='idfem' > Feminino</label >";
                        }
                    ?>
                </fieldset>
                <input type="submit" value="Editar" id="idbeditar" name= "enviar">
                <input type="submit" value="Voltar" id="idbvoltar" name= "enviar">
            </fieldset>

        </form>
        <footer id="rodape">
            <p>Copyright © 2016 - KappaFinance Developer</p>
        </footer>
    </div>
    </body>
</html>
<?php
include '../Back/usuario.php';

if (@$_POST['enviar'] == 'Editar'){
    $nome = $_POST['tnome'];
    $senha = $_POST['tsenha'];
    $email = $_POST['temail'];
    $cpf = $_POST['tcpf'];
    $data_nasc = $_POST['tdata'];
    $estado = $_POST['nestado'];
    $cidade = $_POST['ncidade'];
    $sexo = $_POST['tsexo'];
    $pais = $_POST['nomepais'];

    if ($pais !== "Brasil"){
        $estado ="Sem Estado";
        $cidade = "Sem Cidade";
    }

    if(empty($nome)){
        echo "<script>alert('Preencha o nome para poder editar.'); history.back();</script>";
    }elseif(empty($senha)){
        echo "<script>alert('Preencha a senha para poder editar.'); history.back();</script>";
    }elseif(empty($email)){
        echo "<script>alert('Preencha o e-mail para poder editar.'); history.back();</script>";
    }elseif(empty($cpf)){
        echo "<script>alert('Preencha o CPF de nascimento para poder editar.'); history.back();</script>";
    }elseif(empty($data_nasc)){
        echo "<script>alert('Preencha a data para poder editar.'); history.back();</script>";
    }elseif(empty($pais) && $estado == "Selecione o País"){
        echo "<script>alert('Preencha o Pais para se cadastrar.'); history.back();</script>";
    }elseif(empty($estado) && $estado == "Selecione o Estado"){
        echo "<script>alert('Preencha o estado para se cadastrar.'); history.back();</script>";
    }elseif(empty($cidade)){
        echo "<script>alert('Preencha a cidade para poder editar.'); history.back();</script>";
    }elseif(empty($sexo)){
        echo "<script>alert('Preencha sexo para se poder editar.'); history.back();</script>";
    }else{
        $usuario = new Usuario($cpf, $nome, $cidade, $estado, $pais, $sexo, $data_nasc, $senha, "2015-04-23", $email);
        $usuario->atualizarUsuariodb();
    }
}
    if(@$_POST['enviar'] == "Voltar"){
        echo "<script>window.location.href='PaginaUsuario.php';</script>";
    }
?>
