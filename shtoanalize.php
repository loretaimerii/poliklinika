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
            $infermieret=merrInfermieret();
            $infermieret=mysqli_fetch_assoc($infermieret);
            $infermieriid=rand(1,count($infermieret)+1);
            shtoAnalize($_POST['emri'],$_POST['qmimi'],$infermieriid);
        }
    ?>
    <section id="modifikimi">
        <form method="post" id="analiza">
            <label>Emri i Analizes</label>  <label id="qmimi1">Qmimi</label><br>
            <input type="text" name="emri" id="emri" >
            <input type="text" name="qmimi" id="qmimi" >
            <br>
            <input type="submit" name="shto" id="shto" value="Shto">
        </form>
    </section>

<?php
    require 'include/footer2.php';
?>