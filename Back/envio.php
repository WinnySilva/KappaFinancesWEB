<?php
class Carrega{
    private $arqnome,$arquivo, $usuario;
    
    function le($filepath){
        $this->arqnome = $filepath;
        $this->arquivo =file($filepath);
        
        foreach($this->arquivo as $line_num){
            echo $line_num;
        }
        
    }
    
}
?>