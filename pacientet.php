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
        <h2 id="shtoo"><a href="shtopacient.php">Shto pacient</a></h2>
        <?php 
			if(isset($_SESSION['mesazhi'])){
				echo "<p id='mesazhi' style='color:#0c0c50 ; font-size: 20px; padding: 10px;'>" . $_SESSION['mesazhi'] . "</p>";
			}
		?>
        <table id="pacientet">
            <thead>
                <tr>
                    <th>Emri dhe Mbiemri</th>
                    <th>Telefoni</th>
                    <th>Email</th>
                    <th>Qyteti</th>
                    <th>Data e lindjes</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pacientet=merrPacientet();
                    while($pacienti = mysqli_fetch_assoc($pacientet)){
                        $pacientiid=$pacienti['pacientiid'];
                        echo '<tr>';
                        echo '<td>' . $pacienti['emrimbiemri'] . '</td>';
                        echo '<td>' . $pacienti['telefoni'] . '</td>';
                        echo '<td>' . $pacienti['email'] . '</td>';
                        echo '<td>' . $pacienti['qyteti'] . '</td>';
                        echo '<td>' . $pacienti['dataelindjes'] . '</td>';
                        echo "<td><a href='modifikopacient.php?pid={$pacientiid}'>Edit</a></td>";
                        echo "<td><a href='fshijpacient.php?pid={$pacientiid}'>Delete</a></td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </section>
<?php
    require 'include/footer.php';
?>