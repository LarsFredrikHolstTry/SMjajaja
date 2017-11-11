<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/coinflip.css" />
        
        <?php

        include('_sortemarked.php');
        include('auth.php');
        require('connection/db.php');
        
            if (isset($_REQUEST['moneybet'])){
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result); 

    $moneybet           =   $_POST['moneybet'];    // PENGER SOM BLIR PLASSERT AV SPILLER
    $money              =   $row['money'];         // PENGER SOM BRUKER HAR PÅ HÅNDEN
    $coinflip_chance    =   rand(1, 5);            // RANDOM SJANSE (1 til 5)
    $maxbet             =   1000000000;            // MAX BET 1 000 000 000 (1 mrd)
    $minbet             =   10000;                 // MIN BET 10 000 (10k)
    $win_money          =   ($moneybet * 5);       // PENGER PLASSERT * 5 = PREMIE

    // Hvis man better mer enn man har på hånda.
    if($moneybet > $money) {
        echo '<div id="mislykket">Du kan ikke spille for mer enn du har på hånden.</div>';
    // Hvis man better mer enn max bet på 1 000 000 000,-.
    } elseif($moneybet > $maxbet) {
        echo '<div id="mislykket">Du kan ikke spille for mer enn max bet.</div>';
    // Hvis man better for mindre enn minimum bet på 10 000,-.
    } elseif($moneybet < $minbet) {
        echo '<div id="mislykket">Du kan ikke spille for mindre enn min bet.</div>';
    }elseif ($coinflip_chance == 2) {
        $sql = "UPDATE users SET money = ($money + $win_money) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $sql);

        echo '<div id="velykket">';
        echo '<b>Gratulerer</b>, din hest vant og du vant ';
        echo number_format($win_money, 0, '.', ' ');
        echo ',-</div>';

    } elseif($coinflip_chance == 1 || $coinflip_chance == 3 || $coinflip_chance == 4 || $coinflip_chance == 5) {
        $sql = "UPDATE users SET money = ($money - $moneybet) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $sql);

        echo '<div id="mislykket">';
        echo 'Din hest tapte og du tapte ';
        echo number_format($moneybet, 0, '.', ' ');
        echo ',-</div>';
    }
}
?>

    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <center>
            <div id="coinflip">
        <?php if($eiendel3 == 0 || $eiendel4 == 0) {
            echo '<div id="mislykket"><p>Du må ha dressjakke og dressbukse for å komme inn på travbanen!<br><br> Du kan kjøpe full dress på <a href="sortemarked.php">det sorte markedet</a></p></div>';
        } else { ?>
                <li id="coinflipdesign1">Hesteveddeløp</li>
                <img src="images/handlinger/hesteveddelop.png">
                <form action="hestelop.php" method="post">
                    <li id="coinflipdesign">På hesteveddeløp vinner du 5 ganger innsats.</li>
                    <li id="coinflipdesign">Min bet er satt til <b>10 000,-</b></li>
                    <li id="coinflipdesign">Max bet er satt til <b>1 000 000 000,-</b></li>
                    <li id="coinflipdesign4">Hvilken hest vil du satse på?</li>
                    <li id="coinflipdesign3">
                        <input type="radio" id="r1" name="rr" required />
                        <label for="r1" style="color:white;"><span></span>Juliana Bore (6 år)</label><br>
                        <input type="radio" id="r2" name="rr" />
                        <label for="r2" style="color:white;"><span></span>Prince of Laddie (7 år)</label><br>
                        <input type="radio" id="r3" name="rr" />
                        <label for="r3" style="color:white;"><span></span>Juliana Bore (6 år)</label><br>
                        <input type="radio" id="r4" name="rr" />
                        <label for="r4" style="color:white;"><span></span>Prince of Laddie (7 år)</label><br>
                        <input type="radio" id="r5" name="rr" />
                        <label for="r5" style="color:white;"><span></span>Julius Cord (9 år)</label><br>
                    </li>
                    <li id="coinflipdesign4">Hvor mye vil du satse?</li>
                    <li id="coinflipdesign2"><input type="text" name="moneybet" placeholder="Beløp" required />
                    <input class="button" type="submit" name="submit" value="Spill"></li>
                </form>  
            </div>
        </center>
        
        <?php } ?>
        
    </body>
</html>

