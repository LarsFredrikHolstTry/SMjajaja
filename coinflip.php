<?php 
include('header.php'); 
include('left.php');
include('right.php');
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/coinflip.css" />
        
        <?php
include('auth.php');
require('connection/db.php');
        
if (isset($_REQUEST['moneybet'])){
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result); 

    $moneybet           =   $_POST['moneybet'];    // PENGER SOM BLIR PLASSERT AV SPILLER
    $money              =   $row['money'];         // PENGER SOM BRUKER HAR PÅ HÅNDEN
    $coinflip_chance    =   rand(1, 2);            // RANDOM SJANSE (1 eller 2)
    $maxbet             =   1000000000;            // MAX BET 1 MRD
    
    if($moneybet > $money){
        echo '<div id="mislykket">Du kan ikke spille for mer enn du har på hånden.</div>';
    } elseif($moneybet > $maxbet){
        echo '<div id="mislykket">Du kan ikke spille mer enn max bet.</div>';
    }elseif ($coinflip_chance == 2) {
        $sql = "UPDATE users SET money = ($money + $moneybet) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $sql);

        echo '<div id="velykket">';
        echo '<b>Gratulerer</b>, du vant ';
        echo number_format($moneybet, 0, '.', ' ');
        echo ',-</div>';

    } elseif($coinflip_chance == 1) {
        $sql = "UPDATE users SET money = ($money - $moneybet) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $sql);

        echo '<div id="mislykket">';
        echo '<b>Synd</b>, du tapte ';
        echo number_format($moneybet, 0, '.', ' ');
        echo ',-</div>';
    }
}
        
?>
        
    </head>
    <body style="margin: 0 auto; width: 1000px;">
        <center>
            <div id="coinflip">
                <li id="coinflipdesign1">Kast mynt</li>
                <img src="images/handlinger/coinflip.png">
                <form action="coinflip.php" method="post">
                    <li id="coinflipdesign">På kast mynt vinner du 2 ganger innsats.</li>
                    <li id="coinflipdesign">Max bet er satt til <b>1 000 000 000,-</b></li>
                    <li id="coinflipdesign4">Hvor mye vil du satse?</li>
                    <li id="coinflipdesign2"><input type="text" name="moneybet" placeholder="Beløp" required />
                    <input class="button" type="submit" name="submit" value="Spill"></li>
                </form>
            </div>
        </center>
    </body>
</html>

