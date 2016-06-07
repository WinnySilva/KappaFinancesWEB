<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//	require_once "../Back/config.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
		<link rel="stylesheet" href="style.css">
		<style>
			form {
				text-align: left;
				width: 750px;
				margin:auto;
				color: black;
				font-size: 14pt;
				font-family: sans-serif;
			}
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
		</style>
    </head>
    <body>

       <form method="post" id="idcadastro" action="?go=cadastrar">
       		<fieldset id="cadastro"><legend>Identificação do Usuário</legend>
       			<p>Nome:&#160;&#160; <input type="text" name="tnome" id="idnome" size="25" maxlength="25" placeholder="Nome Completo"/>
       			<p>Senha:&#160; <input type="password" name="tsenha" id="idsenha" size="25" maxlength="25" placeholder="Máximo 15 Digitos"/>
       			<p>E-mail:&#160; <input type="email" name="temail" id="idemail" size="25" maxlength="20"/>
       			<p>CPF:&#160;&#160;&#160;&#160; <input type="text" name="tcpf" id="idcpf" size="25" maxlength="11" placeholder="Somente Numeros"/>
				<p>Data Nascimento: <input type="date" name="tdata" id="iddata"</p>
				<p><label for="idestado">Estado:</label>
				<select name="nestado" id="idestado">
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AM">Amazonas</option>
					<option value="AP">Amapá</option>
					<option value="BH">Bahia</option>
					<option value="CE">Ceará</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Espírito Santo</option>
					<option value="GO">Goiás</option>
					<option value="MA">Maranhão</option>
					<option value="MG">Minas Gerais</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MT">Mato Grosso</option>
					<option value="PA">Pará</option>
					<option value="PB">Paraíba</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piauí</option>
					<option value="PR">Paraná</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option selected value="RS">Rio Grande do Sul</option>
					<option value="RO">Rondônia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SE">Sergipe</option>
					<option value="SP">São Paulo</option>
					<option value="TO">Tocantins</option>
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
				<fieldset id="sexo"><legend>Sexo</legend>
       				<input type="radio" name="tsexo" id="idmasc" checked value=1 /><label for="idmasc">Masculino</label><br/>
					<input type="radio" name="tsexo" id="idfem" value=2 /><label for="idfem">Feminino</label>
				</fieldset>
				<div>
					<input type="submit" value="Cadastrar" id="idcadastrar">
				</div>
       		</fieldset>

       </form>
    </body>
</html>

<?php
include '../Back/usuario.php';
//include '../Back/AdmDB.php';
//include 'AdmDB.php';
//$con = @mysql_connect("localhost", "root", "") or die("não foi possivel conecatar");
//@mysql_select_db("kappadb", $con) or die("banco de dados nao localizado!");

if (@$_GET['go'] == 'cadastrar'){
    $nome = $_POST['tnome'];
    $senha = $_POST['tsenha'];
    $email = $_POST['temail'];
    $cpf = $_POST['tcpf']; 
	$data_nasc = $_POST['tdata'];
    $estado = $_POST['nestado'];
    $cidade = $_POST['ncidade'];
    $sexo = $_POST['tsexo'];
	$pais = "Brasil";

	if(empty($nome)){
        echo "<script>alert('Preencha todos os campos para se cadastrar.1'); history.back();</script>";
    }elseif(empty($senha)){
        echo "<script>alert('Preencha todos os campos para se cadastrar.2'); history.back();</script>";
    }elseif(empty($email)){
        echo "<script>alert('Preencha todos os campos para se cadastrar.3'); history.back();</script>";
    }elseif(empty($cpf)){
        echo "<script>alert('Preencha todos os campos para se cadastrar.4'); history.back();</script>";
    }elseif(empty($data_nasc)){
        echo "<script>alert('Preencha todos os campos para se cadastrar.5'); history.back();</script>";
    }elseif(empty($estado)){
        echo "<script>alert('Preencha todos os campos para se cadastrar.6'); history.back();</script>";
    }elseif(empty($cidade)){
        echo "<script>alert('Preencha todos os campos para se cadastrar.7'); history.back();</script>";
    }elseif(empty($sexo)){
        echo "<script>alert('Preencha todos os campos para se cadastrar.8'); history.back();</script>";
    }else{
        $query1 = @mysql_num_rows(@mysql_query("SELECT * FROM USUARIO WHERE cpf = $cpf"));
        if ($query1 == 1){
            echo "<script>alert('CPF já em uso.'); history.back();</script>";
        }else{
			$teste=new Usuario("123121","joaozinho2" ,"pelotas" ,"rs" ,"brasilsilsil" ,2 ,"2016-06-09" ,"wululu" ,"2015-04-23" );
			$teste->salvarDB();
			//$tico = new Usuario($cpf, $nome, $cidade, $estado, $pais, $sexo, $data_nasc, $senha, "05-06-2016");
			//$tico->salvarDB();
			//@mysql_query("INSERT INTO usuario (cpf, nome, data_nasc, senha, data_envio, idcidade, sexo) VALUES (12323465422, 'fabio','2016-06-09' , 3003, '2016-06-09', 'pelotas', 'M')");
			//@mysql_query("INSERT INTO usuario (cpf, nome, data_nasc, senha, data_envio, idcidade, sexo) VALUES ($cpf, $nome, $data, $pass, '2016-06-09', $cidade, $sexo)");
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			@header("Location: Inicial.php");
        }
    }
}
?>