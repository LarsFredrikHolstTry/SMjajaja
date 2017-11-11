<?php 

include('header.php');
include('left.php');
include('right.php');
include('auth.php');
require('connection/db.php');
    
$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);

$money      = $row['money'];        // henter pengene brukeren har på hånden
$rank       = $row['rank'];         // henter ranken brukeren har


$sql_firma = "SELECT * FROM firma WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result_firma = mysqli_query($con, $sql_firma) or die("Bad query: $sql_firma");
$row_firma = mysqli_fetch_assoc($result_firma);


//////////////////////////////////////////////////////////////////////
//////////       SCRIPT FOR KEBABSJAPPE START        /////////////////
//////////////////////////////////////////////////////////////////////

$ks_eier                    =  $row_firma['ks_eier'];
$pris_kebabsjappe           =  1000000;
$utbetaling_kebabsjappe     =  25000;

// kjøp av kebabsjappe
if(isset($_POST['kebabsjappe'])){
    $kebabsjappe = $_POST['kebabsjappe'];
    
    if($money < $pris_kebabsjappe) {
        echo '<div id="mislykket">Du har ikke råd til kebabsjappen.</div>';
    } elseif($money >= $pris_kebabsjappe) {
        $kjop_ks = "UPDATE firma SET ks_eier = 1 WHERE username = '$username'";
        mysqli_query($con, $kjop_ks) or die("Bad query: $kjop_ks");
        
        $betal = "UPDATE users SET money = ($money - $pris_kebabsjappe) where username = '$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        
        echo '<div id="velykket">Gratulerer! Du er nå stolt eier av en kebabsjappe!</div>';
    }
}

// hente fortjeneste fra kebabsjappe
if(isset($_POST['ks_fortjeneste'])){
    $ks_fortjeneste = $_POST['ks_fortjeneste'];
    
    $ks_time        =        3600;                      // ventetid i sekunder ( 1 time = 3600 sec )
    $ks_timewait    =        time() + $ks_time;
    
    $ks_sql = "SELECT * FROM firma WHERE username='$username'";
    $ks_result = mysqli_query($con, $ks_sql);
    
    while($ks_rows = mysqli_fetch_array($ks_result)){
        $ks_timeleft = $ks_rows['ks_ventetid'];
        $ks_available = $ks_rows['ks_vente'];
        $ks_last = $ks_timeleft - time();
        
        $result = "UPDATE firma SET ks_vente='1', ks_ventetid='$ks_timewait' WHERE username='$username'";
        mysqli_query($con, $result) or die ("Bad query: $result");

        $utbetal = "UPDATE users SET money = ($money  + $utbetaling_kebabsjappe) WHERE username='$username'";
        mysqli_query($con, $utbetal) or die ("Bad query: $utbetal");
        
    }
    echo "<meta http-equiv='refresh' content='0'>";
}

// sql kebabsjappe
$ks_sql = "SELECT * from firma WHERE username='$username'";
$ks_result = mysqli_query($con, $ks_sql);

$current_time = time();

    while($ks_rows = mysqli_fetch_array($ks_result)){
    $ks_timeleft = $ks_rows['ks_ventetid'];
    $ks_last = ($ks_timeleft - $current_time);
}

if($ks_last <= 0){
    $result = mysqli_query($con, "UPDATE firma SET ks_ventetid='0', ks_vente='0' WHERE username='$username'") or die (mysqli_error($con));
}

//////////////////////////////////////////////////////////////////////
//////////       SCRIPT FOR KEBABSJAPPE SLUTT        /////////////////
//////////////////////////////////////////////////////////////////////


// -----------------------------------------------------------------//


//////////////////////////////////////////////////////////////////////
//////////          SCRIPT FOR REDERI START          /////////////////
//////////////////////////////////////////////////////////////////////

$rd_eier                    =  $row_firma['rd_eier'];
$pris_rederi                =  2500000;
$utbetaling_rederi          =  85000;

// kjøp av rederi
if(isset($_POST['rederi'])){
    $rederi = $_POST['rederi'];
    
    if($rank < 2){
        echo '<div id="mislykket">Du må være ranken Mole for å kjøpe rederi</div>';
    } elseif($money < $pris_rederi) {
        echo '<div id="mislykket">Du har ikke råd til rederin.</div>';
    } elseif($money >= $pris_rederi) {
        $kjop_rd = "UPDATE firma SET rd_eier = 1 WHERE username = '$username'";
        mysqli_query($con, $kjop_rd) or die("Bad query: $kjop_rd");
        
        $betal = "UPDATE users SET money = ($money - $pris_rederi) where username = '$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        
        echo '<div id="velykket">Gratulerer! Du er nå stolt eier av en rederi!</div>';
    }
}

// hente fortjeneste fra rederi
if(isset($_POST['rd_fortjeneste'])){
    $rd_fortjeneste = $_POST['rd_fortjeneste'];
    
    $rd_time        =        3600;                      // ventetid i sekunder ( 1 time = 3600 sec )
    $rd_timewait    =        time() + $rd_time;
    
    $rd_sql = "SELECT * FROM firma WHERE username='$username'";
    $rd_result = mysqli_query($con, $rd_sql);
    
    while($rd_rows = mysqli_fetch_array($rd_result)){
        $rd_timeleft = $rd_rows['rd_ventetid'];
        $rd_available = $rd_rows['rd_vente'];
        $rd_last = $rd_timeleft - time();
        
        $result = "UPDATE firma SET rd_vente='1', rd_ventetid='$rd_timewait' WHERE username='$username'";
        mysqli_query($con, $result) or die ("Bad query: $result");

        $utbetal = "UPDATE users SET money = ($money  + $utbetaling_rederi) WHERE username='$username'";
        mysqli_query($con, $utbetal) or die ("Bad query: $utbetal");
        
    }
    echo "<meta http-equiv='refresh' content='0'>";
}

// sql rederi
$rd_sql = "SELECT * from firma WHERE username='$username'";
$rd_result = mysqli_query($con, $rd_sql);

$current_time = time();

    while($rd_rows = mysqli_fetch_array($rd_result)){
    $rd_timeleft = $rd_rows['rd_ventetid'];
    $rd_last = ($rd_timeleft - $current_time);
}

if($rd_last <= 0){
    $result = mysqli_query($con, "UPDATE firma SET rd_ventetid='0', rd_vente='0' WHERE username='$username'") or die (mysqli_error($con));
}

//////////////////////////////////////////////////////////////////////
//////////       SCRIPT FOR REDERI SLUTT             /////////////////
//////////////////////////////////////////////////////////////////////


// -----------------------------------------------------------------//


//////////////////////////////////////////////////////////////////////
//////////     SCRIPT FOR KLESPRODUKSJON SLUTT       /////////////////
//////////////////////////////////////////////////////////////////////

$kl_eier                            =  $row_firma['kl_eier'];
$pris_klesproduksjon                =  6000000;
$utbetaling_klesproduksjon          =  250000;

// kjøp av klesproduksjon
if(isset($_POST['klesproduksjon'])){
    $klesproduksjon = $_POST['klesproduksjon'];
    
    if($rank < 5){
        echo '<div id="mislykket">Du må være ranken Capo Decima for å kjøpe klesproduksjon</div>';
    } elseif($money < $pris_klesproduksjon) {
        echo '<div id="mislykket">Du har ikke råd til klesproduksjonn.</div>';
    } elseif($money >= $pris_klesproduksjon) {
        $kjop_kl = "UPDATE firma SET kl_eier = 1 WHERE username = '$username'";
        mysqli_query($con, $kjop_kl) or die("Bad query: $kjop_kl");
        
        $betal = "UPDATE users SET money = ($money - $pris_klesproduksjon) where username = '$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        
        echo '<div id="velykket">Gratulerer! Du er nå stolt eier av en klesproduksjon!</div>';
    }
}

// hente fortjeneste fra klesproduksjon
if(isset($_POST['kl_fortjeneste'])){
    $kl_fortjeneste = $_POST['kl_fortjeneste'];
    
    $kl_time        =        3600;                      // ventetid i sekunder ( 1 time = 3600 sec )
    $kl_timewait    =        time() + $kl_time;
    
    $kl_sql = "SELECT * FROM firma WHERE username='$username'";
    $kl_result = mysqli_query($con, $kl_sql);
    
    while($kl_rows = mysqli_fetch_array($kl_result)){
        $kl_timeleft = $kl_rows['kl_ventetid'];
        $kl_available = $kl_rows['kl_vente'];
        $kl_last = $kl_timeleft - time();
        
        $result = "UPDATE firma SET kl_vente='1', kl_ventetid='$kl_timewait' WHERE username='$username'";
        mysqli_query($con, $result) or die ("Bad query: $result");

        $utbetal = "UPDATE users SET money = ($money  + $utbetaling_klesproduksjon) WHERE username='$username'";
        mysqli_query($con, $utbetal) or die ("Bad query: $utbetal");
        
    }
    echo "<meta http-equiv='refresh' content='0'>";
}

// sql klesproduksjon
$kl_sql = "SELECT * from firma WHERE username='$username'";
$kl_result = mysqli_query($con, $kl_sql);

$current_time = time();

    while($kl_rows = mysqli_fetch_array($kl_result)){
    $kl_timeleft = $kl_rows['kl_ventetid'];
    $kl_last = ($kl_timeleft - $current_time);
}

if($kl_last <= 0){
    $result = mysqli_query($con, "UPDATE firma SET kl_ventetid='0', kl_vente='0' WHERE username='$username'") or die (mysqli_error($con));
}

//////////////////////////////////////////////////////////////////////
//////////     SCRIPT FOR KLESPRODUKSJON SLUTT       /////////////////
//////////////////////////////////////////////////////////////////////


// -----------------------------------------------------------------//


//////////////////////////////////////////////////////////////////////
//////////      SCRIPT FOR OLJESELSKAP SLUTT         /////////////////
//////////////////////////////////////////////////////////////////////

$os_eier                         =  $row_firma['os_eier'];
$pris_oljeselskap                =  10000000;
$utbetaling_oljeselskap          =  500000;

// kjøp av oljeselskap
if(isset($_POST['oljeselskap'])){
    $oljeselskap = $_POST['oljeselskap'];
    
    if($rank < 7){
        echo '<div id="mislykket">Du må være ranken Capo Crimini for å kjøpe oljeselskap</div>';
    } elseif($money < $pris_oljeselskap) {
        echo '<div id="mislykket">Du har ikke råd til oljeselskapn.</div>';
    } elseif($money >= $pris_oljeselskap) {
        $kjop_os = "UPDATE firma SET os_eier = 1 WHERE username = '$username'";
        mysqli_query($con, $kjop_os) or die("Bad query: $kjop_os");
        
        $betal = "UPDATE users SET money = ($money - $pris_oljeselskap) where username = '$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        
        echo '<div id="velykket">Gratulerer! Du er nå stolt eier av en oljeselskap!</div>';
    }
}

// hente fortjeneste fra oljeselskap
if(isset($_POST['os_fortjeneste'])){
    $os_fortjeneste = $_POST['os_fortjeneste'];
    
    $os_time        =        3600;                      // ventetid i sekunder ( 1 time = 3600 sec )
    $os_timewait    =        time() + $os_time;
    
    $os_sql = "SELECT * FROM firma WHERE username='$username'";
    $os_result = mysqli_query($con, $os_sql);
    
    while($os_rows = mysqli_fetch_array($os_result)){
        $os_timeleft = $os_rows['os_ventetid'];
        $os_available = $os_rows['os_vente'];
        $os_last = $os_timeleft - time();
        
        $result = "UPDATE firma SET os_vente='1', os_ventetid='$os_timewait' WHERE username='$username'";
        mysqli_query($con, $result) or die ("Bad query: $result");

        $utbetal = "UPDATE users SET money = ($money  + $utbetaling_oljeselskap) WHERE username='$username'";
        mysqli_query($con, $utbetal) or die ("Bad query: $utbetal");
        
    }
    echo "<meta http-equiv='refresh' content='0'>";
}

// sql oljeselskap
$os_sql = "SELECT * from firma WHERE username='$username'";
$os_result = mysqli_query($con, $os_sql);

$current_time = time();

    while($os_rows = mysqli_fetch_array($os_result)){
    $os_timeleft = $os_rows['os_ventetid'];
    $os_last = ($os_timeleft - $current_time);
}

if($os_last <= 0){
    $result = mysqli_query($con, "UPDATE firma SET os_ventetid='0', os_vente='0' WHERE username='$username'") or die (mysqli_error($con));
}

//////////////////////////////////////////////////////////////////////
//////////      SCRIPT FOR OLJESELSKAP SLUTT         /////////////////
//////////////////////////////////////////////////////////////////////


function crimemaketime($until){

   $now = time();
   $difference = $until - $now;

   $days = floor($difference/86400);
   $difference = $difference - ($days*86400);

   $hours = floor($difference/3600);
   $difference = $difference - ($hours*3600);

   $minutes = floor($difference/60);
   $difference = $difference - ($minutes*60);

   $seconds = $difference;
   $output = "$minutes Minutes and $seconds Seconds";

   return $output;
}

    $ks_available = $row_firma['ks_vente'];     // VENTETID KEBABSJAPPE
    $rd_available = $row_firma['rd_vente'];     // VENTETID REDERI
    $kl_available = $row_firma['kl_vente'];     // VENTETID KLESPRODUKSJON
    $os_available = $row_firma['os_vente'];     // VENTETID OLJESELSKAP




?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <center>
            <form method="post" action=""> 
                
                <!-- KEBABSJAPPE SCRIPT START -->
                <div id="sm-cntr">
                    <div id="sm-tp-hdr">
                        <li>Firma</li>
                    </div>
                    <div id="sm-tp-hdr">
                        <li>Kebabsjappe</li>
                    </div>
                    <img src="images/firma/kebabsjappe.png">
                    <div id="sm-box38">
                        <li>Pris for kebabsjappe: <?php echo number_format($pris_kebabsjappe, 0, '.', ' '); ?>,- </li>
                        <li>Utbetalelse pr time: <?php echo number_format($utbetaling_kebabsjappe, 0, '.', ' '); ?>,- </li>
                    </div>
                    <div id="sm-box38">
                        <?php if($ks_available == 1) { ?>
                        <li><button class="button_false">Du må vente <span id="countdowntimer_ks"><?php echo $ks_last ?></span> sekunder</button></li>
                        <?php } elseif($ks_eier == 0) { ?>
                            <li><button class="button" type="submit" name="kebabsjappe">Kjøp kebabsjappe</button></li>
                        <?php } elseif($ks_eier == 1) { ?>
                            <li><button class="button" type="submit" name="ks_fortjeneste">Hent fortjeneste</button></li>
                        <?php } ?>
                    </div>    
                </div>
                <!-- KEBABSJAPPE SCRIPT SLUTT -->
                
                <br><!-- ------------------------------------------------------------------------------------------ -->
                
                <!-- REDERI SCRIPT START -->
                <div id="sm-cntr">
                    <div id="sm-tp-hdr">
                        <li>Rederi</li>
                    </div>
                    <img src="images/firma/rederi.png">
                    <div id="sm-box38">
                        <li>Pris for rederi: <?php echo number_format($pris_rederi, 0, '.', ' '); ?>,- </li>
                        <li>Utbetalelse pr time: <?php echo number_format($utbetaling_rederi, 0, '.', ' '); ?>,- </li>
                    </div>
                    <div id="sm-box38">
                        <?php if($rd_available == 1) { ?>
                        <li><button class="button_false">Du må vente <span id="countdowntimer_rd"><?php echo $rd_last ?></span> sekunder</button></li>
                        <?php } elseif($rd_eier == 0) { ?>
                            <li><button class="button" type="submit" name="rederi">Kjøp rederi</button></li>
                        <?php } elseif($rd_eier == 1) { ?>
                            <li><button class="button" type="submit" name="rd_fortjeneste">Hent fortjeneste</button></li>
                        <?php } ?>
                    </div>    
                </div>
                <!-- REDERI SCRIPT SLUTT -->
                
                <br><!-- ------------------------------------------------------------------------------------------ -->
                
                <!-- KLESPRODUKSJON SCRIPT START -->
                <div id="sm-cntr">
                    <div id="sm-tp-hdr">
                        <li>Klesproduksjon i Kina</li>
                    </div>
                    <img src="images/firma/klesproduksjon.png">
                    <div id="sm-box38">
                        <li>Pris for klesproduksjon: <?php echo number_format($pris_klesproduksjon, 0, '.', ' '); ?>,- </li>
                        <li>Utbetalelse pr time: <?php echo number_format($utbetaling_klesproduksjon, 0, '.', ' '); ?>,- </li>
                    </div>
                    <div id="sm-box38">
                        <?php if($kl_available == 1) { ?>
                        <li><button class="button_false">Du må vente <span id="countdowntimer_kl"><?php echo $kl_last ?></span> sekunder</button></li>
                        <?php } elseif($kl_eier == 0) { ?>
                            <li><button class="button" type="submit" name="klesproduksjon">Kjøp klesproduksjon</button></li>
                        <?php } elseif($kl_eier == 1) { ?>
                            <li><button class="button" type="submit" name="kl_fortjeneste">Hent fortjeneste</button></li>
                        <?php } ?>
                    </div>    
                </div>
                <!-- KLESPRODUKSJON SCRIPT SLUTT -->
                
                <br><!-- ------------------------------------------------------------------------------------------ -->
                
                <!-- OLJESELSKAP SCRIPT START -->
                <div id="sm-cntr">
                    <div id="sm-tp-hdr">
                        <li>Oljeselskap</li>
                    </div>
                    <img src="images/firma/oljeselskap.png">
                    <div id="sm-box38">
                        <li>Pris for oljeselskap: <?php echo number_format($pris_oljeselskap, 0, '.', ' '); ?>,- </li>
                        <li>Utbetalelse pr time: <?php echo number_format($utbetaling_oljeselskap, 0, '.', ' '); ?>,- </li>
                    </div>
                    <div id="sm-box38">
                        <?php if($os_available == 1) { ?>
                        <li><button class="button_false">Du må vente <span id="countdowntimer_os"><?php echo $os_last ?></span> sekunder</button></li>
                        <?php } elseif($os_eier == 0) { ?>
                            <li><button class="button" type="submit" name="oljeselskap">Kjøp oljeselskap</button></li>
                        <?php } elseif($os_eier == 1) { ?>
                            <li><button class="button" type="submit" name="os_fortjeneste">Hent fortjeneste</button></li>
                        <?php } ?>
                    </div>    
                </div>
                <!-- OLJESELSKAP SCRIPT SLUTT -->
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                
            </form>
        </center>
    </body>
</html>

<!------------------------------------------------------>
<!--           Countdown for kebabsjappa              -->
<!------------------------------------------------------>
<script type="text/javascript">
    var timeleft_ks = <?php echo $ks_last ?>;
    var downloadTimer = setInterval(function(){
        timeleft_ks--;
        document.getElementById("countdowntimer_ks").textContent = timeleft_ks;
    if(timeleft_ks <= 0) 
        window.location.href = "firma.php";
    },1000);
</script>

<!------------------------------------------------------>
<!--           Countdown for rederi                   -->
<!------------------------------------------------------>
<script type="text/javascript">
    var timeleft_rd = <?php echo $rd_last ?>;
    var downloadTimer = setInterval(function(){
        timeleft_rd--;
        document.getElementById("countdowntimer_rd").textContent = timeleft_rd;
    if(timeleft_rd <= 0) 
        window.location.href = "firma.php";
    },1000);
</script>

<!------------------------------------------------------>
<!--        Countdown for klesproduksjon              -->
<!------------------------------------------------------>
<script type="text/javascript">
    var timeleft_kl = <?php echo $kl_last ?>;
    var downloadTimer = setInterval(function(){
        timeleft_kl--;
        document.getElementById("countdowntimer_kl").textContent = timeleft_kl;
    if(timeleft_kl <= 0) 
        window.location.href = "firma.php";
    },1000);
</script>

<!------------------------------------------------------>
<!--         Countdown for oljeselskap                -->
<!------------------------------------------------------>
<script type="text/javascript">
    var timeleft_os = <?php echo $os_last ?>;
    var downloadTimer = setInterval(function(){
        timeleft_os--;
        document.getElementById("countdowntimer_s").textContent = timeleft_os;
    if(timeleft_os <= 0) 
        window.location.href = "firma.php";
    },1000);
</script>
