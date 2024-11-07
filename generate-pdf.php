<?php 
  // include autoloader and mpdf
  require 'vendor/autoload.php';
  use Mpdf\Mpdf;

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

  $form_id = $register['form_id'];
  
  if(!file_exists("templates/$form_id.php")) {
    echo "No existe una plantilla PDF para los formularios $form_id";
    return;
  }

  ob_start();
  include "templates/$form_id.php";
  $html = ob_get_clean();

  try {
    $mpdf = new Mpdf([ 'format' => 'A4-L' ]);
    // Set a simple Footer including the page number
    $mpdf->WriteHTML($html);
    $current_date = date('d-m-Y');
    $mpdf->Output("Certificado asitencia $form_id", "I");
  } catch(\Mpdf\MpdfException $e) {
    var_dump($e);
    echo $e->getMessage();
  }
?>