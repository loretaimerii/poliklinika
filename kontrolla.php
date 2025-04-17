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
        <h2 id="shtoo"><a href="shtokontrolle.php">Shto kontrolle</a></h2>
        <?php 
			if(isset($_SESSION['mesazhi'])){
				echo "<p id='mesazhi' style='color:#0c0c50 ; font-size: 20px; padding: 10px;'>" . $_SESSION['mesazhi'] . "</p>";
			}
		?>
        <table id="pacientet">
            <thead>
                <tr>
                    <th>Emri dhe Mbiemri i pacientit</th>
                    <th>Emri dhe Mbiemri i mjekut</th>
                    <th>Emri i kontrolles</th>
                    <th>Data e kontrolles</th>
                    <th>Pershkrimi i kontrolles</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $kontrollat=merrKontrollat();
                    while($kontrolla = mysqli_fetch_assoc($kontrollat)){
                        $kontrollaid=$kontrolla['kontrollaid'];
                        echo '<tr>';
                        echo '<td>' . $kontrolla['emrimbiemrip'] . '</td>';
                        echo '<td>' . $kontrolla['emrimbiemrim'] . '</td>';
                        echo '<td>' . $kontrolla['emri'] . '</td>';
                        echo '<td>' . $kontrolla['dataekontrolles'] . '</td>';
                        echo '<td>' . $kontrolla['pershkrimi'] . '</td>';
                        echo "<td><a href='modifikokontrolle.php?kid={$kontrollaid}'>Edit</a></td>";
                        echo "<td><a href='fshijkontrolle.php?kid={$kontrollaid}'>Delete</a></td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </section>
<?php
    require 'include/footer.php';
?>