<?php
    require 'include/header.php';
?>
    </header>  
    <?php
        if(isset($_POST['login'])){
            $pacientet = merrPacientet();
            $mjeket = merrMjeket();
            $infermieret = merrInfermieret();
            while($pacienti=mysqli_fetch_assoc($pacientet)){
                $emailP=$pacienti['email'];
                if($emailP==$_POST['email']){
                    login($_POST['email'],$_POST['fjalekalimi']);
                }
            }
            while($mjeku=mysqli_fetch_assoc($mjeket) ){
                $emailM=$mjeku['email'];
                if($emailM==$_POST['email']){
                    loginMjek($_POST['email'],$_POST['fjalekalimi']);
                }
            }
            while($infermieri=mysqli_fetch_assoc($infermieret) ){
                $emailM=$infermieri['email'];
                if($emailM==$_POST['email']){
                    loginInfermiere($_POST['email'],$_POST['fjalekalimi']);
                }
                else{
                    echo "Keni shenuar emailin apo passwordin gabim";
                }
            }
        }
    ?>
    <section id="hyrja">
        <h1>Hyr n&#235 llogarin&#235 tuaj</h1>
        <form method="post" id="login">
            <label>Email</label><br>
            <input type="email" name="email" id="email"><br>
            <label>Fjalekalimi</label><br>
            <input type="password" name="fjalekalimi" id="fjalekalimi"><br>
            <input type="submit" name="login" id="login" value="Hyr">
        </form>
    </section>
    <section id="hyrja2">
        <h1>Nuk jeni i regjistruar?</h1>
        <p>Klikoni <a href='regjistrimi.php'>k&#235tu</a> p&#235r tu regjistruar.</p>
    </section>
<?php
    require 'include/footer2.php';
?>