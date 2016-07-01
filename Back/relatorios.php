<?php

include 'AdmDB.php';
$r = new Relatorios();
$ar = [1, 2, 3, 4, 5, 6];

$faixa = [0];

$r->getDados(1, $ar, $faixa, 2016, 1, 1, 1, 1);

class Relatorios {

    private $faixa = [
        array(0, 15),
        array(16, 25),
        array(26, 35),
        array(36, 45),
        array(46, 55),
        array(56, 200)];
    private $selectTodasDespesas = "SELECT SUM(despesa.valor), categoriadespesa.nome FROM despesa JOIN categoriadespesa ON despesa.idCategoriaDespesa = categoriadespesa.idCategoriaDespesa GROUP BY despesa.idCategoriaDespesa";
    private $selectTodasReceitas = "SELECT SUM(receita.valor), categoriareceita.nome FROM receita JOIN categoriareceita ON receita.idCategoriaReceita = categoriareceita.idCategoriaReceita GROUP BY receita.idCategoriaReceita";
    private $selectTodasRECDES = "SELECT SUM(despesa.valor), categoriadespesa.nome FROM despesa JOIN categoriadespesa ON despesa.idCategoriaDespesa = categoriadespesa.idCategoriaDespesa GROUP BY despesa.idCategoriaDespesa UNION SELECT SUM(receita.valor), categoriareceita.nome FROM receita JOIN categoriareceita ON receita.idCategoriaReceita = categoriareceita.idCategoriaReceita GROUP BY receita.idCategoriaReceita";

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
        $query = "SELECT SUM(" . $tipoNome . ".valor), categoria" . $tipoNome . ".nome FROM " . $tipoNome;
        
        $queryJoins =  " JOIN categoria"
                . $tipoNome . " ON " . $tipoNome . ".idCategoria" . $tipoNome . " = categoria" . $tipoNome . ".idCategoria" . $tipoNome . " ";
        
        $queryWHERE ="";
        if ($categorias != NULL) {
            if (count($categorias) > 1) {
                $categoriasString = "";
                for ($i = 0; $i < count($categorias); $i++) {
                    $categoriasString .=$categorias[$i];
                    if ($i < (count($categorias) - 1)) {
                        $categoriasString .=",";
                    }
                }
            } else {
                $categoriasString = $categorias;
            }
            $queryWHERE .= "WHERE " . $tipoNome . ".idCategoria" . $tipoNome . " IN (" . $categoriasString . ")";
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
                $pseudQ2.="(EXTRACT(YEAR FROM usuario.data_nasc)"
                        . "BETWEEN ".$ano2." AND ".$ano1
                        . ")";
                if ($i < (count($faixa) - 1)) {
                    $pseudQ2.=" OR ";
                }
            }
            $queryJoins .="JOIN usuario ON ".$tipoNome.".usuario_cpf = usuario.cpf";                     
            $queryWHERE.=$pseudQ.$pseudQ2;
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
        if ($estado != null && $cidade ==NULL) {
            if(($ano!=NULL)||($faixa!=NULL)||($categorias !=NULL)){
                $psq= " AND ";
            }else{
                $psq= " WHERE ";
            }
            
            $queryJoins.= " JOIN (SELECT cidade.idEstado FROM usuario JOIN cidade ON cidade.id_cidade = usuario.idcidade) as t ";
            $psq.= "t.idEstado = ".$estado;
            $queryWHERE.=" ".$psq;
        }
       
        if($cidade!=NULL){
           $pseuquery = "";
            if (($categorias != NULL) || ($faixa != NULL)) {
                $pseuquery .= " AND ";
            } else {
                $pseuquery .= " WHERE ";
            }
            $queryWHERE.= $pseuquery." usuario.idcidade = ".$cidade;
        }
        if(($pais!=NULL)&&($estado==NULL)&&($cidade ==NULL) ){
            if(($ano!=NULL)||($faixa!=NULL)||($categorias !=NULL)){
                $psq= " AND ";
            }else{
                $psq= " WHERE ";
            }
            
            $queryJoins.=" JOIN (SELECT estado.idPais "
                    . "FROM (SELECT cidade.idEstado FROM usuario JOIN cidade ON cidade.id_cidade= usuario.idcidade) as t1 "
                    . "JOIN estado ON t1.idEstado = estado.idestado) as t2";
            
            $psq.= "t2.idPais =".$pais;
            $queryWHERE.=" ".$psq;
        }



        $query .=$queryJoins ." ".$queryWHERE." GROUP BY " . $tipoNome . ".idCategoria" . $tipoNome . " ";
        echo $query;
    }

}
