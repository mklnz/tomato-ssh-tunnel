<?php

$uri = "[ip]:1080";
$file = "proxy.pac";
$opening_tag = "function FindProxyForURL(url, host) {";
$closing_tag = "}";

if (isset($_POST['enable'])) {
  $body = "return 'SOCKS {$uri}';";

  echo 'Enabled';
}

if (isset($_POST['disable'])) {
  $body = "return 'DIRECT';";

  echo 'Disabled';
}

if (!empty($_POST)) {
  file_put_contents($file, $opening_tag.$body.$closing_tag);
}

?>

<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
  </head>
  <body>
    <form action="config.php" method="POST">
      <button name="enable">Enable</button>
      <button name="disable">Disable</button>
    </form>
  </body>
</html>
