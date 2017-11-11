<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); 
include("connection/start.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bosted.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
  
    <body style="margin: 0 auto; width: 1000px;">
        
<?php
/****************************************************/
/*            ARRAY FOR BESKYTTELSE                 */
/****************************************************/

$beskyttelse_type[0] = "Pit bull";
$beskyttelse_type[1] = "Skuddsikker vest";
$beskyttelse_type[2] = "Pansret bil";
$beskyttelse_type[3] = "Livvakter";
$beskyttelse_type[4] = "Mafia beskyttelse";
        
$pris[0] = 0;
$pris[1] = 75000;
$pris[2] = 5000000;
$pris[3] = 15000000;
$pris[4] = 75000000;
        
$beskyttelse[0] = "0 poeng";
$beskyttelse[1] = "15 poeng";
$beskyttelse[2] = "40 poeng";
$beskyttelse[3] = "75 poeng";
$beskyttelse[4] = "115 poeng";

/****************************************************/
/*         ARRAY FOR BESKYTTELSE SLUTT              */
/****************************************************/

$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);
$protect_type = $row['protect_type']; 
$money = $row['money'];

    if($protect_type == 0){
        if (isset($_POST['oppgrader'])){
            $oppgrader = $_POST['oppgrader'];
            
            if($money < $pris[1]){
                echo '<div id="mislykkket">Du har ikke råd!</div>';
            } else {
                $oppgraderhus = "UPDATE users SET protect_type = ($protect_type + 1) WHERE username='$username'";
                mysqli_query($con, $oppgraderhus) or die("Bad query: $oppgraderhus");
                $betal = "UPDATE users SET money = ($money - $pris[1]) WHERE username='$username'";
                mysqli_query($con, $betal) or die("Bad query: $betal");
                echo '<div id="velykket">';
                echo 'Du oppgraderte til ';
                echo $beskyttelse_type[1];
                echo '</div>';
            }
        }
        echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$beskyttelse_type[0]</b></li>
                <img src='images/beskyttelse/pitbull.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[0]<li>
            </div><br>

            <div id='oppgraderinfo'>
            <li>Oppgrader til: <b>$beskyttelse_type[1]</b></li>
            <img src='images/beskyttelse/skuddsikker_vest.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[1]<li>
                <li><b>Pris:</b> $pris[1],-<li>
            </div>
        </div>";
        
    } elseif($protect_type == 1){

        if (isset($_POST['oppgrader'])){
            $oppgrader = $_POST['oppgrader'];

            if($money < $pris[2]){
                echo '<div id="mislykkket">Du har ikke råd!</div>';
            } else {				
                $oppgraderhus = "UPDATE users SET protect_type = ($protect_type + 1) WHERE username='$username'";
                mysqli_query($con, $oppgraderhus) or die("Bad query: $oppgraderhus");
                $betal = "UPDATE users SET money = ($money - $pris[2]) WHERE username='$username'";
                mysqli_query($con, $betal) or die("Bad query: $betal");
                echo '<div id="velykket">';
                echo 'Du oppgraderte til ';
                echo $beskyttelse_type[2];
                echo '</div>';
            }
        }
        echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$beskyttelse_type[1]</b></li>
                <img src='images/beskyttelse/skuddsikker_vest.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[1]<li>
            </div><br>

            <div id='oppgraderinfo'>
            <li>Oppgrader til: <b>$beskyttelse_type[2]</b></li>
            <img src='images/beskyttelse/pansret_kjoretoy.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[2]<li>
                <li><b>Pris:</b> $pris[2],-<li>
            </div>
        </div>";
    
    } elseif($protect_type == 2){

        if (isset($_POST['oppgrader'])){
            $oppgrader = $_POST['oppgrader'];

            if($money < $pris[3]){
                echo '<div id="mislykkket">Du har ikke råd!</div>';
            } else {
                $oppgraderhus = "UPDATE users SET protect_type = ($protect_type + 1) WHERE username='$username'";
                mysqli_query($con, $oppgraderhus) or die("Bad query: $oppgraderhus");
                $betal = "UPDATE users SET money = ($money - $pris[3]) WHERE username='$username'";
                mysqli_query($con, $betal) or die("Bad query: $betal");
                echo '<div id="velykket">';
                echo 'Du oppgraderte til ';
                echo $beskyttelse_type[3];
                echo '</div>';
            }
        }
        
       echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$beskyttelse_type[2]</b></li>
                <img src='images/beskyttelse/pansret_kjoretoy.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[2]<li>
            </div><br>

            <div id='oppgraderinfo'>
            <li>Oppgrader til: <b>$beskyttelse_type[3]</b></li>
            <img src='images/beskyttelse/livvakt.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[3]<li>
                <li><b>Pris:</b> $pris[3],-<li>
            </div>
        </div>";
        
    } elseif($protect_type == 3){

        if (isset($_POST['oppgrader'])){
            $oppgrader = $_POST['oppgrader'];

            if($money < $pris[4]){
                echo '<div id="mislykkket">Du har ikke råd!</div>';
            } else {
                $oppgraderhus = "UPDATE users SET protect_type = ($protect_type + 1) WHERE username='$username'";
                mysqli_query($con, $oppgraderhus) or die("Bad query: $oppgraderhus");
                $betal = "UPDATE users SET money = ($money - $pris[4]) WHERE username='$username'";
                mysqli_query($con, $betal) or die("Bad query: $betal");
                echo '<div id="velykket">';
                echo 'Du oppgraderte til ';
                echo $beskyttelse_type[4];
                echo '</div>';
            }
        }
        
       echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$beskyttelse_type[3]</b></li>
                <img src='images/beskyttelse/livvakt.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[3]<li>
            </div><br>

            <div id='oppgraderinfo'>
            <li>Oppgrader til: <b>$beskyttelse_type[4]</b></li>
            <img src='images/beskyttelse/mafia.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[4]<li>
                <li><b>Pris:</b> $pris[4],-<li>
            </div>
        </div>";
        
    } elseif($protect_type == 4){ 
        echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$beskyttelse_type[4]</b></li>
                <img src='images/beskyttelse/mafia.png'/>
                <li><b>Beskyttelse:</b> $beskyttelse[4]<li>
            </div><br>
        </div>";
    }

?>
	  <?php if($protect_type == 0 || $protect_type == 1 || $protect_type == 2 || $protect_type == 3){ ?>
        <center>
            <form id="oppgrader" method="post">
                <button name="oppgrader" id="oppgrader" class="oppgraderbtn">OPPGRADER</button>
            </form>
        </center>
        <?php } else { ?>
            <div id="velykket">Du har den beste beskyttelsen!</div>
        <?php } ?>
    </body>
</html>