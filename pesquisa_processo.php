<?php
  include 'includes/header.php';
?>
  
  <h3 class="light">Pesquisa de Objetos cadastrados</h3>
   <form name="Cadastro" action="consulta.php" method="POST">
      <div>
        Número do Processo: <input type = "text" name="processo" placeholder = "Número do Processo" onkeypress="mascara(this, '#######-##.####.#.##.####')" maxlength="25"/>
        <input type="submit" name="consulta-completa" value="Pesquisar" id = "btn_pesquisar" class = "btn" value= "Pesquisar" onclick = "pesquisar()"> 
        <input type = "button" id = "btn_limpar" class = "btn" value= "Limpar" onclick = "limpar()" /> 
      </div> 
   </form>
  <script src = "arquivo.js"></script>

  <?php
      include_once 'includes/footer.php';
  ?>