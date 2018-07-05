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
        header('Location: _CLIENTE\procura.php');
    }else{
        if($get_type=="Vendedor")
        {
            header('Location: _VENDEDOR\procura.php');
        }
    }
}

if(isset($_POST['enviar']))
{
    $search=$_POST["search"];
}
?>

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
                    <li><a href="catalogo.php">Catálogo</a></li>
                    </li>
                    <!--<li><a href="logout.php">Logout</a></li> -->
                    <li><a href="login.html">Login</a></li>

                </ul>
            </nav>


            <!-- Main -->
            <div id="main-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="4u 12u(mobile)">


                            <!-- Sidebar -->
                            <section class="box">
                                <header>
                                    <h3>Procura</h3>
                                </header>
                                <p>(Barra para pesquisar)</p>
                                <footer>
                                    <a href="#" class="button alt">.</a>
                                </footer>
                            </section>

                        </div>
                        <div class="8u 12u(mobile) important(mobile)">

                            <!-- Content -->
                            <article class="box post">
                                <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>

                                <!--conteudos-->

                                <?php


                                $procura="Select * from campanhas where Nome like '%".$search."%'";
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
                                                        echo "<img src=_VENDEDOR/designs/".$registos['Design']." width=150 height=200/>";
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

            <!-- Footer --><!-- Footer -->
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