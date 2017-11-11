<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/rediger_profil.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        
        <?php 
        
    include("auth.php");
    require('connection/db.php');
        
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $query = mysqli_query($con, $sql) or die (mysqli_error());
    $row = mysqli_fetch_assoc($query);
        
    $profile_img = $row['img'];
    $profil_info = $row['profilinfo'];

// rediger profilbidle
if(isset($_POST['add_pb'])){
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    // henter text data fra tekstbolkene
    $link = $_POST['link'];

    $add_pb = "UPDATE users SET img = '$link' WHERE username='".$_SESSION['username']."'";
    mysqli_query($con, $add_pb) or die("Bad query: $add_pb");
    
    if($add_pb) {
        echo '<div id="velykket">Bildet ble lastet opp!</div>';
    }
}
   
// rediger profil
if(isset($_POST['add_info'])){
    
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    // henter text data fra tekstbolkene
    $info = $_POST['info'];

    $add_info = "UPDATE users SET profilinfo = '$info' WHERE username='".$_SESSION['username']."'";
    mysqli_query($con, $add_info) or die("Bad query: $add_info");
    
    if($add_info) {
        echo '<div id="velykket">Profilen er nå oppdatert</div>';
    }
}


?>


    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <center>
            
            <div id="sm-cntr">
                <li id="sm-tp-hdr">Rediger profil</li>
                <li id="sm-tp-hdr">Rediger profilbilde</li>
                <li id="sm-box20">Nåværende profilbilde</li>
                <div id="sm-box280">
                    <li style="width: 250px; margin: 0 auto;">
                        <?php echo '<img src="'.$profile_img.'" style="width: 100%; max-width=250px;">'; ?>
                    </li>
                </div>
                <li id="sm-box60">Link: (Må slutte på .jpg, .jpeg, .png eller .gif) <t id="red">*</t> <br>
                    <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="link" size="58"/><input class="button" type="submit" name="add_pb" value="Last opp!"/>
                    </form>
                </li>
                
                <li id="sm-tp-hdr">Rediger profilinfo</li>
                <div id="sm-box280">
                    <form action="" method="post" enctype="multipart/form-data">
                <textarea name="info" id="info" rows="16" cols="77" wrap="nowrap"><?php echo $profil_info ?></textarea>
                <input class="button" type="submit" name="add_info" value="Lagre"/>
                    </form>
                </div>
            </div>
        </center>
    </body>
</html>










