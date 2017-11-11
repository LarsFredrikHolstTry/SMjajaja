<?php

include('header.php');
include('left.php');
include('right.php');

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $account_type = $row['account_type'];
    $user_id = $row['id'];

if(isset($_GET['id'], $_GET['id2'])){
	$id = intval($_GET['id']);
	$id2 = intval($_GET['id2']);
        if(isset($_SESSION['username'])){
            $dn1 = mysqli_fetch_array(mysqli_query($con, 'select count(t.id) as nb1, t.authorid, t2.title, t.message, t.parent, c.name from topics as t, topics as t2, categories as c where t.id="'.$id.'" and t.id2="'.$id2.'" and t2.id="'.$id.'" and t2.id2=1 and c.id=t.parent group by t.id'));
                if($dn1['nb1']>0){
                    if($user_id==$dn1['authorid'] or $account_type == 3){
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/support.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="functions.js"></script>
    </head>
    <body style="margin: 0 auto; width: 1000px;">

        <div class="content">
<?php
if(isset($_POST['message']) and $_POST['message']!=''){
	if($id2==1){
		if($account_type == 3 and isset($_POST['title']) and $_POST['title']!=''){
			$title = $_POST['title'];
			if(get_magic_quotes_gpc()){
				$title = stripslashes($title);
			}
			$title = mysqli_real_escape_string($con, $dn1['title']);
		}else{
			$title = mysqli_real_escape_string($con, $dn1['title']);
		}
	}else{
		$title = '';
	}
	$message = $_POST['message'];
	if(get_magic_quotes_gpc()){
		$message = stripslashes($message);
	}
	$message = mysqli_real_escape_string($con, $message);
	if(mysqli_query($con, 'update topics set title="'.$title.'", message="'.$message.'" where id="'.$id.'" and id2="'.$id2.'"')){
	?>
	<div id="velykket">Tråden ble velykket endret!<br />
	<a href="forum_topic.php?id=<?php echo $id; ?>">Tilbake til tråden</a></div>
	<?php
	}else{
		echo 'An error occurred while editing the message.';
	}
}else{
?>
<form action="forum_edit.php?id=<?php echo $id; ?>&id2=<?php echo $id2; ?>" method="post">
    
    <div id="support">
        <table>
<?php
if($account_type == 3 and $id2==1){
?>
            <li id="support_tekst">Tittel: <br><input type="text" name="title" style="width: 577px;" id="title" value="<?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?>" />
            </li>
<?php
}
?>
            <li id="support_tekst">Tekst:<textarea name="message" id="message" cols="77" rows="7"><?php echo $dn1['message']; ?></textarea></li>
            <li id="support_tekst"><input class="button" type="submit" value="Submit" /></li>
        </table>
    </div>
</form>
<?php
}
?>
		</div>
	</body>
</html>
<?php
}else{
	echo '<h2>You don\'t have the right to edit this message.</h2>';
}
}else{
	echo '<h2>The message you want to edit doesn\'t exist..</h2>';
}
}

}else{
	echo '<h2>The ID of the message you want to edit is not defined.</h2>';
}
?>