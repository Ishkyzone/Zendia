<?php
 if(isset($_POST['enviar']))
{
		$nome=$_POST["nome"];
		$datainicio=$_POST["datainicio"];
		$datafim=$_POST["datafim"];
		$descricao=$_POST["descricao"];
		$tshirt=$_POST["tshirt"];
		$hoodie=$_POST["hoodie"];
		
		
		$upload_image=$_FILES["design"] ["name"];

			if (!file_exists("designs")) {
				mkdir("designs", 0777, true);
			}
			$folder=  "designs" . "/";

			$uploadfile = $folder . basename($_FILES['design']['name']);
			move_uploaded_file($_FILES['design']['tmp_name'], __DIR__ . "/" . $folder . $_FILES["design"]["name"]);
			$imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);

			rename($folder . $_FILES["design"]["name"], $folder . $nome . "." . $imageFileType);


		include('ligaBD.php');

			$sql="INSERT INTO campanhas (Nome, Data_Inicio, Data_Fim, Descricao, Design) VALUES('$nome', '$datainicio', '$datafim', '$descricao', '$nome.$imageFileType')"; //caminho da imagem?
			if (!mysqli_query($ligaBD,$sql))
			{
			die('Erro: '. mysqli_error($ligaBD));
			}
			
			if ($_POST['tshirt'] == 'ativo')
			{ //preco = preco base da categoria
				$sqltshirt="INSERT INTO produtos (Nome, Categoria, Preco) VALUES('$nome', 'T-Shirt', '4.50')";
				if (!mysqli_query($ligaBD,$sqltshirt))
				{
				die('Erro: '. mysqli_error($ligaBD));
				}
			}
			
			if ($_POST['hoodie'] == 'ativo')
			{
				$sqlhoodie="INSERT INTO produtos (Nome, Categoria, Preco) VALUES('$nome', 'Hoodie', '10.50')";
				if (!mysqli_query($ligaBD,$sqlhoodie))
				{
				die('Erro: '. mysqli_error($ligaBD));
				}
			}
			
			header('Location: index.html');
			mysqli_close($ligaBD);
}
?>
