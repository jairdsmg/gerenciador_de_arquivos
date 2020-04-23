  <?php
     // primeiramente chamamos a conexao
     include_once("php_action/conexao.php");

     include 'includes/header.php';

     if(isset($_GET['num_arquivo'])):
        $num_arquivo = mysqli_escape_string($connect, $_GET['num_arquivo']);
     
        $sql = "SELECT * FROM arquivo WHERE num_arquivo = '$num_arquivo'";
        $resultado = mysqli_query($connect,$sql);
        $dados = mysqli_fetch_array($resultado);
     endif;
  ?>

    <div id = "dado" class="row"><br/>
     <div class="col s12 m6 push-m3">
     <h3>Editar cadastro</h3>
        <form action = "update.php" method = "POST" >

              <div>
                  <input type = "hidden" name = "num_arquivo" value = "<?php echo $dados['num_arquivo'];?>">  
              </div>

              <div>
                Número do Processo: <input type = "text" name="processo" id = "processo" value = "<?php echo $dados['num_processo'];?>">  
              </div>

              <div class="input-field col s12">
                Finalidade: <select id = "finalidade" name="finalidade">
                        <option>
                        <?php echo $dados['finalidade'];?>
                        </option>
                        <option>
                            depositar
                        </option>
                        <option>
                            retirar
                        </option>
                        <option>
                            devolver
                        </option>
                       </select>
              </div>

              <div class="input-field col s12">
                Nome: <input type = "text" name="nome" id = "nome" value = "<?php echo $dados['nome'];?>">  
              </div>

              <div class="input-field col s12">
                Tipo do Documento: <select id = "sel_acao" name="tp_documento">
                        <option>
                            <?php echo $dados['tp_documento'];?>
                        </option>
                        <option>
                            OAB
                        </option>
                        <option>
                            CPF
                        </option>
                        <option>
                            RG
                        </option>
                        <option>
                            OUTRO
                        </option>
                       </select>

                       <input type = "text" name="numDocumento" id = "numDocumento" value = "<?php echo $dados['num_documento'];?>"> 
              </div>

              <div class="input-field col s12">
                Descrição do objeto: <input type = "text" name="descObjeto" id = "descObjeto" value = "<?php echo $dados['descricao'];?>">  
              </div

              <div class="input-field col s12">
                Data do cadastro: <input type = "date" name="data" id = "data" value = "<?php echo $dados['data'];?>">  
              </div

              <div class="input-field col s12">
                Hora do cadastro: <input type = "time" name="hora" id = "hora" value = "<?php echo $dados['hora'];?>">  
              </div

              <div class="input-field col s12">
                Funcionario: <input type = "text" name="funcionario" id = "funcionario" value = "<?php echo $dados['funcionario'];?>">  
              </div
              
              <div class="input-field col s12">
                Caixa/Letra: <input type = "text" name="caixa" id = "caixa" value = "<?php echo $dados['caixa'];?>">  
              </div
              
        </form>
        <button type = "submit" class = "btn" name="btn_editar" class = "btn">Atualizar</button>
    </div>      


    <?php
      include_once 'includes/footer.php';
    ?>
