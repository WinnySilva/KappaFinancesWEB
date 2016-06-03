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
        private $dbname = "kappadb";
        private $username = "root";
        private $password ;
        private $conn = "";

        /**
         * retorna uma tabela para ser exibida ou n
         * OBS: O objeto retornado eh um iterador, logo,cada elemento eh lido
         * uma vez.
         * @param type $string o query a ser executado
         */
        public function executeQuery($stringQuery ){
            $this->conn = mysql_connect($this->servername , $this->username, $this->password);
            if (!$this->conn) {
                die("FALHOU\n");
            }
             echo "<p>".$stringQuery."<p>";
            echo "Conectado<p>";
            mysql_select_db($this->dbname,$this->conn) 
            or die("Could not select examples");
            
            $result = mysql_query($stringQuery);
            
            //fetch tha data from the database 
            /*
            while ($row = mysql_fetch_array($result)) {
               echo "<p>".$row{"cpf"}." ".$row{"nome"}; //display the results               
            }
            */
            mysql_close($this->conn);
            return $result;
            
        }
        //retorna true se a query retorna elementos da tabela;
        public function testSelection($query){      
        
        $result = $this->executeQuery($query);
        $row = mysql_fetch_array($result);
        if ($row){
            return true;
        }
         return false;   
        }
        
    }