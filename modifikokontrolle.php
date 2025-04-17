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
            $emriPacientit=$kontrolla['emrimbiemrip'];
            $emriMjekut=$kontrolla['emrimbiemrim'];
            $emriKontrolles=$kontrolla['emri'];
            $dataekontrolles=$kontrolla['dataekontrolles'];
            $pershkrimi=$kontrolla['pershkrimi'];
        }
        if(isset($_POST['modifiko'])){
            modifikoKontrolle($kontrollaid,$_POST['emriPacientit'],$_POST['emriMjekut'],$_POST['emriKontrolles'],
            $_POST['dataekontrolles'],$_POST['pershkrimi']);
        }
    ?>
    <section id="modifikimi">
        <form method="post" id="kontrolla">
            <label>Emri i Pacientit</label>     <label style="margin: 24%;">Emri i Mjekut</label><br>
            <select id="emriPacientit" name="emriPacientit">
                <option value=""><?php if(!empty($emriPacientit)) echo $emriPacientit?></option>
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
            <select id="emriMjekut" name="emriMjekut">
                <option value=""><?php if(!empty($emriMjekut)) echo $emriMjekut?></option>
                <?php
                    $mjeket=merrMjeket();
                    $i=1;
                    while($mjeku=mysqli_fetch_assoc($mjeket)){
                        $emriMjekut= $mjeku['emri'] . ' ' . $mjeku['mbiemri'];
                        echo "<option value='$i'>$emriMjekut</option>";
                        $i++;
                    }
                ?>
            </select>
            <br>
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
            <label>Pershkrimi i kontrolles</label><br>
            <textarea id="pershkrimi" name="pershkrimi" style="max-width:30%; font-size:20px; padding:15px; text-align:left; max-lines:6; margin:0 25px 35px;  background-color: #DFE6EB;">
            <?php if(!empty($pershkrimi)) echo $pershkrimi?>
            </textarea><br>
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
        </form>
    </section>

    <?php
    require 'include/footer2.php';
?>