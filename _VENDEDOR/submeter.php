<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
session_start();
if (isset($_SESSION['user'])) {
    include('ligaBD.php');
    $type="Select Tipo from utilizador where User ='".$_SESSION['user']."'";
    $get_type=mysqli_query($ligaBD, $type);
    if($get_type=="Cliente")
    {
        header('Location: _CLIENTE\index.php');
    }
}else{
    header('Location: ..\index.php');
}
?>

<html>
	<head>
		<title>Submeter - Zendia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header">

						<!-- Logo -->
							<h1><a href="index.php">Zendia</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.php">Home</a></li>
									<li>
										<a href="#">Categorias</a>
										<ul>
											<li><a href="tshirts.php">T-Shirts</a></li>
											<li><a href="hoodies.php">Hoodies</a></li>
											
										</ul>
									</li>
                                    <li><a href="catalogo.php">Catálogo</a></li>
									<li><a href="submeter.php">Submeter design</a></li>
									<li><form action="logout.php" method="get">
									<input type="submit" value="Logout">
									</form></li>
								</ul>
							</nav>
									
					</div>
				</div>
			
			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
					
						<!-- Content -->
						 <center>
						 <div style="width:400px">
							  <h2>Criar campanha</h2>
							</header><br>

						<form method="POST" action="submeterdesign.php" enctype="multipart/form-data">
						<p> <input  type="text" placeholder="Nome da Campanha" name="nome" required></p>
						<input type="file" name="design" required> <br>
						<br>
						<h1>Categorias</h1><p> <!-- checkbox list -->
						<ul>
					   <li><input type="checkbox" name="tshirt" value="ativo">T-shirt</label></li>
					   <li><input type="checkbox" name="hoodie" value="ativo">Hoodie</li>
				 	   </ul>
					   
						<p>Data de inicio: <input  type="date" name="datainicio" min="2018-01-29" required></p>
						<p>Data de fim: <input  type="date" name="datafim" required></p>
						<br>
						<p> <input  type="text" placeholder="Descrição" name="descricao"></p>
						 <p> <button  name="enviar" type="submit">Submeter campanha</button> 
						 </p>
						</form>

						</div>
					</div>
				</div>
				

			<!-- Footer -->
				<div id="footer-wrapper">
					<section id="footer" class="container">
						<div class="row">
								<!-- Copyright -->
									<div id="copyright">
										<ul class="links">
											<li>&copy;Zendia. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>
						</div>
					</section>
				</div>



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>