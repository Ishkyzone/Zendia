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
        echo "Utilizador não encontrado na nossa base de dados.";
        echo "<br>";
        echo '<a href="login.html">Voltar</a>';
        echo "<br>";
	echo "<a href='registo.html'>Registe-se aqui";
	exit;
	}
     $options = [
         'cost' => 12
     ];
	$hash=password_hash($ps, PASSWORD_BCRYPT,  $options);


	$existe="Select Password from utilizador where User='".$us."'";
	$faz_existe=mysqli_query($ligaBD,$existe);
	$registo=mysqli_fetch_row($faz_existe);
	$num_registos=mysqli_num_rows($faz_existe);


     /*$existe="Select * from utilizador where User='".$us."' and Password='".$hash."'";
     $faz_existe=mysqli_query($ligaBD,$existe);
     $registos_user=mysqli_fetch_array($faz_existe);
     $num_registos=mysqli_num_rows($faz_existe);*/

	if($num_registos==1)
	{
        if (password_verify($ps, $registo[0])) {
            session_start();
            $_SESSION = array();
            $_SESSION["user"]=$_POST["user"];
            //$_SESSION["nome"]=$registos_user["Nome"];

            $query="Select Tipo from utilizador where User='".$us."' and Password='".$registo[0]."'";
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
        }else{
            echo "Palavra-passe errada.";
            echo "<br>";
            echo '<a href="login.html">Voltar</a>';
        }
        } else {
        echo "Utilizador não encontrado na nossa base de dados.";
        echo "<br>";
        echo '<a href="login.html">Voltar</a>';
        }



	{ 

	}
 }