<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/admin_area.css" />
        <title>Scandinavian Mafia - Kill or get killed</title>

    </head>

    <body style="margin: 0 auto; width: 1000px;">
		<a></a>
        <center>
            <?php if($account_type == 3 || $account_type == 2){ ?>
            
            <div id="admin">
                <li id="admindesign">!<b> ADMIN AREA </b>!</li>
                <img src="images/handlinger/admin_area.png">
                <a id="adminfunksjon" href="admin_area_nyhet.php"><b>LEGG TIL NYHET</b></a>
                <a id="adminfunksjon" href="admin_area_nyhet_endre.php"><b>ENDRE NYHET</b></a>

            </div>
            
            <?php } elseif ($account_type == 1){ ?>
                <div id="mislykkket">KUN FOR ADMINS</div>
            <?php } ?>
        </center>
    </body>
</html>
