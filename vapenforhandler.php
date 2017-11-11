<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>

<?php 
    
        
include("auth.php");
require('connection/db.php');
    
$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);
        
$vapen = $row['vapen'];
$penger = $row['money'];
        
//////////////////////////////////////////////////////
//                 ARRAY FOR VÅPEN                  //
//////////////////////////////////////////////////////

$vapenarray[0]  =   "Kniv";         // KRIV
$vapenarray[1]  =   "Mac 11";       // MAC 11
$vapenarray[2]  =   "Revolver";     // REVOLVER
$vapenarray[3]  =   "Glock";        // GLOCK
$vapenarray[4]  =   "Tec 9";        // TEC 9
$vapenarray[5]  =   "Beneli M2";    // BENELI M2
$vapenarray[6]  =   "P90";          // P90
$vapenarray[7]  =   "AK-47";        // AK-47
$vapenarray[8]  =   "Scar-L";       // SCAR-L
$vapenarray[9]  =   "M16";          // M16
$vapenarray[10] =   "AWP";          // AWP
$vapenarray[11] =   "Bazooka";      // BAZOOKA

$prisarray[0]   =   300;            // PRIS KNIV
$prisarray[1]   =   2000;           // PRIS MAC 11
$prisarray[2]   =   4000;           // PRIS REVOLVER
$prisarray[3]   =   5000;           // PRIS GLOCK
$prisarray[4]   =   7000;           // PRIS TEC 9
$prisarray[5]   =   10000;          // PRIS BENELI M2
$prisarray[6]   =   11000;          // PRIS p90
$prisarray[7]   =   12000;          // PRIS AK-47
$prisarray[8]   =   17000;          // PRIS SCAR-L
$prisarray[9]   =   22000;          // PRIS M16
$prisarray[10]  =   250000;         // PRIS AWP
$prisarray[11]  =   1000000;        // PRIS BAZOOKA
        
//////////////////////////////////////////////////////
//             ARRAY FOR VÅPEN  SLUTT               //
//////////////////////////////////////////////////////

if (isset($_POST['kniv'])){
    $kniv = $_POST['kniv'];
    
    if($vapen == $vapenarray[0]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[0].'</div>';
    } elseif($penger > $prisarray[0]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[0].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[0]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[0]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['mac11'])){
    $mac11 = $_POST['mac11'];
    
    if($vapen == $vapenarray[1]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[1].'</div>';
    } elseif($penger > $prisarray[1]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[1].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[1]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[1]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['revolver'])){
    $revolver = $_POST['revolver'];
    
    if($vapen == $vapenarray[2]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[2].'</div>';
    } elseif($penger > $prisarray[2]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[2].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[2]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[2]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}

if (isset($_POST['glock'])){
    $glock = $_POST['glock'];
    
    if($vapen == $vapenarray[3]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[3].'</div>';
    } elseif($penger > $prisarray[3]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[3].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[3]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[3]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['tec9'])){
    $tec9 = $_POST['tec9'];
    
    if($vapen == $vapenarray[4]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[4].'</div>';
    } elseif($penger > $prisarray[4]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[4].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[4]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[4]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['benelim2'])){
    $benelim2 = $_POST['benelim2'];
    
    if($vapen == $vapenarray[5]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[5].'</div>';
    } elseif($penger > $prisarray[5]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[5].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[5]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[5]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['p90'])){
    $p90 = $_POST['p90'];
    
    if($vapen == $vapenarray[6]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[6].'</div>';
    } elseif($penger > $prisarray[6]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[6].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[6]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[6]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['ak47'])){
    $ak47 = $_POST['ak47'];
    
    if($vapen == $vapenarray[7]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[7].'</div>';
    } elseif($penger > $prisarray[7]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[7].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[7]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[7]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['scar'])){
    $scar = $_POST['scar'];
    
    if($vapen == $vapenarray[8]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[8].'</div>';
    } elseif($penger > $prisarray[8]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[8].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[8]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[8]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['m16'])){
    $m16 = $_POST['m16'];
    
    if($vapen == $vapenarray[9]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[9].'</div>';
    } elseif($penger > $prisarray[9]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[9].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[9]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[9]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['sniper'])){
    $sniper = $_POST['sniper'];
    
    if($vapen == $vapenarray[10]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[10].'</div>';
    } elseif($penger > $prisarray[10]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[10].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[10]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[10]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}
        
if (isset($_POST['bazooka'])){
    $bazooka = $_POST['bazooka'];
    
    if($vapen == $vapenarray[11]) {
        echo '<div id="mislykket">Du har allerede en '.$vapenarray[11].'</div>';
    } elseif($penger > $prisarray[11]) {
        echo '<div id="velykket">Du kjøpte en '.$vapenarray[11].'</div>';
        $betal = "UPDATE users SET money = ($penger - $prisarray[11]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $vapen = "UPDATE users SET vapen = '$vapenarray[11]' WHERE username='$username'";
        mysqli_query($con, $vapen) or die("Bad query: $vapen");
    } else {
        echo '<div id="mislykket">Du har ikke råd til det våpenet. Kjøp ett billigere våpen eller skaff mer penger via krim!</div>';
    }
}		
?>
		
        
        <link rel="stylesheet" type="text/css" href="css/bilforhandler.css" />
        <title>Scandinavian Mafia - Kill or get killed</title>
    </head>

<body style="margin: 0 auto; width: 1000px;">
        
    <form id="form1" name="form1" method="post" action=""> 
            <center>
                <div id="contain">
                    <li id="bildesign2">Våpenforhandler</li>
                </div>
                <img class="vapenforhandlerimg" src="images/handlinger/vapenforhandler.png">
                <div class="container">

					<div id="vapen">
                        <img src="images/weapons/kniv.png">
                        <li><?php echo number_format($prisarray[0], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[0]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="kniv" id="kniv" value="kniv" class="bilbtn">Kjøp <?php echo $vapenarray[0]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[0]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[0]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/mac11.png">
                        <li><?php echo number_format($prisarray[1], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[1]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="mac11" id="mac11" value="mac11" class="bilbtn">Kjøp <?php echo $vapenarray[1]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[1]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[1]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/revolver.png">
                        <li><?php echo number_format($prisarray[2], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[2]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="revolver" id="revolver" value="revolver" class="bilbtn">Kjøp <?php echo $vapenarray[2]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[2]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[2]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
 
					<div id="vapen">
                        <img src="images/weapons/glock.png">
                        <li><?php echo number_format($prisarray[3], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[3]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="glock" id="glock" value="glock" class="bilbtn">Kjøp <?php echo $vapenarray[3]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[3]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[3]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/tec9.png">
                        <li><?php echo number_format($prisarray[4], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[4]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="tec9" id="tec9" value="tec9" class="bilbtn">Kjøp <?php echo $vapenarray[4]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[4]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[4]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/benelim2.png">
                        <li><?php echo number_format($prisarray[5], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[5]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="benelim2" id="benelim2" value="benelim2" class="bilbtn">Kjøp <?php echo $vapenarray[5]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[5]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[5]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/p90.png">
                        <li><?php echo number_format($prisarray[6], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[6]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="p90" id="p90" value="p90" class="bilbtn">Kjøp <?php echo $vapenarray[6]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[6]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[6]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/ak47.png">
                        <li><?php echo number_format($prisarray[7], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[7]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="ak47" id="ak47" value="ak47" class="bilbtn">Kjøp <?php echo $vapenarray[7]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[7]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[7]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/scar.png">
                        <li><?php echo number_format($prisarray[8], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[8]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="scar" id="scar" value="scar" class="bilbtn">Kjøp <?php echo $vapenarray[8]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[8]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[8]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/m16.png">
                        <li><?php echo number_format($prisarray[9], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[9]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="m16" id="m16" value="m16" class="bilbtn">Kjøp <?php echo $vapenarray[9]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[9]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[9]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/sniper.png">
                        <li><?php echo number_format($prisarray[10], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[10]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="sniper" id="sniper" value="sniper" class="bilbtn">Kjøp <?php echo $vapenarray[10]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[10]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[10]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/weapons/bazooka.png">
                        <li><?php echo number_format($prisarray[11], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $prisarray[11]) { // SJEKK OM NOK PENGER FOR VAPEN ?>
                        <button name="bazooka" id="bazooka" value="bazooka" class="bilbtn">Kjøp <?php echo $vapenarray[11]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[11]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $vapenarray[11]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
                </div>
            </center>
        </form>
    </body>
</html>












