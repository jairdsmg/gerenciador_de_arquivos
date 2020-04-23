<?php
require_once 'conexao.php';

if(isset($_POST['btn_cadastrar'])):
$processo = mysqli_escape_string($connect,$_POST['processo']);
$finalidade = mysqli_escape_string($connect,$_POST['finalidade']);
$nome = mysqli_escape_string($connect,$_POST['nome']);
$tp_documento = mysqli_escape_string($connect,$_POST['tp_documento']);
$num_documento = mysqli_escape_string($connect,$_POST['numDocumento']);
$descricao = mysqli_escape_string($connect,$_POST['descObjeto']);
$usuario = get_current_user();




$sql = "INSERT INTO arquivo (num_processo, finalidade, nome,tp_documento, num_documento, descricao,data, hora, funcionario) VALUES('$processo','$finalidade','$nome','$tp_documento','$num_documento','$descricao', current_date(), current_time(), '$usuario')";

    if(mysqli_query($connect, $sql)):?>


<?php
include '../includes/header.php';
?>
 <Link rel = "stylesheet" type = "text/css" href = "../arquivo.css" />  
       <h1>Dados cadastrados com sucesso!</h1>
       <hr></hr>
       <input type = "button" id = "btn_certificar" value= "Certificar" onclick = "certificar()"/>
       
       <a href ="adicionar.php">NOVO CADASTRO</a><br/><br/>
       <div id = "certidao">
       <textarea name="certidao" id = "area_certidao">Certifico e dou fé que<?php $certidao. depositou ?></textarea>
       </div>

<?php
include_once '../includes/footer.php';
?>




 <?php
        /*$certidao = "certifico e dou fé que".$nome."depositou em cartorio.";
        header('Location: ../res_cadastro.php?sucesso');*/
    else:
        header('Location: ../adicionar.php?erro');
    endif;

endif; 

?>
