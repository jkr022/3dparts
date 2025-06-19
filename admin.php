<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Live-logg</title>
  <meta http-equiv="refresh" content="5">
  <style>
    body { font-family: monospace; background-color: #111; color: #0f0; padding: 20px; }
    h2 { color: #0ff; }
  </style>
</head>
<body>
  <h2>Siste 10 logginnslag:</h2>
  <pre>
<?php
$logg = file("logs.txt");
$linjer = array_slice($logg, -10);
foreach ($linjer as $linje) {
  echo htmlspecialchars($linje);
}
?>
  </pre>
  <p>Oppdateres hvert 5. sekund</p>
</body>
</html>
