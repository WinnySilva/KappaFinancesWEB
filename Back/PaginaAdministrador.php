<!DOCTYPE html>

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="style.css">
    <style>
        input#idgerenciarR{
            margin-top:75px;
        }
        input#idenviar{
            margin-bottom:75px;
        }
    </style>
    <title>Pagina do Usuário</title>
</head>
<body>
<div id="interface">
    <form method="post" action="GerenciarUsuarios.php">
        <input type="submit" value="Gerenciar Relatórios" id="idgerenciarR" class="botao""></br>
    </form>
    <form method="post" action="EditarUsuario.php">
        <input type="submit" value="Ver Perfil" id="idperfil" class="botao"></br>
    </form>
    <form method="post" action="Relatorios.php">
        <input type="submit" value="Ver Relatórios" id="idrelatorios" class="botao""></br>
    </form>
    <form method="post" action="envio.php">
        <input type="submit" value="Enviar Finanças" id="idenviar" class="botao"></br>
    </form>
</div>
</body>
</html>
