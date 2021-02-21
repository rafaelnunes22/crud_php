<?php
require_once('conectar.php');

$cod = $_POST['cod'];


$imagem = $_FILES['image']['tmp_name'];


$sql= "delete from cadastro where codigo=$cod";

mysqli_query($conexao,$sql) or die(mysqli_connect_error());

$remove_foto='../fotos/'.$cod.'.jpg';
unlink($remove_foto);

$msg=urlencode('Produto removido com sucesso!');
header ("location: ../screens/RemoveProduct?retorno=$msg");

?>   