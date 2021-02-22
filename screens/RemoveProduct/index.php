<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./styles.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <link rel="sortcut icon" href="../../assets/images/icon-musica.png" type="image/x-icon" />
  <title>Remover</title>
</head>

<body>
  <div class="header-container">
    <img 
      src="../../assets/images/icon-musica.png"
      class="header-icon"
    />
    <div>
      <a href="../Home" class="header-button"><span class="header-span">Início</span></a>
      <a href="../CreateProduct" class="header-button"><span class="header-span">Cadastrar</span></a>
      <a href="../SearchProducts" class="header-button"><span class="header-span">Consultar</span></a>
      <a href="../UpdateProduct" class="header-button"><span class="header-span">Atualizar</span></a>
      <a href="../RemoveProduct" class="header-button"><span class="header-span">Remover</span></a>
    </div>
  </div>

  <div class="content-container">
  
    <form class="form" name="dados" action="../../php/exec_remover.php" method="POST" enctype="multipart/form-data">
    <h1 class="title">Digite o código do instrumento a ser removido!</h1>
      <input type="text" name="cod" placeholder="Digite o código..." /> 
      <button class="button">Remover</button>
    </form>
    <div class="container-cards">
      <?php
          if (isset ($_GET['retorno'])) {
            $msg = $_GET['retorno'];
            echo "<h1 class='message'>$msg</h1>";
          }
        ?>
    </div>

  </div>


</body>

</html>