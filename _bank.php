<?php

include("auth.php");
require('connection/db.php');

if (isset($_REQUEST['antallpenger'])){
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $antallpenger = $_POST['antallpenger'];
    $penger = $row['money'];
    $bank_penger = $row['bank_money'];

    if ($penger < $antallpenger) {
        // ikke nok penger
        echo '<div id="mislykket">Du kan ikke sette inn mer penger enn du har.</div>';
    } elseif ($penger > $antallpenger) {
        // Sett inn
        $oppdaterbank = "UPDATE users SET bank_money = ($antallpenger + $bank_penger) WHERE username='$username'";
        mysqli_query($con, $oppdaterbank);
        $tavekk = "UPDATE users SET money = ($penger - $antallpenger) WHERE username='$username'";
        mysqli_query($con, $tavekk);    
        echo "<meta http-equiv='refresh' content='0'>";
    }
}


if (isset($_REQUEST['antallpengerut'])){
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $antallpengerut = $_POST['antallpengerut'];
    $penger = $row['money'];
    $bank_penger = $row['bank_money'];

    if ($bank_penger < $antallpengerut) {
        // ikke nok penger
        echo '<div id="mislykket">Du kan ikke ta ut mer enn du har.</div>';
    } elseif($bank_penger > $antallpengerut) {
        // ta ut
        $taut = "UPDATE users SET money = ($penger + $antallpengerut) WHERE username='$username'";
        mysqli_query($con, $taut);
		$oppdaterbanken = "UPDATE users SET bank_money = ($bank_penger - $antallpengerut) WHERE username='$username'";
        mysqli_query($con, $oppdaterbanken);
		echo "<meta http-equiv='refresh' content='0'>";
    }
}

if (isset($_POST['ta_ut_alt'])){
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $bank_penger = $row['bank_money'];
    $penger_ute = $row['money'];

    if ($bank_penger == 0) {
        // ikke nok penger
        echo '<div id="mislykket">Du har ingen penger på konto.</div>';
    } elseif($bank_penger > 0) {
        // ta ut alt
        $ut_alt = "UPDATE users SET money = ($penger_ute + $bank_penger) WHERE username='$username'";
        mysqli_query($con, $ut_alt);
		$ta_ut_alt = "UPDATE users SET bank_money = (0) WHERE username='$username'";
        mysqli_query($con, $ta_ut_alt);
		echo "<meta http-equiv='refresh' content='0'>";
    }
}

if (isset($_POST['sett_inn_alt'])){
$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die ("Bad query: $sql");
$row = mysqli_fetch_assoc($result);
	
$bank_penger = $row['bank_money'];
$penger_ute = $row['money'];
	
	if ($penger_ute == 0){
		echo '<div id="mislykket">Du har ikke noe penger ute</div>';
	} elseif($penger_ute > 0) {
		$oppdaterbanken = "UPDATE users SET bank_money = ($penger_ute + $bank_penger) WHERE username='$username'";
        mysqli_query($con, $oppdaterbanken);
        $sett_null = "UPDATE users SET money = (0) WHERE username='$username'";
        mysqli_query($con, $sett_null);
        echo "<meta http-equiv='refresh' content='0'>";
	}
}

if (isset($_REQUEST['antallpengeroverfor'])){
    if (isset($_REQUEST['mottaker'])){
        $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
        $result = mysqli_query($con, $sql) or die("Bad query: $sql");
        $row = mysqli_fetch_assoc($result);
        
        $mottaker = $_POST['mottaker'];
        $antallpengeroverfor = $_POST['antallpengeroverfor'];
        $penger = $row['money'];
        $bank_penger = $row['bank_money'];
        
        $sql = "SELECT * FROM users WHERE username = '$mottaker' LIMIT 1";
        $result1 = mysqli_query($con, $sql) or die("Bad query: $sql");
        $row1 = mysqli_fetch_assoc($result1);
        
        $mottaker_bank_penger = $row1['bank_money'];
        

        if ($antallpengeroverfor > $bank_penger) {
            // ikke nok penger
            echo '<div id="mislykket">Du kan ikke sende mer penger enn du har i banken.</div>';
        } elseif ($antallpengeroverfor < $bank_penger) {
            // overfør
            $overfor = "UPDATE users SET bank_money = ($mottaker_bank_penger + $antallpengeroverfor) WHERE username='$mottaker'";
            mysqli_query($con, $overfor);
            $oppdater_cash = "UPDATE users SET bank_money = ($bank_penger - $antallpengeroverfor) WHERE username='".$_SESSION['username']."'";
            mysqli_query($con, $oppdater_cash);
            echo '<div id="velykket">Du sendte ';
            echo number_format($antallpengeroverfor, 0, '.', ' ');
            echo ',- til ';
            echo $mottaker;
            echo'</div>';
        }
    }
}
?>