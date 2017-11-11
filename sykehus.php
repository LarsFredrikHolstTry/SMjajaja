<?php 

include('header.php');
include('left.php');
include('right.php');

?>

<?php

include('auth.php');
require('connection/db.php');

if (isset($_POST['submit'])) {

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $helse        = $row['health'];          // Brukers helse
    $max_helse    = 100;                     // Max helse (100%)
    $pris         = 15000;                   // Pris pr % (55,000,-)
    $fix_helse    = ($max_helse - $helse);   // Hvor mange prosent som mangler til 100
    $money        = $row['money'];           // Penger på brukerens hånd
    $pris_helse   = ($fix_helse * $pris);
    
    if($helse == $max_helse) {
        echo '<div id="mislykket">Du har allerede full helse!</div>';
    } else {
        $fix = "UPDATE users SET health = ($helse + $fix_helse) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $fix);
        $payment = "UPDATE users SET money = ($money - ($pris * $fix_helse)) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $payment);
        echo '<div id="velykket">Du ble innlagt på sykehuset, de sydde deg opp og du har nå 100% helse. Det kostet deg '.$pris_helse.',-</div>';
    }
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/privatklinikk.css" />
        <link rel="stylesheet" type="text/css" href="css/notat.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">
<center>
    <p class="notat">
        Dette mangler:
        <br/><br/>
        1. Ventetid
    </p>
</center>
        <center>
            <div id="pk">
                <form action="sykehus.php" method="post">
                    <li id="pkdesign1">Kommunalt sykehus</li>
                    <li id="pkdesign1">Denne klinikken eies av <b>Staten</b>  
                        <div class="tooltip"><t style="color:gray;">(?)</t>
                            <span class="tooltiptext">Dette betyr at staten eier sykehuset og kan dermed styre prisen pr %. Et kommunalt sykehus er eid av staten og kan dermed ikke eies av privatpersoner. Pris pr % ligger på vil være 15 000,-</span>
                        </div>
                    </li>
                    <img src="images/handlinger/sykehus.png">
                    <li id="pkdesign3">På sykehuset kan du legge deg inn for å få mer helse. <br>For et raskere alternativ kan du bruke <a href="privatklinikk.php">privatklinikk</a>, <br>men der vil prisen være stivere enn på kommunalt sykehus.</li>
                    <li id="pkdesign">Pris pr % = <b>15 000,-</b></li>
                    <li id="pkdesign">Ventetid pr % = <b>30 sekunder</b></li>
                    <li id="pkdesignbtn"><input class="button" type="submit" name="submit" value="Fiks meg til 100%"></li>
                </form>
            </div>
        </center>

    </body>
</html>
