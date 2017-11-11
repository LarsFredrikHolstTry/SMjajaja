<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <?php

include("auth.php");
require('connection/db.php');
        
include("auth.php");
        
$sql1 = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result1 = mysqli_query($con, $sql1) or die("Bad query: $sql1"); 
$row1 = mysqli_fetch_assoc($result1);
        
    $city = $row1['city'];
        
    $oslo           = "Oslo";
    $kristiansand   = "Kristiansand";
    $stockholm      = "Stockholm";
    $goteborg       = "Göteborg";
    $kobenhavn      = "København";

$sql = "SELECT * FROM kulefabrikk";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $osl_eier       = $row['osl_eier'];
    $osl_pris       = $row['osl_pris'];
    $osl_ant_kuler  = $row['osl_ant_kuler'];
    $osl_lvl        = $row['osl_lvl'];

    $krs_eier       = $row['krs_eier'];
    $krs_pris       = $row['krs_pris'];
    $krs_ant_kuler  = $row['krs_ant_kuler'];

    $stc_eier       = $row['stc_eier'];
    $stc_pris       = $row['stc_pris'];
    $stc_ant_kuler  = $row['stc_ant_kuler'];
        
    $got_eier       = $row['got_eier'];
    $got_pris       = $row['got_pris'];
    $got_ant_kuler  = $row['got_ant_kuler'];
        
    $kob_eier       = $row['kob_eier'];
    $kob_pris       = $row['kob_pris'];
    $kob_ant_kuler  = $row['kob_ant_kuler'];
        
        if($city == $oslo){
            $ant_kuler_lager = $osl_ant_kuler;
        } elseif($city == $kristiansand) {
            $ant_kuler_lager = $krs_ant_kuler;
        } elseif($city == $stockholm) {
            $ant_kuler_lager = $stc_ant_kuler;
        } elseif($city == $goteborg) {
            $ant_kuler_lager = $got_ant_kuler;
        } elseif($city == $kobenhavn) {
            $ant_kuler_lager = $kob_ant_kuler;
        }

if (isset($_REQUEST['antallkuler'])){
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $antallkuler = $_POST['antallkuler'];
    $penger = $row['money'];
    $bank_penger = $row['bank_money'];
    $kuler = $row['kuler'];
    
if($city == $oslo) {
    $kf_eier = $osl_eier;
} elseif($city == $kristiansand) {
    $kf_eier = $krs_eier;
} elseif($city == $stockholm) {
    $kf_eier = $stc_eier;
} elseif($city == $goteborg) {
    $kf_eier = $got_eier;
} elseif($city == $kobenhavn) {
    $kf_eier = $kob_eier;
}
    
if($city == $oslo) {
    $ant_kuler = 'osl_ant_kuler';
} elseif($city == $kristiansand) {
    $ant_kuler = 'krs_ant_kuler';
} elseif($city == $stockholm) {
    $ant_kuler = 'stc_ant_kuler';
} elseif($city == $goteborg) {
    $ant_kuler = 'got_ant_kuler';
} elseif($city == $kobenhavn) {
    $ant_kuler = 'kob_ant_kuler';
}
    
if($city == $oslo) {
    $kf_eier_by = "osl_eier";
} elseif($city == $kristiansand) {
    $kf_eier_by = "krs_eier";
} elseif($city == $stockholm) {
    $kf_eier_by = "stc_eier";
} elseif($city == $goteborg) {
    $kf_eier_by = "got_eier";
} elseif($city == $kobenhavn) {
    $kf_eier_by = "kob_eier";
}
    
    $sql1 = "SELECT * FROM users WHERE username = '".$kf_eier."'";
    $result = mysqli_query($con, $sql1) or die("Bad query: $sql1");
    $row1 = mysqli_fetch_assoc($result1);
    
    if($city == $oslo) {
        $prisprkule = $osl_pris;
    } elseif($city == $kristiansand) {
        $prisprkule = $krs_pris;
    } elseif($city == $stockholm) {
        $prisprkule = $stc_pris;
    } elseif($city == $goteborg) {
        $prisprkule = $got_pris;
    } elseif($city == $kobenhavn) {
        $prisprkule = $kob_pris;
    }
    
    $tot_pris = ($antallkuler * $prisprkule);

    if ($antallkuler > $ant_kuler_lager){
        // ikke nok kuler på lager
        echo "<div id='mislykket'>Du kan ikke kjøpe flere kuler enn kulefabrikken har på lager.</div>";
    } elseif (($antallkuler * $prisprkule) > $penger) {
        // ikke nok penger
        echo "<div id='mislykket'>Du har ikke nok penger til å kjøpe $antallkuler kuler</div>";
    } else {
        // kjøp kuler
        $sql = "UPDATE users SET kuler = ($antallkuler + $kuler) WHERE username = '".$_SESSION['username']."'";
        mysqli_query($con, $sql) or die ("Bad query: $sql");
        
        // bruk penger på kuler
        $sql1 = "UPDATE users SET money = ($penger - ($antallkuler * $prisprkule)) WHERE username = '".$_SESSION['username']."'";
        mysqli_query($con, $sql1) or die ("Bad query: $sql1");
        
        // betal eier
        $sql2 = "UPDATE users SET bank_money = ($bank_penger + $tot_pris) WHERE username = '".$kf_eier."'";
        mysqli_query($con, $sql2) or die ("Bad query: $sql2");
        
        // ta fra antall på lager
        $sql3 = "UPDATE kulefabrikk SET $ant_kuler = ($ant_kuler_lager - $antallkuler) WHERE $kf_eier_by = '".$kf_eier."'";
        mysqli_query($con, $sql3) or die ("Bad query: $sql3");

        if ($antallkuler > 1) {
            echo "<div id='velykket'>Du kjøpte " . $antallkuler . " kuler! Det kostet ";
            echo number_format($tot_pris, 0, '.', ' ');
            echo ",-</div>";
        } else {
            echo "<div id='velykket'>Du kjøpte " . $antallkuler . " kule! Det kostet ";
            echo number_format($tot_pris, 0, '.', ' ');
            echo ",-</div>";
        }
    }
}
?>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">

        
        <center>
            <div id="sm-cntr">
                <li id="sm-tp-hdr">Kulefabrikken i <?php echo $city; ?></li>
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
                
            if($osl_eier == $username && $city == $oslo) {
                echo '<li id="sm-box20"><a href="kulefabrikk_adm.php">Administrer kulefabrikken</a></li>';
            } elseif($krs_eier == $username && $city == $kristiansand) {
                echo '<li id="sm-box20"><a href="kulefabrikk_adm.php">Administrer kulefabrikken</a></li>';
            } elseif($stc_eier == $username && $city == $stockholm) {
                echo '<li id="sm-box20"><a href="kulefabrikk_adm.php">Administrer kulefabrikken</a></li>';
            } elseif($got_eier == $username && $city == $goteborg) {
                echo '<li id="sm-box20"><a href="kulefabrikk_adm.php">Administrer kulefabrikken</a></li>';
            } elseif($kob_eier == $username && $city == $kobenhavn) {
                echo '<li id="sm-box20"><a href="kulefabrikk_adm.php">Administrer kulefabrikken</a></li>';
            }
        
				
				
            ?>
                
                <li id="sm-box20">Denne kulefabrikken er eid av: 
                
                <?php

if($city == $oslo) {
    echo "<a href=\"profil.php?username=".$osl_eier."\" onFocus=\"if(this.blur)this.blur()\">".$osl_eier."</a>";
} elseif($city == $kristiansand) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$krs_eier."\" onFocus=\"if(this.blur)this.blur()\">".$krs_eier."</a>";
} elseif($city == $stockholm) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$stc_eier."\" onFocus=\"if(this.blur)this.blur()\">".$stc_eier."</a>";
} elseif($city == $goteborg) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$got_eier."\" onFocus=\"if(this.blur)this.blur()\">".$got_eier."</a>";
} elseif($city == $kobenhavn) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$kob_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kob_eier."</a>";
}

?>
                
                <div class="tooltip"><t style="color:gray;">(?)</t>
                    
                        <span class="tooltiptext">Denne kulefabrikken er eid av:
				
<?php

if($city == $oslo) {
    echo "<a href=\"profil.php?username=".$osl_eier."\" onFocus=\"if(this.blur)this.blur()\">".$osl_eier."</a>";
} elseif($city == $kristiansand) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$krs_eier."\" onFocus=\"if(this.blur)this.blur()\">".$krs_eier."</a>";
} elseif($city == $stockholm) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$stc_eier."\" onFocus=\"if(this.blur)this.blur()\">".$stc_eier."</a>";
} elseif($city == $goteborg) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$got_eier."\" onFocus=\"if(this.blur)this.blur()\">".$got_eier."</a>";
} elseif($city == $kobenhavn) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$kob_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kob_eier."</a>";
}

?>
. Dette betyr at 

<?php

if($city == $oslo) {
    echo "<a href=\"profil.php?username=".$osl_eier."\" onFocus=\"if(this.blur)this.blur()\">".$osl_eier."</a>";
} elseif($city == $kristiansand) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$krs_eier."\" onFocus=\"if(this.blur)this.blur()\">".$krs_eier."</a>";
} elseif($city == $stockholm) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$stc_eier."\" onFocus=\"if(this.blur)this.blur()\">".$stc_eier."</a>";
} elseif($city == $goteborg) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$got_eier."\" onFocus=\"if(this.blur)this.blur()\">".$got_eier."</a>";
} elseif($city == $kobenhavn) {
    echo "<a id='brukeronline' href=\"profil.php?username=".$kob_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kob_eier."</a>";
}

?>

    eier kulefabrikken og kan dermed styre prisene på prisen pr kule. For å kunne eie en kulefabrikken så må kulefabrikken ligge ute for salg. En kulefabrikk koster 50 000 000,-</span>
</div>          
                </li>
				
		<?php
			$sql = "SELECT * FROM kulefabrikk";
					$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
					$row = mysqli_fetch_assoc($result);

   
    $osl_ant_kuler  = $row['osl_ant_kuler'];
    $krs_ant_kuler  = $row['krs_ant_kuler'];
    $stc_ant_kuler  = $row['stc_ant_kuler'];
    $got_ant_kuler  = $row['got_ant_kuler'];
    $kob_ant_kuler  = $row['kob_ant_kuler'];
					
					if($city == $oslo){
						$antall_kuler = $osl_ant_kuler;
					} elseif($city == $kristiansand){
						$antall_kuler = $krs_ant_kuler;
					} elseif($city == $stockholm){
						$antall_kuler = $stc_ant_kuler;
					} elseif($city == $goteborg){
						$antall_kuler = $got_ant_kuler;
					} elseif($city == $kobenhavn){
						$antall_kuler = $kob_ant_kuler;
					}
		?>
				
					
             <img src="images/handlinger/kulefabrikk.png">
             <form action="kulefabrikk.php" method="post">
             <li id="sm-tp-hdr"><a style="color: white">Antall kuler på lager: <?php echo $antall_kuler ?></a></li>
             <li id="sm-box20">Pris pr. kule 
                        
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
                        
?>,-
                    </li>
                    <li id="sm-box38"><input type="text" name="antallkuler" placeholder="" required />
                    <input class="button" type="submit" name="submit" value="Kjøp"></li>
                </form>
            </div>
        </center>
    </body>
</html>


