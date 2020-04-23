<?php
   include 'includes/header.php';
?>

    <div id = "dado" class="row"><br/>
      <div class="col s12 m6 push-m3">
        <h3 class="light">Cadastrar objeto</h3>
        <form action = "create1.php" method = "POST" >
              <div>
                Número do Processo: <input type = "text" name="processo" id = "processo" placeholder = "Número do Processo" onkeypress="mascara(this, '#######-##.####.#.##.####')" maxlength="25" required/>  
              </div>

              <div class="input-field col s12">
                Finalidade: <select id = "sel_acao" name="finalidade" required>
                               <option>
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
                 Nome: <input type = "text" name="nome" id = "nome" placeholder = "Nome do depositante/retirante" required/>  
              </div>

              <div class="input-field col s12">
                Tipo do Documento: <select id = "sel_acao" name="tp_documento" required>
                        <option>
                            
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
                       <input type = "text" name="numDocumento" id = "numDocumento" placeholder = "Número do Documento" required/> 
               </div>

              <div class="input-field col s12">
                Descrição do objeto: <input type = "text" name="descObjeto" id = "descObjeto" placeholder = "Descrição do objeto" required/>  
              </div
              
        </form>
        <button type = "submit" class = "btn" name="btn_cadastrar">Cadastrar</button>
    </div>      


   <?php
    include_once 'includes/footer.php';
   ?>
