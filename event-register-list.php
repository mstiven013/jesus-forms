<?php 
  include 'DBConection.class.php';
  $db = new DBConnection();
  $registers = $db->select('event_registers');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event register list</title>

  <style>
    table {
      border-collapse: collapse;
      border: 1px solid #ccc;
      width: 100%;
    }

    table thead th {
      background-color: #ccc;
      color: black;
      border: none;
      padding: 10px;
      text-align: center;
    }

    table tbody td {
      background-color: white;
      color: black;
      border: none;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>ID Formulario</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Correo</th>
      <th>Pais</th>
      <th>Ciudad</th>
      <th>Institucion</th>
      <th>Cargo</th>
      <th>Fecha de envio del mail</th>
      <th>Fecha de creación</th>
      <th></th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($registers as $register) : ?>
      <tr>
        <td><?php echo $register['id']; ?></td>
        <td><?php echo $register['form_id']; ?></td>
        <td><?php echo $register['firstname']; ?></td>
        <td><?php echo $register['lastname']; ?></td>
        <td><?php echo $register['email']; ?></td>
        <td><?php echo $register['country']; ?></td>
        <td><?php echo $register['city']; ?></td>
        <td><?php echo $register['institution']; ?></td>
        <td><?php echo $register['institution_position']; ?></td>
        <td><?php echo $register['email_sent_date']; ?></td>
        <td><?php echo $register['created_at']; ?></td>
        <td>
          <a
            href="generate-pdf.php?id=<?php echo $register['id']; ?>"
            target="_blank"
          >Generar certificado</a><br/>
          <a
            href="generate-pdf.php?id=<?php echo $register['id']; ?>"
            target="_blank"
          >Enviar certificado pago</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  
</body>
</html>