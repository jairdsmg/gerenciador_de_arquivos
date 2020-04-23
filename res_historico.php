<?php
  include 'includes/header.php';
?>
     

<?php
   include_once("php_action/conexao.php");
   $processo = mysqli_escape_string($connect,$_POST['processo']);
?>
        <h3>Histórico do Processo nº <?php echo $processo?> </h3>

     <?php
           $arquivo = "historico/".$processo.".txt";
           if(file_exists($arquivo)):
              $arquivoAberto = fopen($arquivo,'r');
             
                  $tamanhoArquivo = filesize($arquivo);
                    if(!$tamanhoArquivo==""):
                        while(!feof($arquivoAberto)):
                            $linha = fgets($arquivoAberto, $tamanhoArquivo);
                            echo $linha."<br/>";
                        endwhile;
                        fclose($arquivoAberto);
                    else:
                        echo "arquivo existente, porém sem registro!";
                    endif;
            else:
              echo"Não há histórico de registro(s) para esse processo!";
            endif;
     ?>

  <a href ="historico_processo.php">VOLTAR</a><br/><br/><br/><br/>
  <script src = "arquivo.js"></script>

  <?php
      include_once 'includes/footer.php';
  ?>