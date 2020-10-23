<?php // phpcs:disable
if ( $_SERVER['HTTPS'] != 'on' ) {
  header( 'HTTP/1.1 301 Moved Permanently' );
  header( 'Location: https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] );
  exit();
}

define( 'MAIL_HOST', $_SERVER['SERVER_NAME'] );

function setNewPassword( $strMailbox, $strPassword ) {
  $strPassword = utf8_decode( $strPassword );
  $strCommand  = 'vpasswd ' . escapeshellarg( $strMailbox );

  $descriptorspec = array(
    0 => array( 'pipe', 'r' ),
  );

  $process = proc_open( $strCommand, $descriptorspec, $pipes, null, null );

  if ( is_resource( $process ) ) {
    fwrite( $pipes[0], $strPassword );
    fclose( $pipes[0] );
    $return_value = proc_close( $process );
    if ( $return_value == 0 ) {
      return true;
    }
  }

  return false;
}

function outputValidateNotice( $noError ) {
  $html = '<div class="alert alert-' . ( $noError ? 'success' : 'danger' ) . '" role="alert">';

  if ( $noError ) {
    $html .= "Das Passwort wurde erfolgreich geändert. Bitte an allen genutzten Stellen anpassen.";
  } else {
    $html .= "Das Passwort konnte nicht geändert werden. Bitte die Eingabe vom alten Passowort prüfen.";
  }

  $html .= '</div>';

  return $html;
}

$gotData = (bool) $_GET['gotData'];
$validateNotice = "";
$inputValues = [
  "mail"   => "",
  "oldpw"  => "",
  "newpw"  => "",
  "newpw2" => ""
];

if ( isset( $_GET['gotData'] ) && $gotData === true ) {
  $mail     = (string) $_POST['mail'];
  $password = (string) $_POST['oldpw'];
  $newpw    = (string) $_POST['newpw'];
  $newpw2   = (string) $_POST['newpw2'];

  
  if ( @imap_open( '{localhost:993/imap/ssl/novalidate-cert}', $mail . '@' . MAIL_HOST, $password ) != false ) {
    setNewPassword( $mail, $newpw );
    $validateNotice = outputValidateNotice( true );
    $inputValues = ["mail" => "", "oldpw" => "", "newpw" => "", "newpw2" => ""];
  } else {
    $validateNotice = outputValidateNotice( false );
    $inputValues = ["mail" => $mail, "oldpw" => $password, "newpw" => $newpw, "newpw2" => $newpw2];
  }
}

require_once( "view.inc.php" );
