<?php
require_once('conectar.php');
//pegamos os dados que vieram do formulario no vetor $_POST 
$type = $_POST['type'];
$mark = $_POST['mark'];
$desc = $_POST['desc'];
$value = $_POST['value'];

//pegar o nome do arquivo da foto do cliente
$imagem = $_FILES['image']['tmp_name'];

//montar o comando SQL que vai gravar os dados na tabela cadastro
$sql= "insert into cadastro (
  tipo, 
  marca, 
  descricao, 
  valor) 
  values ('
  $type, 
  $mark, 
  $desc, 
  $value,
  ')";
//executar/gravar os dados na tabela
mysqli_query($conexao,$sql) or die(mysqli_connect_error());


//rotina php para UPLOAD da foto do cliente
//pegar o ultimo código gerado pelo mySQL
$ultimocod=mysqli_insert_id($conexao);
if ($imagem != '')
{
//testar se a imagem tem formato válido jpg
$imagem_type=$_FILES['image']['type'];
if (($imagem_type != 'image/jpeg') && ($imagem_type != 'image/pjpeg') 
    && ($imagem_type != 'image/png') && ($imagem_type != 'image/x-png') 
        && ($imagem_type != 'image/gif')) 
{
echo "Formato de arquivo inválido !";
} 
else 
{
//modificar o nome do arquivo para codigo+extenção .jpg
$arquivo='../fotos/'.$ultimocod.'.jpg';

//faz o upLoad da foto
move_uploaded_file($imagem,$arquivo);
} //fecha else linha 29
//voltar para principal.php e passsar parâmetro por GET com mensagem de: 
// Cliente cadastrado com sucesso !
$msg= urlencode('Produto cadastrado com sucesso !');
header("location: ../screens/Home/?retorno=$msg");
}
//fecha if linha 21
else 
{ 
echo "<br /> Imagem não enviada"; 
} 
?>   