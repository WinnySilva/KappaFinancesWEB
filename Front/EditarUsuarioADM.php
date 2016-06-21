<?php
try {
    $conexao=new PDO("mysql:host=localhost;dbname=kappadb","root", "");
    $conexao->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo $e->getMessage();
}
session_start();
$cpflogado = $_SESSION["CPFADMIN"];
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
    <title>Editar</title>
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
    </style>
</head>
<body>
<div id="interface">
    <form method="post" id="ideditar" action="?go=editar">
        <fieldset id="editar"><legend>Editar Usuário</legend>
            <p>Nome:&#160;&#160; <input type="text" name="tnome" id="idnome" size="25" maxlength="25" placeholder="Nome Completo" value="<?php print $nomeinput;?>"/>
            <p>Senha:&#160; <input type="password" name="tsenha" id="idsenha" size="25" maxlength="25" placeholder="Máximo 15 Digitos" value="<?php print $senhainput;?>"/>
            <p>E-mail:&#160; <input type="email" name="temail" id="idemail" size="25" maxlength="20"value="<?php print $emailinput;?>"/>
            <p>CPF:&#160;&#160;&#160;&#160; <input type="text" name="tcpf" id="idcpf" size="25" maxlength="11" placeholder="Somente Numeros" value="<?php print $cpfinput;?>"/>
            <p>Data Nascimento: <input type="date" name="tdata" id="iddata" value="<?php print $nascinput; ?>"</p>
            <p><label for="idpais">País:</label>
                <select name="nomepais" id="idpais">
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
                            echo "<option value='$estadotabela'>$estadotabela</option>";
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
            <div>
                <input type="submit" value="Editar" id="idbeditar">
            </div>
        </fieldset>

    </form>
    <footer id="rodape">
        <p>Copyright © 2016 - KappaFinance Developer</p>
    </footer>
</div>
</body>
</html>