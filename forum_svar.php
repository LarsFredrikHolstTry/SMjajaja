<?php
include('header.php');
include('left.php');
include('right.php');

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $account_type = $row['account_type'];
    $user_id = $row['id'];

if(isset($_GET['id'])){
	$id = intval($_GET['id']);
        if(isset($_SESSION['username'])){
            $dn1 = mysqli_fetch_array(mysqli_query($con, 'select count(t.id) as nb1, t.title, t.parent, c.name from topics as t, categories as c where t.id="'.$id.'" and t.id2=1 and c.id=t.parent group by t.id'));
            if($dn1['nb1']>0){
?>
<html>
    <head>
		<script type="text/javascript" src="functions.js"></script>
        <link rel="stylesheet" type="text/css" href="css/support.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body style="margin: 0 auto; width: 1000px;">
        <div class="content">
<?php
if(isset($_POST['message']) and $_POST['message']!=''){
	$message = $_POST['message'];
	if(get_magic_quotes_gpc()){
		$message = stripslashes($message);
	}
	$message = mysqli_real_escape_string($con, $message);
	if(mysqli_query($con, 'insert into topics (parent, id, id2, title, message, authorid, timestamp, timestamp2) select "'.$dn1['parent'].'", "'.$id.'", max(id2)+1, "", "'.$message.'", "'.$user_id.'", "'.time().'", "'.time().'" from topics where id="'.$id.'"') and mysqli_query($con, 'update topics set timestamp2="'.time().'" where id="'.$id.'" and id2=1')){
	?>
	<div id="velykket">Du svarte på tråden!<br />
	<a href="forum_topic.php?id=<?php echo $id; ?>">Tilbake til tråden</a></div>
	<?php
	} else {
		echo 'An error occurred while sending the message.';
	}
} else {
?>
<form action="forum_svar.php?id=<?php echo $id; ?>" method="post">
    <div id="support">
        <table>
            <li id="support_tekst">Svar: <textarea name="message" id="message" cols="77" rows="7" style="resize: none;"></textarea></li>
            <li id="support_tekst"><input type="submit" value="Send" /></li>
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
	echo '<h2>The topic you want to reply doesn\'t exist.</h2>';
}
}else{
?>
<h2>You must be logged to access this page.</h2>
<?php
}
}else{
	echo '<h2>The ID of the topic you want to reply is not defined.</h2>';
}
?>