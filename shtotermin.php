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
        $pacientiid=$_SESSION['pacienti']['pacientiid'];
        if(isset($_POST['shto'])){
            $mjeket=merrMjekRandom();
            $mjeku=mysqli_fetch_assoc($mjeket);
            $mjekuid= $mjeku['mjekuid'];
            shtoKontrolle1($pacientiid,$mjekuid,$_POST['emriKontrolles'],$_POST['dataekontrolles']);
            header("Location: index.php");
            exit();
        }
    ?>
    <section id="modifikimi">
        <form method="post" id="kontrolla">
            <label>Emri i Kontrolles</label>    <label id="mbiemri1">Data e Kontrolles</label><br>
            <select id="emriKontrolles" name="emriKontrolles">
                <option value="">Zgjedh Kontrollen</option>
                <?php
                    $kontrollat=merrKontrollat();
                    $emratUnike=array();
                    while($kontrolla=mysqli_fetch_assoc($kontrollat)){
                        $emriKontrolles= $kontrolla['emri'];
                        if(!in_array($emriKontrolles,$emratUnike)){
                            array_push($emratUnike,$emriKontrolles);
                            echo "<option value='$emriKontrolles'>$emriKontrolles</option>";
                        }
                    }
                ?>
            </select>
            <input type="date" id="dataekontrolles" name="dataekontrolles">
            <br>
            <input type="submit" name="shto" id="shto" value="Shto">
        </form>
    </section>

<?php
    require 'include/footer2.php';
?>