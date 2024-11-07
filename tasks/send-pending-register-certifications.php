<?php

$db = new DBConnection();
$registers = $db->select('event_registers', '*', "email_sent_date IS NULL AND form_certification_autoamtic = 'yes'", 10);

foreach($registers as $register) {
  // Ejecutar funcion que envia el pdf por correo de cada registro
}