<?php
  require_once 'php_action/conexao.php';

   //Se houver um clique no botao cadastrar, entao capturamos os dados de cada campo da pagina e atribuimos a uma variavel.
   if(isset($_POST['btn_cadastrar'])):
       $processo = mysqli_escape_string($connect,$_POST['processo']);
       $finalidade = mysqli_escape_string($connect,$_POST['finalidade']);
       $nome = mysqli_escape_string($connect,$_POST['nome']);
       $tp_documento = mysqli_escape_string($connect,$_POST['tp_documento']);
       $num_documento = mysqli_escape_string($connect,$_POST['numDocumento']);
       $descricao = mysqli_escape_string($connect,$_POST['descObjeto']);
       $usuario = get_current_user();
       $caixa;
       $ultimo_num_arquivo;

       //antes de adicionarmos no banco, precisamos saber o numero do último arquivo cadastrado, para definirmos a caixa que receberá o próximo.
       $sql1 = "SELECT num_arquivo FROM arquivo order by num_arquivo desc limit 1";
       $result = mysqli_query($connect,$sql1);
      /* $reg1 = mysqli_fetch_array($result);
          if($reg1==null):
              $caixa = "A";
              $ultimo_num_arquivo =0;
          elseif($reg= mysqli_fetch_array($result))*/
            while ($reg= mysqli_fetch_array($result))
               {
                $ultimo_num_arquivo = $reg['num_arquivo'];  

                  if(($ultimo_num_arquivo>=1) &&($ultimo_num_arquivo<5)):
                    $caixa = "A";
                    elseif(($ultimo_num_arquivo>=5) && ($ultimo_num_arquivo<10)):
                      $caixa = "B";
                      elseif(($ultimo_num_arquivo>=10) && ($ultimo_num_arquivo<150)):
                        $caixa = "C";
                        elseif(($ultimo_num_arquivo>=150) && ($ultimo_num_arquivo<200)):
                          $caixa = "D";
                          elseif(($ultimo_num_arquivo>=200) && ($ultimo_num_arquivo<250)):
                            $caixa = "E";
                            elseif(($ultimo_num_arquivo>=250) && ($ultimo_num_arquivo<300)):
                              $caixa = "F";
                              elseif(($ultimo_num_arquivo>=300) && ($ultimo_num_arquivo<350)):
                                $caixa = "G";
                                elseif(($ultimo_num_arquivo>=350) && ($ultimo_num_arquivo<400)):
                                  $caixa = "H";
                                  elseif(($ultimo_num_arquivo>=400) && ($ultimo_num_arquivo<450)):
                                    $caixa = "I";
                                    elseif(($ultimo_num_arquivo>=450) && ($ultimo_num_arquivo<500)):
                                      $caixa = "J";
                                      elseif(($ultimo_num_arquivo>=500) && ($ultimo_num_arquivo<550)):
                                        $caixa = "K";
                                        elseif(($ultimo_num_arquivo>=550) && ($ultimo_num_arquivo<600)):
                                          $caixa = "L";
                                          elseif(($ultimo_num_arquivo>=600) && ($ultimo_num_arquivo<650)):
                                            $caixa = "M";
                                            elseif(($ultimo_num_arquivo>=650) && ($ultimo_num_arquivo<700)):
                                            $caixa = "N";
                                          elseif(($ultimo_num_arquivo>=700) && ($ultimo_num_arquivo<750)):
                                          $caixa = "O";
                                        elseif(($ultimo_num_arquivo>=750) && ($ultimo_num_arquivo<800)):
                                        $caixa = "P";
                                      elseif(($ultimo_num_arquivo>=800) && ($ultimo_num_arquivo<850)):
                                      $caixa = "Q";
                                    elseif(($ultimo_num_arquivo>=850) && ($ultimo_num_arquivo<900)):
                                    $caixa = "R";
                                  elseif(($ultimo_num_arquivo>=900) && ($ultimo_num_arquivo<950)):
                                  $caixa = "S";
                                elseif(($ultimo_num_arquivo>=950) && ($ultimo_num_arquivo<1000)):
                                $caixa = "T";
                              elseif(($ultimo_num_arquivo>=1000) && ($ultimo_num_arquivo<1050)):
                              $caixa = "U";
                             elseif(($ultimo_num_arquivo>=1050) && ($ultimo_num_arquivo<1100)):
                             $caixa = "V";
                          elseif(($ultimo_num_arquivo>=1100) && ($ultimo_num_arquivo<1150)):
                          $caixa = "W";
                        elseif(($ultimo_num_arquivo>=1150) && ($ultimo_num_arquivo<1200)):
                        $caixa = "X";
                      elseif(($ultimo_num_arquivo>=1200) && ($ultimo_num_arquivo<1250)):
                      $caixa = "Y";
                    elseif(($ultimo_num_arquivo>=1250) && ($ultimo_num_arquivo<1300)):
                    $caixa = "Z";
                  endif;
                
               }
         /* endif;*/

        //inserindo os dados armazenados nas variáveis acima e demais dados, como data, usuario, etc. Se der certo, criamos e apresentamos
        //uma pagina com a opção de gerar certidão.
       $sql = "INSERT INTO arquivo (num_processo, finalidade, nome,tp_documento, num_documento, descricao,data, hora, funcionario,caixa) VALUES('$processo','$finalidade','$nome','$tp_documento','$num_documento','$descricao', current_date(), current_time(), '$usuario','$caixa')";

       if(mysqli_query($connect, $sql)):

            
          ?>
          
          <?php
             include 'includes/header.php';
          ?>
  
           <h1>Dados cadastrados com sucesso!</h1>
           <hr></hr>
           

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

                        $codigo= $ultimo_num_arquivo +1;

                        $certidão;
                        if($verbo=="depositou"):
                  
                        $certidao ="Certifico e dou fé que, nesta data, compareceu em cartório o(a) ".$pronome." ".$nome. ", ".$tp_documento. " nº ".$num_documento.", e ".$verbo." ".$descricao.". Certifico ainda, que arquivei o(s) referido(s) documentos em local próprio, utilizando envelope o qual recebeu a seguinte numeração: ".$caixa."/".$codigo."." ;

                        elseif($verbo=="retirou"):
                          $certidao ="Certifico e dou fé que, nesta data, compareceu em cartório o(a) ".$pronome." ".$nome. ", ".$tp_documento. " nº ".$num_documento.", e ".$verbo." ".$descricao.", o qual estava armazendado com a numeração: ".$caixa."/".$codigo."." ;

                         elseif($verbo=="devolveu"):
                          $certidao ="Certifico e dou fé que, nesta data, compareceu em cartório o(a) ".$pronome." ".$nome. ", ".$tp_documento. " nº ".$num_documento.", e ".$verbo." ".$descricao.". Certifico ainda, que arquivei o(s) referido(s) documentos em local próprio, utilizando a mesma numeração de controle cadastrada inicialmente: ".$caixa."/".$codigo."." ;
                        endif;
                           
                         echo "Processo nº ".$processo.".<br/><br/>";
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
               <input type = "button" id = "btn_certificar" class = "btn" value= "Certificar" onclick = "certificar()"/>
       
               <a href ="adicionar.php">NOVO CADASTRO</a><br/><br/>

               <input type = "button" id = "btn_copiar" class = "btn" value= "Copiar certidao" onclick = "copiar()"/>
       
               <a href ="editar1.php">EDITAR</a><br/><br/>

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
