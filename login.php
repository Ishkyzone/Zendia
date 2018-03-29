
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

	$existe="Select * from utilizador where User='".$us."' and Password='".$ps."'";
	$faz_existe=mysqli_query($ligaBD,$existe);
	$registos_user=mysqli_fetch_array($faz_existe);
	$num_registos=mysqli_num_rows($faz_existe);

	if($num_registos==1)
	{
	session_start();
	$_SESSION = array();
	$_SESSION["User"]=$_POST["user"];
	$_SESSION["nome"]=$registos_user["Nome"];
	
	$query="Select Tipo from utilizador where User='".$us."' and Password='".$ps."'";
	$faz_query=mysqli_query($ligaBD,$query);
	while($row = mysqli_fetch_array($faz_query)) {
	if($row['Tipo'] == "Cliente")
	{
		header('Location: _CLIENTE\index.html');
	}
	else
	{
		if($row['Tipo'] == "Vendedor")
		{
			header('Location: _VENDEDOR\index.html');
		}
		else{
		
		} 
	}
	
	//header('Location: index.html');
	//echo "Bem vindo(a) sua linda $_SESSION[nome]";
//	echo '<a href=index.html> Home</a>';
	}

	{ 
	echo "erro de autenticação";
	echo "<br>";
	echo '<a href="login.html">Voltar</a>';
	}
	}
 }
 ?>