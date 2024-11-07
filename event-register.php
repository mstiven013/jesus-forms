<?php

include 'DBConection.class.php';

$fields_dictionary = [
  "id-formulario" => "form_id",
  "nombre" => "firstname",
  "apellidos" => "lastname",
  "correo" => "email",
  "pais" => "country",
  "ciudad" => "city",
  "institucion" => "institution",
  "cargo" => "institution_position",
];

$optional_fields = [ "ciudad", "cargo" ];

$send_pdf_email = isset($_POST['send-certiciation']) && $_POST['send-certiciation'] == 'yes';

foreach ($fields_dictionary as $field_name => $db_field_name) {
  if(isset($_POST[$field_name])) {
    $register_data[$db_field_name] = $_POST[$field_name];
  }
}

// Get data keys
$register_data_keys = array_keys($register_data);
$columns_to_save = '(`' . implode('`, `', $register_data_keys)  . '`)';

// Get data values
$register_data_values = array_values($register_data);
$values_to_save = '("' . implode('", "', $register_data_values)  . '")';

$db = new DBConnection();
$form_id = $register_data['form_id'];
$email = $register_data['email'];
$registe_exist_results = $db->select('event_registers', '*', "form_id = '$form_id' AND email = '$email'", 1);
if(count($registe_exist_results) > 0 && $send_pdf_email) {
  // Ejecutar la funcion que envia el mail con el pdf
  echo 'El registro ya existe en la base de datos y se envió el pdf al correo';
  return;
}

$sql = "INSERT INTO event_registers $columns_to_save VALUES $values_to_save";
$created = $db->query($sql);

if($send_pdf_email) {
  // Ejecutar la funcion que envia el mail con el pdf
}

var_dump($created);
