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
            shtoKontrolle($_POST['emriPacientit'],$_SESSION['mjeku']['mjekuid'],$_POST['emriKontrolles'],
            $_POST['dataekontrolles'],$_POST['pershkrimi']);
        }
    ?>
    <section id="modifikimi">
        <form method="post" id="kontrolla">
            <label>Emri i Pacientit</label>            <label style="margin: 22%;">Emri i Kontrolles</label> <br>
            <select id="emriPacientit" name="emriPacientit">
                <option value="">Zgjedh Pacientin</option>
                <?php
                    $pacientet=merrPacientet();
                    $i=1;
                    while($pacienti=mysqli_fetch_assoc($pacientet)){
                        $emriPacientit= $pacienti['emrimbiemri'];
                        echo "<option value='$i'>$emriPacientit</option>";
                        $i++;
                    }
                ?>
            </select>
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
            <br>
            <label id="mbiemri1">Data e Kontrolles</label>     <label style="margin:24%;">Pershkrimi i kontrolles</label><br><br>
            <input type="date" id="dataekontrolles" name="dataekontrolles">
            <textarea id="pershkrimi" name="pershkrimi" style="width: 45%; font-size:20px; background-color: #DFE6EB; text-align:left; margin-left: 4%;">
            </textarea>
            <input type="submit" name="shto" id="shto" value="Shto">
        </form>
    </section>

<?php
    require 'include/footer2.php';
?>