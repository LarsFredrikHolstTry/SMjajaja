
<?php 

include('header.php');
include('left.php');
include('right.php');
include('auth.php');

?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/reise.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

<?php
      
include('_sortemarked.php');
include('auth.php');
require('connection/db.php');

$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);

$sql_flyplass = "SELECT * FROM flyplass";
$result_flyplass = mysqli_query($con, $sql_flyplass) or die("Bad query: $sql_flyplass");
$row_flyplass = mysqli_fetch_assoc($result_flyplass);
      
$sql_all = "SELECT * FROM users";
$result = mysqli_query($con, $sql_all) or die("Bad query: $sql_all");
$row_all = mysqli_fetch_assoc($result);

    $city = $row['city'];
    $bank_money = $row['bank_money'];

    $byarray[0] = "Oslo";
    $byarray[1] = "Stockholm";
    $byarray[2] = "København";
    $byarray[3] = "Göteborg";
    $byarray[4] = "Kristiansand";

    if ($city == $byarray[0]) {
        $fly_pris = $row_flyplass['osl_pris'];
    } elseif ($city == $byarray[1]) {
        $fly_pris = $row_flyplass['stc_pris'];
    } elseif ($city == $byarray[2]) {
        $fly_pris = $row_flyplass['kob_pris'];
    } elseif ($city == $byarray[3]) {
        $fly_pris = $row_flyplass['got_pris'];
    } elseif ($city == $byarray[4]) {
        $fly_pris = $row_flyplass['krs_pris'];
    }
      
    if($city == $byarray[0]) {
        $fly_eier = $row_flyplass['osl_eier'];
    } elseif ($city == $byarray[1]) {
        $fly_eier = $row_flyplass['stc_eier'];
    } elseif ($city == $byarray[2]) {
        $fly_eier = $row_flyplass['kob_eier'];
    } elseif ($city == $byarray[3]) {
        $fly_eier = $row_flyplass['got_eier'];
    } elseif ($city == $byarray[4]) {
        $fly_eier = $row_flyplass['krs_eier'];
    }
      
    $flyplass_time =        1800;                       // ventetid i sekunder
    $timewait =            time() + $flyplass_time;
        

$by = $row['city'];
$penger = $row['money'];
    
if (isset($_POST['oslobtn'])){
    $oslobtn = $_POST['oslobtn'];

    if($by == $byarray[0]) {
        echo '<div id="mislykket">Du er allerede i '.$byarray[0].'</div>';
    } elseif($penger >= $fly_pris) {
        echo '<div id="velykket">Velkommen til <b>'.$byarray[0].'</b>!</div>';

        $betal = "UPDATE users SET money = ($penger - $fly_pris) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");

        $by = "UPDATE users SET city = '$byarray[0]' WHERE username='$username'";
        mysqli_query($con, $by) or die("Bad query: $by");

        $betal_eier = "UPDATE users SET bank_money = ($bank_money + $fly_pris) WHERE username = '$fly_eier'";
        mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");

        $ventetid = mysqli_query($con, "UPDATE users SET flyplass1a='1', flyplass1='$timewait' WHERE username='".$_SESSION['username']."'") or die (mysqli_error($con));

    } else {
        echo '<div id="mislykket">Du har ikke nok penger for å reise til '.$byarray[0].'</div>';
    }
} 
    if (isset($_POST['stockholmbtn'])){
    $stockholmbtn = $_POST['stockholmbtn'];

    if($by == $byarray[1]) {
        echo '<div id="mislykket">Du er allerede i '.$byarray[1].'</div>';
    } elseif($penger >= $fly_pris) {
        echo '<div id="velykket">Velkommen til <b>'.$byarray[1].'</b>!</div>';

        $betal = "UPDATE users SET money = ($penger - $fly_pris) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");

        $by = "UPDATE users SET city = '$byarray[1]' WHERE username='$username'";
        mysqli_query($con, $by) or die("Bad query: $by");

        $betal_eier = "UPDATE users SET bank_money = ($bank_money + $fly_pris) WHERE username = '$fly_eier'";
        mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");

        $ventetid = mysqli_query($con, "UPDATE users SET flyplass1a='1', flyplass1='$timewait' WHERE username='".$_SESSION['username']."'") or die (mysqli_error($con));

    } else {
        echo '<div id="mislykket">Du har ikke nok penger for å reise til '.$byarray[1].'</div>';
    }
} 
    if (isset($_POST['kobenhavnbtn'])){
    $kobenhavnbtn = $_POST['kobenhavnbtn'];

    if($by == $byarray[2]) {
        echo '<div id="mislykket">Du er allerede i '.$byarray[2].'</div>';
    } elseif($penger >= $fly_pris) {
        echo '<div id="velykket">Velkommen til <b>'.$byarray[2].'</b>!</div>';

        $betal = "UPDATE users SET money = ($penger - $fly_pris) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");

        $by = "UPDATE users SET city = '$byarray[2]' WHERE username='$username'";
        mysqli_query($con, $by) or die("Bad query: $by");

        $betal_eier = "UPDATE users SET bank_money = ($bank_money + $fly_pris) WHERE username = '$fly_eier'";
        mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");

        $ventetid = mysqli_query($con, "UPDATE users SET flyplass1a='1', flyplass1='$timewait' WHERE username='".$_SESSION['username']."'") or die (mysqli_error($con));

    } else {
        echo '<div id="mislykket">Du har ikke nok penger for å reise til '.$byarray[2].'</div>';
    }
} 
    if (isset($_POST['goteborgbtn'])){
    $goteborgbtn = $_POST['goteborgbtn'];

    if($by == $byarray[3]) {
        echo '<div id="mislykket">Du er allerede i '.$byarray[3].'</div>';
    } elseif($penger >= $fly_pris) {
        echo '<div id="velykket">Velkommen til <b>'.$byarray[3].'</b>!</div>';

        $betal = "UPDATE users SET money = ($penger - $fly_pris) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");

        $by = "UPDATE users SET city = '$byarray[3]' WHERE username='$username'";
        mysqli_query($con, $by) or die("Bad query: $by");

        $betal_eier = "UPDATE users SET bank_money = ($bank_money + $fly_pris) WHERE username = '$fly_eier'";
        mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");

        $ventetid = mysqli_query($con, "UPDATE users SET flyplass1a='1', flyplass1='$timewait' WHERE username='".$_SESSION['username']."'") or die (mysqli_error($con));

    } else {
        echo '<div id="mislykket">Du har ikke nok penger for å reise til '.$byarray[3].'</div>';
    }
} 
    if (isset($_POST['kristiansandbtn'])){
    $kristiansandbtn = $_POST['kristiansandbtn'];

    if($by == $byarray[4]) {
        echo '<div id="mislykket">Du er allerede i '.$byarray[4].'</div>';
    } elseif($penger >= $fly_pris) {
        echo '<div id="velykket">Velkommen til <b>'.$byarray[4].'</b>!</div>';

        $betal = "UPDATE users SET money = ($penger - $fly_pris) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");

        $by = "UPDATE users SET city = '$byarray[4]' WHERE username='$username'";
        mysqli_query($con, $by) or die("Bad query: $by");

        $betal_eier = "UPDATE users SET bank_money = ($bank_money + $fly_pris) WHERE username = '$fly_eier'";
        mysqli_query($con, $betal_eier) or die ("Bad query: $betal_eier");

        $ventetid = mysqli_query($con, "UPDATE users SET flyplass1a='1', flyplass1='$timewait' WHERE username='".$_SESSION['username']."'") or die (mysqli_error($con));

    } else {
        echo '<div id="mislykket">Du har ikke nok penger for å reise til '.$byarray[4].'</div>';
    }
}

?>
      
  </head>

  <body style="margin: 0 auto; width: 1000px;">

      <?php 
      
    while($rows2 = mysqli_fetch_array($result)){
        $timeleft = $rows2['flyplass1'];
        $available = $rows2['flyplass1a'];
        $last = $timeleft - time();

        if ($available == 1){
            echo '<div id="mislykket">Du må vente <b><span id="countdowntimer">'.$last.'</span>s</b> før du kan fly igjen!</div>';
        } else {
?>
    <center>
    <div id="reisecontainer2">
        <li id="reisedesign2">Flyplassen i <?php echo $city; ?></li>
        
        
<?php
        
include("auth.php");

$sql = "SELECT * FROM flyplass";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $osl_eier = $row['osl_eier'];
    $osl_pris = $row['osl_pris'];

    $krs_eier = $row['krs_eier'];
    $krs_pris = $row['krs_pris'];
        
    $stc_eier = $row['stc_eier'];
    $stc_pris = $row['stc_pris'];
        
    $got_eier = $row['got_eier'];
    $got_pris = $row['got_pris'];
        
    $kob_eier = $row['kob_eier'];
    $kob_pris = $row['kob_pris'];
        
        
$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $city = $row['city'];
    $username = $row['username'];
    
    $oslo = "Oslo";
    $kristiansand = "Kristiansand";
    $stockholm = "Stockholm";
    $goteborg = "Göteborg";
    $kobenhavn = "København";
        

            if($osl_eier == $username && $city == $oslo) {
                echo '<li id="reisedesign2"><a href="flyplass_adm.php">Administrer flyplassen</a></li>';
            } elseif($krs_eier == $username && $city == $kristiansand) {
                echo '<li id="reisedesign2"><a href="flyplass_adm.php">Administrer flyplassen</a></li>';
            } elseif($stc_eier == $username && $city == $stockholm) {
                echo '<li id="reisedesign2"><a href="flyplass_adm.php">Administrer flyplassen</a></li>';
            } elseif($got_eier == $username && $city == $goteborg) {
                echo '<li id="reisedesign2"><a href="flyplass_adm.php">Administrer flyplassen</a></li>';
            } elseif($kob_eier == $username && $city == $kobenhavn) {
                echo '<li id="reisedesign2"><a href="flyplass_adm.php">Administrer flyplassen</a></li>';
            }
        
            ?>
        
        <li id="reisedesign3">Denne flyplassen er eid av: 
<?php

if($city == $oslo) {
    echo $osl_eier;
} elseif($city == $kristiansand) {
    echo $krs_eier;
} elseif($city == $stockholm) {
    echo $stc_eier;
} elseif($city == $goteborg) {
    echo $got_eier;
} elseif($city == $kobenhavn) {
    echo $kob_eier;
}

?>
            

            <div class="tooltip"><t style="color:gray;">(?)</t>
                <span class="tooltiptext">Dette betyr at <?php // Sjekker hveom som eier flyplassen i en dritstøgg if-løkke
                    if($city == $oslo) { echo $osl_eier; } elseif($city == $kristiansand) { echo $krs_eier; } elseif($city == $stockholm) { echo $stc_eier; } elseif($city == $goteborg) { echo $got_eier; } elseif($city == $kobenhavn) { echo $kob_eier; } ?> 
                    eier flyplassen og kan dermed styre prisene på de ulike reisene. For å kunne eie en flyplass så må flyplassen ligge ute for salg. Det koster 10 000 000,- for å kjøpe en flyplass.</span>
            </div>
        </li>
    </div>
        
        <?php
        if($city == $oslo){
            echo '<img src="images/flyplass/osl.png" class="reisebilde">';
        } elseif($city == $kristiansand) {
            echo '<img src="images/flyplass/krs.png" class="reisebilde">';
        } elseif($city == $stockholm) {
            echo '<img src="images/flyplass/stc.png" class="reisebilde">';
        } elseif($city == $goteborg) {
            echo '<img src="images/flyplass/got.png" class="reisebilde">';
        } elseif($city == $kobenhavn) {
            echo '<img src="images/flyplass/kob.png" class="reisebilde">';
        }
        ?>
    <div id="reisecontainer">
        <li id="reisedesign"><a style="float:left; margin-left: 10px;">BY</a><a style="float:right; margin-right: 10px;">VENTETID</a><a style="float:right; width: 255px;">PRIS</a></li>
    </div>
        
    </center>
    <form id="form1" name="form1" method="post" action=""> 
        
        <!-- OSLO -->
        <div id="countdown">
            <button name="oslobtn" class="reise">Oslo<a style="float:right; margin-right: 10px; width: 50px;">30 min</a><a style="float:right; width: 140px;">
<?php

if($city == $oslo) {
    echo number_format($osl_pris, 0, '.', ' ');
} elseif($city == $kristiansand) {
    echo number_format($krs_pris, 0, '.', ' ');
} elseif($city == $stockholm) {
    echo number_format($stc_pris, 0, '.', ' ');
} elseif($city == $goteborg) {
    echo number_format($got_pris, 0, '.', ' ');
} elseif($city == $kobenhavn) {
    echo number_format($kob_pris, 0, '.', ' ');
}

?>,-</a></button>
        </div>

        <!-- KRISTIANSAND -->
        <div id="countdown">
            <button name="kristiansandbtn" class="reise">Kristiansand<a style="float:right; margin-right: 10px; width: 50px;">30 min</a><a style="float:right; width: 140px;">
<?php

if($city == $oslo) {
    echo number_format($osl_pris, 0, '.', ' ');
} elseif($city == $kristiansand) {
    echo number_format($krs_pris, 0, '.', ' ');
} elseif($city == $stockholm) {
    echo number_format($stc_pris, 0, '.', ' ');
} elseif($city == $goteborg) {
    echo number_format($got_pris, 0, '.', ' ');
} elseif($city == $kobenhavn) {
    echo number_format($kob_pris, 0, '.', ' ');
}

?>,-</a></button>
        </div>

        <!-- STOCKHOLM -->
        <div id="countdown">
            <button name="stockholmbtn" class="reise">Stockholm<a style="float:right; margin-right: 10px; width: 50px;">30 min</a><a style="float:right; width: 140px;">
<?php

if($city == $oslo) {
    echo number_format($osl_pris, 0, '.', ' ');
} elseif($city == $kristiansand) {
    echo number_format($krs_pris, 0, '.', ' ');
} elseif($city == $stockholm) {
    echo number_format($stc_pris, 0, '.', ' ');
} elseif($city == $goteborg) {
    echo number_format($got_pris, 0, '.', ' ');
} elseif($city == $kobenhavn) {
    echo number_format($kob_pris, 0, '.', ' ');
}

?>,-</a></button>
        </div>

        <!-- GÖTEBORG -->
        <div id="countdown">
            <button name="goteborgbtn" class="reise">Göteborg<a style="float:right; margin-right: 10px; width: 50px;">30 min</a><a style="float:right; width: 140px;">
            
<?php

if($city == $oslo) {
    echo number_format($osl_pris, 0, '.', ' ');
} elseif($city == $kristiansand) {
    echo number_format($krs_pris, 0, '.', ' ');
} elseif($city == $stockholm) {
    echo number_format($stc_pris, 0, '.', ' ');
} elseif($city == $goteborg) {
    echo number_format($got_pris, 0, '.', ' ');
} elseif($city == $kobenhavn) {
    echo number_format($kob_pris, 0, '.', ' ');
}

?>,-</a></button>
        </div>

        <!-- KØBENHAVN -->
        <div id="countdown">
            <button name="kobenhavnbtn" class="reise">København<a style="float:right; margin-right: 10px; width: 50px;">30 min</a><a style="float:right; width: 140px;">
                
<?php

if($city == $oslo) {
    echo number_format($osl_pris, 0, '.', ' ');
} elseif($city == $kristiansand) {
    echo number_format($krs_pris, 0, '.', ' ');
} elseif($city == $stockholm) {
    echo number_format($stc_pris, 0, '.', ' ');
} elseif($city == $goteborg) {
    echo number_format($got_pris, 0, '.', ' ');
} elseif($city == $kobenhavn) {
    echo number_format($kob_pris, 0, '.', ' ');
}

?>,-</a></button>
        </div>
        
      </form>
<?php } } ?>
  </body>
</html>


<script type="text/javascript">
    var timeleft = <?php echo $last ?>;
    var downloadTimer = setInterval(function(){
        timeleft--;
        document.getElementById("countdowntimer").textContent = timeleft;
        if(timeleft <= 0)
            window.location.href = "flyplass.php";
    },1000);
</script>


