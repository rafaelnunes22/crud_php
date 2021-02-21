<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./styles.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <link rel="sortcut icon" href="../../assets/images/icon-musica.png" type="image/x-icon" />
  <title>Buscar</title>
</head>

<body>
  <div class="header-container">
    <img 
      src="../../assets/images/icon-musica.png"
      class="header-icon"
    />
    <div>
      <a href="../Home" class="header-button"><span class="header-span">Home</span></a>
      <a href="../CreateProduct" class="header-button"><span class="header-span">Cadastrar</span></a>
      <a href="../SearchProducts" class="header-button"><span class="header-span">Consultar</span></a>
      <a href="../RemoveProduct" class="header-button"><span class="header-span">Remover</span></a>
    </div>
  </div>

  <div class="content-container">
    <form class="form" name="dados" action="index.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="cod" placeholder="Código" /> 
      <input type="text" name="mark" placeholder="Marca" /> 
      <button class="button">Buscar</button>
    </form>
    <div class="container-cards">
      <?php
        ini_set( 'display_errors', 0 );
        require_once('../../php/conectar.php');

        $mark = $_POST['mark'];
        $cod = $_POST['cod'];

        if($mark === "" && $cod === ""){
            $sql = "select * from cadastro"; 
            $res = mysqli_query($conexao,$sql) or die(mysqli_connect_error()); 
            $num = mysqli_num_rows($res);

          if ($num > 0) {
            $linha = mysqli_fetch_row($res);
            $cod = $linha[0];
            $type = $linha[1];
            $mark = $linha[2];
            $description = $linha[3];
            $price = $linha[4];
            $foto = '../fotos/'.$cod.'.jpg';
            $res=mysqli_query($conexao,$sql) or die (mysqli_connect_error());
            $num=mysqli_num_rows($res);
            
          while ($linha = mysqli_fetch_row($res)) {
              $linha[4] = str_replace(".",",",$linha[4]);
              $foto = '../fotos/'.$linha[0].'.jpg';
            echo  "<div class='card-body'>"; 
            echo  "<img class='card-image' src='../../fotos/$foto' />";   
            echo  "<div class='body-desc'>"; 
              echo  "<h2 class='card-desc' >Código: <h4 class='card-desc-content'> $linha[0] </h4></h2>";
            echo  "</div>"; 
            echo  "<div class='body-desc'>"; 
              echo  "<h2 class='card-desc' >Tipo: <h4 class='card-desc-content'>  $linha[1] </h4></h2>";
            echo  "</div>"; 
            echo  "<div class='body-desc'>"; 
              echo  "<h2 class='card-desc' >Marca: <h4 class='card-desc-content'>  $linha[2] </h4></h2>";
            echo  "</div>"; 
            echo  "<div class='body-desc'>"; 
              echo  "<h2 class='card-desc' >Preço: <h4 class='card-desc-content'>  $linha[4] </h4></h2>";
            echo  "</div>"; 
              echo  "<h2 class='card-desc' >Descrição: <h4 class='card-desc-content-desc'>  $linha[3] </h4></h2>";
            
            echo  "</div>";   
            }
          } else {
              echo  "<h2 class='error-message'>Nada cadastrado</h2>";
          }

        } else if ($mark != "" && $cod === "") {
          $sql = "select * from cadastro where marca='$mark'"; 
          $res = mysqli_query($conexao,$sql) or die(mysqli_connect_error()); 
          $num = mysqli_num_rows($res);

          if ($num > 0) {
            $linha = mysqli_fetch_row($res);
            $cod = $linha[0];
            $type = $linha[1];
            $mark = $linha[2];
            $description = $linha[3];
            $price = $linha[4];
            $foto = '../fotos/'.$cod.'.jpg';
            $res=mysqli_query($conexao,$sql) or die (mysqli_connect_error());
            $num=mysqli_num_rows($res);
            
            while ($linha = mysqli_fetch_row($res)) {
                $linha[4] = str_replace(".",",",$linha[4]);
                $foto = '../fotos/'.$linha[0].'.jpg';
              echo  "<div class='card-body'>"; 
              echo  "<img class='card-image' src='../../fotos/$foto' />";   
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Código: <h4 class='card-desc-content'> $linha[0] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Tipo: <h4 class='card-desc-content'>  $linha[1] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Marca: <h4 class='card-desc-content'>  $linha[2] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Preço: <h4 class='card-desc-content'>  $linha[4] </h4></h2>";
              echo  "</div>"; 
                echo  "<h2 class='card-desc' >Descrição: <h4 class='card-desc-content-desc'>  $linha[3] </h4></h2>";
              echo  "</div>";   
            }
          } else {
            echo  "<h2 class='error-message'>Nada cadastrado</h2>";
          }
        } else if ($mark == "" && $cod != "") {
          $sql = "select * from cadastro where codigo='$cod'"; 
          $res = mysqli_query($conexao,$sql) or die(mysqli_connect_error()); 
          $num = mysqli_num_rows($res);

          if ($num > 0) {
            $linha = mysqli_fetch_row($res);
            $cod = $linha[0];
            $type = $linha[1];
            $mark = $linha[2];
            $description = $linha[3];
            $price = $linha[4];
            $foto = '../fotos/'.$cod.'.jpg';
            $res=mysqli_query($conexao,$sql) or die (mysqli_connect_error());
            $num=mysqli_num_rows($res);
            
            while ($linha = mysqli_fetch_row($res)) {
                $linha[4] = str_replace(".",",",$linha[4]);
                $foto = '../fotos/'.$linha[0].'.jpg';
              echo  "<div class='card-body'>"; 
              echo  "<img class='card-image' src='../../fotos/$foto' />";   
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Código: <h4 class='card-desc-content'> $linha[0] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Tipo: <h4 class='card-desc-content'>  $linha[1] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Marca: <h4 class='card-desc-content'>  $linha[2] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Preço: <h4 class='card-desc-content'>  $linha[4] </h4></h2>";
              echo  "</div>"; 
                echo  "<h2 class='card-desc' >Descrição: <h4 class='card-desc-content-desc'>  $linha[3] </h4></h2>";
              echo  "</div>";   
            }
          } else {
            echo  "<h2 class='error-message'>Nada cadastrado</h2>";
          }
        } else if ($mark != "" && $cod != "") {
          $sql = "select * from cadastro where marca='$mark' and codigo='$cod'"; 
          $res = mysqli_query($conexao,$sql) or die(mysqli_connect_error()); 
          $num = mysqli_num_rows($res);

          if ($num > 0) {
            $linha = mysqli_fetch_row($res);
            $cod = $linha[0];
            $type = $linha[1];
            $mark = $linha[2];
            $description = $linha[3];
            $price = $linha[4];
            $foto = '../fotos/'.$cod.'.jpg';
            $res=mysqli_query($conexao,$sql) or die (mysqli_connect_error());
            $num=mysqli_num_rows($res);
            while ($linha = mysqli_fetch_row($res)) {
                $linha[4] = str_replace(".",",",$linha[4]);
                $foto = '../fotos/'.$linha[0].'.jpg';
              echo  "<div class='card-body'>"; 
              echo  "<img class='card-image' src='../../fotos/$foto' />";   
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Código: <h4 class='card-desc-content'> $linha[0] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Tipo: <h4 class='card-desc-content'>  $linha[1] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Marca: <h4 class='card-desc-content'>  $linha[2] </h4></h2>";
              echo  "</div>"; 
              echo  "<div class='body-desc'>"; 
                echo  "<h2 class='card-desc' >Preço: <h4 class='card-desc-content'>  $linha[4] </h4></h2>";
              echo  "</div>"; 
                echo  "<h2 class='card-desc' >Descrição: <h4 class='card-desc-content-desc'>  $linha[3] </h4></h2>";
              echo  "</div>";   
            }
          } else {
              echo  "<h2 class='error-message'>Nada cadastrado</h2>";
          }
        }
      ?>
    </div>
  </div>


</body>

</html>