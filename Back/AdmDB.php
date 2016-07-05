<?php
/*$minhaConexao = new AdmDB;    

if(!$minhaConexao->executeQuery("SELECT * FROM usuario")){
    echo "<p> eh null";
    }
*/
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class AdmDB{
        private $servername= "localhost" ;
        private $dbname = "KappaDB";
        private $username = "root";
        private $password = "";
        private $conn = null;

        /**
         * retorna uma tabela para ser exibida ou n
         * OBS: O objeto retornado eh um iterador, logo,cada elemento eh lido
         * uma vez.
         * @param type $string o query a ser executador
         */
        public function executeQuery($stringQuery ){
            $this->conn = new PDO(
                    'mysql:host='. $this->servername
                    . ';dbname='. $this->dbname
                    . ';charset=utf8', 
                    $this->username, $this->password);

           
          //  echo "<p>".$stringQuery."<p>";
            $result = $this->conn->query($stringQuery);
            return $result;
            
        }
        
        
    }
