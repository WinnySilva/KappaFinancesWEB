<?php
include 'AdmDB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$us = new Usuario();

/**
 * Description of usuario
 *
 * @author Winny S
 */
class Usuario {
    
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
        $query = "SELECT cpf FROM usuario WHERE CPF = ".$this->cpf;
        $conn = new AdmDB;
        $stmt = $conn->executeQuery($query);
        if($stmt->rowCount() > 0)
        {
            $this->atualizarUsuariodb();
        }else{
            echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
            $this->inserirUsuariodb();
            }
    }
    public function cadastroUsuarioDB(){
        $query = "SELECT cpf FROM usuario WHERE CPF = ".$this->cpf;
        $conn = new AdmDB;
        $stmt = $conn->executeQuery($query);
        if($stmt->rowCount() > 0)
        {
            echo "<script>alert('CPF já em uso.'); history.back();</script>";
        }else{
            echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
            $this->inserirUsuariodb();
        }
    }
    
    public function deletarUsuariodb(){
        $query = "DELETE FROM `usuario` "
                . "WHERE cpf = ".$this->cpf;
        $conn = new AdmDB;
        $conn->executeQuery($query);
    }
    public function atualizarUsuariodb(){
        $idcidade = $this->inserirCidadedb();
        
        $query = "UPDATE `usuario` SET "
                . "cpf=".$this->cpf.","
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
    public function inserirUsuariodb(){
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
        //-------------------------      
        $query =  "SELECT NOME,idPais FROM PAIS WHERE"
                ." NOME = '".$this->pais."'";
       
        $row1 =  $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
        if($row1){
            $idPais = $row1{"idPais"};
        }else{
            $query = "INSERT INTO `pais`(`idPais`, `nome`)"
                    . " VALUES (0,'".$this->pais."')";
            $conn->executeQuery($query);
            $query =  "SELECT NOME FROM PAIS WHERE"
                ." NOME = '".$this->pais."'";
            $row1 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
             $idPais = $row1{"idPais"};
            
        }       
       //---------------------------------
        $query =  "SELECT idestado FROM estado WHERE"
            ." NOME = '".$this->estado."'";
        
        $row2 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
        if($row2){
            $idEstado = $row2{"idestado"};
        }else{
        //insere o estado
        $query = "INSERT INTO `estado`(`idestado`, `nome`, `idPais`)"
                . " VALUES (0,'".$this->estado."',".$idPais.")" ;
        $conn->executeQuery($query);
        $row2 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
        $idEstado = $row1{"idestado"};
        }
//--------------------------------------------------------------                       
        $query =  "SELECT * FROM cidade WHERE"
            ." NOME = '".$this->cidade."'";
        
        $row3 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
        //testa se existe a cidade
        if($row3){
            $idCidade = $row3{"id_cidade"};
            return $idCidade;
        }else{      
        //insere cidade
        $query = "INSERT INTO `cidade`(`id_cidade`, `nome`, `idEstado`)"
                . " VALUES (0,'".$this->cidade."',".$idEstado.")" ;
        $conn->executeQuery($query);
        }
//------------------------------------        
        $query =  "SELECT id_cidade FROM cidade WHERE"
            ." NOME = '".$this->cidade."'";
        
        $row5 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
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
