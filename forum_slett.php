<?php

include('header.php');
include('left.php');
include('right.php');

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $account_type = $row['account_type'];

if(isset($_GET['id'])){
	$id = intval($_GET['id']);
        if(isset($_SESSION['username'])){
            $dn1 = mysqli_fetch_array(mysqli_query($con, 'select count(t.id) as nb1, t.title, t.parent, c.name from topics as t, categories as c where t.id="'.$id.'" and t.id2=1 and c.id=t.parent group by t.id'));
                if($dn1['nb1']>0) {
                    if($account_type == 3){
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body style="margin: 0 auto; width: 1000px;">

        <div class="content">
<?php
        if(isset($_POST['confirm'])) {
            if(mysqli_query($con, 'delete from topics where id="'.$id.'"')) {
            ?>
            <div id="velykket">Topic'en ble slettet.</div>
            <?php
            } else {
                echo '<div id="mislykket">FEIL.</div>';
            }
        } else {
?>
<form action="forum_slett.php?id=<?php echo $id; ?>" method="post">
	<div id="mislykket">Er du sikker på at du vil slette topic'n?.</div>
    <input type="hidden" name="confirm" value="true" />
    <input class="button" type="submit" value="JA" /> <input class="button" type="button" value="NEI" onclick="javascript:history.go(-1);" />
</form>
<?php } ?>
		</div>
	</body>
</html>
<?php
} else {
	echo '<div id="mislykket">Du har ikke rettighetene til å slette denne topic.</div>';
}
} else {
	echo '<div id="mislykket">Topicen du vil slette finnes ikke lengre.</div>';
}
} else {
	echo '<div id="mislykket">Du må være logget inn som admin for å se denne siden.</div>';
}
} else {
	echo '<div id="mislykket">ID til topicen er ikke definert.</div>';
}
?>