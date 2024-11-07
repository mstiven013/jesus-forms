<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formularios Jesus</title>
</head>
<body>
  <form action="event-register.php" method="POST">
    <div>
      <label for="nombre">nombre</label>
      <input type="text" name="nombre" id="nombre">
    </div>
    <div>
      <label for="apellidos">apellidos</label>
      <input type="text" name="apellidos" id="apellidos">
    </div>
    <div>
      <label for="correo">correo</label>
      <input type="email" name="correo" id="correo">
    </div>
    <div>
      <label for="pais">pais</label>
      <input type="text" name="pais" id="pais">
    </div>
    <div>
      <label for="ciudad">ciudad</label>
      <input type="text" name="ciudad" id="ciudad">
    </div>
    <div>
      <label for="institucion">institucion</label>
      <input type="text" name="institucion" id="institucion">
    </div>
    <div>
      <label for="cargo">cargo</label>
      <input type="text" name="cargo" id="cargo">
    </div>
    <div>
      <input type="hidden" name="id-formulario" value="event_test_02">
      <input type="hidden" name="send-certiciation" value="yes">
      <button type="submit">Enviar formulario</button>
    </div>
  </form>
</body>
</html>