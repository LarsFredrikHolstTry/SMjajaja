<?php 
include('header.php');
include('left.php');
include('right.php');

include("auth.php");
require('connection/db.php');

$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);

$username = $row['username'];
$penger = $row['money'];

?>

<html>
    <head>
        <?php include('_sortemarked.php'); ?>
        <link rel="stylesheet" type="text/css" href="css/bilforhandler.css" />
    </head>

<body style="margin: 0 auto; width: 1000px;">
        
    <form id="form1"method="post"> 
            <center>
                <div id="contain">
                    <li id="bildesign2">Det sorte markedet</li>
                </div>
                <img class="bilforhandlerimg" src="images/handlinger/sortemarked.png">
                <div class="container">
                    <div id="vapen">
                        <img src="images/ting/pass.png">
                        <li><?php echo number_format($tingprisarray[0], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $tingprisarray[0]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="pass" id="pass" value="pass" class="bilbtn">Kjøp <?php echo $tingarray[0]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[0]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $tingarray[0]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/ting/visum.png">
                        <li><?php echo number_format($tingprisarray[1], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $tingprisarray[1]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="visum" id="visum" value="visum" class="bilbtn">Kjøp <?php echo $tingarray[1]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[1]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $tingarray[1]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/ting/dressjakke.png">
                        <li><?php echo number_format($tingprisarray[2], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $tingprisarray[2]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="dressjakke" id="dressjakke" value="dressjakke" class="bilbtn">Kjøp <?php echo $tingarray[2]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[2]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $tingarray[2]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
					<div id="vapen">
                        <img src="images/ting/dressbukse.png">
                        <li><?php echo number_format($tingprisarray[3], 0, '.', ' '); ?>,-</li>
                        <?php if($penger >= $tingprisarray[3]) { // SJEKK OM NOK PENGER FOR BIL ?>
                        <button name="dressbukse" id="dressbukse" value="dressbukse" class="bilbtn">Kjøp <?php echo $tingarray[3]; ?></button>
                        <?php } else { // HVIS IKKE DISPLAY GRÅ KNAPP ?>
                        <div class="tooltip"><button class="bilbtn_not_enough">Kjøp <?php echo $tingarray[3]; ?></button>
                            <span class="tooltiptext">Du har ikke råd til <?php echo $tingarray[3]; ?></span></div>
                        <?php } // CLOSE ?>
                    </div>
					
                </div>
            </center>
        </form>
    </body>
</html>
