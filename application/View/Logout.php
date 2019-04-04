<?php
session_start();
session_destroy();
echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
			location.href="?c=index";
    </script>
  </body>
</html>';
?>
