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
        if(isset($_GET['pid'])){
            $pacientiid=$_GET['pid'];
            $pacienti=merrPacientId($pacientiid);
            $emri=$pacienti['emri'];
            $mbiemri=$pacienti['mbiemri'];
            $telefoni=$pacienti['telefoni'];
            $email=$pacienti['email'];
            $qyteti=$pacienti['qyteti'];
            $dataelindjes=$pacienti['dataelindjes'];
        
            if(isset($_POST['modifiko'])){
                modifikoProfilinPacient($pacientiid,$_POST['emri'],$_POST['mbiemri'],$_POST['telefoni'],
                $_POST['email'],$_POST['qyteti'],$_POST['dataelindjes']);
            }
        } elseif(isset($_GET['iid'])){
            $infermieriid=$_GET['iid'];
            $infermieri=merrInfermierId($infermieriid);
            $emri=$infermieri['emri'];
            $mbiemri=$infermieri['mbiemri'];
            $telefoni=$infermieri['telefoni'];
            $email=$infermieri['email'];
            $qyteti=$infermieri['qyteti'];
            if(isset($_POST['modifiko'])){
                modifikoProfilinInfermier($infermieriid,$_POST['emri'],$_POST['mbiemri'],$_POST['telefoni'],
                $_POST['email'],$_POST['qyteti']);
            }
        } elseif(isset($_GET['mid'])){
            $mjekuiid=$_GET['mid'];
            $mjeku=merrMjekeId($mjekuiid);
            $emri=$mjeku['emri'];
            $mbiemri=$mjeku['mbiemri'];
            $telefoni=$mjeku['telefoni'];
            $email=$mjeku['email'];
            $qyteti=$mjeku['qyteti'];
            $dataelindjes=$mjeku['dataelindjes'];
        
            if(isset($_POST['modifiko'])){
                modifikoProfilinMjek($mjekuiid,$_POST['emri'],$_POST['mbiemri'],$_POST['telefoni'],
                $_POST['email'],$_POST['qyteti'],$_POST['dataelindjes']);
            }
        }
    ?>
    <section id="modifikimi">
        <form method="post" id="pacienti">
            <label>Emri</label>  <label id="mbiemri1">Mbiemri</label><br>
            <input type="text" name="emri" id="emri" value="<?php if(!empty($emri)) echo $emri?>">
            <input type="text" name="mbiemri" id="mbiemri" value="<?php if(!empty($mbiemri)) echo $mbiemri?>">
            <br>
            <label>Telefoni</label>  <label id="email1">Email</label><br>
            <input type="text" name="telefoni" id="telefoni" value="<?php if(!empty($telefoni)) echo $telefoni?>">
            <input type="email" name="email" id="email" value="<?php if(!empty($email)) echo $email?>">
            <br>
            <label>Qyteti</label>  <label id="data1">Data e lindjes</label><br>
            <input type="text" name="qyteti" id="qyteti" value="<?php if(!empty($qyteti)) echo $qyteti?>">
            <input type="date" name="dataelindjes" id="dataelindjes" value="<?php if(!empty($dataelindjes)) echo $dataelindjes?>">
            <br>
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
        </form>
    </section>


<?php
    require 'include/footer2.php';
?>