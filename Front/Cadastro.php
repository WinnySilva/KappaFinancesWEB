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
        <div id="interface">
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
	$pais = "Brasil";

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
    }elseif(empty($estado)){
        echo "<script>alert('Preencha o estado para se cadastrar.'); history.back();</script>";
    }elseif(empty($cidade)){
        echo "<script>alert('Preencha a cidade para se cadastrar.'); history.back();</script>";
    }elseif(empty($sexo)){
        echo "<script>alert('Preencha sexo para se cadastrar.'); history.back();</script>";
    }else{
        //$query1 = @mysql_query("SELECT * FROM usuario WHERE cpf = $cpf");
        //if (@mysql_num_rows($query1)> 0){
            //echo "<script>alert('CPF já em uso.'); history.back();</script>";
			$usuario=new Usuario($cpf,$nome,$cidade ,$estado ,$pais , $sexo ,$data_nasc , $senha ,"2015-04-23" );
			$usuario->cadastroUsuarioDB();
			//echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
    }
}
?>