<html>
<?php include("menu.php")?>
<link rel="stylesheet" href="w3.css">
<meta charset="utf-8">
<body>
<br>
<center>
 <div class="w3-card-4"  style="width:400px">
     <header class="w3-container w3-blue">
      <h2>Registo de utilizadores</h2>
    </header>
  
<form class="w3-container" method="POST" enctype="multipart/form-data">

 <p> <input class="w3-input  w3-card-4" type="text" placeholder="Nome" name="nome" required>
 </p>

 <p>
  <input class="w3-input  w3-card-4" type="number" placeholder="Idade" name="idade" required>
 </p>

 <p>

  <input class="w3-input  w3-card-4" type="email" placeholder="E-Mail" name="email" required>
 </p>

 <p>

  <input class="w3-input  w3-card-4" type="text" placeholder="Utilizador" name="user"required>
 </p>

 <p>

  <input class="w3-input  w3-card-4" type="password" placeholder="Password" name="password"required>
 </p>

 <p>

  <input class="w3-input  w3-card-4" type="password" placeholder="Confirmar password" name="password1"required>
 </p>
 
   <p>
<input type="file" name="myimage" required>
 </p>
   <p >      
 
   <p>      
  <button class="w3-btn w3-blue" name="enviar" type="submit">Submeter</button>
      
  <button class="w3-btn w3-blue" type="reset">Limpar</button>
  
   <button class="w3-btn w3-red" type="reset"><a style="text-decoration: none" href="login.php">LogIn</button>
  </p>
</form>

</div>
</body>
</html>

<?php
//** insere os dados na tabela qundo o botão 
 if(isset($_POST['enviar']))
{

		$nome=$_POST["nome"];
		$idade=$_POST["idade"];
		$mail=$_POST["email"];
		$us=$_POST["user"];
		$ps=$_POST["password"];
		$ps1=$_POST["password1"];

		if ($_POST["password"]<>$_POST["password1"])
		{
		?>
		<center>
		<br>
		 <div class="w3-card-4"  style="width:400px">
			 <header class="w3-container w3-blue">
			  <h1>A password não coincide</h1>
			</header>
		 <p>      
		  <button class="w3-btn w3-blue"   type="button"><a style="text-decoration: none" href="registo.php">Alterar</button>
			  
		  </p>
		  <br>
		</div>

		<?php
		exit;
		}
		include('ligaBD.php');
		$existe="select * from user where user='".$us."'";
		$faz_existe=mysqli_query($ligaBD, $existe);
		$jaexiste=mysqli_num_rows($faz_existe);

		if ($jaexiste==0)
		{
			$upload_image=$_FILES["myimage"][ "name" ];

			if (!file_exists("users")) {
				mkdir("users", 0777, true);
			}
			$folder=  "users" . "/";

			$uploadfile = $folder . basename($_FILES['myimage']['name']);
			move_uploaded_file($_FILES['myimage']['tmp_name'], __DIR__ . "/" . $folder . $_FILES["myimage"]["name"]);
			$imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);

			rename($folder . $_FILES["myimage"]["name"], $folder . $us . "." . $imageFileType);


			$sql="INSERT INTO user (nome, idade, email, user, password, permit, foto) VALUES('$nome','$idade','$mail','$us','$ps', '0', '$us.$imageFileType')";
			if (!mysqli_query($ligaBD,$sql))
			{
			die('Erro: '. mysqli_error($ligaBD));
			}
			?>
			<center>
			<br>
			 <div class="w3-card-4"  style="width:400px">
				 <header class="w3-container w3-blue">
				 <h1>Utilizador criado</h1>
				</header>
			 <p>      
			  <button class="w3-btn w3-green w3-round-large"   type="button"><a style="text-decoration: none" href="login.php">Log In</button>
				<button class="w3-btn w3-blue w3-round-large"   type="button"><a style="text-decoration: none" href="registo.php">Novo registo</button>    
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
			 <div class="w3-card-4"  style="width:400px">
				 <header class="w3-container w3-blue">
				  <h1>Utilizador já existe</h1>
				</header>
			 <p>      
			  <button class="w3-btn w3-blue"   type="button"><a style="text-decoration: none" href="login.php">LogIn</button>
				  
			  </p>
			  <br>
			</div>

			<?php
		}
}