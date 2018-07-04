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
    }else{
        if($get_type=="Vendedor")
        {
            header('Location: _VENDEDOR\index.php');
        }
        }
}
?>

<html>
	<head>
		<title>Home - Zendia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
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
									<li><a href="login.html">Login</a></li>
								</ul>
							</nav>

						<!-- Banner -->
							<section id="banner">
								<header>
									<h2>ZENDIA</h2>
									<p>Compra e venda de vestuário <i>in-demand</i></p>
								</header>
							</section>



						<!-- Intro -->
							<section id="intro" class="container">
								<div class="row">
									<div class="4u 12u(mobile)">
										<section class="first">
											<i class="icon featured fa-cog"></i>
											<header>
												<h2>Customização</h2>
											</header>
											<p>Uma grande variedade de T-shirts personalizadas.</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="middle">
											<i class="icon featured alt fa-flash"></i>
											<header>
												<h2>Rapidez</h2>
											</header>
											<p>Site rápido e fluido para os utilizadores.</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="last">
											<i class="icon featured alt2 fa-star"></i>
											<header>
												<h2>Merchandising Exclusivo</h2>
											</header>
											<p>Compre produtos adequados aos seus gostos.</p>
										</section>
									</div>
								</div>
								<footer>
									<ul class="actions">
										
										<li><a href="#" class="button alt big">+Info</a></li>
									</ul>
								</footer>
							</section>

					</div>
				</div>


			<!-- Footer -->
				<div id="footer-wrapper">
					<section id="footer" class="container">
						
							
						<div class="row">

								<!-- Copyright -->

									<div id="copyright">
										<ul class="links">
											<li>&copy; Zendia. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>

							</div>
						</div>
					</section>
				</div>

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