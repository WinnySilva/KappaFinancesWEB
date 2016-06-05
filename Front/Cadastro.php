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
				margin-top:20px;
			}
			div{
				margin-bottom: 15px;
				margin-top: 20px;
			}
			select{
				width: 300px;
			}
			<?php

			?>
		</style>
    </head>
    <body>

       <form method="post" id="idcadastro" action="">
       		<fieldset id="cadastro"><legend>Identificação do Usuário</legend>
       			<p>Nome: <input type="text" name="tnome" id="idnome" size="25" maxlength="25" placeholder="Nome Completo"/>
       			<p>Senha: <input type="password" name="tsenha" id="idsenha" size="15" maxlength="25" placeholder="Máximo 15 Digitos"/>
       			<p>E-mail: <input type="email" name="temail" id="idemail" size="20" maxlength="20"/>
       			<p>CPF: <input type="text" name="tcpf" id="idcpf" size="11" maxlength="11" placeholder="Somente Numeros"/>
				<p>Data de Nascimento: <input type="date" name="tdata" id="iddata"</p>
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
				<input type="text" name="ncidade" id="idcidade" maxlength="20" size="20" placeholder="Digite sua Cidade" list="cidades">
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
