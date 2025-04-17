<?php
    require 'include/header.php';
?>
    </header>  
    <?php
		if (isset($_POST['signup'])) {
			regjistrohu($_POST['emri'],$_POST['mbiemri'],$_POST['telefoni'],$_POST['email'],$_POST['fjalekalimi']);
		}
    ?>
    <section id="regjistrimi">
        <h1>Mir&#235 se erdh&#235t!</h1>
        <form method="post" id="signup">
            <legend>P&#235r t&#235 filluar procesin e regjistrimit ju duhet t&#235 plot&#235soni t&#235
                 dh&#235nat n&#235 vazhdim:
            </legend>
            <label>Emri</label>  <label id="mbiemri1">Mbiemri</label><br>
            <input type="text" name="emri" id="emri">
            <input type="text" name="mbiemri" id="mbiemri"><br>
            <label>Telefoni</label>  <label id="email1">Email</label><br>
            <input type="text" name="telefoni" id="telefoni">
            <input type="email" name="email" id="email"><br>
            <label>Fjalekalimi</label><br>
            <input type="password" name="fjalekalimi" id="fjalekalimi">
            <input type="submit" name="signup" id="signup" value="Regjistrohu">
        </form>
    </section>
<?php
    require 'include/footer2.php';
?>