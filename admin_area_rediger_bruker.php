<?php 

include('header.php');
include('left.php');
include('right.php');
include('functions/pengerank.php');
include('functions/account_type.php'); 
include('auth.php');
require('connection/db.php'); 
include('functions/rank.php');

?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/admin_area.css" />
      
      <?php     
    
    $sql = "SELECT * FROM users WHERE username='". mysqli_real_escape_string($con, $_GET['username'])."'";
    $query = mysqli_query($con, $sql) or die (mysqli_error());
    $row = mysqli_fetch_assoc($query);

    $profile_username = $row['username'];
    $total_ute_money = $row['money'];
    $total_bank_money = $row['bank_money'];
    $helse = $row['health'];
    $account_type = $row['account_type'];
    $kuler = $row['kuler'];
    $city = $row['city'];
      
    $sql1 = "SELECT * FROM users WHERE username='". mysqli_real_escape_string($con, $_SESSION['username'])."'";
    $query1 = mysqli_query($con, $sql1) or die (mysqli_error());
    $row1 = mysqli_fetch_assoc($query1);
      
    $account_typ = $row1['account_type'];
    
if(isset($_POST['endre_bruker'])){

    // Endre cash ute
    $endre_bruker_cash_ute = $_POST['bruker_cash_ute'];
    $bruker_cash_ute = $row['money'];
    
    // Endre helse
    $endre_helse = $_POST['helse'];
    $bruker_helse = $row['health'];
    
    // Endre bank penger
    $endre_bruker_cash_bank = $_POST['bruker_cash_bank'];
    $bruker_cash_bank = $row['bank_money'];
        
    // Endre kuler
    $endre_kuler = $_POST['kuler_edit'];
    $kuler = $row['kuler'];
    
    // Endre account type
    $endre_account_type = $_POST['account_type_edit'];
    $account_type = $row['account_type'];

    if(isset($endre_bruker_cash_ute)) {
        $endre_cash_ute = "UPDATE users SET money = $endre_bruker_cash_ute WHERE username='".$profile_username."'";
        mysqli_query($con, $endre_cash_ute) or die ("Bad query: $endre_cash_ute");
    }
    
    if(isset($endre_helse)) {
        $endre_helsen = "UPDATE users SET health = $endre_helse WHERE username='".$profile_username."'";
        mysqli_query($con, $endre_helsen) or die ("Bad query: $endre_helsen");
    }
    
    if(isset($endre_bruker_cash_bank)) {
        $endre_banken = "UPDATE users SET bank_money = $endre_bruker_cash_bank WHERE username='".$profile_username."'";
        mysqli_query($con, $endre_banken) or die ("Bad query: $endre_banken");
    }
    
    if(isset($endre_kuler)) {
        $endre_kulene = "UPDATE users SET kuler = $endre_kuler WHERE username='".$profile_username."'";
        mysqli_query($con, $endre_kulene) or die ("Bad query: $endre_kulene");
    }
    
    if(isset($endre_account_type)) {
        $endre_acc_type = "UPDATE users SET account_type = $endre_account_type WHERE username='".$profile_username."'";
        mysqli_query($con, $endre_acc_type) or die ("Bad query: $endre_acc_type");
    }
    
    
    echo "<meta http-equiv='refresh' content='0'>";
}

?>
  </head>
  
  <body style="margin: 0 auto; width: 1000px;">
        <center>
            <div class="wrapper">
                <form action="" method="post" enctype="multipart/form-data"> 
                    <li id="admindesign">ADMINISTRER BRUKER: <?php echo "<a id='brukeronline' href=\"profil.php?username=".$profile_username."\" onFocus=\"if(this.blur)this.blur()\">".$profile_username."</a>" ?></li>

                    <li id="admin_nyhet"><p style="color: red;"><b>Misbruker du denne funksjonen risikerer du permanent utestengelse fra spillet.</b></p></li>

                    <!-- endre cash ute -->
                    <li id="admin_nyhet">
                    <b>Endre cash ute:</b>
                    <textarea name="bruker_cash_ute" id="bruker_cash_ute" rows="1" cols="80" wrap="hard"><?php echo $total_ute_money ?></textarea>
                    </li>

                    <!-- endre cash bank -->
                    <li id="admin_nyhet">
                    <b>Endre cash i bank:</b>
                    <textarea name="bruker_cash_bank" id="bruker_cash_bank" rows="1" cols="80" wrap="hard"><?php echo $total_bank_money ?></textarea>
                    </li>

                    <!-- endre helse -->
                    <li id="admin_nyhet">
                    <b>Endre helse:</b>
                    <textarea name="helse" id="helse" rows="1" cols="80" wrap="hard"><?php echo $helse ?></textarea>
                    </li>
                    
                    <!-- endre kuler -->
                    <li id="admin_nyhet">
                    <b>Endre kuler</b>
                    <textarea name="kuler_edit" id="kuler_edit" rows="1" cols="80" wrap="hard"><?php echo $kuler ?></textarea>
                    </li>
                    
                <?php if($account_typ == 3) { ?> 
                    <!-- endre account_type -->
                    <li id="admin_nyhet">
                    <b>Endre Account type: (0 - død, 1 - bruker, 2 - mod, 3 - admin, 4 - support)</b>
                    <textarea name="account_type_edit" id="account_type_edit" rows="1" cols="80" wrap="hard"><?php echo $account_type ?></textarea>
                    </li>
                <?php } else { }?>
                    

                    <li id="admin_nyhet"><center><input type="submit" name="endre_bruker" value="ENDRE BRUKER!"/></center></li>
                </form>
            </div>  
        </center>
    </body>
</html>

