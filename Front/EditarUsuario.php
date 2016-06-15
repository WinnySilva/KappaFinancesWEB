<!DOCTYPE html>
<html>
    <head>
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
            select{
                width: 267px;
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