<?php
require_once 'php_action/conexao.php';
  
            //Se houver um clique no botao salvar, entao capturamos os dados de cada campo da pagina e atribuimos a uma variavel.
   if(isset($_POST['btn_salvar'])):
    /*
       $num_arquivo = mysqli_escape_string($connect,$_POST['num_arq']);
       $processo = mysqli_escape_string($connect,$_POST['num_processo']);

       $finalidade = mysqli_escape_string($connect,$_POST['finalidade']);
       $nome = mysqli_escape_string($connect,$_POST['nome']);

       
       $tp_documento = mysqli_escape_string($connect,$_POST['tp_documento']);
       $num_documento = mysqli_escape_string($connect,$_POST['numDocumento']);
       $descricao = mysqli_escape_string($connect,$_POST['descObjeto']);
       $data = mysqli_escape_string($connect,$_POST['data_registro']);
       $hora = mysqli_escape_string($connect,$_POST['hora_registro']);
       $funcionario = mysqli_escape_string($connect,$_POST['func']);
       $caixa = mysqli_escape_string($connect,$_POST['caixa_arquivo']);*/


        //inserindo os dados armazenados nas variáveis acima e demais dados, como data, usuario, etc. 
       
       
       $sql = "UPDATE arquivo SET num_processo = '$processo',finalidade = '$finalidade', nome ='$nome', tp_documento = '$tp_documento', num_documento = '$num_documento', descricao = '$descricao', data = '$data', hora = '$hora', funcionario = '$funcionario', caixa = '$caixa' WHERE num_arquivo = '$num_arquivo'";
       

       if(mysqli_query($connect, $sql)):

   
          ?>

          <?php
             include 'includes/header.php';
         ?>
  
           <h1>Dados alterados com sucesso!</h1>
           <hr></hr>
           <input type = "button" id = "btn_certificar" value= "Certificar" onclick = "certificar()"/>
       
           <a href ="adicionar.php">NOVO CADASTRO</a><br/><br/>

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
                         /*
                        $certidao ="Certifico e dou fé que, nesta data, compareceu em cartório o(a) ".$pronome." ".$nome. ", ".$tp_documento. " nº ".$num_documento.", e ".$verbo." ".$descricao.".";
     
                         echo $certidao;

                         
                         $codigo= $ultimo_num_arquivo +1;
                         
                         echo $codigo."/".$caixa."/";
                         */
                           
                   
                   ?>
           </div><br/><br/>

               <input type = "button" id = "btn_copiar" value= "Copiar certidao" onclick = "copiar()"/>
       
               <a href ="adicionar.php">EDITAR</a><br/><br/>

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
