<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./styles.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <link rel="sortcut icon" href="../../assets/images/icon-musica.png" type="image/x-icon" />
  <title>Cadastrar</title>
</head>

<body>
  <div class="header-container">
    <img 
      src="../../assets/images/icon-musica.png"
      class="header-icon"
    />
    <div>
      <a class="header-button"><span class="header-span">Home</span></a>
      <a class="header-button"><span class="header-span">Consultar</span></a>
      <a href="../CreateProduct" class="header-button"><span class="header-span">Cadastrar</span></a>
    </div>
  </div>

  <div class="content-container">
    <div class="form-container">
      <form 
        name="dados" 
        id="form"
        action="../../php/exec_cadastrar.php" 
        method="POST" 
        enctype="multipart/form-data"
      >
        <div class="container-label">
          <span>Tipo</span>
        </div>
        <input type="text" name="type" />  
        <div class="container-label">
          <span>Marca</span>
        </div>
        <input type="text" name="mark" />   
        <div class="container-label">
          <span>Descrição</span>
        </div>
        <input type="text" name="desc" />   
        <div class="container-label">
          <span>Valor</span>
        </div>
        <input type="number" name="value" step="0.01"/>  
        <div class="container-label">
          <span>Foto</span>
        </div>
        <div class="container-input-file">
          <input type="file" name="image" />
        </div>
        <a onclick="document.getElementById('form').submit()" class="button">Salvar</a>
      </form>
    </div>
  </div>
</body>

</html>