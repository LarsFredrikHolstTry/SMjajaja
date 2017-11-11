<?php
include("auth.php");
include("functions/rank.php");
?>

<!DOCTYPE html>
<html>
  
  <head>
    <link rel="stylesheet" type="text/css" href="css/right.css" />
      
      
<?php
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    $xp = $row['exp'];
    $rank = $row['rank'];
    $ant_drap = $row['ant_drap'];
    $account_type = $row['account_type'];
    $bank_penger = $row['bank_money'];
    $by = $row['city'];
    $profile_img = $row['img'];

    $sql1 = "SELECT lest FROM pm WHERE sendto = '".$_SESSION['username']."' AND lest = 0"; //  Searches the database for every one who has being last active in the last 5 minute
    $query = mysqli_query($con, $sql1) or die(mysqli_error());
    $count = mysqli_num_rows($query);
    
?>
  </head>
  
  <body>
    
    <div id="right">
        <h3><?php echo "<a href=\"profil.php?username=".$username."\" onFocus=\"if(this.blur)this.blur()\">".$username." </a> " ?></h3>
        <?php if($count > 0){ echo '<a href="inbox.php"><img src="images/newmsg.png" width="165"></a>'; } else { echo "<a href=\"profil.php?username=".$username."\" onFocus=\"if(this.blur)this.blur()\"><img src='".$profile_img."' width='165'></a>"; } ?>
        <li>
            <?php if($rank < 9){ ?>
            <div class="percentbar">
                <div id="percentages" style="width:<?php echo $percent7; ?>px;"><t style="margin-left: 2px;"><?php echo number_format($percent7, 2); ?>%</t></div>
            </div>
            <?php } elseif($rank >= 9){ ?>
            <div class="percentbar">
                <div id="percentages" style="width: 100px;"><t>100%</t></div>
            </div>
            <?php } ?>
        </li>
        <br>
        <li><t id="red">Rank: </t><?php echo $rank_array[$rank] ?> </li>
        <li><t id="red">By:</t> <?php echo $by ?></li>
        
      <br/>
        <t style="font-size: 14px; margin-left: 19px;">Forum</t>
        <li><t id="red">- </t><a href="forum_kat.php?parent=1">Off-topic</a></li>
        <li><t id="red">- </t><a href="forum_kat.php?parent=2">In Game</a></li>
        <li><t id="red">- </t><a href="forum_kat.php?parent=3">Salg og søknad</a></li>
      
      <br/>
        <t style="font-size: 14px; margin-left: 19px;">Diverse</t>
        <li><t id="red">- </t><a href=faq.php>FAQ </a></li>
        <li><t id="red">- </t><a href=byoversikt.php>Byoversikt</a></li>
      
      <br/>
        <t style="font-size: 14px; margin-left: 19px;">Bruker</t>
        <li><t id="red">- </t><a href="send_pm.php">Send PM</a></li>
        <li><t id="red">- </t><a href="inbox.php">Inbox <?php if($count > 0){ ?>
            <t id="red">Ny melding!</t>
            <?php } ?></a></li>

        <li><t id="red">- </t><a href="rediger_profil.php">Rediger profil</a></li>
        <li><t id="red">- </t><a href="loggut.php" id="red">Logg ut</a>
      
      <br/> <!-- padding i bunden av siden -->
        
    </div>

  </body>
</html>