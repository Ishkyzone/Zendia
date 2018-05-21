<?php

 if(isset($_POST['enviar']))
 {
	$us=$_POST["user"];
	$ps=$_POST["password"];
	include('ligaBD.php');
	$existe="Select * from utilizador where User ='".$us."'";
	$faz_existe=mysqli_query($ligaBD,$existe);
	$num_registos=mysqli_num_rows($faz_existe);
	if($num_registos==0)
	{
	echo "utilizador não registado ";
	echo "<a href='registo.html'>Registe-se aqui";
	exit;
	}
	$hash=password_hash($ps, PASSWORD_BCRYPT, 12);
	$existe="Select * from utilizador where User='".$us."' and Password='".$hash."'";
	$faz_existe=mysqli_query($ligaBD,$existe);
	$registos_user=mysqli_fetch_array($faz_existe);
	$num_registos=mysqli_num_rows($faz_existe);

	if($num_registos==1)
	{
	session_start();
	$_SESSION = array();
	$_SESSION["user"]=$_POST["user"];
	//$_SESSION["nome"]=$registos_user["Nome"];

	$query="Select Tipo from utilizador where User='".$us."' and Password='".$hash."'";
	$faz_query=mysqli_query($ligaBD,$query);
	while($row = mysqli_fetch_array($faz_query)) {
	if($row['Tipo'] == "Cliente")
	{
		header('Location: _CLIENTE\index.php');
	}
	else
	{
		if($row['Tipo'] == "Vendedor")
		{
			header('Location: _VENDEDOR\index.php');
		}
		} 
	}
	
	//header('Location: index.php');
	//echo "Bem vindo(a) sua linda $_SESSION[nome]";
//	echo '<a href=index.php> Home</a>';
	}

	{ 
	echo "erro de autenticação";
	echo "<br>";
	echo '<a href="login.html">Voltar</a>';
	}
 }