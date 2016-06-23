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
            $senha,$ultimo_envio, $email){
        
        $this->cpf= $cpf;
        $this->nome= ($nome);
        $this->cidade= ($cidade);
        $this->estado= ($estado);
        $this->pais= ($pais);
        $this->sexo=$sexo;
        $this->data_nasc=$data_nasc;
        $this->senha=$senha;
        $this->ultimo_envio=$ultimo_envio;
        $this->email=$email;
    }
    /**
     * ATUALIZA O REGISTRO PELO CPF
     * OU INSERE NOVO SE NAO EXISTE
     */
    public function salvarDB(){
        $query = "SELECT cpf FROM Usuario WHERE cpf = ".$this->cpf;
        $conn = new AdmDB;
        $stmt = $conn->executeQuery($query);
        if($stmt->rowCount() > 0)
        {
            $this->atualizarUsuariodb();
        }else{
            $this->inserirUsuariodb();
            echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
            }
    }
    public function cadastroUsuarioDB(){
        $query = "SELECT cpf FROM Usuario WHERE cpf = ".$this->cpf;
        $conn = new AdmDB;
        $stmt = $conn->executeQuery($query);
        if($stmt->rowCount() > 0)
        {
            echo "<script>alert('CPF já em uso.'); history.back();</script>";
        }else{
            $this->inserirUsuariodb();
            echo "<script>alert('Usuário cadastrado com sucesso.'); window.location.href='../Front/Inicial.php';</script>";
        }
    }
    
    public function deletarUsuariodb(){
        $query = "DELETE FROM `Usuario` "
                . "WHERE cpf = ".$this->cpf;
        $conn = new AdmDB;
        $conn->executeQuery($query);
    }
    public function atualizarUsuariodb(){
        $idcidade = $this->inserirCidadedb();
        
        $query = "UPDATE `Usuario` SET "
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
        $query = "INSERT INTO `Usuario`(`cpf`, `nome`, `data_nasc`, `senha`,"
                . " `ultimo_envio`, `idcidade`, `sexo`, `email`) "
                . "VALUES ("
                . $this->cpf.","
                . "'".$this->nome."',"
                . "'".$this->data_nasc."',"
                . "'".$this->senha."',"
                . "'".$this->ultimo_envio. "',". "'". $idcidade."',". "'". $this->sexo."',". "'". $this->email ."'"
                . ")";
        
        $conn->executeQuery($query);
    }
    //retorna id da cidade
    private function inserirCidadedb(){
        $conn = new AdmDB;       
        //-------------------------      
        $query =  "SELECT nome,idPais FROM Pais WHERE"
                ." nome = '".$this->pais."'";
       
        $row1 =  $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
        if($row1){
            $idPais = $row1{"idPais"};
        }else{
            $query = "INSERT INTO `Pais`(`idPais`, `nome`)"
                    . " VALUES (0,'".$this->pais."')";
            $conn->executeQuery($query);
            $query =  "SELECT nome FROM Pais WHERE"
                ." nome = '".$this->pais."'";
            $row1 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
             $idPais = $row1{"idPais"};
            
        }       
       //---------------------------------
        $query =  "SELECT idestado FROM Estado WHERE"
            ." nome = '".$this->estado."'";
        
        $row2 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
        if($row2){
            $idEstado = $row2{"idestado"};
        }else{
        //insere o estado
        $query = "INSERT INTO `Estado`(`idestado`, `nome`, `idPais`)"
                . " VALUES (0,'".$this->estado."',".$idPais.")" ;
        $conn->executeQuery($query);
        $row1 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
        $idEstado = $row1{"idestado"};
        }
//--------------------------------------------------------------                       
        $query =  "SELECT * FROM Cidade WHERE"
            ." nome = '".$this->cidade."'";
        
        $row3 = $conn->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
        //testa se existe a cidade
        if($row3){
            $idCidade = $row3{"id_cidade"};
            return $idCidade;
        }else{      
        //insere cidade
        $query = "INSERT INTO `Cidade`(`id_cidade`, `nome`, `idEstado`)"
                . " VALUES (0,'".$this->cidade."',".$idEstado.")" ;
        $conn->executeQuery($query);
        }
//------------------------------------        
        $query =  "SELECT id_cidade FROM Cidade WHERE"
            ." nome = '".$this->cidade."'";
        
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
