<?php
	echo"teste";
	session_start();
	session_destroy();
	header('Location: ../index.html');
 ?>
