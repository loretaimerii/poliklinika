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
    <section id="tabela1">
        <h2 id='shtoo'><a href='shtotermin.php'>Shto termin</a></h2>
        <?php 
			if(isset($_SESSION['mesazhi'])){
				echo "<p id='mesazhi' style='color:#0c0c50 ; font-size: 20px; padding: 10px;'>" . $_SESSION['mesazhi'] . "</p>";
			}
		?>
        <table id="pacientet">
            <thead>
                <tr>
                    <th>Emri dhe Mbiemri i juaj</th>
                    <th>Emri dhe Mbiemri i mjekut</th>
                    <th>Emri i kontrolles</th>
                    <th>Data e kontrolles</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pacientiid=$_SESSION['pacienti']['pacientiid'];   
                    $terminet=merrTerminId($pacientiid);               
                    while($termini=mysqli_fetch_assoc($terminet)){
                        $kontrollaid=$termini['kontrollaid'];
                        echo '<tr>';
                        echo '<td>' . $termini['emrimbiemrip'] . '</td>';
                        echo '<td>' . $termini['emrimbiemrim'] . '</td>';
                        echo '<td>' . $termini['emri'] . '</td>';
                        echo '<td>' . $termini['dataekontrolles'] . '</td>';
                        echo "<td><a href='modifikotermin.php?kid={$kontrollaid}'>Edit</a></td>";
                        echo "<td><a href='fshijtermin.php?kid={$kontrollaid}'>Delete</a></td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </section>
<?php
    require 'include/footer.php';
?>