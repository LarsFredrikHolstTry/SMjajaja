<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bosted.css" />
    </head>
  
    <body style="margin: 0 auto; width: 1000px;">
        
<?php

/****************************************************/
/*                 ARRAY FOR BOSTED                 */
/****************************************************/

$hus[0] = "Telt";             // TELT
$hus[1] = "Studenbolig";      // STUDENTBOLIG
$hus[2] = "Normalt hus";      // NORMALT HUS
$hus[3] = "Villa";            // VILLA
$hus[4] = "Herskapsbolig";    // HERSKAPSBOLIG
        
$pris[0] = 0;                 // PRIS FOR TELT (START-BOSTED)
$pris[1] = 75000;             // PRIS FOR STUDENTBOLIG
$pris[2] = 5000000;           // PRIS FOR NORMALT HUS
$pris[3] = 15000000;          // PRIS FOR VILLA
$pris[4] = 75000000;          // PRIS FOR HESKAPSBOLIG
        
$kvm[0] = 2;                  // KVM TELT
$kvm[1] = 15;                 // KVM STUDENTBOLIG
$kvm[2] = 110;                // KVM NORMALT HUS
$kvm[3] = 205;                // KVM VILLA
$kvm[4] = 475;                // KVM HERSKAPSBOLIG
        
$soverom[0] = 0;              // SOVEROM TELT
$soverom[1] = 1;              // SOVEROM STUDENTBOLIG
$soverom[2] = 2;              // SOVEROM NORMALT HUS
$soverom[3] = 4;              // SOVEROM VILLA
$soverom[4] = 7;              // SOVEROM HERSKAPSBOLIG
        
$bad[0] = 0;                  // BAD TELT
$bad[1] = 1;                  // BAD STUDENTBOLIG
$bad[2] = 2;                  // BAD NORMALT HUS
$bad[3] = 3;                  // BAD VILLA
$bad[4] = 4;                  // BAD HERSKAPSBOLIG
        
$beskyttelse[0] = "0 poeng";        // BESKYTTELSE TELT
$beskyttelse[1] = "10 poeng";       // BESKYTTELSE STUDENTBOLIG
$beskyttelse[2] = "20 poeng";       // BESKYTTELSE NORMALT HUS
$beskyttelse[3] = "40 poeng";       // BESKYTTELSE VILLA
$beskyttelse[4] = "75 poeng";       // BESKYTTELSE HERSKAPSBOLIG

/****************************************************/
/*              ARRAY FOR BOSTED SLUTT              */
/****************************************************/

$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);
$house_type = $row['house_type']; 
$money = $row['money'];

    if($house_type == 0){
        if (isset($_POST['oppgrader'])){
            $oppgrader = $_POST['oppgrader'];
            
            if($money < $pris[1]){
                echo '<div id="mislykkket">Du har ikke råd!</div>';
            } else {
                $oppgraderhus = "UPDATE users SET house_type = ($house_type + 1) WHERE username='$username'";
                mysqli_query($con, $oppgraderhus) or die("Bad query: $oppgraderhus");
                $betal = "UPDATE users SET money = ($money - $pris[1]) WHERE username='$username'";
                mysqli_query($con, $betal) or die("Bad query: $betal");
                echo '<div id="velykket">';
                echo 'Du oppgraderte til ';
                echo $hus[1];
                echo '</div>';
            }
        }
        echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$hus[0]</b></li>
                <img src='images/hus/telt.png'/>
                 <li><b>kvm:</b> $kvm[0]<li>
                <li><b>Ant. soverom:</b> $soverom[0]<li>
                <li><b>Ant. bad:</b> $bad[0]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[0]<li>
            </div><br>

            <div id='oppgraderinfo'>
            <li>Oppgrader til: <b>$hus[1]</b></li>
            <img src='images/hus/studentbolig.png'/>
                <li><b>kvm:</b> $kvm[1]<li>
                <li><b>Ant. soverom:</b> $soverom[1]<li>
                <li><b>Ant. bad:</b> $bad[1]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[1]<li>
                <li><b>Pris: </b>";
            echo number_format($pris[1], 0, '.', ' ');
            echo ",-<li>
            </div>
        </div>";
        
    } elseif($house_type == 1){

        if (isset($_POST['oppgrader'])){
            $oppgrader = $_POST['oppgrader'];

            if($money < $pris[2]){
                echo '<div id="mislykkket">Du har ikke råd!</div>';
            } else {				
                $oppgraderhus = "UPDATE users SET house_type = ($house_type + 1) WHERE username='$username'";
                mysqli_query($con, $oppgraderhus) or die("Bad query: $oppgraderhus");
                $betal = "UPDATE users SET money = ($money - $pris[2]) WHERE username='$username'";
                mysqli_query($con, $betal) or die("Bad query: $betal");
                echo '<div id="velykket">';
                echo 'Du oppgraderte til ';
                echo $hus[2];
                echo '</div>';
            }
        }
        echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$hus[1]</b></li>
                <img src='images/hus/studentbolig.png'/>
                 <li><b>kvm:</b> $kvm[1]<li>
                <li><b>Ant. soverom:</b> $soverom[1]<li>
                <li><b>Ant. bad:</b> $bad[1]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[1]<li>
            </div><br>

            <div id='oppgraderinfo'>
            <li>Oppgrader til: <b>$hus[2]</b></li>
            <img src='images/hus/normalthus.png'/>
                <li><b>kvm:</b> $kvm[2]<li>
                <li><b>Ant. soverom:</b> $soverom[2]<li>
                <li><b>Ant. bad:</b> $bad[2]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[2]<li>
                <li><b>Pris: </b>";
            echo number_format($pris[2], 0, '.', ' ');
            echo ",-<li>
            </div>
        </div>";
    
    } elseif($house_type == 2){

        if (isset($_POST['oppgrader'])){
            $oppgrader = $_POST['oppgrader'];

            if($money < $pris[3]){
                echo '<div id="mislykkket">Du har ikke råd!</div>';
            } else {
                $oppgraderhus = "UPDATE users SET house_type = ($house_type + 1) WHERE username='$username'";
                mysqli_query($con, $oppgraderhus) or die("Bad query: $oppgraderhus");
                $betal = "UPDATE users SET money = ($money - $pris[3]) WHERE username='$username'";
                mysqli_query($con, $betal) or die("Bad query: $betal");
                echo '<div id="velykket">';
                echo 'Du oppgraderte til ';
                echo $hus[3];
                echo '</div>';
            }
        }
        
       echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$hus[2]</b></li>
                <img src='images/hus/normalthus.png'/>
                 <li><b>kvm:</b> $kvm[2]<li>
                <li><b>Ant. soverom:</b> $soverom[2]<li>
                <li><b>Ant. bad:</b> $bad[2]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[2]<li>
            </div><br>

            <div id='oppgraderinfo'>
            <li>Oppgrader til: <b>$hus[3]</b></li>
            <img src='images/hus/villa.png'/>
                <li><b>kvm:</b> $kvm[3]<li>
                <li><b>Ant. soverom:</b> $soverom[3]<li>
                <li><b>Ant. bad:</b> $bad[3]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[3]<li>
                <li><b>Pris: </b>";
            echo number_format($pris[3], 0, '.', ' ');
            echo ",-<li>
            </div>
        </div>";
        
    } elseif($house_type == 3){

        if (isset($_POST['oppgrader'])){
            $oppgrader = $_POST['oppgrader'];

            if($money < $pris[4]){
                echo '<div id="mislykkket">Du har ikke råd!</div>';
            } else {
                $oppgraderhus = "UPDATE users SET house_type = ($house_type + 1) WHERE username='$username'";
                mysqli_query($con, $oppgraderhus) or die("Bad query: $oppgraderhus");
                $betal = "UPDATE users SET money = ($money - $pris[4]) WHERE username='$username'";
                mysqli_query($con, $betal) or die("Bad query: $betal");
                echo '<div id="velykket">';
                echo 'Du oppgraderte til ';
                echo $hus[4];
                echo '</div>';
            }
        }
        
       echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$hus[3]</b></li>
                <img src='images/hus/villa.png'/>
                 <li><b>kvm:</b> $kvm[3]<li>
                <li><b>Ant. soverom:</b> $soverom[3]<li>
                <li><b>Ant. bad:</b> $bad[3]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[3]<li>
            </div><br>

            <div id='oppgraderinfo'>
            <li>Oppgrader til: <b>$hus[4]</b></li>
            <img src='images/hus/herskapsbolig.png'/>
                <li><b>kvm:</b> $kvm[4]<li>
                <li><b>Ant. soverom:</b> $soverom[4]<li>
                <li><b>Ant. bad:</b> $bad[4]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[4]<li>
                <li><b>Pris:</b> ";
            echo number_format($pris[4], 0, '.', ' ');
            echo ",-<li>
            </div>
        </div>";
        
    } elseif($house_type == 4){ 
        echo " 
        <div class='container'>
            <div id='hus'>
                <li>Du har: <b>$hus[4]</b></li>
                <img src='images/hus/herskapsbolig.png'/>
                 <li><b>kvm:</b> $kvm[4]<li>
                <li><b>Ant. soverom:</b> $soverom[4]<li>
                <li><b>Ant. bad:</b> $bad[4]<li>
                <li><b>Beskyttelse:</b> $beskyttelse[4]<li>
            </div><br>
        </div>";
    }

?>
	  <?php if($house_type == 0 || $house_type == 1 || $house_type == 2 || $house_type == 3){ ?>
        <center>
            <form id="oppgrader" method="post">
                <button name="oppgrader" id="oppgrader" class="oppgraderbtn">OPPGRADER</button>
            </form>
        </center>
        <?php } else {
        ?>
        
        <div id="velykket">Du har det beste bostedet!</div>
        
        <?php
        } 
        ?>
    
    </body>
</html>