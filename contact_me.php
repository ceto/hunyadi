
<?php
  define( 'WP_USE_THEMES', FALSE );
  require( '../../../wp-load.php' );

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
  $user_Message = filter_var($_POST["userMsg"], FILTER_SANITIZE_STRING);
  $user_Area = filter_var($_POST["userArea"], FILTER_SANITIZE_STRING);

  $user_Message = str_replace("\&#39;", "'", $user_Message);
  $user_Message = str_replace("&#39;", "'", $user_Message);

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


  /**** Szakterület szerinti email címzés ****/
  switch ($user_Area) {
    case 'Fázisjavítás':
      $to_Email='ak.fazisjavitas@hunyadi.hu';
      break;
    case 'Energetika':
      $to_Email='ak.energetika@hunyadi.hu';
      break;
    case 'Mérések':
      $to_Email='ak.meresek@hunyadi.hu';
      break;
    case 'Janitza':
      $to_Email='ak.janitza@hunyadi.hu';
      break;
    case 'Berendezésgyártás':
      $to_Email='ak.bergyartas@hunyadi.hu';
      break;
    case 'Kivitelezés és karbantartás':
      $to_Email='ak.kiv.karb@hunyadi.hu';
      break;
    default:
      $to_Email='szabogabi@gmail.com';
      break;
  }

  $headers = 'From: '.$user_Email.'' . "\r\n" .
  'Reply-To: '.$user_Email.'' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $sentMail = @wp_mail($to_Email, $subject, 'Név: '.$user_Name. "\r\n". 'E-mail: '.$user_Email. "\r\n" .'Telefon: '.$user_Tel . "\r\n\n"  .'Terület: '.$user_Area. "\r\n" .'-- '.$user_Message, $headers);

  if(!$sentMail) {
    $output = json_encode(array('type'=>'error', 'text' => 'Üzenet küldése nem sikerült. Vegye fel velünk a kapcsolatot e-mailben vagy telefonon!'));
    die($output);
  } else {

    $resp_headers = 'From: '.$to_Email.'' . "\r\n" .
    'Reply-To: '.$to_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $resp_text="Tisztelt ".$user_Name."\r\n\n".
    "Köszönjük megtisztelő ajánlatkérését! Levelét továbbítottuk az illetékes kollégánknak, aki hamarosan felveszi Önnel a kapcsolatot."."\r\n\n".
    "Tisztelettel"."\r\n"."Hunyadi Kft."."\r\n"."1222 Budapest, Gyár u. 14."."\r\n"."Tel: +36 (1) 297-2020";
    @wp_mail($user_Email, $subject, $resp_text, $resp_headers);
    $output = json_encode(array('type'=>'message', 'text' => 'Tisztelt '.$user_Name .'! Köszönjük. Ajánlatkérését továbbítottuk az illetékes kollégánknak, aki hamarosan felveszi Önnel a kapcsolatot.'));
    die($output);
  }
}

?>