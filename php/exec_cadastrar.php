<?php
require_once('conectar.php');

$type = $_POST['type'];
$mark = $_POST['mark'];
$desc = $_POST['desc'];
$value = $_POST['value'];

$value = str_replace(",",".",$value);

$imagem = $_FILES['image']['tmp_name'];

$value = str_replace(",",".",$value);

$sql= "insert into cadastro (tipo, marca, descricao, valor) values ('$type','$mark','$desc',$value)";

mysqli_query($conexao,$sql) or die(mysqli_connect_error());

$ultimocod=mysqli_insert_id($conexao);

if ($imagem != '')  {
  $imagem_type=$_FILES['image']['type'];
  if (($imagem_type != 'image/jpeg') && ($imagem_type != 'image/pjpeg') 
    && ($imagem_type != 'image/png') && ($imagem_type != 'image/x-png') 
    && ($imagem_type != 'image/gif')) {
    $msg= urlencode("Formato de arquivo inválido !");
    header("location: ../screens/CreateProduct?retorno=$msg");
  } else  {
    $arquivo='../fotos/'.$ultimocod.'.jpg';
    move_uploaded_file($imagem,$arquivo);
  } 
    $msg= urlencode('Instrumento cadastrado com sucesso !');
    header("location: ../screens/CreateProduct?retorno=$msg");
}else{ 
  $msg= urlencode('Imagem não enviada!');
    header("location: ../screens/CreateProduct?retorno=$msg");
} 
?>   