<?php 

include('functions/bbcodes.php');
include('header.php');
include('left.php');
include('right.php');
include('functions/pengerank.php');
include('functions/account_type.php'); 
include('auth.php');
include('connection/db.php'); 
include('functions/rank.php');

?>

<html>
    <head>
    <?php
      
    $sql = "SELECT * FROM users WHERE username='". mysqli_real_escape_string($con, $_GET['username'])."'";
    $query = mysqli_query($con, $sql) or die (mysqli_error());
    $row = mysqli_fetch_assoc($query);

    $profile_username = $row['username'];
    $profile_rank = $row['rank'];
    $profile_account_type = $row['account_type'];
    $profile_drap = $row['ant_drap'];
    $total_ute_money = $row['money'];
    $total_bank_money = $row['bank_money'];
    $total_money = ($total_ute_money + $total_bank_money);
    $profile_img = $row['img'];
    $profile_banner = $row['banner_img'];
    $profilinfo = $row['profilinfo'];
    $last_active = $row['lastactive'];
    // $last_active = $row['lastactive'];

    if($profile_account_type == 3) {
      $rank_type = "<span style='color:#1BFF0A;'>Administrator</span>";
    } elseif($profile_account_type == 2) {
      $rank_type = "<t style='float: left; color: #2e3eda;'>Moderator</t>";
    } elseif($profile_account_type == 1) {
      $rank_type = "<t style='float: left;'>Bruker</t>";
    } elseif($profile_account_type == 0) {
      $rank_type = "<t style='float: left; color: red;'>Død</t>";
    } elseif($profile_account_type == 4) {
      $rank_type = "<t style='float: left; color: black;'>SUPPORT</t>";
    } elseif($profile_account_type == 5) {
      $rank_type = "<t style='float: left; color: black;'></t>";
    }

    if($total_money > -1 && $total_money < 2000){
        $profile_money_rank = "NAVer";
    }
    elseif($total_money > 2001 && $total_money < 150000){
        $profile_money_rank = "Arbeider";
    }
    elseif($total_money > 150001 && $total_money < 500000){
        $profile_money_rank = "Langer";
    }
    elseif($total_money > 500001 && $total_money < 1000000){
        $profile_money_rank = "Litt rik";
    }
    elseif($total_money > 1000001 && $total_money < 10000000){
        $profile_money_rank = "Gambler";
    }
    elseif($total_money > 10000001 && $total_money < 100000000){
    $profile_money_rank = "Multimillionær";
    }
    elseif($total_money > 100000001 && $total_money < 250000000){
    $profile_money_rank = "Aksjemegler";
    }
    elseif($total_money > 250000001 && $total_money < INF){
    $profile_money_rank = "Oljesjeik";
    }

    ?>
        
        <link rel="stylesheet" type="text/css" href="css/profil.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    
    <body style="margin: 0 auto; width: 1000px;">

        <center>
                <?php 
                if($account_type == 3 || $account_type == 2){
                    echo "<a id='admin_endre_bruker' href=\"admin_area_rediger_bruker.php?username=". $profile_username ."\" onFocus=\"if(this.blur)this.blur()\">[ R E D I G E R  B R U K E R ]</a>";
                }
                ?>
        <div class="box">
            <div class="body">
                <table class="NON_table" style="float: left; width: 250px;">
                    <tbody>
                        <td align="center">
                            <?php echo '<img src="'.$profile_img.'" style="width: 100%; max-width=250;">'; ?>
                        </td>
                    </tbody>
                </table>
                <table class="NON_table" style=" margin-top: 20px; float: right; width: 340px;">
                    <tbody>
                        <tr class="tcolor_2">
                            <td class="td_right"><t style="color: grey;">Brukernavn:</t></td>
                            <td class="td_left" ><?php echo $profile_username ?>
                           <?php    
                                
$sql = "SELECT id,lastactive FROM users WHERE username='". mysqli_real_escape_string($con, $_GET['username'])."' and DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive ";
$query = mysqli_query($con, $sql)  or die(mysqli_error());
$row = mysqli_fetch_object($query);
$online_id = htmlspecialchars($row->id);

if(!empty($online_id)){
    echo "<t style='color: #008800;'>(Pålogget)</t>";
}
                                
$sql = "SELECT id,lastactive FROM users WHERE username='". mysqli_real_escape_string($con, $_GET['username'])."' and DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive ";
$query = mysqli_query($con, $sql)  or die(mysqli_error());
$row = mysqli_fetch_object($query);
$online_id = htmlspecialchars($row->id);

if(empty($online_id)){
    echo "<t style='color: darkred;'>(Avlogget)</t>";
}
                                
                            ?></td>
                        </tr>
                        <tr class="tcolor_2">
                            <td class="td_right"><t style="color: grey;">Status:</t></td>
                            <td class="td_left" ><?php echo $rank_type ?></td>
                        </tr>
                        <tr class="tcolor_2">
                            <td class="td_right"><t style="color: grey;">Rank:</t></td>
                            <td class="td_left" ><?php echo $rank_array[$profile_rank] ?></td>
                        </tr>
                        <tr class="tcolor_2">
                            <td class="td_right"><t style="color: grey;">Pengestatus:</t></td>
                            <td class="td_left" ><?php echo $profile_money_rank ?></td>
                        </tr>
                        <tr class="tcolor_2">
                            <td class="td_right"><t style="color: grey;">Drap:</t></td>
                            <td class="td_left" ><?php echo $profile_drap ?></td>
                        </tr>
                        <tr class="tcolor_2">
                            <td class="td_right"><t style="color: grey;">Sist aktiv:</t></td>
                            <td class="td_left" ><?php echo $last_active = date( "d/m/Y H:i:s", strtotime($last_active));?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </center>
        <div id="fritekst"><center><li id="sm-tp-hdr"><t style="color: grey;">Fritekst</t></li></center>
        <?php
                    
// How to use the above function:
$bbtext = $profilinfo;
$htmltext = showBBcodes($bbtext);
$formattedText = preg_replace("/(<[a-zA-Z0-9=\"\/\ ]+>)<br\ \/>/", "$1", nl2br($htmltext));
    
echo '<div style="width:1000px; padding-top: 10px;">';
echo $formattedText;
echo '</div>';

?>
        </div>
    </body>
</html>


