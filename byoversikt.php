<?php 

include('header.php');
include('left.php');
include('right.php');

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/faq.css" />
        
        <?php
        
        include("auth.php");
		
$sql = "SELECT * FROM kulefabrikk";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $kf_osl_eier = $row['osl_eier'];
    $kf_krs_eier = $row['krs_eier'];
    $kf_stc_eier = $row['stc_eier'];
    $kf_got_eier = $row['got_eier'];
    $kf_kob_eier = $row['kob_eier'];

$sql = "SELECT * FROM flyplass";
$result = mysqli_query($con, $sql) or die("Bad query: $sql"); 
$row = mysqli_fetch_assoc($result);

    $osl_eier = $row['osl_eier'];
    $krs_eier = $row['krs_eier'];
    $stc_eier = $row['stc_eier'];
    $got_eier = $row['got_eier'];
    $kob_eier = $row['kob_eier'];
        
$sql_pk = "SELECT * FROM privatklinikk";
$result_pk = mysqli_query($con, $sql_pk) or die("Bad query: $sql_pk"); 
$row_pk = mysqli_fetch_assoc($result_pk);
        
    $pk_osl_eier = $row_pk['pk_osl_eier'];
    $pk_krs_eier = $row_pk['pk_krs_eier'];
    $pk_stc_eier = $row_pk['pk_stc_eier'];
    $pk_got_eier = $row_pk['pk_got_eier'];
    $pk_kob_eier = $row_pk['pk_kob_eier'];
        ?>
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <center>
            <div id="faq">
                <li id="faqdesign2">Byoversikt</li>
                <img src="images/handlinger/byoversikt.png">
            </div>
            <div id="container">
                <table>
                    <tr>
                        <th></th>
                        <th>Oslo</th>
                        <th>Kristiansand</th>
                        <th>Stockholm</th>
                        <th>Göteborg</th>
                        <th>København</th>
                    </tr>
                    <tr>
                        <th>Flyplass</th>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$osl_eier."\" onFocus=\"if(this.blur)this.blur()\">".$osl_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$krs_eier."\" onFocus=\"if(this.blur)this.blur()\">".$krs_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$stc_eier."\" onFocus=\"if(this.blur)this.blur()\">".$stc_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$got_eier."\" onFocus=\"if(this.blur)this.blur()\">".$got_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$kob_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kob_eier."</a>" ?></td>
                    </tr>
                    <tr>
                        <th>Privatklinikk</th>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$pk_osl_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_osl_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$pk_krs_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_krs_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$pk_stc_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_stc_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$pk_got_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_got_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$pk_kob_eier."\" onFocus=\"if(this.blur)this.blur()\">".$pk_kob_eier."</a>" ?></td>
                    </tr>
                    <tr>
                        <th>Kulefabrikk</th>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$kf_osl_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kf_osl_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$kf_krs_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kf_krs_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$kf_stc_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kf_stc_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$kf_got_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kf_got_eier."</a>" ?></td>
                        <td><?php echo "<a id='brukeronline' href=\"profil.php?username=".$kf_kob_eier."\" onFocus=\"if(this.blur)this.blur()\">".$kf_kob_eier."</a>" ?></td>
                    </tr>
                </table>
            </div>
        </center>
    </body>
</html>
