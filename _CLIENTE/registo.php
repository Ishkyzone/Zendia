
<?php
//** insere os dados na tabela qundo o botão 
 if(isset($_POST['enviar']))
{
		$nome=$_POST["nome"];
		$datanasc=$_POST["datanascimento"];
		$mail=$_POST["email"];
		$us=$_POST["user"];
		$ps=$_POST["password"];
		$ps1=$_POST["password1"];

		if ($_POST["password"]<>$_POST["password1"])
		{
		?>
		<center>
		 <div  style="width:400px">
			<h1>A password não coincide</h1>
		 <p><button  type="button"><a style="text-decoration: none" href="registo.php">Alterar</button></p>
		</div>
		<?php
		exit;
		}
		include('ligaBD.php');
		$existe="select * from utilizador where User ='".$us."'";
		$faz_existe=mysqli_query($ligaBD, $existe);
		$jaexiste=mysqli_num_rows($faz_existe);

		if ($jaexiste==0)
		{
			$sql="INSERT INTO utilizador (Nome, Datanasc, Email, User, Password, tipo) VALUES('$nome','$datanasc','$mail','$us','$ps', '0')";
			if (!mysqli_query($ligaBD,$sql))
			{
			die('Erro: '. mysqli_error($ligaBD));
			}
			?>
			<center>
			<br>
		 <div  style="width:400px">
			<h1>Utilizador criado</h1>
			 <p>      
			  <button   type="button"><a style="text-decoration: none" href="login.php">Log In</button>
				<button   type="button"><a style="text-decoration: none" href="registo.php">Novo registo</button>    
			  </p>
			  <br>
			</div>

			<?php
			mysqli_close($ligaBD);
		}
		else
		{ 
			?>
			<center>
			<br>
			 <div  style="width:400px">
			<h1>Utilizador já existe</h1>
			 <p> <button ><a style="text-decoration: none" href="login.php">Login</button></p>
			  <br>
			</div>
			<?php
		}
}