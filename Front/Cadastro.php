<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

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
        <title>Cadastro</title>
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
			}
			fieldset#sexo{
				width:200px;
				margin-top:20px;
			}
			div{
				margin-bottom: 15px;
				margin-top: 20px;
			}
			select{
				width: 267px;
			}
			#idcadastrar {
				font-size:18px;
				font-family:sans-serif;
				margin-left: 20px;
				margin-top: 5px;
			}
            select#idpais{
                margin-left:20px;
            }
		</style>
    </head>
    <body>
        <div id="interface">
           <form method="post" id="idcadastro" action="?go=cadastrar">
                <fieldset id="cadastro"><legend>Identificação do Usuário</legend>
                    <p>Nome:&#160;&#160; <input type="text" name="tnome" id="idnome" size="25" maxlength="25" placeholder="Nome Completo"/>
                    <p>Senha:&#160; <input type="password" name="tsenha" id="idsenha" size="25" maxlength="25" placeholder="Máximo 15 Digitos"/>
                    <p>E-mail:&#160; <input type="email" name="temail" id="idemail" size="25" maxlength="20"/>
                    <p>CPF:&#160;&#160;&#160;&#160; <input type="text" name="tcpf" id="idcpf" size="25" maxlength="11" placeholder="Somente Numeros"/>
                    <p>Data Nascimento: <input type="date" name="tdata" id="iddata" placeholder="DD/MM/AAAA" </p>
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
                        <input type="radio" name="tsexo" id="idmasc" checked value=2 /><label for="idmasc">Masculino</label><br/>
                        <input type="radio" name="tsexo" id="idfem" value=1 /><label for="idfem">Feminino</label>
                    </fieldset>
                    <div>
                        <input type="submit" value="Cadastrar" id="idcadastrar">
                    </div>
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

if (@$_GET['go'] == 'cadastrar'){
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
        echo "<script>alert('Preencha o nome para se cadastrar.'); history.back();</script>";
    }elseif(empty($senha)){
        echo "<script>alert('Preencha a senha para se cadastrar.'); history.back();</script>";
    }elseif(empty($email)){
        echo "<script>alert('Preencha o e-mail para se cadastrar.'); history.back();</script>";
    }elseif(empty($cpf)){
        echo "<script>alert('Preencha o CPF de nascimento para se cadastrar.'); history.back();</script>";
    }elseif(empty($data_nasc)){
        echo "<script>alert('Preencha a data para se cadastrar.'); history.back();</script>";
    }elseif(empty($pais)){
        echo "<script>alert('Preencha o Pais para se cadastrar.'); history.back();</script>";
    }elseif(empty($estado)){
        echo "<script>alert('Preencha o estado para se cadastrar.'); history.back();</script>";
    }elseif(empty($cidade)){
        echo "<script>alert('Preencha a cidade para se cadastrar.'); history.back();</script>";
    }elseif(empty($sexo)){
        echo "<script>alert('Preencha sexo para se cadastrar.'); history.back();</script>";
    }else{
                $usuario = new Usuario($cpf, $nome, $cidade, $estado, $pais, $sexo, $data_nasc, $senha, "2015-04-23", $email);
                $usuario->cadastroUsuarioDB();
    }
}
?>