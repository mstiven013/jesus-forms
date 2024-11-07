<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF del registro # <?php echo $register['id']; ?></title>

  <style>
    @page {
      margin: 0px;
    }

    .certificado {
      background-color: red;
      height: 100%;
      width: 100%;
    }
  </style>
</head>
<body>

  <div class="certificado">
    <h1>¡Hola, <?php echo $register['firstname'] . ' ' . $register['lastname']; ?>!</h1>
    <img src="https://placehold.co/600x400" alt="" />
  </div>
</body>
</html>