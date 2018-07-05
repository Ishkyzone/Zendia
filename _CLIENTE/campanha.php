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
    if($get_type=="Vendedor")
    {
        header('Location: _VENDEDOR\catalogo.php');
    }
}else{
    header('Location: ..\catalogo.php');
}
?>


<html>
<head>
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
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <a href="#">Categorias</a>
                        <ul>
                            <li><a href="tshirts.php">T-Shirts</a></li>
                            <li><a href="hoodies.php">Hoodies</a></li>

                        </ul>
                    </li>
                    <li><a href="catalogo.php">Catálogo</a></li>
                    <li class="current"><a href="login.html">Login</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main -->
    <div id="main-wrapper">
        <div class="container">

            <!-- Content -->
            <?php
            $id = $_GET['id'];
            $camp="Select * from campanhas where Campanha_ID ='".$id."'";
            $procura_camp=mysqli_query($ligaBD,$camp);
            $registoscamp=mysqli_fetch_array($procura_camp);

            $produtos="Select * from produtos where Campanha_ID ='".$id."'";
            $procura_produtos=mysqli_query($ligaBD,$produtos);
            $num_registos=mysqli_num_rows($procura_produtos);
            ?>
            <body>
            <center>
                <div class="w3-card-4"  style="width:600px">
                    <header class="w3-container w3-blue">
                        <?php
                        echo "<h1>".$registoscamp['Nome']."</h1>";
                        ?>

                    </header>
                    <link rel="stylesheet" href="w3.css">
                    <table class="w3-table-all "  style="width:600px">

                        <?php

                        /* <?php
                            include('ligaBD.php');
                            session_start();
                            $id = $_COOKIE['idcampanha'];
                            $nomecamp="Select Nome from campanhas where Campanha_ID ='".$id."'";
                            $procura_nomecamp=mysqli_query($ligaBD,$camp);
                            echo "<title>".$procura_nomecamp." - Zendia</title>";
                            ?>

                         */

                        for ($i=0; $i<$num_registos;)
                        {
                            echo '<tr align="center">';
                            $j=0;
                            for ($j=0; $j<5; $j++)
                            {
                                if($i<$num_registos)
                                {

                                    $registosprod=mysqli_fetch_array($procura_produtos);
                                    echo '<td>';
                                    echo $registosprod['Categoria'];
                                    echo "<br>";
                                    echo "<img src=_VENDEDOR/designs/".$registoscamp['Design']." width=150 height=200/>";
                                    echo"&nbsp;&nbsp;&nbsp;";
                                    $i=$i+1;
                                }
                            }
                        }
                        mysqli_close($ligaBD);
                        ?>
                    </table>

                </div>
        </div>

        <!-- Footer -->
        <div id="footer-wrapper">
            <section id="footer" class="container">
                <div class="row">
                    <!-- Copyright -->
                    <div id="copyright">
                        <ul class="links">
                            <li >&copy;Zendia. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
