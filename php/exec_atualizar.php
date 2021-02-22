<?php
  require_once('conectar.php');
  $cod = $_POST['cod'];
  $type = $_POST['type'];
  $mark = $_POST['mark'];
  $desc = $_POST['desc'];
  $value = $_POST['value'];
  $imagem = $_FILES['image']['tmp_name'];

  $value = str_replace(",",".",$value);

  $foto = '../fotos/'.$cod.'.jpg';

  $sql = "select * from cadastro where codigo=$cod"; 
    $res = mysqli_query($conexao,$sql) or die(mysqli_connect_error()); 
    $num = mysqli_num_rows($res);

    if ($num > 0) {
      $linha = mysqli_fetch_row($res);

      $currentCod = $linha[0];
      $currentType = $linha[1];
      $currentMark = $linha[2];
      $currentDesc = $linha[3];
      $currentValue = $linha[4];
      // $foto = '../fotos/'.$cod.'.jpg';

      if ($type == "") {
        $type = $currentType;
      }

      if ($mark == "") {
        $mark = $currentMark;
      }

      if ($desc == "") {
        $desc = $currentDesc;
      }

      if ($value == "") {
        $value = $currentValue;
      }
    }
    $sql="update cadastro set tipo='$type', marca='$mark',descricao='$desc', valor=$value where codigo=$cod";
    $res=mysqli_query($conexao,$sql) or die (mysqli_connect_error());

    if ($imagem != '')  {
      $imagem_type=$_FILES['image']['type'];
      if (($imagem_type != 'image/jpeg') && ($imagem_type != 'image/pjpeg') 
        && ($imagem_type != 'image/png') && ($imagem_type != 'image/x-png') 
        && ($imagem_type != 'image/gif')) {
        $msg= urlencode("Formato de arquivo inválido !");
        header("location: ../screens/UpdateProduct?retorno=$msg");
      } else  {
        $remove_foto='../fotos/'.$cod.'.jpg';
        unlink($remove_foto);
        $arquivo='../fotos/'.$cod.'.jpg';
        move_uploaded_file($imagem,$arquivo);
      } 
    }

    $msg= urlencode('Instrumento atualizado com sucesso !');
    header("location: ../screens/UpdateProduct?retorno=$msg");



?>   