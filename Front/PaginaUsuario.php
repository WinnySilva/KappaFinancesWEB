<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style>
            input#idrelatorios{
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
            <form method="post" action="Relatorios.php">
                <input type="submit" value="Ver Relatórios" id="idrelatorios" class="botao" id="idrelatorios"></br>
            </form>
            <form method="post" action="EditarUsuario.php">
                <input type="submit" value="Ver Perfil" id="idperfil" class="botao" name="idperfil"></br>
            </form>
            <form method="post" action="envio.php">
                <input type="submit" value="Enviar Finanças" id="idenviar" class="botao" name="idenviar"></br>
            </form>
        </div>
    </body>
</html>
