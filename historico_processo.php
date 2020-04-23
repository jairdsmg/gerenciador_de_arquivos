<?php
  include 'includes/header.php';
?>
  
  <h3 class="light">Histórico de Objetos cadastrados</h3>
   <form name="Cadastro" action="res_historico.php" method = "post">
      <div id = "pesq">
        Número do Processo: <input type = "text" id = "processo" name="processo" placeholder = "Número do Processo" onkeypress="mascara(this, '#######-##.####.#.##.####')" maxlength="25"/>
        <input type="submit" name="consulta-completa" value="Pesquisar" id = "btn_historico" class = "btn" value= "Pesquisar" onclick = "pesquisar()"> 
      </div> 
      
   </form>
     

  <script src = "arquivo.js"></script>

  <?php
      include_once 'includes/footer.php';
  ?>