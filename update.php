<?php
  require_once 'php_action/conexao.php';

   //Se houver um clique no botao editar, entao capturamos os dados de cada campo da pagina e atribuimos a uma variavel.
   if(isset($_POST['btn_editar'])):
       $processo = mysqli_escape_string($connect,$_POST['processo']);
       $finalidade = mysqli_escape_string($connect,$_POST['finalidade']);
       $nome = mysqli_escape_string($connect,$_POST['nome']);
       $tp_documento = mysqli_escape_string($connect,$_POST['tp_documento']);
       $num_documento = mysqli_escape_string($connect,$_POST['numDocumento']);
       $descricao = mysqli_escape_string($connect,$_POST['descObjeto']);
       $data = mysqli_escape_string($connect,$_POST['data']);
       $hora = mysqli_escape_string($connect,$_POST['hora']);
       $funcionario = mysqli_escape_string($connect,$_POST['funcionario']);
       $caixa = mysqli_escape_string($connect,$_POST['caixa']);
       $usuario = get_current_user();

       $num_arquivo = mysqli_escape_string($connect,$_POST['num_arquivo']);
       
       $sql = "UPDATE arquivo SET num_processo = '$processo',finalidade = '$finalidade', nome ='$nome', tp_documento = '$tp_documento', num_documento = '$num_documento', descricao = '$descricao', data = '$data', hora = '$hora', funcionario = '$funcionario', caixa = '$caixa' WHERE num_arquivo = '$num_arquivo'";
       
       if(mysqli_query($connect, $sql)):
 ?>

           <?php
            include 'includes/header.php';
           ?>
  
           <h1>Dados atualizados com sucesso!</h1>
           <hr></hr>


           <!--inicio arquivo txt-->
           <div id = "certidao">
                <?php
                    $pronome;
                    $verbo;

                    if($tp_documento=="OAB"):
                        $pronome = "Dr(a).";
                      else:
                        $pronome = "Sr(a).";
                    endif;
                   
                        
                    if($finalidade=="depositar"):
                         $verbo = "depositou";
                      elseif($finalidade =="retirar"):
                         $verbo ="retirou";
                      elseif($finalidade =="devolver"):
                         $verbo="devolveu";
                    endif;

                        $codigo="";

                        $certidão;
                        if($verbo=="depositou"):
                  
                        $certidao ="Certifico e dou fé que, nesta data, compareceu em cartório o(a) ".$pronome." ".$nome. ", ".$tp_documento. " nº ".$num_documento.", e ".$verbo." ".$descricao.". Certifico ainda, que arquivei o(s) referido(s) documento(s) em local próprio, utilizando envelope o qual recebeu a seguinte numeração: ".$caixa."/".$codigo."." ;

                        elseif($verbo=="retirou"):
                          $certidao ="Certifico e dou fé que, nesta data, compareceu em cartório o(a) ".$pronome." ".$nome. ", ".$tp_documento. " nº ".$num_documento.", e ".$verbo." ".$descricao.", o(s) qual(is) estava(m) armazendado(s) com a numeração: ".$caixa."/".$codigo."." ;

                         elseif($verbo=="devolveu"):
                          $certidao ="Certifico e dou fé que, nesta data, compareceu em cartório o(a) ".$pronome." ".$nome. ", ".$tp_documento. " nº ".$num_documento.", e ".$verbo." ".$descricao.". Certifico ainda, que arquivei o(s) referido(s) documento(s) em local próprio, utilizando a mesma numeração de controle cadastrada inicialmente: ".$caixa."/".$codigo."." ;
                        endif;

                         echo $certidao;
                 
                         echo "ENVELOPE Nº ".$codigo."/".$caixa."/";

                         //espaço criado para manipular o txt
            $nome_arquivo = "historico/".$processo.".txt";
            $arquivo = $nome_arquivo;
          
            $conteudo = "Processo nº ".$processo."\r\nEm data tal, ".$pronome.$nome." ".$verbo." em cartório ".$descricao.".\r\nCodigo de armazenamento: ".$caixa."/".$codigo.".\r\nCadastrado/Recebido por ".$usuario.".\r\n--------------------------------------------------------------------------------------------------------------------------------------\r\n";

            $arquivoAberto = fopen($arquivo,'a');
            fwrite($arquivoAberto, $conteudo);
            fclose($arquivoAberto);

            // fim do espaço destinado a manipulação do txt
                   
                ?>
           </div><br/><br/>





           <input type = "button" id = "btn_certificar" value= "Certidão atualizada" class = "btn" onclick = "certificar()"/>
           <input type = "button" id = "btn_copiar" value= "Copiar certidao" class = "btn" onclick = "copiar()"/>
           <br/><br/>

               <?php
                  include_once 'includes/footer.php';
              ?>

              <?php
                /*$certidao = "certifico e dou fé que".$nome."depositou em cartorio.";
                  header('Location: adicionar.php?sucesso');*/
             else:
                  header('Location: ../adicionar.php?erro');
             

         endif;

     endif;
     

   ?>
