<?php 

include('header.php');
include('left.php');
include('right.php');
include('auth.php');
include('connection/db.php');

$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);

$sql_privatklinikk = "SELECT * FROM privatklinikk";
$result_privatklinikk = mysqli_query($con, $sql_privatklinikk) or die("Bad query: $sql_privatklinikk");
$row_privatklinikk = mysqli_fetch_assoc($result_privatklinikk);

$sql_all = "SELECT * FROM users";
$result_all = mysqli_query($con, $sql_all) or die("Bad query: $sql_all");
$row_all = mysqli_fetch_assoc($result_all);

    $city = $row['city'];
    $bank_money = $row['bank_money'];

    $byarray[0] = "Oslo";
    $byarray[1] = "Stockholm";
    $byarray[2] = "København";
    $byarray[3] = "Göteborg";
    $byarray[4] = "Kristiansand";

    $pk_osl_eier = $row_privatklinikk['pk_osl_eier'];
    $pk_osl_pris = $row_privatklinikk['pk_osl_pris'];

    $pk_krs_eier = $row_privatklinikk['pk_krs_eier'];
    $pk_krs_pris = $row_privatklinikk['pk_krs_pris'];
        
    $pk_stc_eier = $row_privatklinikk['pk_stc_eier'];
    $pk_stc_pris = $row_privatklinikk['pk_stc_pris'];
        
    $pk_got_eier = $row_privatklinikk['pk_got_eier'];
    $pk_got_pris = $row_privatklinikk['pk_got_pris'];
        
    $pk_kob_eier = $row_privatklinikk['pk_kob_eier'];
    $pk_kob_pris = $row_privatklinikk['pk_kob_pris'];

    if ($city == $byarray[0]) {
        $pk_pris = $row_privatklinikk['pk_osl_pris'];
    } elseif ($city == $byarray[1]) {
        $pk_pris = $row_privatklinikk['pk_stc_pris'];
    } elseif ($city == $byarray[2]) {
        $pk_pris = $row_privatklinikk['pk_kob_pris'];
    } elseif ($city == $byarray[3]) {
        $pk_pris = $row_privatklinikk['pk_got_pris'];
    } elseif ($city == $byarray[4]) {
        $pk_pris = $row_privatklinikk['pk_krs_pris'];
    }
      
    if($city == $byarray[0]) {
        $pk_eier = $row_privatklinikk['pk_osl_eier'];
    } elseif ($city == $byarray[1]) {
        $pk_eier = $row_privatklinikk['pk_stc_eier'];
    } elseif ($city == $byarray[2]) {
        $pk_eier = $row_privatklinikk['pk_kob_eier'];
    } elseif ($city == $byarray[3]) {
        $pk_eier = $row_privatklinikk['pk_got_eier'];
    } elseif ($city == $byarray[4]) {
        $pk_eier = $row_privatklinikk['pk_krs_eier'];
    }

    $by = $row['city'];

if(isset($_POST['pk_osl_submit'])){

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $helse        = $row['health'];                         // Brukers helse
    $max_helse    = 100;                                    // Max helse (100%)
    $pris         = $pk_pris;                               // pris pr % Oslo
    $fix_helse    = ($max_helse - $helse);                  // Hvor mange prosent som mangler til 100
    $money        = $row['money'];                          // Penger på brukerens hånd
    $cooldown     = 10;                                     // JOBBES MED SENERE
    $pris_helse   = ($fix_helse * $pris);                   // Pris operasjon 
    
    if($money < $pris_helse) {
        echo '<div id="mislykket">Du har ikke råd!</div>';
    } elseif($helse == $max_helse) {
        echo '<div id="mislykket">Du har allerede full helse!</div>';
    } else {
        $fix = "UPDATE users SET health = ($helse + $fix_helse) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $fix);
        $payment = "UPDATE users SET money = ($money - ($pris * $fix_helse)) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $payment);
        echo '<div id="velykket">Du ble innlagt på sykehuset, de sydde deg opp og du har nå 100% helse. Det kostet deg ';
        echo number_format($pris_helse, 0, '.', ' ');
        echo ',-</div>';
    }
}

if(isset($_POST['pk_krs_submit'])){

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $helse        = $row['health'];                         // Brukers helse
    $max_helse    = 100;                                    // Max helse (100%)
    $pris         = $pk_pris;                               // pris pr % Kristiansand
    $fix_helse    = ($max_helse - $helse);                  // Hvor mange prosent som mangler til 100
    $money        = $row['money'];                          // Penger på brukerens hånd
    $cooldown     = 10;                                     // JOBBES MED SENERE
    $pris_helse   = ($fix_helse * $pris);                   // Pris operasjon 
    
    if($money < $pris_helse) {
        echo '<div id="mislykket">Du har ikke råd!</div>';
    } elseif($helse == $max_helse) {
        echo '<div id="mislykket">Du har allerede full helse!</div>';
    } else {
        $fix = "UPDATE users SET health = ($helse + $fix_helse) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $fix);
        $payment = "UPDATE users SET money = ($money - ($pris * $fix_helse)) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $payment);
        echo '<div id="velykket">Du ble innlagt på sykehuset, de sydde deg opp og du har nå 100% helse. Det kostet deg ';
        echo number_format($pris_helse, 0, '.', ' ');
        echo ',-</div>';
    }
}

if(isset($_POST['pk_stc_submit'])){

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $helse        = $row['health'];                         // Brukers helse
    $max_helse    = 100;                                    // Max helse (100%)
    $pris         = $pk_pris;                               // pris pr % Stockholm
    $fix_helse    = ($max_helse - $helse);                  // Hvor mange prosent som mangler til 100
    $money        = $row['money'];                          // Penger på brukerens hånd
    $cooldown     = 10;                                     // JOBBES MED SENERE
    $pris_helse   = ($fix_helse * $pris);                   // Pris operasjon 
    
    if($money < $pris_helse) {
        echo '<div id="mislykket">Du har ikke råd!</div>';
    } elseif($helse == $max_helse) {
        echo '<div id="mislykket">Du har allerede full helse!</div>';
    } else {
        $fix = "UPDATE users SET health = ($helse + $fix_helse) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $fix);
        $payment = "UPDATE users SET money = ($money - ($pris * $fix_helse)) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $payment);
        echo '<div id="velykket">Du ble innlagt på sykehuset, de sydde deg opp og du har nå 100% helse. Det kostet deg ';
        echo number_format($pris_helse, 0, '.', ' ');
        echo ',-</div>';
    }
}

if(isset($_POST['pk_got_submit'])){

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $helse        = $row['health'];                         // Brukers helse
    $max_helse    = 100;                                    // Max helse (100%)
    $pris         = $pk_pris;                               // pris pr % Göteborg
    $fix_helse    = ($max_helse - $helse);                  // Hvor mange prosent som mangler til 100
    $money        = $row['money'];                          // Penger på brukerens hånd
    $cooldown     = 10;                                     // JOBBES MED SENERE
    $pris_helse   = ($fix_helse * $pris);                   // Pris operasjon 
    
    if($money < $pris_helse) {
        echo '<div id="mislykket">Du har ikke råd!</div>';
    } elseif($helse == $max_helse) {
        echo '<div id="mislykket">Du har allerede full helse!</div>';
    } else {
        $fix = "UPDATE users SET health = ($helse + $fix_helse) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $fix);
        $payment = "UPDATE users SET money = ($money - ($pris * $fix_helse)) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $payment);
        echo '<div id="velykket">Du ble innlagt på sykehuset, de sydde deg opp og du har nå 100% helse. Det kostet deg ';
        echo number_format($pris_helse, 0, '.', ' ');
        echo ',-</div>';
    }
}

if(isset($_POST['pk_kob_submit'])){

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $helse        = $row['health'];                         // Brukers helse
    $max_helse    = 100;                                    // Max helse (100%)
    $pris         = $pk_pris;                               // pris pr % København
    $fix_helse    = ($max_helse - $helse);                  // Hvor mange prosent som mangler til 100
    $money        = $row['money'];                          // Penger på brukerens hånd
    $cooldown     = 10;                                     // JOBBES MED SENERE
    $pris_helse   = ($fix_helse * $pris);                   // Pris operasjon 
    
    if($money < $pris_helse) {
        echo '<div id="mislykket">Du har ikke råd!</div>';
    } elseif($helse == $max_helse) {
        echo '<div id="mislykket">Du har allerede full helse!</div>';
    } else {
        $fix = "UPDATE users SET health = ($helse + $fix_helse) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $fix);
        $payment = "UPDATE users SET money = ($money - ($pris * $fix_helse)) WHERE username='".$_SESSION['username']."'";
        mysqli_query($con, $payment);
        echo '<div id="velykket">Du ble innlagt på sykehuset, de sydde deg opp og du har nå 100% helse. Det kostet deg ';
        echo number_format($pris_helse, 0, '.', ' ');
        echo ',-</div>';
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/privatklinikk.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

    </head>

    <body style="margin: 0 auto; width: 1000px;">
<center>
    <p class="notat">
        Dette mangler:
        <br/><br/>
        1. Ventetid<br/>
    </p>
</center>
        <center>
            <div id="pk">
                <form id="form1" name="form1" action="" method="post">
                    <li id="pkdesign1">Privatklinikken i <?php echo $city; ?></li>
                    
                    <?php

        
        
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
        


            if($pk_osl_eier == $username && $city == $oslo) {
                echo '<li id="pkdesign1"><a href="privatklinikk_adm.php">Administrer privatklinikken</a></li>';
            } elseif($pk_krs_eier == $username && $city == $kristiansand) {
                echo '<li id="pkdesign1"><a href="privatklinikk_adm.php">Administrer privatklinikken</a></li>';
            } elseif($pk_stc_eier == $username && $city == $stockholm) {
                echo '<li id="pkdesign1"><a href="privatklinikk_adm.php">Administrer privatklinikken</a></li>';
            } elseif($pk_got_eier == $username && $city == $goteborg) {
                echo '<li id="pkdesign1"><a href="privatklinikk_adm.php">Administrer privatklinikken</a></li>';
            } elseif($pk_kob_eier == $username && $city == $kobenhavn) {
                echo '<li id="pkdesign1"><a href="privatklinikk_adm.php">Administrer privatklinikken</a></li>';
            }
        
            ?>
        
        <li id="pkdesign1">Denne klinikken eies av

<?php
            
if($city == $oslo) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_osl_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_osl_eier."</a>";
} elseif($city == $kristiansand) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_krs_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_krs_eier."</a>";;
} elseif($city == $stockholm) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_stc_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_stc_eier."</a>";;
} elseif($city == $goteborg) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_got_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_got_eier."</a>";;
} elseif($city == $kobenhavn) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_kob_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_kob_eier."</a>";
}
?>

                        <div class="tooltip"><t style="color:gray;">(?)</t>
                            <span class="tooltiptext">Dette betyr at 

<?php
if($city == $oslo) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_osl_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_osl_eier."</a>";
} elseif($city == $kristiansand) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_krs_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_krs_eier."</a>";
} elseif($city == $stockholm) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_stc_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_stc_eier."</a>";
} elseif($city == $goteborg) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_got_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_got_eier."</a>";
} elseif($city == $kobenhavn) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$pk_kob_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_kob_eier."</a>";
}
?> 

                                eier privatklinikken og kan dermed styre prisene på prisen pr %. For å kunne eie en privatklinikk så må privatklinikken ligge ute for salg. En privatklinikk koster 50 000 000,-</span>
                        </div>
                    </li>
                    <img src="images/handlinger/privatklinikk.png">
                    <li id="pkdesign3">På privatklinikken kan du legge deg inn for å få mer helse. <br>For et billigere alternativ kan du bruke <a href="sykehus.php">kommunalt sykehus</a>, <br>men der vil ventetiden være lengre enn på privatklinikken.</li>
                    <li id="pkdesign">Pris pr % = 
                        
 <?php
if($city == $oslo) {
    echo number_format($pk_osl_pris, 0, '.', ' ');
} elseif($city == $kristiansand) {
    echo number_format($pk_krs_pris, 0, '.', ' ');
} elseif($city == $stockholm) {
    echo number_format($pk_stc_pris, 0, '.', ' ');
} elseif($city == $goteborg) {
    echo number_format($pk_got_pris, 0, '.', ' ');
} elseif($city == $kobenhavn) {
    echo number_format($pk_kob_pris, 0, '.', ' ');
}            
?>                   

                    </li>
                    <li id="pkdesign">Ventetid pr % = <b>10 sekunder</b></li>
                    <li id="pkdesignbtn">
            <?php
            if($city == $oslo) {
            ?>
                <button class="button" name="pk_osl_submit">Fiks meg til 100%</button>
            <?php
            } elseif($city == $kristiansand) {
            ?>
                <button class="button" name="pk_krs_submit">Fiks meg til 100%</button>
            <?php
            } elseif($city == $stockholm) {
            ?>
                <button class="button" name="pk_stc_submit">Fiks meg til 100%</button>
            <?php
            } elseif($city == $goteborg) {
            ?>
                <button class="button" name="pk_got_submit">Fiks meg til 100%</button>
            <?php
            } elseif($city == $kobenhavn) {
            ?>
                <button class="button" name="pk_kob_submit">Fiks meg til 100%</button>
            <?php
            }
            ?>
                    </li>
                </form>
            </div>
        </center>
    </body>
</html>
