  <?php
     include 'includes/header.php';
  ?>


 <?php
     // Conectando ao banco de dados: 
     include_once("php_action/conexao.php");


    $processo = mysqli_escape_string($connect,$_POST['processo']);

      if($processo==""):
      ?>
         <script>alert('Insira o número do processo!')</script>
      <?php
      
      endif;
      
  
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
          $funcionario = $registro['funcionario'];
    
           echo "<tr><td>NUMERO DO PROCESSO:</td>".$processo. "</tr><br/><br/>";
           echo "<tr><td>Última ação registrada:</td>".$finalidade. "por: ".$nome."</tr><br/>";
           echo "<tr><td>NOME:</td>".$nome. "</tr><br/>";
           echo "<tr><td>Documento:</td>".$tp_documento. "</tr><br/>";
           echo "<tr><td>Numero:</td>".$num_documento. "</tr><br/>";
           echo "<tr><td>Objeto:</td>".$descricao. "</tr><br/>";
           echo "<tr><td>Data do Registro:</td>".$data. "</tr><br/>";
           echo "<tr><td>Horas:</td>".$hora. "</tr><br/>";
           echo "<tr><td>Cadastrado por:</td>".$funcionario. "</tr><br/>";
           echo "<tr><hr></tr><br/>";    
        }

       mysqli_close($connect);
      
  ?>

       <input type="submit" name="consulta-completa" class = "btn" value="Imprimir">  
       <a href ="pesquisa_processo.php">Voltar</a><br/><br/><br/><br/><br/>
    
        <?php
           include_once 'includes/footer.php';
        ?>