<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','techlmr');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
function db(): mysqli {
  $c = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  $c->set_charset('utf8mb4');
  return $c;
}
session_start();
?>