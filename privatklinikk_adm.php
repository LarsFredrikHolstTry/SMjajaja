<?php 

include('header.php');
include('left.php');
include('right.php');

include("auth.php");

$sql = "SELECT * FROM privatklinikk";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $pk_osl_eier = $row['pk_osl_eier'];
    $pk_osl_pris = $row['pk_osl_pris'];

    $pk_krs_eier = $row['pk_krs_eier'];
    $pk_krs_pris = $row['pk_krs_pris'];
        
    $pk_stc_eier = $row['pk_stc_eier'];
    $pk_stc_pris = $row['pk_stc_pris'];
        
    $pk_got_eier = $row['pk_got_eier'];
    $pk_got_pris = $row['pk_got_pris'];
        
    $pk_kob_eier = $row['pk_kob_eier'];
    $pk_kob_pris = $row['pk_kob_pris'];

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
////     ENDRE PRIS PÅ PRIVATKLINIKKEN SIN      ////
////////////////////////////////////////////////////
        
if(isset($_POST['pk_osl_endre_pris'])){
    
    // Endre pris i Oslo
    $pk_osl_ny_pris = $_POST['pk_osl_ny_pris'];
    
    $pk_endre_osl_pris = "UPDATE privatklinikk SET pk_osl_pris = $pk_osl_ny_pris";
    mysqli_query($con, $pk_endre_osl_pris) or die ("Bad query: $pk_endre_osl_pris");
    
    if($pk_endre_osl_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['pk_krs_endre_pris'])){
    
    // Endre pris i Oslo
    $pk_krs_ny_pris = $_POST['pk_krs_ny_pris'];
    
    $pk_endre_krs_pris = "UPDATE privatklinikk SET pk_krs_pris = $pk_krs_ny_pris";
    mysqli_query($con, $pk_endre_krs_pris) or die ("Bad query: $pk_endre_krs_pris");
    
    if($pk_endre_krs_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['pk_stc_endre_pris'])){
    
    // Endre pris i Oslo
    $pk_stc_ny_pris = $_POST['pk_stc_ny_pris'];
    
    $pk_endre_stc_pris = "UPDATE privatklinikk SET pk_stc_pris = $pk_stc_ny_pris";
    mysqli_query($con, $pk_endre_stc_pris) or die ("Bad query: $pk_endre_stc_pris");
    
    if($pk_endre_stc_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['pk_got_endre_pris'])){
    
    // Endre pris i Oslo
    $pk_got_ny_pris = $_POST['pk_got_ny_pris'];
    
    $pk_endre_got_pris = "UPDATE privatklinikk SET pk_got_pris = $pk_got_ny_pris";
    mysqli_query($con, $pk_endre_got_pris) or die ("Bad query: $pk_endre_got_pris");
    
    if($pk_endre_got_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['pk_kob_endre_pris'])){
    
    // Endre pris i Oslo
    $pk_kob_ny_pris = $_POST['pk_kob_ny_pris'];
    
    $pk_endre_kob_pris = "UPDATE privatklinikk SET pk_kob_pris = $pk_kob_ny_pris";
    mysqli_query($con, $pk_endre_kob_pris) or die ("Bad query: $pk_endre_kob_pris");
    
    if($pk_endre_kob_pris) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

////////////////////////////////////////////
////        SELGING AV FLYPLASS         ////
////////////////////////////////////////////
        

if(isset($_POST['osl_selg_pk'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_osl_eier = "UPDATE privatklinikk SET pk_osl_eier = '$staten'";
    mysqli_query($con, $ny_osl_eier) or die ("Bad query: $ny_osl_eier");
    
    $ny_osl_pris = "UPDATE privatklinikk SET pk_osl_pris = $standard_pris";
    mysqli_query($con, $ny_osl_pris) or die ("Bad query: $ny_osl_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_osl_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['krs_selg_pk'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_krs_eier = "UPDATE privatklinikk SET pk_krs_eier = '$staten'";
    mysqli_query($con, $ny_krs_eier) or die ("Bad query: $ny_krs_eier");
    
    $ny_krs_pris = "UPDATE privatklinikk SET pk_krs_pris = $standard_pris";
    mysqli_query($con, $ny_krs_pris) or die ("Bad query: $ny_krs_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_krs_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['stc_selg_pk'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_stc_eier = "UPDATE privatklinikk SET pk_stc_eier = '$staten'";
    mysqli_query($con, $ny_stc_eier) or die ("Bad query: $ny_stc_eier");
    
    $ny_stc_pris = "UPDATE privatklinikk SET pk_stc_pris = $standard_pris";
    mysqli_query($con, $ny_stc_pris) or die ("Bad query: $ny_stc_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_stc_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['got_selg_pk'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_got_eier = "UPDATE privatklinikk SET pk_got_eier = '$staten'";
    mysqli_query($con, $ny_got_eier) or die ("Bad query: $ny_got_eier");
    
    $ny_got_pris = "UPDATE privatklinikk SET pk_got_pris = $standard_pris";
    mysqli_query($con, $ny_got_pris) or die ("Bad query: $ny_got_pris");
    
    $betal_eier = "UPDATE users SET bank_money = ($bank_money + $selge_pris) WHERE username = '$username'";
    mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");
    
    if($ny_got_eier) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['kob_selg_pk'])){
    
    $staten         = "STATEN";       // Setter staten som ny eier
    $standard_pris  = 10000;          // Setter 10 000,- som ny pris
    $selge_pris     = 5000000;        // Gir bruker 5 mill for salget
    
    $ny_kob_eier = "UPDATE privatklinikk SET pk_kob_eier = '$staten'";
    mysqli_query($con, $ny_kob_eier) or die ("Bad query: $ny_kob_eier");
    
    $ny_kob_pris = "UPDATE privatklinikk SET pk_kob_pris = $standard_pris";
    mysqli_query($con, $ny_kob_eier) or die ("Bad query: $ny_kob_pris");
    
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
<link rel="stylesheet" type="text/css" href="css/notat.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <form method="post" action=""> 

<center>
        <?php
            // Hvis man eier Oslo flyplass
            if ($pk_osl_eier == $username && $city == $oslo) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="privatklinikk.php">Tilbake til privatklinikken</a></li>
            <li id="reisedesign2">Administrer privatklinikken i <?php echo $city; ?></li>
        </div>
        <li id="reisedesign4">Pris pr. % pr. dags. dato: <?php echo number_format($pk_osl_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne privatklinikken, mottar <?php echo number_format($pk_osl_pris, 0, '.', ' '); ?>,- pr %. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>
        <li id="reisedesign4">Ny pris: <input type="text" name="pk_osl_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="pk_osl_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge privatklinikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="osl_selg_pk" value="Selg privatklinikken for 5 000 000,-"/></center></li>
        
        <?php
            // Hvis man eier Kristiansand flyplass
            } elseif ($pk_krs_eier == $username && $city == $kristiansand) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="privatklinikk.php">Tilbake til privatklinikken</a></li>
            <li id="reisedesign2">Administrer privatklinikken i <?php echo $city; ?></li>
        </div>
        <li id="reisedesign4">Pris pr. % pr. dags. dato: <?php echo number_format($pk_krs_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne privatklinikken, mottar <?php echo number_format($pk_krs_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>            
            
        <li id="reisedesign4">Ny pris: <input type="text" name="pk_krs_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="pk_krs_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge privatklinikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="krs_selg_pk" value="Selg privatklinikken for 5 000 000,-"/></center></li>
        
        <?php
            // Hvis man eier Stockholm flyplass
            } elseif ($pk_stc_eier == $username && $city == $stockholm) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="privatklinikk.php">Tilbake til privatklinikken</a></li>
            <li id="reisedesign2">Administrer privatklinikken i <?php echo $city; ?></li>
        </div>
        <li id="reisedesign4">Pris pr. % pr. dags. dato: <?php echo number_format($pk_stc_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne privatklinikken, mottar <?php echo number_format($pk_stc_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>
        <li id="reisedesign4">Ny pris: <input type="text" name="pk_stc_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="pk_stc_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge privatklinikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="stc_selg_pk" value="Selg privatklinikken for 5 000 000,-"/></center></li>
        
        <?php
            // Hvis man eier Göteborg flyplass
            } elseif ($pk_got_eier == $username && $city == $goteborg) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="privatklinikk.php">Tilbake til privatklinikken</a></li>
            <li id="reisedesign2">Administrer privatklinikken i <?php echo $city; ?></li>
        </div>
        <li id="reisedesign4">Pris pr. % pr. dags. dato: <?php echo number_format($pk_got_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne privatklinikken, mottar <?php echo number_format($pk_got_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>
        <li id="reisedesign4">Ny pris: <input type="text" name="pk_got_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="pk_got_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge privatklinikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="got_selg_pk" value="Selg privatklinikken for 5 000 000,-"/></center></li>
        
        <?php
            // Hvis man eier København flyplass
            } elseif ($pk_kob_eier == $username && $city == $kobenhavn) {
        ?>
        
        <div id="reisecontainer2">
            <li id="reisedesign2"><a href="privatklinikk.php">Tilbake til privatklinikken</a></li>
            <li id="reisedesign2">Administrer privatklinikken i <?php echo $city; ?></li>
        </div>
        <li id="reisedesign4">Pris pr. % pr. dags. dato: <?php echo number_format($pk_kob_pris, 0, '.', ' '); ?>,- <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at du som eier av denne privatklinikken, mottar <?php echo number_format($pk_kob_pris, 0, '.', ' '); ?>,- pr reisende fra din flyplass. Pengene du tjener på reiser vil legges inn i din firma-konto
                    </span>
            </div></li>
        <li id="reisedesign4">Ny pris: <input type="text" name="pk_kob_ny_pris" placeholder="Beløp" /> kr</li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="pk_kob_endre_pris" value="Endre pris"/></center></li>
        <li id="reisedesign5"><center>Om du ønsker å selge privatklinikken så har du mulighet til det. <br> Du vil få 5 000 000,- for å selge den til STATEN. <br>Den vil da bli lagt ut på markedsplassen med en salgspris på 100 000 000,-</center></li>
        <li id="reisedesign4"><center><input class="button" type="submit" name="kob_selg_pk" value="Selg privatklinikken for 5 000 000,-"/></center></li>
        
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
