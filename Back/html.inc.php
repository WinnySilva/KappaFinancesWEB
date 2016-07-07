<script>
 //   "jquery-2.1.1.min.js";
    function addBody(nav, footer) {
        $('body').prepend(nav);
        $('body').append(footer);
    }
</script>
<?php
class Temp {

    static function template($admin,$logado=false) {
        $navegacao = self::$navDeslogado;
        if ($logado) {
            if ($admin) {
                $navegacao = self::$navLogadoADMIN;
            } else {
                $navegacao = self::$navLogadoUSUARIO;
            }
        }
        $auxNav = json_encode($navegacao);
        $auxFoo = json_encode(self::$footer);
        echo "<script>addBody($auxNav,$auxFoo); </script>";
    
        
            }
    
    private static $navDeslogado = "<nav class=\"light-green lighten-1\" role=\"navigation\">
    <div class=\"nav-wrapper container\"><a id=\"logo-container\" href=\"index.html\" class=\"brand-logo\"><img src =\"09.jpg\"  width=\"150\" height=\"60\" alt =\"KappaDolar\"/></a>
        <ul class=\"right hide-on-med-and-down\">
            <li><a href=\"../Front/index.html\">Home</a></li>

            <li><a href=\"../Front/Inicial.php\">Login</a></li>
            <li><a href=\"../Front/Cadastro.php\">Criar Conta</a></li>
            <li><a href=\"#\">Download</a></li>
        </ul>
        <ul id=\"nav-mobile\" class=\"side-nav\">
            <li><a href=\"#\">Navbar Link</a></li>
        </ul>
        <a href=\"#\" data-activates=\"nav-mobile\" class=\"button-collapse\"><i class=\"material-icons\">menu</i></a>
    </div>
</nav>";
    private static $navLogadoADMIN = "<nav class=\"light-green lighten-1\" role=\"navigation\">
    <div class=\"nav-wrapper container\"><a id=\"logo-container\" href=\"index.html\" class=\"brand-logo\"><img src =\"09.jpg\"  width=\"150\" height=\"60\" alt =\"KappaDolar\"/></a>
        <ul class=\"right hide-on-med-and-down\">
            <li><a href=\"../Front/index.html\">Home</a></li>
            <li><a href=\"../Front/Inicial.php\">Perfil</a></li>
            <li><a href=\"../Front/Cadastro.php\">Relatórios</a></li>
            <li><a href=\"#\">Enviar Finanças</a></li>
              <li><a href=\"#\">Gerenciar Usuarios</a></li>
            <li><a href=\"#\">Download</a></li>
        </ul>
        <ul id=\"nav-mobile\" class=\"side-nav\">
            <li><a href=\"#\">Navbar Link</a></li>
        </ul>
        <a href=\"#\" data-activates=\"nav-mobile\" class=\"button-collapse\"><i class=\"material-icons\">menu</i></a>
    </div>
</nav>";
    private static $navLogadoUSUARIO = "<nav class=\"light-green lighten-1\" role=\"navigation\">
    <div class=\"nav-wrapper container\"><a id=\"logo-container\" href=\"index.html\" class=\"brand-logo\"><img src =\"09.jpg\"  width=\"150\" height=\"60\" alt =\"KappaDolar\"/></a>
        <ul class=\"right hide-on-med-and-down\">
            <li><a href=\"../Front/index.html\">Home</a></li>
            <li><a href=\"../Front/Inicial.php\">Perfil</a></li>
            <li><a href=\"../Front/Cadastro.php\">Relatórios</a></li>
            <li><a href=\"#\">Enviar Finanças</a></li>
            <li><a href=\"#\">Download</a></li>
        </ul>
        <ul id=\"nav-mobile\" class=\"side-nav\">
            <li><a href=\"#\">Navbar Link</a></li>
        </ul>
        <a href=\"#\" data-activates=\"nav-mobile\" class=\"button-collapse\"><i class=\"material-icons\">menu</i></a>
    </div>
</nav>";
    private static $footer = "<footer class=\"page-footer orange\">
    <div class=\"container\">
      <div class=\"row\">
        
        <div class=\"col l6 s12\">
          <h5 class=\"white-text\">Quem somos</h5>
          <p class=\"grey-text text-lighten-4\">Estudantes da Universidade Federal de Pelotas que pretendem tirar uma nota razoável no trabalho de Desenvolvimento de Software e se formar no futuro!</p>
        </div>
          
      </div>
    </div>
      
    <div class=\"footer-copyright\">
      <div class=\"container\">
      Made by <a class=\"orange-text text-lighten-3\" href=\"http://materializecss.com\">Materialize</a>
      Edited by <a class=\"orange-text text-lighten-3\" href=\"#\">Eduardo Lemos, o pró dos TimPleit</a>
      </div>
    </div>
  </footer>";


}
