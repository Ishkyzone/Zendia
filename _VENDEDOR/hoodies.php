<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Zendia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
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
									<a href="catalogo.php">Catálogo</a>
									</li>
                                    <li><a href="submeter.html">Submeter design</a></li>
									<li><form action="logout.php" method="get">
									<input type="submit" value="Logout">
									</form></li>
								</ul>
							</nav>


			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row">
							<div class="4u 12u(mobile)">

								<!-- Sidebar -->
									<section class="box">
										<a href="#" class="image featured"><img src="images/pic09.jpg" alt="" /></a>
										<header>
											<h3>Sed etiam lorem nulla</h3>
										</header>
										<p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
										<footer>
											<a href="#" class="button alt">Magna sed taciti</a>
										</footer>
									</section>
									<section class="box">
										<header>
											<h3>Feugiat consequat</h3>
										</header>
										<p>Veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat sed lorem consequat feugiat lorem dolore.</p>
										<ul class="divided">
											<li><a href="#">Sed et blandit consequat sed</a></li>
											<li><a href="#">Hendrerit tortor vitae sapien dolore</a></li>
											<li><a href="#">Sapien id suscipit magna sed felis</a></li>
											<li><a href="#">Aptent taciti sociosqu ad litora</a></li>
										</ul>
										<footer>
											<a href="#" class="button alt">Ipsum consequat</a>
										</footer>
									</section>

							</div>
							<div class="8u 12u(mobile) important(mobile)">

								<!-- Content -->
									<article class="box post">
										<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
										
										<!--conteudos-->
										
										<?php
										include('ligaBD.php');
										$procura="Select * from campanhas left join produtos on produtos.Nome=campanhas.Nome and produtos.categoria='Hoodie'";
										$faz_procura=mysqli_query($ligaBD,$procura);
										$num_registos=mysqli_num_rows($faz_procura);
										?>
										<body>
										<center>
										 <div class="w3-card-4"  style="width:400px">
											 <header class="w3-container w3-blue">
											  <h1>Categorias - Hoodies</h1>
											</header>
										<link rel="stylesheet" href="w3.css">
										<table class="w3-table-all "  style="width:400px">

										<?php
										for ($i=0; $i<$num_registos;)
										{
										echo '<tr>';
										$j=0;
										for ($j=0; $j<3; $j++)
										
													{
													if($i<$num_registos)
													{
													$registos=mysqli_fetch_array($faz_procura);
													echo '<td>';
													echo $registos['Nome'];
													echo "<br>";
													echo "<img src=../_VENDEDOR/designs/".$registos['Design']." width=150 height=200/>";
													$i=$i+1;
													}
													}
										}
										mysqli_close($ligaBD);
										?>
										</table>
										
										<?php
										/*include('ligaBD.php');

										$lista="Select * from campanhas" ;

										$faz_procura=mysqli_query($ligaBD,$lista);
										$num_produtos=mysqli_num_rows($faz_procura);
										?>
										<body>
										<center>
										 <div  style="width:700px">
											 <header >
											  <h1>Lista de produtos</h1>
											 </header>

										<table   style="width:600px">
										
										<?php
										for ($i=0; $i<$num_produtos; $i++)
										{
										$registos_produtos=mysqli_fetch_array($faz_procura);
										$j=0;
										for ($j=0; $j<2; $j++)
										{
										echo '<td>';
										echo "<tr><img src=../_VENDEDOR/designs/".$registos_produtos['Design']." width=100 height=100/>";
										echo '<tr>'.$registos_produtos['Nome'];
										echo '<tr>'.$registos_produtos['Descricao'];
										}
										}
										mysqli_close($ligaBD);
										*/?>
										</div>
										</center>
									</article>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<section id="footer" class="container">
						<div class="row">
							<div class="8u 12u(mobile)">
								<section>
									<header>
										<h2>Blandit nisl adipiscing</h2>
									</header>
									<ul class="dates">
										<li>
											<span class="date">Jan <strong>27</strong></span>
											<h3><a href="#">Lorem dolor sit amet veroeros</a></h3>
											<p>Ipsum dolor sit amet veroeros consequat blandit ipsum phasellus lorem consequat etiam.</p>
										</li>
										<li>
											<span class="date">Jan <strong>23</strong></span>
											<h3><a href="#">Ipsum sed blandit nisl consequat</a></h3>
											<p>Blandit phasellus lorem ipsum dolor tempor sapien tortor hendrerit adipiscing feugiat lorem.</p>
										</li>
										<li>
											<span class="date">Jan <strong>15</strong></span>
											<h3><a href="#">Magna tempus lorem feugiat</a></h3>
											<p>Dolore consequat sed phasellus lorem sed etiam nullam dolor etiam sed amet sit consequat.</p>
										</li>
										<li>
											<span class="date">Jan <strong>12</strong></span>
											<h3><a href="#">Dolore tempus ipsum feugiat nulla</a></h3>
											<p>Feugiat lorem dolor sed nullam tempus lorem ipsum dolor sit amet nullam consequat.</p>
										</li>
										<li>
											<span class="date">Jan <strong>10</strong></span>
											<h3><a href="#">Blandit tempus aliquam?</a></h3>
											<p>Feugiat sed tempus blandit tempus adipiscing nisl lorem ipsum dolor sit amet dolore.</p>
										</li>
									</ul>
								</section>
							</div>
							<div class="4u 12u(mobile)">
								<section>
									<header>
										<h2>What's this all about?</h2>
									</header>
									<a href="#" class="image featured"><img src="images/pic10.jpg" alt="" /></a>
									<p>
										This is <strong>Dopetrope</strong> a free, fully responsive HTML5 site template by
										<a href="http://twitter.com/ajlkn">AJ</a> for <a href="http://html5up.net/">HTML5 UP</a> It's released for free under
										the <a href="http://html5up.net/license/">Creative Commons Attribution</a> license so feel free to use it for any personal or commercial project &ndash; just don't forget to credit us!
									</p>
									<footer>
										<a href="#" class="button">Find out more</a>
									</footer>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="4u 12u(mobile)">
								<section>
									<header>
										<h2>Tempus consequat</h2>
									</header>
									<ul class="divided">
										<li><a href="#">Lorem ipsum dolor sit amet sit veroeros</a></li>
										<li><a href="#">Sed et blandit consequat sed tlorem blandit</a></li>
										<li><a href="#">Adipiscing feugiat phasellus sed tempus</a></li>
										<li><a href="#">Hendrerit tortor vitae mattis tempor sapien</a></li>
										<li><a href="#">Sem feugiat sapien id suscipit magna felis nec</a></li>
										<li><a href="#">Elit class aptent taciti sociosqu ad litora</a></li>
									</ul>
								</section>
							</div>
							<div class="4u 12u(mobile)">
								<section>
									<header>
										<h2>Ipsum et phasellus</h2>
									</header>
									<ul class="divided">
										<li><a href="#">Lorem ipsum dolor sit amet sit veroeros</a></li>
										<li><a href="#">Sed et blandit consequat sed tlorem blandit</a></li>
										<li><a href="#">Adipiscing feugiat phasellus sed tempus</a></li>
										<li><a href="#">Hendrerit tortor vitae mattis tempor sapien</a></li>
										<li><a href="#">Sem feugiat sapien id suscipit magna felis nec</a></li>
										<li><a href="#">Elit class aptent taciti sociosqu ad litora</a></li>
									</ul>
								</section>
							</div>
							<div class="4u 12u(mobile)">
								<section>
									<header>
										<h2>Vitae tempor lorem</h2>
									</header>
									<ul class="social">
										<li><a class="icon fa-facebook" href="#"><span class="label">Facebook</span></a></li>
										<li><a class="icon fa-twitter" href="#"><span class="label">Twitter</span></a></li>
										<li><a class="icon fa-dribbble" href="#"><span class="label">Dribbble</span></a></li>
										<li><a class="icon fa-linkedin" href="#"><span class="label">LinkedIn</span></a></li>
										<li><a class="icon fa-google-plus" href="#"><span class="label">Google+</span></a></li>
									</ul>
									<ul class="contact">
										<li>
											<h3>Address</h3>
											<p>
												Untitled Incorporated<br />
												1234 Somewhere Road Suite<br />
												Nashville, TN 00000-0000
											</p>
										</li>
										<li>
											<h3>Mail</h3>
											<p><a href="#">someone@untitled.tld</a></p>
										</li>
										<li>
											<h3>Phone</h3>
											<p>(800) 000-0000</p>
										</li>
									</ul>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="12u">

								<!-- Copyright -->
									<div id="copyright">
										<ul class="links">
											<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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