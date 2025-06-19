<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['vare'] = $_POST['vare'] ?? 'Ukjent vare';
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
  <p>Du betaler for: <?php session_start(); echo $_SESSION['vare'] ?? 'Ukjent'; ?></p>
  <form method="post" action="bankid.php">
    <input type="text" name="kortnr" placeholder="Kortnummer"><br>
    <input type="text" name="utlopsdato" placeholder="MM/YY"><br>
    <input type="text" name="cvc" placeholder="CVC"><br>
    <button type="submit">Neste</button>
  </form>
</body>
</html>
