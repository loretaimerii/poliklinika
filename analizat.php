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
    <section id="tabela">
        <h2 id="shtoo"><a href="shtoanalize.php">Shto analize</a></h2>
        <?php 
			if(isset($_SESSION['mesazhi'])){
				echo "<p id='mesazhi' style='color:#0c0c50 ; font-size: 20px; padding: 10px;'>" . $_SESSION['mesazhi'] . "</p>";
			}
		?>
        <table style="padding: 10% 20%;" id="pacientet">
            <thead>
                <tr>
                    <th>Emri i Analiz&#235s</th>
                    <th>Emri i infermierit</th>
                    <th>Qmimi</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $analizat=merrAnalizat();
                    while($analiza = mysqli_fetch_assoc($analizat)){
                        $analizaid=$analiza['analizaid'];
                        echo '<tr>';
                        echo '<td>' . $analiza['emri'] . '</td>';
                        echo '<td>' . $analiza['emrimbiemri'] . '</td>';
                        echo '<td>' . $analiza['qmimi'] . '</td>';
                        echo "<td><a href='modifikoanalize.php?aid={$analizaid}'>Edit</a></td>";
                        echo "<td><a href='fshijanalize.php?aid={$analizaid}'>Delete</a></td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </section>
<?php
    require 'include/footer.php';
?>