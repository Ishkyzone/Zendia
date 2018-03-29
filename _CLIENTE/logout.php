<?php
	echo"teste";
	session_start();
	session_destroy();
	header('Location: http://127.0.0.1:8080/projects/pap/index.html');
 ?>
