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
        if(isset($_GET['aid'])){
            $analizaid=$_GET['aid'];
            $analiza=merrAnalizaId($analizaid);
            $emri=$analiza['emri'];
            $qmimi=$analiza['qmimi'];
        }
        if(isset($_POST['modifiko'])){
            modifikoAnalize($analizaid,$_POST['emri'],$_POST['qmimi']);
        }
    ?>
    <section id="modifikimi">
        <form method="post" id="analiza">
        <label>Emri i Analizes</label>  <label id="qmimi1">Qmimi</label><br>
            <input type="text" name="emri" id="emri" value="<?php if(!empty($emri)) echo $emri?>">
            <input type="text" name="qmimi" id="qmimi" value="<?php if(!empty($qmimi)) echo $qmimi?>">
            <br>
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
        </form>
    </section>

    <?php
    require 'include/footer2.php';
?>