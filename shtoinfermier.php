<?php
    require 'include/header.php';
?>
 <section id="pjesa2">
            <img src="images/foto1.png">
            <h3>Mir&#235 se vini te</h3>
            <h1>Poliklinika<br>Kardiologjike</h1>
            <p>Klikoni <b><a href="infoshtese.php">k&#235tu</a></b> p&#235r m&#235 shum&#235 rreth poliklinik&#235s ton&#235.</p>
        </section>
    </header> 
    <?php
        if(isset($_POST['shto'])){
            shtoInfermier($_POST['emri'],$_POST['mbiemri'],$_POST['telefoni'],$_POST['email'],
            $_POST['qyteti']);
        }
    ?>
    <section id="modifikimi">
        <form method="post" id="infermieri">
            <label>Emri</label>  <label id="mbiemri1">Mbiemri</label><br>
            <input type="text" name="emri" id="emri">
            <input type="text" name="mbiemri" id="mbiemri">
            <br>
            <label>Telefoni</label>  <label id="email1">Email</label><br>
            <input type="text" name="telefoni" id="telefoni" >
            <input type="email" name="email" id="email" >
            <br>
            <label>Qyteti</label><br>
            <input type="text" name="qyteti" id="qyteti">
            <input type="submit" name="shto" id="shto" value="Shto">
        </form>
    </section>

    <?php
    require 'include/footer2.php';
?>