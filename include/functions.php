<?php
    session_start();
    $dbConnection;
    function dbConn(){
        global $dbConnection;
        $dbConnection = mysqli_connect('localhost','root','','poliklinika');
        if(!$dbConnection){
            die(mysqli_error($dbConnection));
        }
    }
    dbConn();

    if(isset($_GET['argument'])){
		if($_GET['argument']=="mesazhi"){
			unset($_SESSION['mesazhi']);
		}else if($_GET['argument']=='dalja'){
			session_destroy();
			echo "index.php";
		}
	}

    //per login per pacienta
    function login($email,$fjalekalimi){
        global $dbConnection;
		$sql = "SELECT pacientiid, CONCAT(emri,' ', mbiemri) emrimbiemri,telefoni,email FROM pacientet";
		$sql .= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
		$pacientiData = mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($pacientiData)==1){
			$pacientiData = mysqli_fetch_assoc($pacientiData);
			$pacienti=array();
			$pacienti['pacientiid']= $pacientiData['pacientiid'];
			$pacienti['emrimbiemri']= $pacientiData['emrimbiemri'];
			$pacienti['roli']=$pacientiData['roli'];
			$_SESSION['pacienti']=$pacienti;
			header("Location: index.php");
		}else{
			echo "Nuk ka pacient me keto shenime";
		}	
    }
    //per login per mjek
    function loginMjek($email,$fjalekalimi){
        global $dbConnection;
		$sql = "SELECT mjekuid, CONCAT(emri,' ', mbiemri) emrimbiemri,telefoni,email,roli FROM mjeket";
		$sql .= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
		$mjekuData = mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($mjekuData)==1){
			$mjekuData = mysqli_fetch_assoc($mjekuData);
			$mjeku=array();
			$mjeku['mjekuid']= $mjekuData['mjekuid'];
			$mjeku['emrimbiemri']= $mjekuData['emrimbiemri'];
            $mjeku['roli']= $mjekuData['roli'];
			$_SESSION['mjeku']=$mjeku;
			header("Location: pacientet.php");
		}else{
			echo "Nuk ka mjek me keto shenime";
		}	
    }
    //per login per infermiere
    function loginInfermiere($email,$fjalekalimi){
        global $dbConnection;
		$sql = "SELECT infermieriid, CONCAT(emri,' ', mbiemri) emrimbiemri,telefoni,email,roli FROM infermieret";
		$sql .= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
		$infermieriData = mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($infermieriData)==1){
			$infermieriData = mysqli_fetch_assoc($infermieriData);
			$infermieri=array();
			$infermieri['infermieriid']= $infermieriData['infermieriid'];
			$infermieri['emrimbiemri']= $infermieriData['emrimbiemri'];
            $infermieri['roli']= $infermieriData['roli'];
			$_SESSION['infermieri']=$infermieri;
			header("Location: pacientet.php");
		}else{
			echo "Nuk ka pacient me keto shenime";
		}	
    }
    function regjistrohu($emri, $mbiemri, $telefoni, $email, $fjalekalimi){
		global $dbConnection;
		$sql = "INSERT INTO pacientet(emri,mbiemri,telefoni,email,fjalekalimi) VALUES ";
		$sql .= "('$emri','$mbiemri','$telefoni','$email','$fjalekalimi')";
		$result = mysqli_query($dbConnection, $sql);
		if ($result) {
			login($email,$fjalekalimi);
		} else {
			die(mysqli_error($dbConnection));
		}
	}

    //per mjeket
    function merrMjeket(){
        global $dbConnection;
        $sql = "SELECT mjekuid,emri,mbiemri,telefoni,email,qyteti,dataelindjes,roli FROM mjeket";
        return mysqli_query($dbConnection,$sql);
    }
    function merrMjekRandom(){
        global $dbConnection;
        $sql = "SELECT mjekuid FROM mjeket ORDER BY RAND() LIMIT 1";
        return mysqli_query($dbConnection,$sql);
    }
    function merrMjekeId($mjekuid){
        global $dbConnection;
        $sql = "SELECT mjekuid,emri,mbiemri,telefoni,email,qyteti,dataelindjes,roli FROM mjeket WHERE mjekuid=$mjekuid";
        $result = mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($result) == 1){
			return mysqli_fetch_assoc($result);
		}    
    }

    //per kontrollat 
    function merrKontrollat(){
        global $dbConnection;
        $sql ="SELECT k.kontrollaid,CONCAT(p.emri,' ',p.mbiemri) emrimbiemrip,k.emri,k.dataekontrolles,k.pershkrimi,";
        $sql .="CONCAT(m.emri,' ',m.mbiemri) emrimbiemrim,k.kategoriaid";
        $sql .=" FROM pacientet p INNER JOIN kontrollat k ON p.pacientiid=k.pacientiid";
        $sql .=" INNER JOIN mjeket m ON k.mjekuid=m.mjekuid";
        return mysqli_query($dbConnection,$sql);
    }
    function merrKontrolleId($kontrollaid){
        global $dbConnection;
        $sql ="SELECT k.kontrollaid,CONCAT(p.emri,' ',p.mbiemri) emrimbiemrip,k.emri,k.dataekontrolles,k.pershkrimi,";
        $sql .="CONCAT(m.emri,' ',m.mbiemri) emrimbiemrim,k.kategoriaid";
        $sql .=" FROM pacientet p INNER JOIN kontrollat k ON p.pacientiid=k.pacientiid";
        $sql .=" INNER JOIN mjeket m ON k.mjekuid=m.mjekuid WHERE kontrollaid=$kontrollaid";
        $result = mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($result) == 1){
			return mysqli_fetch_assoc($result);
		}
    }
    function shtoKontrolle($emriMbiemriPacientit,$emriMbiemriMjekut,$emriKontrolles,$dataekontrolles,$pershkrimi){
        global $dbConnection;
        //per analize
        $analizat=merrAnalizat();
        $analizat=mysqli_fetch_assoc($analizat);
        $analizaId=rand(1,count($analizat)+1);

        $sql="INSERT INTO kontrollat(pacientiid,mjekuid,analizaid,kategoriaid,dataekontrolles,emri,pershkrimi) VALUES";
        $sql .=" ($emriMbiemriPacientit,$emriMbiemriMjekut,$analizaId,'2','$dataekontrolles','$emriKontrolles','$pershkrimi')";
        $result = mysqli_query($dbConnection, $sql);
        if($result){
            $_SESSION['mesazhi']="Kontrolla u shtua me sukses.";
            header("Location: kontrolla.php");
        }else{
            die(mysqli_error($dbConnection));
        }        
    }

    function modifikoKontrolle($kontrollaid,$pacientiid,$mjekuid,$emriKontrolles,$dataekontrolles,$pershkrimi){
        global $dbConnection;
        $sql = "UPDATE kontrollat SET pacientiid=$pacientiid,mjekuid=$mjekuid,emri='$emriKontrolles',pershkrimi='$pershkrimi',";
        $sql .= "dataekontrolles='$dataekontrolles' WHERE kontrollaid=$kontrollaid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Kontrolla u modifikua me sukses.";
			header("Location: kontrolla.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function fshijKontrolle($kontrollaid){
        global $dbConnection;
        $sql = "DELETE FROM kontrollat WHERE kontrollaid=$kontrollaid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Kontrolla u fshie me sukses.";
			header("Location: kontrolla.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    //per terminet ne anen e pacientit
    function merrTerminId($pacientiid){
        global $dbConnection;
        $sql="SELECT k.kontrollaid,CONCAT(p.emri,' ',p.mbiemri) emrimbiemrip,k.emri,k.dataekontrolles,";
        $sql.="CONCAT(m.emri,' ',m.mbiemri) emrimbiemrim FROM pacientet p INNER JOIN kontrollat k ON ";
        $sql.="p.pacientiid=k.pacientiid INNER JOIN mjeket m ON k.mjekuid=m.mjekuid WHERE p.pacientiid=$pacientiid";
        return mysqli_query($dbConnection, $sql);		
    }
    function shtoKontrolle1($emriMbiemriPacientit,$emriMbiemriMjekut,$emriKontrolles,$dataekontrolles){
        global $dbConnection;
        //per analize
        $analizat=merrAnalizat();
        $analizat=mysqli_fetch_assoc($analizat);
        $analizaId=rand(1,count($analizat)+1);

        $sql="INSERT INTO kontrollat(pacientiid,mjekuid,analizaid,kategoriaid,dataekontrolles,emri) VALUES";
        $sql .=" ($emriMbiemriPacientit,$emriMbiemriMjekut,$analizaId,'2','$dataekontrolles','$emriKontrolles')";
        $result = mysqli_query($dbConnection, $sql);
        if($result){
            $_SESSION['mesazhi']="Termini u shtua me sukses.";
            header("Location: terminet.php");
        }else{
            die(mysqli_error($dbConnection));
        }        
    }
    function modifikoTermin($kontrollaid,$pacientiid,$emriKontrolles,$dataekontrolles){
        global $dbConnection;
        $sql = "UPDATE kontrollat SET pacientiid=$pacientiid,emri='$emriKontrolles',";
        $sql .= "dataekontrolles='$dataekontrolles' WHERE kontrollaid=$kontrollaid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Termini u modifikua me sukses.";
			header("Location: terminet.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function fshijTermin($kontrollaid){
        global $dbConnection;
        $sql = "DELETE FROM kontrollat WHERE kontrollaid=$kontrollaid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Termini u fshie me sukses.";
			header("Location: terminet.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }

    //per pacientet
    function merrPacientet(){
        global $dbConnection;
        $sql = "SELECT pacientiid,CONCAT(emri,' ',mbiemri) emrimbiemri,telefoni,email,qyteti,dataelindjes";
        $sql .= " FROM pacientet";
        return mysqli_query($dbConnection,$sql);
    }
    function merrPacientId($pacientiid){
        global $dbConnection;
        $sql = "SELECT pacientiid,emri,mbiemri,telefoni,email,qyteti,dataelindjes";
        $sql.= " FROM pacientet WHERE pacientiid=$pacientiid";
        $result = mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($result) == 1){
			return mysqli_fetch_assoc($result);
		}
    }
    function modifikoPacient($pacientiid,$emri,$mbiemri,$telefoni,$email,$qyteti,$dataelindjes){
        global $dbConnection;
        $sql = "UPDATE pacientet SET emri='$emri',mbiemri='$mbiemri',telefoni='$telefoni',email='$email',";
        $sql .= "qyteti='$qyteti',dataelindjes='$dataelindjes' WHERE pacientiid=$pacientiid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Pacienti u modifikua me sukses.";
			header("Location: pacientet.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function fshijPacient($pacientiid){
        global $dbConnection;
        $sql = "DELETE FROM pacientet WHERE pacientiid=$pacientiid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Pacienti u fshie me sukses.";
			header("Location: pacientet.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function shtoPacient($emri,$mbiemri,$telefoni,$email,$qyteti,$dataelindjes){
        global $dbConnection;
        $sql = "INSERT INTO pacientet(emri,mbiemri,telefoni,email,qyteti,dataelindjes)";
        $sql .= " VALUES ('$emri','$mbiemri','$telefoni','$email','$qyteti','$dataelindjes')";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Pacienti u shtua me sukses.";
			header("Location: pacientet.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }

    //per infermieret
    function merrInfermieret(){
        global $dbConnection;
        $sql = "SELECT infermieriid,CONCAT(emri,' ',mbiemri) emrimbiemri,telefoni,email,qyteti,dataelindjes,roli ";
        $sql .= " FROM infermieret";
        return mysqli_query($dbConnection,$sql);
    }
    function merrInfermierId($infermieriid){
        global $dbConnection;
        $sql = "SELECT infermieriid,emri,mbiemri,telefoni,email,qyteti,dataelindjes,roli";
        $sql.= " FROM infermieret WHERE infermieriid=$infermieriid";
        $result = mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($result) == 1){
			return mysqli_fetch_assoc($result);
		}
    }
    function modifikoInfermier($infermieriid,$emri,$mbiemri,$telefoni,$email,$qyteti){
        global $dbConnection;
        $sql = "UPDATE infermieret SET emri='$emri',mbiemri='$mbiemri',telefoni='$telefoni',email='$email',";
        $sql .= "qyteti='$qyteti' WHERE infermieriid=$infermieriid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Infermieri u modifikua me sukses.";
			header("Location: infermieret.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function fshijInfermier($infermieriid){
        global $dbConnection;
        $sql = "DELETE FROM infermieret WHERE infermieriid=$infermieriid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Infermieri u fshie me sukses.";
			header("Location: infermieret.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function shtoInfermier($emri,$mbiemri,$telefoni,$email,$qyteti){
        global $dbConnection;
        $sql = "INSERT INTO infermieret(emri,mbiemri,telefoni,email,qyteti)";
        $sql .= " VALUES ('$emri','$mbiemri','$telefoni','$email','$qyteti')";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Infermieri u shtua me sukses.";
			header("Location: infermieret.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }

    //per analizat
    function merrAnalizat(){
        global $dbConnection;
        $sql = "SELECT analizaid,a.emri,a.qmimi,CONCAT(i.emri,' ',i.mbiemri) emrimbiemri";
        $sql .= " FROM analiza a INNER JOIN infermieret i ON a.infermieriid=i.infermieriid";
        return mysqli_query($dbConnection,$sql);
    }
    function merrAnalizaId($analizaid){
        global $dbConnection;
        $sql = "SELECT analizaid,emri,qmimi";
        $sql.= " FROM analiza WHERE analizaid=$analizaid";
        $result = mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($result) == 1){
			return mysqli_fetch_assoc($result);
		}
    }
    function modifikoAnalize($analizaid,$emri,$qmimi){
        global $dbConnection;
        $sql = "UPDATE analiza SET emri='$emri',qmimi='$qmimi'";
        $sql .= " WHERE analizaid=$analizaid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Analiza u modifikua me sukses.";
			header("Location: analizat.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function fshijAnalize($analizaid){
        global $dbConnection;
        $sql = "DELETE FROM analiza WHERE analizaid=$analizaid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Analiza u fshie me sukses.";
			header("Location: analizat.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function shtoAnalize($emri,$qmimi,$infermieriid){
        global $dbConnection;
        $sql = "INSERT INTO analiza(emri,qmimi,infermieriid)";
        $sql .= " VALUES ('$emri','$qmimi','$infermieriid')";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Analiza u shtua me sukses.";
			header("Location: analizat.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }

    /*per profil*/
    function modifikoProfilinPacient($pacientiid,$emri,$mbiemri,$telefoni,$email,$qyteti,$dataelindjes){
        global $dbConnection;
        $sql = "UPDATE pacientet SET emri='$emri',mbiemri='$mbiemri',telefoni='$telefoni',email='$email',";
        $sql .= "qyteti='$qyteti',dataelindjes='$dataelindjes' WHERE pacientiid=$pacientiid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Profili u modifikua me sukses.";
			header("Location: index.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function modifikoProfilinMjek($mjekuid,$emri,$mbiemri,$telefoni,$email,$qyteti,$dataelindjes){
        global $dbConnection;
        $sql = "UPDATE mjeket SET emri='$emri',mbiemri='$mbiemri',telefoni='$telefoni',email='$email',";
        $sql .= "qyteti='$qyteti',dataelindjes='$dataelindjes' WHERE mjekuid=$mjekuid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Profili u modifikua me sukses.";
			header("Location: index.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    function modifikoProfilinInfermier($infermieriid,$emri,$mbiemri,$telefoni,$email,$qyteti,$dataelindjes){
        global $dbConnection;
        $sql = "UPDATE infermieret SET emri='$emri',mbiemri='$mbiemri',telefoni='$telefoni',email='$email',";
        $sql .= "qyteti='$qyteti',dataelindjes='$dataelindjes' WHERE infermieriid=$infermieriid";
        $result = mysqli_query($dbConnection, $sql);
		if($result){
			$_SESSION['mesazhi']="Profili u modifikua me sukses.";
			header("Location: index.php");
		}else{
			die(mysqli_error($dbConnection));
		}
    }
    /* Funksionet per daljen*/
	function dalja(){
		if(isset($_GET['argument']) && $_GET['argument']==='dalja'){
			session_destroy();

		}
	}
    dalja();
	

?>