<?php
include 'AdmDB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$us = new Usuario();
$us = new Usuario("0234599",
        "joana", 
        "minhacidade", 
        "meuestado",
        "meupais", 
        2, 
        "2016-06-09", 
        "sasa", 
        "2015-05-15");
$us->salvarDB();

/**
 * Description of usuario
 *
 * @author Winny S
 */
class Usuario {
    //put your code here
    private $cpf,$nome,$cidade,$estado,
            $pais,$sexo,$data_nasc,
            $senha,$ultimo_envio;
    
    
    /**
     * 
     * @param type $cpf : string
     * @param type $nome :string
     * @param type $cidade :string
     * @param type $estado :string
     * @param type $pais :string
     * @param type $sexo :int 1:M 2:F
     * @param type $data_nasc : data
     * @param type $senha :string
     * @param type $ultimo_envio :datetime
     */
    public function Usuario(
            $cpf,$nome,$cidade,$estado,
            $pais,$sexo,$data_nasc,
            $senha,$ultimo_envio){
        
        $this->cpf= $cpf;
        $this->nome= strtoupper($nome);
        $this->cidade=strtoupper($cidade);
        $this->estado=strtoupper($estado);
        $this->pais= strtoupper($pais);
        $this->sexo=$sexo;
        $this->data_nasc=$data_nasc;
        $this->senha=$senha;
        $this->ultimo_envio=$ultimo_envio;
        
    }
    /**
     * ATUALIZA O REGISTRO PELO CPF
     * OU INSERE NOVO SE NAO EXISTE
     */
    public function salvarDB(){
        $query =  "SELECT CPF FROM USUARIO"
                . " WHERE CPF = ".$this->cpf;       
        $conn = new AdmDB;
        if ($conn->testSelection($query)){
            echo "JAH EXISTE<p>UPDATE<p>";
            $this->atualizarUsuariodb();
            return;
        }       
        echo "inserindo";
        $this->inserirUsuariodb();
                
        
        
                
    }
    
    public function deletarUsuariodb(){
        $query = "DELETE FROM `usuario` "
                . "WHERE cpf = ".$this->cpf;
        $conn = new AdmDB;
        $conn->executeQuery($stringQuery);
    }
    private function atualizarUsuariodb(){
        $idcidade = $this->inserirCidadedb();
        
        $query = "UPDATE `usuario` SET "
              //  . "cpf=".$this->cpf.","
                . "nome ='".$this->nome."',"
                . "data_nasc ='".$this->data_nasc."',"
                . "senha ='".$this->senha."',"
                . "ultimo_envio ='".$this->ultimo_envio."',"
                . "idcidade = ".$idcidade.","
                . "`sexo`= ".$this->sexo
                ." WHERE cpf = ".$this->cpf;
        $conn = new AdmDB;
        $conn->executeQuery($query);
        
    }
    private function inserirUsuariodb(){
        $conn = new AdmDB;
        $idcidade = $this->inserirCidadedb();
        $query = "INSERT INTO `usuario`(`cpf`, `nome`, `data_nasc`, `senha`,"
                . " `ultimo_envio`, `idcidade`, `sexo`) "
                . "VALUES ("
                . $this->cpf.","
                . "'".$this->nome."',"
                . "'".$this->data_nasc."',"
                . "'".$this->senha."',"
                . "'".$this->ultimo_envio."',"
                . $idcidade.","
                . $this->sexo
                . ")";
        
        $conn->executeQuery($query);
    }
    //retorna id da cidade
    private function inserirCidadedb(){
        $conn = new AdmDB;
        $query =  "SELECT NOME FROM PAIS WHERE"
                ." NOME = '".$this->pais."'";
        //se o PAIS JAH FOI INSERIDO OU NAO
        if (!$conn->testSelection($query) ){
            $query = "INSERT INTO `pais`(`idPais`, `nome`)"
                    . " VALUES (0,'".$this->pais."')";
            $conn->executeQuery($query);
            
            //pega o numero do pais
            $query =  "SELECT idPais FROM PAIS WHERE"
                ." NOME = '".$this->pais."'";
            $result2= $conn->executeQuery($query);
            $row2 = mysql_fetch_array($result2);
                       
            //insere o estado
            $query = "INSERT INTO `estado`(`idestado`, `nome`, `idPais`)"
                    . " VALUES (0,'".$this->estado."',".$row2{"idPais"}.")" ;
            $conn->executeQuery($query);
            
            //pega o numero do estado
            $query =  "SELECT idestado FROM estado WHERE"
                ." NOME = '".$this->estado."'";
            $result3= $conn->executeQuery($query);
            $row3 = mysql_fetch_array($result3);
            
            //insere cidade
            $query = "INSERT INTO `cidade`(`id_cidade`, `nome`, `idEstado`)"
                    . " VALUES (0,'".$this->cidade."',".$row3{"idestado"}.")" ;
            $conn->executeQuery($query);
        }else{
            //pega o numero do estado
            $query =  "SELECT idestado FROM estado WHERE"
                ." NOME = '".$this->estado."'";
            
            //testa se existe o estado
            if(!$conn->testSelection($query)){
            //insere o estado
            $query = "INSERT INTO `estado`(`idestado`, `nome`, `idPais`)"
                    . " VALUES (0,'".$this->estado."',".$row2{"idPais"}.")" ;
            $conn->executeQuery($query);           
            }
            
            $query =  "SELECT * FROM cidade WHERE"
                ." NOME = '".$this->cidade."'";
           
            //testa se existe a cidade
            if(!$conn->testSelection($query)){
            //pega o numero do estado
            $query =  "SELECT idestado FROM estado WHERE"
                ." NOME = '".$this->estado."'";
            $result5= $conn->executeQuery($query);
            $row5 = mysql_fetch_array($result5);    
            //insere cidade
            $query = "INSERT INTO `cidade`(`id_cidade`, `nome`, `idEstado`)"
                    . " VALUES (0,'".$this->cidade."',".$row5{"idestado"}.")" ;
            $conn->executeQuery($query);
            }
            
        }
        $query =  "SELECT id_cidade FROM cidade WHERE"
                ." NOME = '".$this->cidade."'";
            $result5= $conn->executeQuery($query);
            $row5 = mysql_fetch_array($result5);
        
        return $row5{"id_cidade"};
    }
    
    
    public function getCPF(){
        return $this->cpf;        
    }
    public function getNome(){
        return $this->nome;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getPais(){
        return $this->pais;
    }
    public function getUltimoEnvio(){
        return $this->ultimo_envio;
    }
    
    
    
}
