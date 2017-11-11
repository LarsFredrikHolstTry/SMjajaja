<?php 

include('header.php');
include('left.php');
include('right.php');
include('auth.php');


$sql = "SELECT * FROM kulefabrikk";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $osl_eier       = $row['osl_eier'];
    $osl_pris       = $row['osl_pris'];
    $osl_ant_kuler  = $row['osl_ant_kuler'];
    $osl_lvl        = $row['osl_lvl'];

    $krs_eier       = $row['krs_eier'];
    $krs_pris       = $row['krs_pris'];
    $krs_ant_kuler  = $row['krs_ant_kuler'];
    $krs_lvl        = $row['krs_lvl'];

    $stc_eier       = $row['stc_eier'];
    $stc_pris       = $row['stc_pris'];
    $stc_ant_kuler  = $row['stc_ant_kuler'];
    $stc_lvl        = $row['stc_lvl'];
        
    $got_eier       = $row['got_eier'];
    $got_pris       = $row['got_pris'];
    $got_ant_kuler  = $row['got_ant_kuler'];
    $got_lvl        = $row['got_lvl'];
        
    $kob_eier       = $row['kob_eier'];
    $kob_pris       = $row['kob_pris'];
    $kob_ant_kuler  = $row['kob_ant_kuler'];
    $kob_lvl        = $row['kob_lvl'];

$sql_user = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result_user = mysqli_query($con, $sql_user) or die("Bad query: $sql_user");
$row_user = mysqli_fetch_assoc($result_user);

    $city           = $row_user['city'];
    $oslo           = "Oslo";
    $kristiansand   = "Kristiansand";
    $stockholm      = "Stockholm";
    $kobenhavn      = "København";
    $goteborg       = "Göteborg";

////////////////////////////////////////////////////
////    PRODUSER KULER PÅ KULEFABRIKKEN SIN     ////
////////////////////////////////////////////////////

		
        
if(isset($_POST['osl_produser_kuler_btn'])){
    $sql = "SELECT * FROM kulefabrikk";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
    $row = mysqli_fetch_assoc($result);
    
    // Produsere kuler i Oslo
    $osl_produser_kuler = $_POST['osl_produser_kuler'];
    $osl_kuler = $row['osl_ant_kuler'];
    $osl_lvl = $row['osl_lvl'];
    
    if($osl_lvl == 1){
        $pris_pr_kule = 2000;
    } elseif($osl_lvl == 2) {
        $pris_pr_kule = 1500;
    } elseif($osl_lvl == 3) {
        $pris_pr_kule = 1000;
    } elseif($osl_lvl == 4) {
        $pris_pr_kule = 500;
    }
    
    $endre_osl_kuler = "UPDATE kulefabrikk SET osl_ant_kuler = ($osl_produser_kuler + $osl_kuler)";
    mysqli_query($con, $endre_osl_kuler) or die ("Bad query: $endre_osl_kuler");
    
    $betal = "UPDATE users SET money = ($money - ($pris_pr_kule * $osl_produser_kuler)) WHERE username = '".$_SESSION['username']."'";
    mysqli_query($con, $betal) or die ("Bad query: $betal");
    
    if($betal) {
        echo '<div id="velykket">Du produserte';
        echo $osl_produser_kuler;
        echo ' kuler!</div>';
    }
}

if(isset($_POST['krs_produser_kuler_btn'])){
    $sql = "SELECT * FROM kulefabrikk";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
    $row = mysqli_fetch_assoc($result);
    
    // Produsere kuler i Kristiansand
    $krs_produser_kuler = $_POST['krs_produser_kuler'];
    $krs_kuler = $row['krs_ant_kuler'];
    $krs_lvl = $row['krs_lvl'];
    
    if($krs_lvl == 1){
        $pris_pr_kule = 2000;
    } elseif($krs_lvl == 2) {
        $pris_pr_kule = 1500;
    } elseif($krs_lvl == 3) {
        $pris_pr_kule = 1000;
    } elseif($krs_lvl == 4) {
        $pris_pr_kule = 500;
    }
    
    $endre_krs_kuler = "UPDATE kulefabrikk SET krs_ant_kuler = ($krs_produser_kuler + $krs_kuler)";
    mysqli_query($con, $endre_krs_kuler) or die ("Bad query: $endre_krs_kuler");
    
    $betal = "UPDATE users SET money = ($money - ($pris_pr_kule * $krs_produser_kuler)) WHERE username = '".$_SESSION['username']."'";
    mysqli_query($con, $betal) or die ("Bad query: $betal");
    
    if($betal) {
        echo '<div id="velykket">Du produserte';
        echo $krs_produser_kuler;
        echo ' kuler!</div>';
    }
}

if(isset($_POST['stc_produser_kuler_btn'])){
    $sql = "SELECT * FROM kulefabrikk";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
    $row = mysqli_fetch_assoc($result);
    
    // Produsere kuler i Kristiansand
    $stc_produser_kuler = $_POST['stc_produser_kuler'];
    $stc_kuler = $row['stc_ant_kuler'];
    $stc_lvl = $row['stc_lvl'];
    
    if($stc_lvl == 1){
        $pris_pr_kule = 2000;
    } elseif($stc_lvl == 2) {
        $pris_pr_kule = 1500;
    } elseif($stc_lvl == 3) {
        $pris_pr_kule = 1000;
    } elseif($stc_lvl == 4) {
        $pris_pr_kule = 500;
    }
    
    $endre_stc_kuler = "UPDATE kulefabrikk SET stc_ant_kuler = ($stc_produser_kuler + $stc_kuler)";
    mysqli_query($con, $endre_stc_kuler) or die ("Bad query: $endre_stc_kuler");
    
    $betal = "UPDATE users SET money = ($money - ($pris_pr_kule * $stc_produser_kuler)) WHERE username = '".$_SESSION['username']."'";
    mysqli_query($con, $betal) or die ("Bad query: $betal");
    
    if($betal) {
        echo '<div id="velykket">Du produserte';
        echo $stc_produser_kuler;
        echo ' kuler!</div>';
    }
}

if(isset($_POST['got_produser_kuler_btn'])){
    $sql = "SELECT * FROM kulefabrikk";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
    $row = mysqli_fetch_assoc($result);
    
    // Produsere kuler i Kristiansand
    $got_produser_kuler = $_POST['got_produser_kuler'];
    $got_kuler = $row['got_ant_kuler'];
    $got_lvl = $row['got_lvl'];
    
    if($got_lvl == 1){
        $pris_pr_kule = 2000;
    } elseif($got_lvl == 2) {
        $pris_pr_kule = 1500;
    } elseif($got_lvl == 3) {
        $pris_pr_kule = 1000;
    } elseif($got_lvl == 4) {
        $pris_pr_kule = 500;
    }
    
    $endre_got_kuler = "UPDATE kulefabrikk SET got_ant_kuler = ($got_produser_kuler + $got_kuler)";
    mysqli_query($con, $endre_got_kuler) or die ("Bad query: $endre_got_kuler");
    
    $betal = "UPDATE users SET money = ($money - ($pris_pr_kule * $got_produser_kuler)) WHERE username = '".$_SESSION['username']."'";
    mysqli_query($con, $betal) or die ("Bad query: $betal");
    
    if($betal) {
        echo '<div id="velykket">Du produserte';
        echo $got_produser_kuler;
        echo ' kuler!</div>';
    }
}

if(isset($_POST['kob_produser_kuler_btn'])){
    $sql = "SELECT * FROM kulefabrikk";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
    $row = mysqli_fetch_assoc($result);
    
    // Produsere kuler i Kristiansand
    $kob_produser_kuler = $_POST['kob_produser_kuler'];
    $kob_kuler = $row['kob_ant_kuler'];
    $kob_lvl = $row['kob_lvl'];
    
    if($kob_lvl == 1){
        $pris_pr_kule = 2000;
    } elseif($kob_lvl == 2) {
        $pris_pr_kule = 1500;
    } elseif($kob_lvl == 3) {
        $pris_pr_kule = 1000;
    } elseif($kob_lvl == 4) {
        $pris_pr_kule = 500;
    }
    
    $endre_kob_kuler = "UPDATE kulefabrikk SET kob_ant_kuler = ($kob_produser_kuler + $kob_kuler)";
    mysqli_query($con, $endre_kob_kuler) or die ("Bad query: $endre_kob_kuler");
    
    $betal = "UPDATE users SET money = ($money - ($pris_pr_kule * $kob_produser_kuler)) WHERE username = '".$_SESSION['username']."'";
    mysqli_query($con, $betal) or die ("Bad query: $betal");
    
    if($betal) {
        echo '<div id="velykket">Du produserte';
        echo $kob_produser_kuler;
        echo ' kuler!</div>';
    }
}

////////////////////////////////////////////////////
////     ENDRE PRIS PÅ KULEFABRIKKEN SIN        ////
////////////////////////////////////////////////////
        
if(isset($_POST['osl_endre_pris'])){
    
    // Endre pris i Oslo
    $osl_ny_pris = $_POST['osl_ny_pris'];
    
    $endre_osl_pris = "UPDATE kulefabrikk SET osl_pris = $osl_ny_pris";
    mysqli_query($con, $endre_osl_pris) or die ("Bad query: $endre_osl_pris");
    
    if($endre_osl_pris) {
        echo '<div id="velykket">Du endret prisen til ';
        echo $osl_ny_pris;
        echo '</div>';
    }
}

if(isset($_POST['krs_endre_pris'])){
    
    // Endre pris i Oslo
    $krs_ny_pris = $_POST['krs_ny_pris'];
    
    $endre_krs_pris = "UPDATE kulefabrikk SET krs_pris = $krs_ny_pris";
    mysqli_query($con, $endre_krs_pris) or die ("Bad query: $endre_krs_pris");
    
    if($endre_krs_pris) {
        echo '<div id="velykket">Du endret prisen til ';
        echo $krs_ny_pris;
        echo '</div>';
    }
}

if(isset($_POST['stc_endre_pris'])){
    
    // Endre pris i Oslo
    $stc_ny_pris = $_POST['stc_ny_pris'];
    
    $endre_stc_pris = "UPDATE kulefabrikk SET stc_pris = $stc_ny_pris";
    mysqli_query($con, $endre_stc_pris) or die ("Bad query: $endre_stc_pris");
    
    if($endre_stc_pris) {
        echo '<div id="velykket">Du endret prisen til ';
        echo $stc_ny_pris;
        echo '</div>';
    }
}

if(isset($_POST['got_endre_pris'])){
    
    // Endre pris i Oslo
    $got_ny_pris = $_POST['got_ny_pris'];
    
    $endre_got_pris = "UPDATE kulefabrikk SET got_pris = $got_ny_pris";
    mysqli_query($con, $endre_got_pris) or die ("Bad query: $endre_got_pris");
    
    if($endre_got_pris) {
        echo '<div id="velykket">Du endret prisen til ';
        echo $got_ny_pris;
        echo '</div>';
    }
}

if(isset($_POST['kob_endre_pris'])){
    
    // Endre pris i Oslo
    $kob_ny_pris = $_POST['kob_ny_pris'];
    
    $endre_kob_pris = "UPDATE kulefabrikk SET kob_pris = $kob_ny_pris";
    mysqli_query($con, $endre_kob_pris) or die ("Bad query: $endre_kob_pris");
    
    if($endre_kob_pris) {
        echo '<div id="velykket">Du endret prisen til ';
        echo $kob_ny_pris;
        echo '</div>';
    }
}

////////////////////////////////////////////
////      SELGING AV KULEFABRIKK        ////
////////////////////////////////////////////


    $hentPenger = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $resultat = mysqli_query($con, $hentPenger) or die("Bad query: $hentPenger");
    $liste = mysqli_fetch_assoc($resultat);

    $bank_money = $liste['bank_money'];
            
    $user_city = $row1['city']; 
    $money = $row1['money'];
        
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 5000;           // Setter 5 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    $endre_lvl      = 1;
    $nye_kuler      = 1000000;

if(isset($_POST['osl_selg_kf'])){
    
    $ny_osl_eier = "UPDATE kulefabrikk SET osl_eier = '$staten'";
    mysqli_query($con, $ny_osl_eier) or die ("Bad query: $ny_osl_eier");
    
    $ny_osl_pris = "UPDATE kulefabrikk SET osl_pris = '$standard_pris'";
    mysqli_query($con, $ny_osl_pris) or die ("Bad query: $ny_osl_pris");
    
    $ny_osl_lvl = "UPDATE kulefabrikk SET osl_lvl = '$endre_lvl'";
    mysqli_query($con, $ny_osl_lvl) or die ("Bad query: $ny_osl_lvl");
    
    $nye_kuler = "UPDATE kulefabrikk SET osl_ant_kuler = '$nye_kuler'";
    mysqli_query($con, $nye_kuler) or die ("Bad query: $nye_kuler");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_osl_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['krs_selg_kf'])){

    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");

    $ny_krs_eier = "UPDATE kulefabrikk SET krs_eier = '$staten'";
    mysqli_query($con, $ny_krs_eier) or die ("Bad query: $ny_krs_eier");
    
    $ny_krs_pris = "UPDATE kulefabrikk SET krs_pris = $standard_pris";
    mysqli_query($con, $ny_krs_pris) or die ("Bad query: $ny_krs_pris");
    
    $ny_krs_lvl = "UPDATE kulefabrikk SET krs_lvl = '$endre_lvl'";
    mysqli_query($con, $ny_krs_lvl) or die ("Bad query: $ny_krs_lvl");
    
    $nye_kuler = "UPDATE kulefabrikk SET krs_ant_kuler = '$nye_kuler'";
    mysqli_query($con, $nye_kuler) or die ("Bad query: $nye_kuler");

    
    if($ny_krs_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['stc_selg_kf'])){
    
    $ny_stc_eier = "UPDATE kulefabrikk SET stc_eier = '$staten'";
    mysqli_query($con, $ny_stc_eier) or die ("Bad query: $ny_stc_eier");
    
    $ny_stc_pris = "UPDATE kulefabrikk SET stc_pris = $standard_pris";
    mysqli_query($con, $ny_stc_pris) or die ("Bad query: $ny_stc_pris");
    
    $ny_stc_lvl = "UPDATE kulefabrikk SET stc_lvl = '$endre_lvl'";
    mysqli_query($con, $ny_stc_lvl) or die ("Bad query: $ny_stc_lvl");
    
    $nye_kuler = "UPDATE kulefabrikk SET stc_ant_kuler = '$nye_kuler'";
    mysqli_query($con, $nye_kuler) or die ("Bad query: $nye_kuler");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_stc_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['got_selg_kf'])){

    $ny_got_eier = "UPDATE kulefabrikk SET got_eier = '$staten'";
    mysqli_query($con, $ny_got_eier) or die ("Bad query: $ny_got_eier");
    
    $ny_got_pris = "UPDATE kulefabrikk SET got_pris = $standard_pris";
    mysqli_query($con, $ny_got_pris) or die ("Bad query: $ny_got_pris");
    
    $ny_got_lvl = "UPDATE kulefabrikk SET got_lvl = '$endre_lvl'";
    mysqli_query($con, $ny_got_lvl) or die ("Bad query: $ny_got_lvl");
    
    $nye_kuler = "UPDATE kulefabrikk SET got_ant_kuler = '$nye_kuler'";
    mysqli_query($con, $nye_kuler) or die ("Bad query: $nye_kuler");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_got_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['kob_selg_kf'])){

    $ny_kob_eier = "UPDATE kulefabrikk SET kob_eier = '$staten'";
    mysqli_query($con, $ny_kob_eier) or die ("Bad query: $ny_kob_eier");
    
    $ny_kob_pris = "UPDATE kulefabrikk SET kob_pris = $standard_pris";
    mysqli_query($con, $ny_kob_eier) or die ("Bad query: $ny_kob_pris");
    
    $ny_kob_lvl = "UPDATE kulefabrikk SET kob_lvl = '$endre_lvl'";
    mysqli_query($con, $ny_kob_lvl) or die ("Bad query: $ny_kob_lvl");
    
    $nye_kuler = "UPDATE kulefabrikk SET kob_ant_kuler = '$nye_kuler'";
    mysqli_query($con, $nye_kuler) or die ("Bad query: $nye_kuler");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_kob_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reise.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <form method="post" action=""> 

<center>
	
    <?php

        // Hvis man eier Oslo flyplass
        if ($osl_eier == $username && $city == $oslo) {
    ?>

    <div id="reisecontainer2">
        <li id="sm-tp-hdr"><a href="kulefabrikk.php">Tilbake til kulefabrikken</a></li>
        <li id="sm-tp-hdr">Administrer kulefabrikken i Oslo (lvl <?php echo $osl_lvl; ?>)</li>
    </div>
    <li id="sm-box20">Pris pr. kule: <?php echo number_format($osl_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, mottar <?php echo number_format($osl_pris, 0, '.', ' '); ?>,- pr kule som selges.
                </span>
        </div></li>
    <li id="sm-box38">Ny pris: <input type="text" name="osl_ny_pris" placeholder="Beløp" /> <input class="button" type="submit" name="osl_endre_pris"  value="Endre pris"/></li>
    <li id="sm-box20">Antall kuler på lager: <?php echo number_format($osl_ant_kuler, 0, '.', ' '); ?> <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, har <?php echo number_format($osl_ant_kuler, 0, '.', ' '); ?> kuler på lager.
                </span>
        </div></li>
    <li id="sm-box38">Produser kuler: <input type="text" name="osl_produser_kuler" placeholder="Antall kuler" /> <input class="button" type="submit" name="osl_produser_kuler_btn" value="Produser"/></li>
    <li id="sm-box38"><center><input class="button" type="submit" name="osl_selg_kf" value="Selg kulefabrikken for 5 000 000,-"/> 
        <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Om du ønsker å selge kulefabrikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</span>
        </div></center></li>
	    <li id="sm-box38"><button name="oppgrader" id="oppgrader" class="button">Oppgrader kulefabrikk</button></li>


    <?php
        // Hvis man eier Kristiansand flyplass
        } elseif ($krs_eier == $username && $city == $kristiansand) {
    ?>

    <div id="reisecontainer2">
        <li id="sm-tp-hdr"><a href="kulefabrikk.php">Tilbake til kulefabrikken</a></li>
        <li id="sm-tp-hdr">Administrer kulefabrikken i Kristiansand (lvl <?php echo $krs_lvl; ?>)</li>
    </div>
    <li id="sm-box20">Pris pr. kule: <?php echo number_format($krs_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, mottar <?php echo number_format($krs_pris, 0, '.', ' '); ?>,- pr kule som selges.
                </span>
        </div></li>    
    <li id="sm-box38">Ny pris: <input type="text" name="krs_ny_pris" placeholder="Beløp" /> <input class="button" type="submit" name="krs_endre_pris" value="Endre pris"/></li>
    <li id="sm-box20">Antall kuler på lager: <?php echo number_format($krs_ant_kuler, 0, '.', ' '); ?> <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, har <?php echo number_format($krs_ant_kuler, 0, '.', ' '); ?> kuler på lager.
                </span>
        </div></li> 
    <li id="sm-box38">Produser kuler: <input type="text" name="krs_produser_kuler" placeholder="Antall kuler" /> <input class="button" type="submit" name="krs_produser_kuler_btn"  value="Produser"/></li>
    <li id="sm-box38"><center><input class="button" type="submit" name="krs_selg_kf" value="Selg kulefabrikken for 5 000 000,-"/><div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Om du ønsker å selge kulefabrikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</span>
        </div></center></li>
    <li id="sm-box38"><button name="oppgrader" id="oppgrader" class="button">Oppgrader kulefabrikk</button></li>

    <?php
        // Hvis man eier Stockholm flyplass
        } elseif ($stc_eier == $username && $city == $stockholm) {
    ?>

    <div id="reisecontainer2">
        <li id="sm-tp-hdr"><a href="kulefabrikk.php">Tilbake til kulefabrikken</a></li>
        <li id="sm-tp-hdr">Administrer kulefabrikken i Stockholm (lvl <?php echo $stc_lvl; ?>)</li>
    </div>
    <li id="sm-box20">Pris pr. kule: <?php echo number_format($stc_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, mottar <?php echo number_format($stc_pris, 0, '.', ' '); ?>,- pr kule som selges.
                </span>
        </div></li>
    <li id="sm-box38">Ny pris: <input type="text" name="stc_ny_pris" placeholder="Beløp" /> <input class="button" type="submit" name="stc_endre_pris" value="Endre pris"/></li>
    <li id="sm-box20">Antall kuler på lager: <?php echo number_format($stc_ant_kuler, 0, '.', ' '); ?> <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, har <?php echo number_format($stc_ant_kuler, 0, '.', ' '); ?>,- kuler på lager.
                </span>
        </div></li>
    <li id="sm-box38">Produser kuler: <input type="text" name="stc_produser_kuler" placeholder="Antall kuler" /> <input class="button" type="submit" name="stc_produser_kuler_btn"  value="Produser"/></li>
    <li id="sm-box38"><center><input class="button" type="submit" name="stc_selg_kf" value="Selg kulefabrikken for 5 000 000,-"/><div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Om du ønsker å selge kulefabrikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</span>
        </div></center></li>
	    <li id="sm-box38"><button name="oppgrader" id="oppgrader" class="button">Oppgrader kulefabrikk</button></li>
	
    <?php
        // Hvis man eier Göteborg flyplass
        } elseif ($got_eier == $username && $city == $goteborg) {
    ?>

    <div id="reisecontainer2">
        <li id="sm-tp-hdr"><a href="kulefabrikk.php">Tilbake til kulefabrikken</a></li>
        <li id="sm-tp-hdr">Administrer kulefabrikken i Gøteborg (lvl <?php echo $got_lvl; ?>)</li>
    </div>
    <li id="sm-box20">Pris pr. kule: <?php echo number_format($got_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, mottar <?php echo number_format($got_pris, 0, '.', ' '); ?>,- pr kule som selges.
                </span>
        </div></li>
    <li id="sm-box38">Ny pris: <input type="text" name="got_ny_pris" placeholder="Beløp" /> <input class="button" type="submit" name="got_endre_pris" value="Endre pris"/></li>
    <li id="sm-box20">Antall kuler på lager: <?php echo number_format($got_ant_kuler, 0, '.', ' '); ?> <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, har <?php echo number_format($got_ant_kuler, 0, '.', ' '); ?>,- kuler på lager.
                </span>
        </div></li>
    <li id="sm-box38">Produser kuler: <input type="text" name="got_produser_kuler" placeholder="Antall kuler" /> <input class="button" type="submit" name="got_produser_kuler_btn"  value="Produser"/></li>
    <li id="sm-box38"><center><input class="button" type="submit" name="got_selg_kf" value="Selg kulefabrikken for 5 000 000,-"/><div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Om du ønsker å selge kulefabrikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</span>
        </div></center></li>
	    <li id="sm-box38"><button name="oppgrader" id="oppgrader" class="button">Oppgrader kulefabrikk</button></li>

    <?php
        // Hvis man eier København flyplass
        } elseif ($kob_eier == $username && $city == $kobenhavn) {
    ?>

    <div id="reisecontainer2">
        <li id="sm-tp-hdr"><a href="kulefabrikk.php">Tilbake til kulefabrikken</a></li>
        <li id="sm-tp-hdr">Administrer kulefabrikken i København (lvl <?php echo $kob_lvl; ?>)</li>
    </div>
    <li id="sm-box20">Pris pr. kule: <?php echo number_format($kob_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, mottar <?php echo number_format($kob_pris, 0, '.', ' '); ?>,- pr kule som selges.
                </span>
        </div></li>
    <li id="sm-box38">Ny pris: <input type="text" name="kob_ny_pris" placeholder="Beløp" /> <input class="button" type="submit" name="kob_endre_pris" value="Endre pris"/></li>
    <li id="sm-box20">Antall kuler på lager: <?php echo number_format($kob_ant_kuler, 0, '.', ' '); ?> <div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Dette betyr at du som eier av denne kulefabrikken, har <?php echo number_format($kob_ant_kuler, 0, '.', ' '); ?>,- kuler på lager.
                </span>
        </div></li>
    <li id="sm-box38">Produser kuler: <input type="text" name="kob_produser_kuler" placeholder="Antall kuler" /> <input class="button" type="submit" name="kob_produser_kuler_btn"  value="Produser for <?php echo $pris_pr_kule; ?> pr kule"/></li>
    <li id="sm-box38"><center><input class="button" type="submit" name="kob_selg_kf" value="Selg kulefabrikken for 5 000 000,-"/><div class="tooltip"><t style="color:gray;">(?)</t>
            <span class="tooltiptext">Om du ønsker å selge kulefabrikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</span>
        </div></center></li>
    <li id="sm-box38"><button name="oppgrader" id="oppgrader" class="button">OPPGRADER</button></li>

    <?php
        // Hvis man ikke eier en flyplass
        } else {
    ?>
        
    <p class="notat_false">
        Du eier ikke denne flyplassen og kan dermed ikke administrere priser for denne flyplassen.<br/>
        For å bli eier av en flyplass så må enten flyplassen ligge ute på markedsplassen.
    </p>
        
        <?php
            }
        ?>
	
</center>
        </form>
		
				<?php
		
		/* OPPGRADERE KULEFABRIKK */
		
		
$sql1 = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result1 = mysqli_query($con, $sql1) or die("Bad query: $sql1");
$row1 = mysqli_fetch_assoc($result1);
        
$user_city = $row1['city']; 
$money = $row1['money'];
		
$sql = "SELECT * FROM kulefabrikk";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $osl_lvl = $row['osl_lvl'];
    $krs_lvl = $row['krs_lvl'];
    $stc_lvl = $row['stc_lvl'];
	$got_lvl = $row['got_lvl'];
	$kob_lvl = $row['kob_lvl'];
		
	$pris1 = 1000000;
	$pris2 = 2000000;
	$pris3 = 3000000;
        
		
	if (isset($_POST['oppgrader'])){
		if($user_city == "Oslo"){
			if($osl_lvl == 1){
				if($money < $pris1){
							echo 'Du har ikke nok penger';
						} else {
				$lvl_up = "UPDATE kulefabrikk SET osl_lvl = ($osl_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				//Ta bort penger
				$betale = "UPDATE users SET money = ($money - $pris1) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
				}
			}
			elseif ($osl_lvl == 2){
				if($money < $pris2){
							echo 'Du har ikke nok penger';
						} else {
				$lvl_up = "UPDATE kulefabrikk SET osl_lvl = ($osl_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				//Ta bort penger
				$betale = "UPDATE users SET money = ($money - $pris2) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
				}
				
			}
			elseif ($osl_lvl == 3){
				if($money < $pris3){
							echo 'Du har ikke nok penger';
						} else {
				$lvl_up = "UPDATE kulefabrikk SET osl_lvl = ($osl_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				//Ta bort penger
				$betale = "UPDATE users SET money = ($money - $pris3) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
				}
			}
			
			///// KRIISTIANSAND /////
			
		} elseif($user_city == "Kristiansand"){
			if($krs_lvl == 1){
				if($money < $pris1){
					echo 'Du har ikke nok penger';
				} else {
				$lvl_up = "UPDATE kulefabrikk SET krs_lvl = ($krs_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				$betale = "UPDATE users SET money = ($money - $pris1) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
				}
			}
			elseif ($krs_lvl == 2){
				if($money < $pris2){
							echo 'Du har ikke nok penger';
				} else {
				$lvl_up = "UPDATE kulefabrikk SET krs_lvl = ($krs_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				//Ta bort penger
				$betale = "UPDATE users SET money = ($money - $pris2) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
				}
			}
			elseif ($krs_lvl == 3){
				if($money < $pris3){
					echo 'Du har ikke nok penger';
				} else {
				$lvl_up = "UPDATE kulefabrikk SET krs_lvl = ($krs_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				//Ta bort penger
				$betale = "UPDATE users SET money = ($money - $pris3) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
                if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 4, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
                    
				}
				
			}
			
			///// GOTEBORG /////
			
		} elseif($user_city == "Göteborg"){
				if($got_lvl == 1){
					if($money < $pris1){
							echo 'Du har ikke nok penger';
					} else {
					$lvl_up = "UPDATE kulefabrikk SET got_lvl = ($got_lvl + 1)";
    				mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
					$betale = "UPDATE users SET money = ($money - $pris1) WHERE username = '".$_SESSION['username']."'";;
    				mysqli_query($con, $betale) or die ("Bad query: $betale");
                    if($lvl_up){
                            echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 2, det betyr at det koster deg ';
                            echo $pris_pr_kule;
                            echo 'kr pr kule å produsere.</div>';
                        }
					}
			}
			elseif ($got_lvl == 2){
				if($money < $pris2){
							echo 'Du har ikke nok penger';
				} else {
				$lvl_up = "UPDATE kulefabrikk SET got_lvl = ($got_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				$betale = "UPDATE users SET money = ($money - $pris2) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
                    
                if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 3, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
				}
			}
			elseif ($got_lvl == 3){
				if($money < $pris3){
							echo 'Du har ikke nok penger';
				} else {
				$lvl_up = "UPDATE kulefabrikk SET got_lvl = ($got_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				$betale = "UPDATE users SET money = ($money - $pris3) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
                    
                if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 4, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
				}
			}
			
			///// KOBENHAVN /////
			
		} elseif($user_city == "København"){
				if($kob_lvl == 1){
					if($money < $pris1){
							echo 'Du har ikke nok penger';
						} else {
					$lvl_up = "UPDATE kulefabrikk SET kob_lvl = ($kob_lvl + 1)";
    				mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
					$betale = "UPDATE users SET money = ($money - $pris1) WHERE username = '".$_SESSION['username']."'";;
    				mysqli_query($con, $betale) or die ("Bad query: $betale");
                        
                    if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 2, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
                        
                    }
			}
			elseif ($kob_lvl == 2){
				if($money < $pris2){
							echo 'Du har ikke nok penger';
					} else {
					$lvl_up = "UPDATE kulefabrikk SET kob_lvl = ($kob_lvl + 1)";
    				mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
					$betale = "UPDATE users SET money = ($money - $pris2) WHERE username = '".$_SESSION['username']."'";;
    				mysqli_query($con, $betale) or die ("Bad query: $betale");
                    
                    if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 3, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
				}
				
			}
			elseif ($kob_lvl == 3){
				if($money < $pris3){
							echo 'Du har ikke nok penger';
						} else {
				$lvl_up = "UPDATE kulefabrikk SET kob_lvl = ($kob_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				$betale = "UPDATE users SET money = ($money - $pris3) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
                    
                    if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 4, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
				}
				
			}
			
			///// STOCKHOLM /////
			
		} elseif($user_city == "Stockholm"){
					if($stc_lvl == 1){		
						if($money < $pris1){
							echo 'Du har ikke nok penger';
						} else {
					$lvl_up = "UPDATE kulefabrikk SET stc_lvl = ($stc_lvl + 1)";
    				mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
					$betale = "UPDATE users SET money = ($money - $pris1) WHERE username = '".$_SESSION['username']."'";;
    				mysqli_query($con, $betale) or die ("Bad query: $betale");
                            
                    if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 2, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
				}
			}
			elseif ($stc_lvl == 2){
				if($money < $pris2){
							echo 'Du har ikke nok penger';
						} else {
				$lvl_up = "UPDATE kulefabrikk SET stc_lvl = ($stc_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				$betale = "UPDATE users SET money = ($money - $pris2) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
                    
                    if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 3, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
				}
			}
			elseif ($stc_lvl == 3){
				if($money < $pris3){
							echo 'Du har ikke nok penger';
						} else {
				$lvl_up = "UPDATE kulefabrikk SET stc_lvl = ($stc_lvl + 1)";
    			mysqli_query($con, $lvl_up) or die ("Bad query: $lvl_up");
				$betale = "UPDATE users SET money = ($money - $pris3) WHERE username = '".$_SESSION['username']."'";;
    			mysqli_query($con, $betale) or die ("Bad query: $betale");
                    
                    if($lvl_up){
                        echo '<div id="velykket">Gratulerer! Din kulefabrikk er nå lvl 4, det betyr at det koster deg ';
                        echo $pris_pr_kule;
                        echo 'kr pr kule å produsere.</div>';
                    }
				}
				
			}
		}
}	

?>
		
    </body>
</html>
