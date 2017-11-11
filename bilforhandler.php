<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bilforhandler.css" />

<?php 
        
include("auth.php");
require('connection/db.php');
    
$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);
        
$bil = $row['bil'];
$penger = $row['money'];

//////////////////////////////////////////////////////
//                 ARRAY FOR BIL                    //
//////////////////////////////////////////////////////
        
$bilarray[0] = "VW Golf R32";           // VW Golf R32
$bilarray[1] = "Toyota IQ";             // Toyota IQ
$bilarray[2] = "Audi A4";               // Audi A4
$bilarray[3] = "Volvo S40";             // Volvo S40
$bilarray[4] = "Hyundai Accent";       // Hyundai Accent
$bilarray[5] = "Mercedes Benz";         // Mercedes Benz
$bilarray[6] = "Camaro";                // Camaro
$bilarray[7] = "BMW X6M";               // BMW X6M
$bilarray[8] = "Tesla Model S";         // Tesla Model S
$bilarray[9] = "Bentley";               // Bentley
$bilarray[10] = "Rolls Royce";           // Rolls Royce

$bilprisarray[0] = 89000;               // pris VW Golf R32
$bilprisarray[1] = 100000;              // pris Toyota IQ
$bilprisarray[2] = 119000;              // pris Audi A4
$bilprisarray[3] = 179000;              // pris Volvo S40
$bilprisarray[4] = 269000;             // pris Hyundai Accent
$bilprisarray[5] = 349000;              // pris Mercedes Benz
$bilprisarray[6] = 379000;              // pris Camaro
$bilprisarray[7] = 599000;              // pris BMW X6M
$bilprisarray[8] = 790000;              // pris Tesla Model S
$bilprisarray[9] = 1429000;             // pris Bentley
$bilprisarray[10] = 3390000;             // pris Rolls Royce
  
//////////////////////////////////////////////////////
//             ARRAY FOR BIL SLUTT                  //
//////////////////////////////////////////////////////

if (isset($_POST['vwgolfr32'])){
    $vwgolfr32 = $_POST['vwgolfr32'];
    
    if($bil == $bilarray[0]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[0].'</div>';
    } elseif($penger > $bilprisarray[0]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[0].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[0]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[0]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
    }
}
        
if (isset($_POST['volvos40'])){
    $volvos40 = $_POST['volvos40'];
    
    if($bil == $bilarray[3]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[3].'</div>';
    } elseif($penger > $bilprisarray[3]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[3].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[3]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[3]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
    }
}
        
if (isset($_POST['camaro'])){
    $camaro = $_POST['camaro'];
    
    if($bil == $bilarray[6]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[6].'</div>';
    } elseif($penger > $bilprisarray[6]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[6].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[6]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[6]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
    }
}

if (isset($_POST['bentley'])){
    $bentley = $_POST['bentley'];
    
    if($bil == $bilarray[9]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[9].'</div>';
    } elseif($penger > $bilprisarray[9]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[9].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[9]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[9]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
    }
}
        
if (isset($_POST['mercedesbenz'])){
    $mercedesbenz = $_POST['mercedesbenz'];
    
    if($bil == $bilarray[5]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[5].'</div>';
    } elseif($penger > $bilprisarray[5]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[5].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[5]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[5]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
    }
}
        
if (isset($_POST['audia4'])){
    $audia4 = $_POST['audia4'];
    
    if($bil == $bilarray[2]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[2].'</div>';
    } elseif($penger > $bilprisarray[2]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[2].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[2]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[2]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
    }
}
        
if (isset($_POST['bmwx6m'])){
    $bmwx6m = $_POST['bmwx6m'];
    
    if($bil == $bilarray[7]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[7].'</div>';
    } elseif($penger > $bilprisarray[7]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[7].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[7]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[7]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
    }
}
        
if (isset($_POST['rollsroyce'])){
    $rollsroyce = $_POST['rollsroyce'];
    
    if($bil == $bilarray[10]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[10].'</div>';
    } elseif($penger > $bilprisarray[10]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[10].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[10]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[10]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
		
    }
}
        
if (isset($_POST['tesla'])){
    $tesla = $_POST['tesla'];
    
    if($bil == $bilarray[8]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[8].'</div>';
    } elseif($penger > $bilprisarray[8]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[8].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[8]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[8]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
		
    }
}
        
if (isset($_POST['toyotaiq'])){
    $toyotaiq = $_POST['toyotaiq'];
    
    if($bil == $bilarray[1]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[1].'</div>';
    } elseif($penger > $bilprisarray[1]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[1].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[1]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[1]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
		
    }
}
        
if (isset($_POST['hyundaiaccent'])){
    $hyundaiaccent = $_POST['hyundaiaccent'];
    
    if($bil == $bilarray[4]) {
        echo '<div id="mislykket">Du har allerede en '.$bilarray[4].'</div>';
    } elseif($penger > $bilprisarray[4]) {
        echo '<div id="velykket">Du kjøpte en '.$bilarray[4].'</div>';
        $betal = "UPDATE users SET money = ($penger - $bilprisarray[4]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $bil = "UPDATE users SET bil = '$bilarray[4]' WHERE username='$username'";
        mysqli_query($con, $bil) or die("Bad query: $bil");
		
    }
}

?>
    
    </head>

<body style="margin: 0 auto; width: 1000px;">
        
    <form id="form1" name="form1" method="post" action=""> 
            <center>
                <div id="contain">
                    <li id="bildesign2">Bilforhandler</li>
                </div>
                <img class="bilforhandlerimg" src="images/handlinger/bilforhandler.png">
                <div class="container">
                    
                    <!-- VW GOLF R32 -->
                    <div id="vapen">
                        <img src="images/cars/vwgolfr32.png">
                        <li><?php echo number_format($bilprisarray[0], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[0]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="vwgolfr32" id="vwgolfr32" value="vwgolfr32" class="bilbtn">Kjøp <?php echo $bilarray[0]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[0]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[0]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>

                    <div id="vapen">
                        <img src="images/cars/toyotaiq.png">
                        <li><?php echo number_format($bilprisarray[1], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[1]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="toyotaiq" id="toyotaiq" value="toyotaiq" class="bilbtn">Kjøp <?php echo $bilarray[1]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[1]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[1]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>

                    <div id="vapen">
                        <img src="images/cars/audia4.png">
                        <li><?php echo number_format($bilprisarray[2], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[2]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="audia4" id="audia4" value="audia4" class="bilbtn">Kjøp <?php echo $bilarray[2]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[2]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[2]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
                    
                    <div id="vapen">
                        <img src="images/cars/volvos40.png">
                        <li><?php echo number_format($bilprisarray[3], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[3]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="volvos40" id="volvos40" value="volvos40" class="bilbtn">Kjøp <?php echo $bilarray[3]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[3]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[3]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>

                    <div id="vapen">
                        <img src="images/cars/hyundaiaccent.png">
                        <li><?php echo number_format($bilprisarray[4], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[4]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="hyundaiaccent" id="hyundaiaccent" value="hyundaiaccent" class="bilbtn">Kjøp <?php echo $bilarray[4]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[4]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[4]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>

                    <div id="vapen">
                        <img src="images/cars/mercedesbenz.png">
                        <li><?php echo number_format($bilprisarray[5], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[5]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="mercedesbenz" id="mercedesbenz" value="mercedesbenz" class="bilbtn">Kjøp <?php echo $bilarray[5]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[5]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[5]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>

                    <div id="vapen">
                        <img src="images/cars/camaro.png">
                        <li><?php echo number_format($bilprisarray[6], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[6]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="camaro" id="camaro" value="camaro" class="bilbtn">Kjøp <?php echo $bilarray[6]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[6]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[6]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>

                    <div id="vapen">
                        <img src="images/cars/bmwx6m.png">
                        <li><?php echo number_format($bilprisarray[7], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[7]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="bmwx6m" id="bmwx6m" value="bmwx6m" class="bilbtn">Kjøp <?php echo $bilarray[7]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[7]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[7]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>

                    <div id="vapen">
                        <img src="images/cars/tesla.png">
                        <li><?php echo number_format($bilprisarray[8], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[8]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="tesla" id="tesla" value="tesla" class="bilbtn">Kjøp <?php echo $bilarray[8]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[8]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[8]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>

                    <div id="vapen">
                        <img src="images/cars/bentley.png">
                        <li><?php echo number_format($bilprisarray[9], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[9]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="bentley" id="bentley" value="bentley" class="bilbtn">Kjøp <?php echo $bilarray[9]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[9]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[9]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
                    <div id="vapen">
                        <img src="images/cars/rollsroyce.png">
                        <li><?php echo number_format($bilprisarray[10], 0, '.', ' '); ?>,-</li>
                        <?php if($penger > $bilprisarray[10]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="rollsroyce" id="rollsroyce" value="rollsroyce" class="bilbtn">Kjøp <?php echo $bilarray[10]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $bilarray[10]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $bilarray[10]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
                </div>
            </center>
        </form>
    </body>
</html>
