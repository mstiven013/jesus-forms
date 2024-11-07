<?php

if(!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: event-register.php');
}

include 'DBConection.class.php';
$db = new DBConnection();
$register_id = $_GET['id'];
$results = $db->select('event_registers', '*', "id = '$register_id'", 1);
$register = count($results) > 0 ? $results[0] : null;

if(!isset($register)) {
  echo "El registro con ID $register_id no existe";
  return;
}

// Enviar el pdf