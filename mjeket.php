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
    <main>
        <section id="stafi">
            <h1>Njoftohuni me mjek&#235t ton&#235</h1>
                <?php
                    $mjeket = merrMjeket();
                    $i=1;
                    while($mjeku = mysqli_fetch_assoc($mjeket)){
                        echo '<article id="mjeku'.$i.'">';
                        $mjekuid = $mjeku['mjekuid'];
                        echo '<h3>' . $mjeku['emri'] .' ' . $mjeku['mbiemri'] . '</h3>';
                        echo '<p>Numri kontaktues: ' . $mjeku['telefoni'] . '</p>';
                        echo '<p>Email: ' . $mjeku['email'] . '</p>';
                        echo '</article>';
                        $i++;
                    }
                ?>
        </section>
    </main>
<?php
    require 'include/footer.php';
?>
