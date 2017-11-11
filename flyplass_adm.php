<?php 

include('header.php');
include('left.php');
include('right.php');

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/notat.css" />
        <link rel="stylesheet" type="text/css" href="css/reise.css" />

        <?php
        
      
include("auth.php");

$sql = "SELECT * FROM flyplass";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $osl_eier = $row['osl_eier'];
    $osl_pris = $row['osl_pris'];

    $krs_eier = $row['krs_eier'];
    $krs_pris = $row['krs_pris'];
        
    $stc_eier = $row['stc_eier'];
    $stc_pris = $row['stc_pris'];
        
    $got_eier = $row['got_eier'];
    $got_pris = $row['got_pris'];
        
    $kob_eier = $row['kob_eier'];
    $kob_pris = $row['kob_pris'];
        
        
$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $city = $row['city'];
    $username = $row['username'];
    $bank_money = $row['bank_money'];
        
    $oslo = "Oslo";
    $kristiansand = "Kristiansand";
    $stockholm = "Stockholm";
    $goteborg = "Göteborg";
    $kobenhavn = "København";

////////////////////////////////////////////////////
////        ENDRE PRIS PÅ FLYPLASSEN SIN        ////
////////////////////////////////////////////////////
        
if(isset($_POST['osl_endre_pris'])){
    
    // Endre pris i Oslo
    $osl_ny_pris = $_POST['osl_ny_pris'];
    
    $endre_osl_pris = "UPDATE flyplass SET osl_pris = $osl_ny_pris";
    mysqli_query($con, $endre_osl_pris) or die ("Bad query: $endre_osl_pris");
    
    if($endre_osl_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
        
        
if(isset($_POST['krs_endre_pris'])){
    
    // Endre pris i Kristiansand
    $krs_ny_pris = $_POST['krs_ny_pris'];
    
    $endre_krs_pris = "UPDATE flyplass SET krs_pris = $krs_ny_pris";
    mysqli_query($con, $endre_krs_pris) or die ("Bad query: $endre_krs_pris");

    if($krs_ny_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
        
if(isset($_POST['stc_endre_pris'])){
    
    // Endre pris i Stockholm
    $stc_ny_pris = $_POST['stc_ny_pris'];
    
    $endre_stc_pris = "UPDATE flyplass SET stc_pris = $stc_ny_pris";
    mysqli_query($con, $endre_stc_pris) or die ("Bad query: $endre_stc_pris");
    
    if($stc_ny_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
       
if(isset($_POST['got_endre_pris'])){
    
    // Endre pris i Stockholm
    $got_ny_pris = $_POST['got_ny_pris'];
    
    $endre_got_pris = "UPDATE flyplass SET got_pris = $got_ny_pris";
    mysqli_query($con, $endre_got_pris) or die ("Bad query: $endre_got_pris");
    
    if($endre_got_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
        
if(isset($_POST['kob_endre_pris'])){
    
    // Endre pris i Stockholm
    $kob_ny_pris = $_POST['kob_ny_pris'];
    
    $endre_kob_pris = "UPDATE flyplass SET kob_pris = $kob_ny_pris";
    mysqli_query($con, $endre_kob_pris) or die ("Bad query: $endre_kob_pris");
    
    if($kob_ny_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
        
////////////////////////////////////////////
////        SELGING AV FLYPLASS         ////
////////////////////////////////////////////
        

if(isset($_POST['osl_selg_flyplass'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_osl_eier = "UPDATE flyplass SET osl_eier = '$staten'";
    mysqli_query($con, $ny_osl_eier) or die ("Bad query: $ny_osl_eier");
    
    $ny_osl_pris = "UPDATE flyplass SET osl_pris = $standard_pris";
    mysqli_query($con, $ny_osl_pris) or die ("Bad query: $ny_osl_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_osl_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
        
if(isset($_POST['krs_selg_flyplass'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_krs_eier = "UPDATE flyplass SET krs_eier = '$staten'";
    mysqli_query($con, $ny_krs_eier) or die ("Bad query: $ny_krs_eier");
    
    $ny_krs_pris = "UPDATE flyplass SET krs_pris = $standard_pris";
    mysqli_query($con, $ny_krs_pris) or die ("Bad query: $ny_krs_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_krs_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['stc_selg_flyplass'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_stc_eier = "UPDATE flyplass SET stc_eier = '$staten'";
    mysqli_query($con, $ny_stc_eier) or die ("Bad query: $ny_stc_eier");
    
    $ny_stc_pris = "UPDATE flyplass SET stc_pris = $standard_pris";
    mysqli_query($con, $ny_stc_pris) or die ("Bad query: $ny_stc_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_stc_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
        
if(isset($_POST['got_selg_flyplass'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_got_eier = "UPDATE flyplass SET got_eier = '$staten'";
    mysqli_query($con, $ny_got_eier) or die ("Bad query: $ny_got_eier");
    
    $ny_got_pris = "UPDATE flyplass SET got_pris = $standard_pris";
    mysqli_query($con, $ny_got_pris) or die ("Bad query: $ny_got_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_got_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
  
if(isset($_POST['kob_selg_flyplass'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_kob_eier = "UPDATE flyplass SET kob_eier = '$staten'";
    mysqli_query($con, $ny_kob_eier) or die ("Bad query: $ny_kob_eier");
    
    $ny_kob_pris = "UPDATE flyplass SET kob_pris = $standard_pris";
    mysqli_query($con, $ny_kob_pris) or die ("Bad query: $ny_kob_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_kob_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

        ?>
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <form method="post" action=""> 

<center>
        <?php
            // Hvis man eier Oslo flyplass
            if ($osl_eier == $username && $city == $oslo) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="flyplass.php">Tilbake til flyplass</a></li>
            <li id="reisedesign2">Administrer flyplassen i <?php echo $city; ?></li>
            <img src="images/flyplass/osl.png" class="reisebilde">
        </div>
        <li id="reisedesign4">Pris pr. destinasjoner pr. dags. dato: <?php echo number_format($osl_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne flyplassen, mottar <?php echo number_format($osl_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>
        <li id="reisedesign4">Ny pris: <input type="text" name="osl_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="osl_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge flyplassen så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 10 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="osl_selg_flyplass" value="Selg flyplass for 5 000 000,-"/></center></li>
        
        <?php
            // Hvis man eier Kristiansand flyplass
            } elseif ($krs_eier == $username && $city == $kristiansand) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="flyplass.php">Tilbake til flyplass</a></li>
            <li id="reisedesign2">Administrer flyplassen i <?php echo $city; ?></li>
            <img src="images/flyplass/krs.png" class="reisebilde">
        </div>
        <li id="reisedesign4">Pris pr. destinasjoner pr. dags. dato: <?php echo number_format($krs_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne flyplassen, mottar <?php echo number_format($krs_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>            
            
        <li id="reisedesign4">Ny pris: <input type="text" name="krs_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="krs_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge flyplassen så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 10 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="krs_selg_flyplass" value="Selg flyplass for 5 000 000,-"/></center></li>
        
        <?php
            // Hvis man eier Stockholm flyplass
            } elseif ($stc_eier == $username && $city == $stockholm) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="flyplass.php">Tilbake til flyplass</a></li>
            <li id="reisedesign2">Administrer flyplassen i <?php echo $city; ?></li>
            <img src="images/flyplass/stc.png" class="reisebilde">
        </div>
        <li id="reisedesign4">Pris pr. destinasjoner pr. dags. dato: <?php echo number_format($stc_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne flyplassen, mottar <?php echo number_format($stc_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>
        <li id="reisedesign4">Ny pris: <input type="text" name="stc_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="stc_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge flyplassen så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 10 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="stc_selg_flyplass" value="Selg flyplass for 5 000 000,-"/></center></li>
        
        <?php
            // Hvis man eier Göteborg flyplass
            } elseif ($got_eier == $username && $city == $goteborg) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="flyplass.php">Tilbake til flyplass</a></li>
            <li id="reisedesign2">Administrer flyplassen i <?php echo $city; ?></li>
            <img src="images/flyplass/got.png" class="reisebilde">
        </div>
        <li id="reisedesign4">Pris pr. destinasjoner pr. dags. dato: <?php echo number_format($got_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne flyplassen, mottar <?php echo number_format($got_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>
        <li id="reisedesign4">Ny pris: <input type="text" name="got_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="got_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge flyplassen så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 10 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="got_selg_flyplass" value="Selg flyplass for 5 000 000,-"/></center></li>
        
        <?php
            // Hvis man eier København flyplass
            } elseif ($kob_eier == $username && $city == $kobenhavn) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="flyplass.php">Tilbake til flyplass</a></li>
            <li id="reisedesign2">Administrer flyplassen i <?php echo $city; ?></li>
            <img src="images/flyplass/kob.png" class="reisebilde">
        </div>
        <li id="reisedesign4">Pris pr. destinasjoner pr. dags. dato: <?php echo number_format($kob_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne flyplassen, mottar <?php echo number_format($kob_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>
        <li id="reisedesign4">Ny pris: <input type="text" name="kob_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="kob_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge flyplassen så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 10 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="kob_selg_flyplass" value="Selg flyplass for 5 000 000,-"/></center></li>
        
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
    </body>
</html>
