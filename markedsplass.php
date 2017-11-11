
<?php 

include('header.php');
include('left.php');
include('right.php');

    $staten = "STATEN";
    $pris = 10000000;

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $username = $_SESSION['username'];      // Henter brukernavn til brukeren som vil kjøpe
    $money    = $row['money'];


//////////////////////////////////////////////////////////////////////////
//                       KJØP AV PRIVATKLINIKK                          //
//////////////////////////////////////////////////////////////////////////

    $sql_privatklinikk = "SELECT * FROM privatklinikk";
    $result_privatklinikk = mysqli_query($con, $sql_privatklinikk) or die("Bad query: $sql_privatklinikk");
    $row_privatklinikk = mysqli_fetch_assoc($result_privatklinikk);

    $privatklinikk_eier_osl = $row_privatklinikk['pk_osl_eier'];
    $privatklinikk_eier_krs = $row_privatklinikk['pk_krs_eier'];
    $privatklinikk_eier_stc = $row_privatklinikk['pk_stc_eier'];
    $privatklinikk_eier_got = $row_privatklinikk['pk_got_eier'];
    $privatklinikk_eier_kob = $row_privatklinikk['pk_kob_eier'];

if(isset($_POST['kjop_privatklinikk_osl'])){
    $kjop_privatklinikk_osl = $_POST['kjop_privatklinikk_osl'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til privatklinikken i Oslo!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE privatklinikk SET pk_osl_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte privatklinikken i Oslo for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av privatklinikken i Oslo!</div>';

    }
}

if(isset($_POST['kjop_privatklinikk_krs'])){
    $kjop_privatklinikk_krs = $_POST['kjop_privatklinikk_krs'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til privatklinikken i Kristiansand!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE privatklinikk SET pk_krs_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte privatklinikken i Kristiansand for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av privatklinikken i Kristiansand!</div>';

    }
}

if(isset($_POST['kjop_privatklinikk_stc'])){
    $kjop_privatklinikk_stc = $_POST['kjop_privatklinikk_stc'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til privatklinikken i Stockholm!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE privatklinikk SET pk_stc_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte privatklinikken i Stockholm for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av privatklinikken i Stockholm!</div>';

    }
}

if(isset($_POST['kjop_privatklinikk_got'])){
    $kjop_privatklinikk_got = $_POST['kjop_privatklinikk_got'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til privatklinikken i Göteborg!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE privatklinikk SET pk_got_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte privatklinikken i Göteborg for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av privatklinikken i Göteborg!</div>';

    }
}

if(isset($_POST['kjop_privatklinikk_kob'])){
    $kjop_privatklinikk_got = $_POST['kjop_privatklinikk_kob'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til privatklinikken i København!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE privatklinikk SET pk_kob_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte privatklinikken i København for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av privatklinikken i København!</div>';

    }
}

//////////////////////////////////////////////////////////////////////////
//                          KJØP AV FLYPLASS                            //
//////////////////////////////////////////////////////////////////////////

    $sql_flyplass = "SELECT * FROM flyplass";
    $result_flyplass = mysqli_query($con, $sql_flyplass) or die("Bad query: $sql_flyplass");
    $row_flyplass = mysqli_fetch_assoc($result_flyplass);

    $flyplass_eier_osl = $row_flyplass['osl_eier'];
    $flyplass_eier_krs = $row_flyplass['krs_eier'];
    $flyplass_eier_stc = $row_flyplass['stc_eier'];
    $flyplass_eier_got = $row_flyplass['got_eier'];
    $flyplass_eier_kob = $row_flyplass['kob_eier'];

if(isset($_POST['kjop_flyplass_osl'])){
    $kjop_flyplass_osl = $_POST['kjop_flyplass_osl'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til flyplassen i Oslo!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE flyplass SET osl_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte flyplassen i Oslo for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av flyplassen i Oslo!</div>';

    }
}

if(isset($_POST['kjop_flyplass_krs'])){
    $kjop_flyplass_krs = $_POST['kjop_flyplass_krs'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til flyplassen i Kristiansand!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE flyplass SET krs_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte flyplassen i Kristiansand for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av flyplassen i Kristiansand!</div>';

    }
}

if(isset($_POST['kjop_flyplass_stc'])){
    $kjop_flyplass_stc = $_POST['kjop_flyplass_stc'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til flyplassen i Stockholm!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE flyplass SET stc_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte flyplassen i Stockholm for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av flyplassen i Stockholm!</div>';

    }
}

if(isset($_POST['kjop_flyplass_got'])){
    $kjop_flyplass_got = $_POST['kjop_flyplass_got'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til flyplassen i Göteborg!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE flyplass SET got_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte flyplassen i Göteborg for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av flyplassen i Göteborg!</div>';

    }
}

if(isset($_POST['kjop_flyplass_kob'])){
    $kjop_flyplass_kob = $_POST['kjop_flyplass_kob'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til flyplassen i København!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE flyplass SET kob_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
        
        echo '<div id="velykket">Du kjøpte flyplassen i København for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av flyplassen i København!</div>';
    }
}

//////////////////////////////////////////////////////////////////////////
//                        KJØP AV KULEFABRIKK                           //
//////////////////////////////////////////////////////////////////////////

    $sql_kulefabrikk = "SELECT * FROM kulefabrikk";
    $result_kulefabrikk = mysqli_query($con, $sql_kulefabrikk) or die("Bad query: $sql_kulefabrikk");
    $row_kulefabrikk = mysqli_fetch_assoc($result_kulefabrikk);

    $kulefabrikk_eier_osl = $row_kulefabrikk['osl_eier'];
    $kulefabrikk_eier_krs = $row_kulefabrikk['krs_eier'];
    $kulefabrikk_eier_stc = $row_kulefabrikk['stc_eier'];
    $kulefabrikk_eier_got = $row_kulefabrikk['got_eier'];
    $kulefabrikk_eier_kob = $row_kulefabrikk['kob_eier'];

if(isset($_POST['kjop_kulefabrikk_osl'])){
    $kjop_kulefabrikk_osl = $_POST['kjop_kulefabrikk_osl'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til kulefabrikken i Oslo!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE kulefabrikk SET osl_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
		
		$nullstill_kuler = "UPDATE kulefabrikk SET osl_ant_kuler = 0";
        mysqli_query($con, $nullstill_kuler) or die ("Bad query: $nullstill_kuler");
        
        echo '<div id="velykket">Du kjøpte kulefabrikken i Oslo for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av kulefabrikken i Oslo!</div>';

    }
}

if(isset($_POST['kjop_kulefabrikk_krs'])){
    $kjop_kulefabrikk_krs = $_POST['kjop_kulefabrikk_krs'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til kulefabrikken i Kristiansand!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE kulefabrikk SET krs_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
		
		$nullstill_kuler = "UPDATE kulefabrikk SET krs_ant_kuler = 0";
        mysqli_query($con, $nullstill_kuler) or die ("Bad query: $nullstill_kuler");
        
        echo '<div id="velykket">Du kjøpte kulefabrikken i Kristiansand for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av kulefabrikken i Kristiansand!</div>';

    }
}

if(isset($_POST['kjop_kulefabrikk_stc'])){
    $kjop_kulefabrikk_stc = $_POST['kjop_kulefabrikk_stc'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til kulefabrikken i Stockholm!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE kulefabrikk SET stc_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
		
		$nullstill_kuler = "UPDATE kulefabrikk SET stc_ant_kuler = 0";
        mysqli_query($con, $nullstill_kuler) or die ("Bad query: $nullstill_kuler");
        
        echo '<div id="velykket">Du kjøpte kulefabrikken i Stockholm for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av kulefabrikken i Stockholm!</div>';

    }
}

if(isset($_POST['kjop_kulefabrikk_got'])){
    $kjop_kulefabrikk_got = $_POST['kjop_kulefabrikk_got'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til kulefabrikken i Göteborg!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE kulefabrikk SET got_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
		
		$nullstill_kuler = "UPDATE kulefabrikk SET got_ant_kuler = 0";
        mysqli_query($con, $nullstill_kuler) or die ("Bad query: $nullstill_kuler");
        
        echo '<div id="velykket">Du kjøpte kulefabrikken i Göteborg for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av kulefabrikken i Göteborg!</div>';

    }
}

if(isset($_POST['kjop_kulefabrikk_kob'])){
    $kjop_kulefabrikk_kob = $_POST['kjop_kulefabrikk_kob'];

    if($money < $pris) {
        echo '<div id="mislykket">Du har ikke råd til kulefabrikken i København!</div>';
    } else {
        $betal = "UPDATE users SET money = ($money - $pris) WHERE username = '$username'";
        mysqli_query($con, $betal) or die ("Bad query: $betal");
        
        $selg = "UPDATE kulefabrikk SET kob_eier = '$username'";
        mysqli_query($con, $selg) or die ("Bad query: $selg");
		
		$nullstill_kuler = "UPDATE kulefabrikk SET kob_ant_kuler = 0";
        mysqli_query($con, $nullstill_kuler) or die ("Bad query: $nullstill_kuler");
        
        echo '<div id="velykket">Du kjøpte kulefabrikken i København for ';
        echo number_format($pris, 0, '.', ' ');
        echo ',- du er nå den nye eieren av kulefabrikken i København!</div>';
    }
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reise.css" />
        <link rel="stylesheet" type="text/css" href="css/notat.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">

        <center>
            <div id="reisecontainer2">
                <li id="reisedesign2">Markedsplassen
                    <div class="tooltip"><t style="color:gray;">(?)</t>
                        <span class="tooltiptext">På markedsplassen kan du kjøpe firmaer. Når du kjøper et firma vil du få muligheten til å administrere firmaet. <br>
                            Kjøper du privatklinikk så bestemmer du pris pr. %. Kjøper du en flyplass så bestemmer du prisen pr reise fra din flyplass i din by.</span>
                    </div>
                </li>
                <img src="images/handlinger/markedsplass.png">
            </div>
            
            <div id="reisecontainer">
                <li id="reisedesign"><a style="float:left; margin-left: 10px;">Eiendom</a><a style="float:right; margin-right: 58px; width: 100px;">Pris</a></li>
            </div>
        
            <form id="form1" name="form1" method="post" action=""> 
                <div id="countdown">
                    
                    <!------------------------------------------------------------------------------------------->
                    <!--      SJEKKER OM EIEREN FOR FLYPLASS ER STATEN. OM DEN ER DET - LEGG UT FOR SALG       -->
                    <!------------------------------------------------------------------------------------------->
                    
                    <?php if($flyplass_eier_osl != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_flyplass_osl" class="reise">Flyplassen i Oslo<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    
                    <?php if($flyplass_eier_krs != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_flyplass_krs" class="reise">Flyplassen i Kristiansand<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    
                    <?php if($flyplass_eier_stc != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_flyplass_stc" class="reise">Flyplassen i Stockholm<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    
                    <?php if($flyplass_eier_got != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_flyplass_got" class="reise">Flyplassen i Göteborg<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    
                    <?php if($flyplass_eier_kob != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->                    
                        <button name="kjop_flyplass_kob" class="reise">Flyplassen i København<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    
                    <!------------------------------------------------------------------------------------------->
                    <!--   SJEKKER OM EIEREN FOR PRIVATKLINIKKEN ER STATEN. OM DEN ER DET - LEGG UT FOR SALG   -->
                    <!------------------------------------------------------------------------------------------->
                    
                    <?php if($privatklinikk_eier_osl != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_privatklinikk_osl" class="reise">Privatklinikken i Oslo<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    <?php if($privatklinikk_eier_krs != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_privatklinikk_krs" class="reise">Privatklinikken i Kristiansand<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    <?php if($privatklinikk_eier_stc != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_privatklinikk_stc" class="reise">Privatklinikken i Stockholm<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    <?php if($privatklinikk_eier_got != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_privatklinikk_got" class="reise">Privatklinikken i Göteborg<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    <?php if($privatklinikk_eier_kob != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_privatklinikk_kob" class="reise">Privatklinikken i København<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    
                    <!------------------------------------------------------------------------------------------->
                    <!--   SJEKKER OM EIEREN FOR KULEFABRIKKEN ER STATEN. OM DEN ER DET - LEGG UT FOR SALG     -->
                    <!------------------------------------------------------------------------------------------->
                    
                    <?php if($kulefabrikk_eier_osl != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_kulefabrikk_osl" class="reise">Kulefabrikken i Oslo<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    <?php if($kulefabrikk_eier_krs != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_kulefabrikk_krs" class="reise">Kulefabrikken i Kristiansand<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    <?php if($kulefabrikk_eier_stc != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_kulefabrikk_stc" class="reise">Kulefabrikken i Stockholm<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    <?php if($kulefabrikk_eier_got != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_kulefabrikk_got" class="reise">Kulefabrikken i Göteborg<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    <?php if($kulefabrikk_eier_kob != $staten){ } else { ?> <!-- sjekker om staten eier flyplassen, hvis ikke den er eid av staten kan man kjøpe -->
                        <button name="kjop_kulefabrikk_kob" class="reise">Kulefabrikken i København<a style="float:right; margin-right: 10px; width: 100px;">10 000 000,-</a></button>
                    <?php } ?>
                    
                </div>
            </form>
        </center>
    </body>
</html>
