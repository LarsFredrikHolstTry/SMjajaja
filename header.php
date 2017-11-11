<?php
include("auth.php");    
?>
<html>

<head>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    
    <title>Scandinavian Mafia - Kill or get killed</title>
<?php

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    $hp = $row['health'];
    $money = $row['money'];
    $kuler = $row['kuler'];
    $vapen = $row['vapen'];
    $bil = $row['bil'];
    $account_type = $row['account_type'];
		
    $sql = "SELECT username FROM users WHERE DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive ORDER BY id ASC"; //  Searches the database for every one who has being last active in the last 5 minute
    $query = mysqli_query($con, $sql) or die(mysqli_error());
    $count = mysqli_num_rows($query);
	
	if($hp == 0){
        $drep = "UPDATE users SET account_type = 0 WHERE username = '".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $drep) or die(mysqli_error());
        session_destroy();
	}
	
    //////////////////////////////////////////////////
    //      OPPDATER EIERSKAP FOR KULEFABRIKKEN     //
    //////////////////////////////////////////////////
    
    $oppdater_eierskap_kf_osl = 
	"UPDATE kulefabrikk kf INNER JOIN users ON kf.osl_eier = users.username SET osl_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_kf_osl);
    
	$oppdater_eierskap_kf_krs = 
	"UPDATE kulefabrikk kf INNER JOIN users ON kf.krs_eier = users.username SET krs_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_kf_krs);
    
	$oppdater_eierskap_kf_stc = 
	"UPDATE kulefabrikk kf INNER JOIN users ON kf.stc_eier = users.username SET stc_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_kf_stc);
    
	$oppdater_eierskap_kf_got = 
	"UPDATE kulefabrikk kf INNER JOIN users ON kf.got_eier = users.username SET got_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_kf_got);
    
	$oppdater_eierskap_kf_kob = 
	"UPDATE kulefabrikk kf INNER JOIN users ON kf.kob_eier = users.username SET kob_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_kf_kob);
    
    
    //////////////////////////////////////////////////
    //      OPPDATER EIERSKAP FOR PRIVATKLINIKK     //
    //////////////////////////////////////////////////
    
    $oppdater_eierskap_pk_osl = 
	"UPDATE privatklinikk pk INNER JOIN users ON pk.pk_osl_eier = users.username SET pk_osl_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_pk_osl);
    
	$oppdater_eierskap_pk_krs = 
	"UPDATE privatklinikk pk INNER JOIN users ON pk.pk_krs_eier = users.username SET pk_krs_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_pk_krs);
    
	$oppdater_eierskap_pk_stc = 
	"UPDATE privatklinikk pk INNER JOIN users ON pk.pk_stc_eier = users.username SET pk_stc_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_pk_stc);
    
	$oppdater_eierskap_pk_got = 
	"UPDATE privatklinikk pk INNER JOIN users ON pk.pk_got_eier = users.username SET pk_got_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_pk_got);
    
	$oppdater_eierskap_pk_kob = 
	"UPDATE privatklinikk pk INNER JOIN users ON pk.pk_kob_eier = users.username SET pk_kob_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_pk_kob);
    
    
    //////////////////////////////////////////////////
    //         OPPDATER EIERSKAP FOR FLYPLASS       //
    //////////////////////////////////////////////////
    
    $oppdater_eierskap_fp_osl = 
	"UPDATE flyplass fp INNER JOIN users ON fp.osl_eier = users.username SET osl_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_fp_osl);
    
	$oppdater_eierskap_fp_krs = 
	"UPDATE flyplass fp INNER JOIN users ON fp.krs_eier = users.username SET krs_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_fp_krs);
    
	$oppdater_eierskap_fp_stc = 
	"UPDATE flyplass fp INNER JOIN users ON fp.stc_eier = users.username SET stc_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_fp_stc);
    
	$oppdater_eierskap_fp_got = 
	"UPDATE flyplass fp INNER JOIN users ON fp.got_eier = users.username SET got_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_fp_got);
    
	$oppdater_eierskap_fp_kob = 
	"UPDATE flyplass fp INNER JOIN users ON fp.kob_eier = users.username SET kob_eier = 'STATEN' WHERE users.account_type = 0";
	mysqli_query($con, $oppdater_eierskap_fp_kob);
    
?>
</head>

    <body>

        <div id="header">
            <a href="nyheter.php"><img src="images/logo2.png"></a>
        </div>
        
        <div id="brukeronline" width="1000px" style="padding-left: 20px;">
            <a href="brukereonline.php"> Brukere pålogget: <?php echo $count ?></a>
        </div>
        
        <?php if($account_type == 3 || $account_type == 2){ ?>
        <div id="brukeronline" style="padding-left: 920px;">
        <a href='admin_area.php'>Admin area</a>
        </div>
        <?php } ?>
		
		

        <div id="infoheader">
            <a href="privatklinikk.php"><t id="red">Helse: </t><?php echo $hp ?>%</a>
            <a href="bank.php"><t id="red">Penger ute: </t><?php echo number_format($money, 0, '.', ' ') ?>,-</a>
            <a href="vapenforhandler.php"><t id="red">Våpen: </t><?php echo $vapen ?></a>
            <a href="bilforhandler.php"><t id="red">Bil: </t><?php echo $bil ?></a>
            <a href="kulefabrikk.php"><t id="red">Kuler: </t><?php echo $kuler ?> stk</a>
        </div>
    
    </body>
</html>