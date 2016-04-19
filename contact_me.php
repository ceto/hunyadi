<?php
if($_POST) {
  $to_Email = "szabogabi@gmail.com";
  $subject = 'Webes ajánlatkérés - Hunyadi.hu';

  if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

    $output = json_encode(
    array(
      'type'=>'error',
      'text' => 'Request must come from Ajax'
    ));

    die($output);
  }

  if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userTel"])) {
    $output = json_encode(array('type'=>'error', 'text' => 'Hiányzó kötelező mező'));
    die($output);
  }
  $user_Name = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
  $user_Email = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
  $user_Tel = filter_var($_POST["userTel"], FILTER_SANITIZE_STRING);

  //$user_Message = str_replace("\&#39;", "'", $user_Message);
  //$user_Message = str_replace("&#39;", "'", $user_Message);

  if(strlen($user_Name)<4) {
    $output = json_encode(array('type'=>'error', 'text' => 'Teljes név megadása kötelező'));
    die($output);
  }
  if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
    $output = json_encode(array('type'=>'error', 'text' => 'Érvénytelen e-mail cím'));
    die($output);
  }
  if(strlen($user_Tel)<6) {
    $output = json_encode(array('type'=>'error', 'text' => 'Telefonszám megadása kötelező'));
    die($output);
  }


  $headers = 'From: '.$user_Email.'' . "\r\n" .
  'Reply-To: '.$user_Email.'' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $sentMail = @mail($to_Email, $subject, $user_Name . "\r\n\n"  .'-- '.$user_Email. "\r\n" .'-- '.$user_Tel, $headers);

  if(!$sentMail) {
    $output = json_encode(array('type'=>'error', 'text' => 'Üzenet küldése nem sikerült. Vegye fel velünk a kapcsolatot e-mailben vagy telefonon!'));
    die($output);
  } else {

    $resp_headers = 'From: '.$to_Email.'' . "\r\n" .
    'Reply-To: '.$to_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $resp_text="Tisztelt, ".$user_Name."\r\n\n".
    "Köszönjük megtisztelő ajánlatkérését! Levelét továbbítottuk az illetékes kollégánknak, aki hamarosan felveszi Önnel a kapcsolatot."."\r\n\n".
    "Tisztelettel"."\r\n"."Hunyadi Kft."."\r\n"."1222 Budapest, Gyár u. 14."."\r\n"."Tel: +36 (1) 297-2020";
    @mail($user_Email, $subject, $resp_text, $resp_headers);
    $output = json_encode(array('type'=>'message', 'text' => 'Tisztelt '.$user_Name .'! Köszönjük. Ajánlatkérését továbbítottuk az illetékes kollégánknak, aki hamarosan felveszi Önnel a kapcsolatot.'));
    die($output);
  }
}
?>