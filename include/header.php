<?php
    include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Poliklinika Kardiologjike</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <!-- header part -->
    <header id="header">
        <nav id="nav">
            <img src="images/logo1.1.png" id="logo">
            <ul class="lista">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="mjeket.php">Mjek&#235t</a></li>
                <?php
                    if(isset($_SESSION['pacienti'])){ 
                        echo "<li><a href='terminet.php'>Terminet e juaja</a></li>";
                        echo "<li><a href='profili.php?pid={$_SESSION['pacienti']['pacientiid']}'>Profili</a></li>";
                        echo "<li><a id='dalja' href='#'>Dalja</a></li>";
                    }
                    if(isset($_SESSION['mjeku'])){
                        echo "<li><a href='infermieret.php'>Infermier&#235t</a></li>";
                        echo "<li><a href='pacientet.php'>Pacient&#235t</a></li>";
                        echo "<li><a href='kontrolla.php'>Kontrolla</a></li>";
                        echo "<li><a href='analizat.php'>Analizat</a></li>";              
                        echo "<li><a href='profili.php?mid={$_SESSION['mjeku']['mjekuid']}'>Profili</a></li>";
                        echo "<li><a id='dalja' href='#'>Dalja</a></li>";
                    }
                    if(isset($_SESSION['infermieri'])){
                        echo "<li><a href='pacientet.php'>Pacient&#235t</a></li>";
                        echo "<li><a href='kontrolla.php'>Kontrolla</a></li>";
                        echo "<li><a href='analizat.php'>Analizat</a></li>";                 
                        echo "<li><a href='profili.php?iid={$_SESSION['infermieri']['infermieriid']}'>Profili</a></li>";
                        echo "<li><a id='dalja' href='#'>Dalja</a></li>";
                    }
                ?>
                <li><a href="signin.php">Sign In</a></li>
            </ul>
        </nav>
       