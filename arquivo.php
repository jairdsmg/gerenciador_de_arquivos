<?php
include 'includes/header.php';
?>

    <div id = "dados"><br/>
        <fieldset> 
            <legend>Dados</legend>
              Processo:<input type ="text" id = "num_proc_cad" /><br/>
              Ação:<select id = "sel_acao">
                        <option>
                            Selecione
                        </option>
                        <option>
                            Depositar
                        </option>
                        <option>
                            Retirar
                        </option>
                       </select><br/>
              Nome:<input type ="text" id = "nome" placeholder = "Nome do retirante ou depositante..."/><br/>
              Tipo de Documento:<select id = "sel_doc">
                                        <option>
                                            OAB
                                        </option>
                                        <option>
                                            RG
                                        </option>
                                        <option>
                                            CPF
                                        </option>
                                    </select>
                                    <input type = "text" id = num_doc" /><br/><br/>
                                    
               Descrição do objeto:<textarea cols="50" rows="8"  id = "id_obj" placeholder = "cd, pendrive, cheque..." /></textarea><br />
              
        </fieldset> <br/>
        <input type ="button" id = "btn_salvar" value = "Salvar" onclick = "salvar_dados()" />
        <input type = "button" id = "btn_limpar_dados" value = "Limpar" onclick = "limpar_dados()"/> 
    </div>

<script src = "arquivo.js"></script>

<?php
include_once 'includes/footer.php';
?>