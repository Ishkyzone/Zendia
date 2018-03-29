<?php
Session_start();
if(!isset($_SESSION["User"]))
{ 
echo "<br>";
echo "<br>";
echo "Não tem sessão ativa. Faça login<br>";
 
  exit;
}
?>