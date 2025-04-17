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
        <h2 id="shtoo"><a href="shtoinfermier.php">Shto infermier</a></h2>
        <table style="padding: 10% 15%;" id="pacientet">
            <thead>
                <tr>
                    <th>Emri dhe Mbiemri</th>
                    <th>Telefoni</th>
                    <th>Email</th>
                    <th>Qyteti</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $infermieret=merrInfermieret();
                    while($infermieri = mysqli_fetch_assoc($infermieret)){
                        $infermieriid=$infermieri['infermieriid'];
                        echo '<tr>';
                        echo '<td>' . $infermieri['emrimbiemri'] . '</td>';
                        echo '<td>' . $infermieri['telefoni'] . '</td>';
                        echo '<td>' . $infermieri['email'] . '</td>';
                        echo '<td>' . $infermieri['qyteti'] . '</td>';
                        echo "<td><a href='modifikoinfermier.php?iid={$infermieriid}'>Edit</a></td>";
                        echo "<td><a href='fshijinfermier.php?iid={$infermieriid}'>Delete</a></td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </section>
<?php
    require 'include/footer.php';
?>