<?php
     include 'includes/header.php';
 ?>


<?php
// Conectando ao banco de dados: 
include_once("php_action/conexao.php");

$contador=0;
// Criando tabela e cabeçalho de dados:
 echo "<table border=1>";
 echo "<tr>";
 echo "<th>Nº PROCESSO</th>";
 echo "<th>AÇÃO</th>";
 echo "<th>DEPOSITANTE/RETIRANTE</th>";
 echo "<th>DOC</th>";
 echo "<th>Nº DOCUMENTO</th>";
 echo "<th>OBJETO(S)</th>";
 echo "<th>DATA</th>";
 echo "<th>HORA</th>";
 echo "<th>EDITAR</th>";
 echo "</tr>";

 $processo = mysqli_escape_string($connect,$_POST['processo']);
  
 $sql = "SELECT * FROM arquivo WHERE num_processo = '$processo'";
 $resultado = mysqli_query($connect,$sql) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
    $processo = $registro['num_processo'];
    $finalidade = $registro['finalidade'];
    $nome = $registro['nome'];
    $tp_documento = $registro['tp_documento'];
    $num_documento = $registro['num_documento'];
    $descricao = $registro['descricao'];
    $data = $registro['data'];
    $hora = $registro['hora'];
    echo "<tr>";
    echo "<td>".$processo."</td>";
    echo "<td>".$finalidade."</td>";
    echo "<td>".$nome."</td>";
    echo "<td>".$tp_documento."</td>";
    echo "<td>".$num_documento."</td>";
    echo "<td>".$descricao."</td>";
    echo "<td>".$data."</td>";
    echo "<td>".$hora."</td>";
    ?>
    <td><a href='editar1.php?num_arquivo= <?php echo $registro['num_arquivo'];?>'>edit</a></td>;
    <?php
    
    echo "</tr>";
    $contador+=1;
 }
 mysqli_close($connect);
 echo "</table>";
    echo "<br/>";
    if($contador==0):
        $contador = "Nenhum";
    endif;
 echo $contador." registro(s) encontrado(s)."
 ?>
<br/><br/><br/>
<input type="submit" name="consulta-completa" class = "btn" value="Imprimir">  
<a href ="pesquisa_processo.php">Voltar</a><br/><br/><br/><br/><br/>
  <?php
    include_once 'includes/footer.php';
 ?>