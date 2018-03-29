
<?php
 if(isset($_POST['enviar']))
 {
	$us=$_POST["user"];
	$ps=$_POST["password"];
	include('ligaBD.php');
	$existe="Select * from user where user='".$us."'";
	$faz_existe=mysqli_query($ligaBD,$existe);
	$num_registos=mysqli_num_rows($faz_existe);
	if($num_registos==0)
	{
	echo "utilizador não registado ";
	echo "<a href='registo.php'>Registe-se aqui";
	exit;
	}

	$existe="Select * from user where user='".$us."' and password='".$ps."'";
	$faz_existe=mysqli_query($ligaBD,$existe);
	$registos_user=mysqli_fetch_array($faz_existe);
	$num_registos=mysqli_num_rows($faz_existe);

	if($num_registos==1)
	{
	session_start();
	$_SESSION = array();
	$_SESSION["user"]=$_POST["user"];
	$_SESSION["nome"]=$registos_user["nome"];
	$_SESSION["permit"]=$registos_user['permit'];
	$_SESSION["ID"]=$registos_user['ID'];
	echo "bem vindo(a) $_SESSION[nome]";
	}

	else
	{ 
	echo "erro de autenticação";
	echo "<br>";
	echo '<a href="login.php">Voltar</a>';
	}
 
 
 
 }
 ?>