<meta charset="UTF-8">
<?php
    try {
        $conexao=new PDO("mysql:host=localhost;dbname=KappaDB","root", "");
        $conexao->exec("SET CHARACTER SET utf8");
        }catch(PDOException $e){
            echo $e->getMessage();
    }
    $cod = $_GET['title'];
    $resultado=$conexao->prepare("SELECT idestado, nome FROM Cidade WHERE idEstado = $cod");
    $resultado->execute();
    //if(!empty($cod))
     //   $busca = "SELECT nome FROM Cidade WHERE idEstado = $cod";

   //     $resultado = $conexao->query($busca, PDO::FETCH_ASSOC) or die("erro")


?>
<p><label for="idcidade">Cidade:</label>
    <select name="ncidade" id="idcidade">
        <option>Selecione a Cidade</option>
        <?php
            //foreach ($resultado as $row){
            //echo '<option value='.$row['nome'].'>'.$row['nome'].'</option>';
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
                $cidadetabela = $linha['nome'];
                $idcidadetabela = $linha['id_cidade'];
                if ($cidadetabela == $cidadeinput) {
                    echo "<option value='$cidadetabela' selected>$cidadetabela</option>";
                }else {
                    echo "<option value='$cidadetabela'>$cidadetabela</option>";
                }
            }
        ?>
    </select>
