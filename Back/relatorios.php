<?php
//include 'AdmDB.php';
//$r = new Relatorios();
//$ar = [1, 2, 3, 4, 5, 6];
//
//$faixa = [0];
//
//$r->getDados(1, $ar, $faixa, 2016, 1, 1, 1, 1);

class Relatorios {

    private $faixa = [
        array(0, 15),
        array(16, 25),
        array(26, 35),
        array(36, 45),
        array(46, 55),
        array(56, 200)];
   private $tipo, $categorias, $faixaEtaria;
    private $ano, $pais, $estado, $cidade, $grafico;
    private $tipoNome;

    function getDados($tipo, $categorias, $faixa, $ano, $pais, $estado, $cidade, $grafico) {
        $tipoNome = "";
        if ($tipo == 0) {
            $tipoNome = "Receita";
        } else if ($tipo == 1) {
            $tipoNome = "Despesa";
        } else {
            echo "ERRO";
            return null;
        }
        $query = "SELECT SUM(" . $tipoNome . ".valor), Categoria" . $tipoNome . ".nome FROM " . $tipoNome;

        $queryJoins = " JOIN Categoria"
                . $tipoNome . " ON " . $tipoNome . ".idCategoria" . $tipoNome . " = Categoria" . $tipoNome . ".idCategoria" . $tipoNome . " ";

        $queryWHERE = "";
        if ($categorias != NULL) {
           // if (count($categorias) > 1) {
                $categoriasString = "";
                for ($i = 0; $i < count($categorias); $i++) {
                    $categoriasString .=$categorias[$i];
                    if ($i < (count($categorias) - 1)) {
                        $categoriasString .=",";
                    }
                }
        
            $queryWHERE .= "WHERE " 
                    . $tipoNome 
                    . ".idCategoria"
                    .$tipoNome." IN (" 
                    .$categoriasString.")";
        }

        if ($faixa != NULL) {

            $pseudQ = "";
            if (($categorias != NULL)) {
                $pseudQ.=" AND ";
            } else {
                $pseudQ .=" WHERE ";
            }
            $pseudQ2 = "";

            for ($i = 0; $i < count($faixa); $i++) {
                $ano1 = date("Y") - $this->faixa[$faixa[$i]][0];
                $ano2 = date("Y") - $this->faixa[$faixa[$i]][1];
                $pseudQ2.="(EXTRACT(YEAR FROM Usuario.data_nasc)"
                        . "BETWEEN " . $ano2 . " AND " . $ano1
                        . ")";
                if ($i < (count($faixa) - 1)) {
                    $pseudQ2.=" OR ";
                }
            }
            $queryJoins .="JOIN Usuario ON " . $tipoNome . ".usuario_cpf = Usuario.cpf";
            $queryWHERE.=$pseudQ . $pseudQ2;
        }

        if ($ano != null) {
            $pseuquery = "";
            if (($categorias != NULL) || ($faixa != NULL)) {
                $pseuquery .= " AND ";
            } else {
                $pseuquery .= " WHERE ";
            }
            $pseuquery .= "EXTRACT(YEAR FROM data) = " . $ano;
            
            $queryWHERE.=$pseuquery;
        }
        if ($estado != null && $cidade == NULL) {
            if (($ano != NULL) || ($faixa != NULL) || ($categorias != NULL)) {
                $psq = " AND ";
            } else {
                $psq = " WHERE ";
            }
//SELECT * FROM usuario JOIN ( SELECT cidade.id_cidade,cidade.nome,t1.nome as n FROM cidade JOIN (SELECT estado.idestado, estado.nome FROM estado JOIN pais ON estado.idPais=pais.idPais) as t1 ON t1.idestado = cidade.idEstado )as t2 ON t2.id_cidade = usuario.idcidade WHERE t2.n = 'São Paulo'
            $queryJoins.= " JOIN (SELECT * FROM Usuario "
                    . "JOIN ( SELECT Cidade.id_cidade,t1.nome as n FROM Cidade "
                    . "JOIN (SELECT Estado.idestado, Estado.nome FROM Estado JOIN Pais ON Estado.idPais=Pais.idPais) "
                    . "as t1 ON t1.idestado = Cidade.idEstado )"
                    . "as t2 ON t2.id_cidade = Usuario.idcidade) "
                    . "as t3 ON t3.cpf = "
                    . $tipoNome.".usuario_cpf ";
            
            $psq.= "t3.n = '" . $estado."'";
            $queryWHERE.=" " . $psq;
        }

        if ($cidade != NULL) {
            $pseuquery = "";
            if (($categorias != NULL) || ($faixa != NULL)) {
                $pseuquery .= " AND ";
            } else {
                $pseuquery .= " WHERE ";
            }
            $queryWHERE.= $pseuquery . " Usuario.idcidade = " . $cidade;
        }
        if (($pais != NULL) && ($estado == NULL) && ($cidade == NULL)) {
            if (($ano != NULL) || ($faixa != NULL) || ($categorias != NULL)) {
                $psq = " AND ";
            } else {
                $psq = " WHERE ";
            }

            $queryJoins.=" JOIN (SELECT Estado.idPais "
                    . "FROM (SELECT Cidade.idEstado FROM Usuario JOIN Cidade ON Cidade.id_cidade= Usuario.idcidade) as t1 "
                    . "JOIN Estado ON t1.idEstado = Estado.idestado) as t2";

            $psq.= "t2.idPais =" . $pais;
            $queryWHERE.=" " . $psq;
            echo "00000";
        }



        $query .=$queryJoins . " " . $queryWHERE . " GROUP BY " . $tipoNome . ".idCategoria" . $tipoNome . " ";
        //echo $query;
//$tipo, $categorias, $faixa, $ano, 
//$pais, $estado, $cidade, $grafico)
        $this->tipo = $tipo;
        $this->categorias = $categorias;
        $this->faixaEtaria = $faixa;
        $this->ano = $ano;
        $this->pais = $pais;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->grafico = $grafico;
        $this->tipoNome = $tipoNome;
        return $this->produceData($query);
    }

    private function produceData($query) {
        $conn = new AdmDB;
        $resultado = $conn->executeQuery($query);

        $COLUNA1 = "SUM(" . $this->tipoNome . ".valor)";
        $COLUNA2 = "nome";

        $tabelaRetorno = null;
        $i = 0;
        if($resultado==null){
            return null;
        }
        foreach ($resultado as $line) {
            $tabelaRetorno[$i]= array($line[$COLUNA1],$line[$COLUNA2]);
            $i++;
            }
        
        return $tabelaRetorno;
    }

}
