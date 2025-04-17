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
        if(isset($_GET['kid'])){
            $kontrollaid=$_GET['kid'];
            $kontrolla=merrKontrolleId($kontrollaid);
            $emriKontrolles=$kontrolla['emri'];
            $dataekontrolles=$kontrolla['dataekontrolles'];
            
        }
        if(isset($_POST['modifiko'])){
            modifikoTermin($kontrollaid,$_SESSION['pacienti']['pacientiid'],$_POST['emriKontrolles'],
            $_POST['dataekontrolles']);
        }
    ?>
    <section id="modifikimi">
        <form method="post" id="kontrolla">
            <label>Emri i Kontrolles</label>    <label style="margin: 22%;">Data e Kontrolles</label><br>
            <select id="emriKontrolles" name="emriKontrolles">
                <option value=""><?php if(!empty($emriKontrolles)) echo $emriKontrolles?></option>
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
            <input type="date" id="dataekontrolles" name="dataekontrolles" value="<?php if(!empty($dataekontrolles)) echo $dataekontrolles?>">
            <br>
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
        </form>
    </section>

    <?php
    require 'include/footer2.php';
?>