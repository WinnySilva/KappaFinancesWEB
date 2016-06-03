<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
			}
			div{
				margin-bottom: 15px;
				margin-top: 20px;
			}
		</style>
    </head>
    <body>
       <form>
       		<fieldset id="cadastro"><legend>Identificação do Usuário</legend>
       			<p>Nome: <input type="text" name="tnome" id="idnome" size="25" maxlength="25" placeholder="Nome Completo"/></p>
       			<p>Senha: <input type="password" name="tsenha" id="idsenha" size="15" maxlength="25" placeholder="Máximo 15 Digitos"/></p>
       			<p>E-mail: <input type="email" name="temail" id="idemail" size="20" maxlength="20"/></p>
       			<p>CPF: <input type="text" name="tcpf" id="idcpf" size="11" maxlength="11" placeholder="Somente Numeros" </p>
				<p>Data de Nascimento: <input type="date" name="tdata" id="iddata"</p>
				<fieldset id="sexo"><legend>Sexo</legend>
       				<input type="radio" name="tsexo" id="idmasc" checked/><label for="idmasc">Masculino</label><br/>
					<input type="radio" name="tsexo" id="idfem"/><label for="idfem">Feminino</label>
				</fieldset>
				<div>
					<a href="Inicial.php" class="botao">Cadastrar</a>
				</div>
       		</fieldset>

       </form>
    </body>
</html>
