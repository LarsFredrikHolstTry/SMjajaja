<?php

include('header.php');
include('left.php');
include('right.php');

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $account_type = $row['account_type'];

if(isset($_GET['parent'])){
	$id = intval($_GET['parent']);
if(isset($_SESSION['username'])){
	$dn1 = mysqli_fetch_array(mysqli_query($con, 'select count(c.id) as nb1, c.name from categories as c where c.id="'.$id.'"'));
if($dn1['nb1']>0){
?>
<html>
    <head>
        <meta charset="utf-8">
		<script type="text/javascript" src="functions.js"></script>
        <link rel="stylesheet" type="text/css" href="css/support.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

    </head>
    <body style="margin: 0 auto; width: 1000px;">
        <div class="content">
<?php
    
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $user_id = $row['id'];
    
if(isset($_POST['message'], $_POST['title']) and $_POST['message']!='' and $_POST['title']!='')
{
	$title = $_POST['title'];
	$message = $_POST['message'];
	if(get_magic_quotes_gpc()) {
		$title = stripslashes($title);
		$message = stripslashes($message);
	}
    
	$title = mysqli_real_escape_string($con, $title);
	$message = mysqli_real_escape_string($con, $message);
	if(mysqli_query($con, 'insert into topics (parent, id, id2, title, message, authorid, timestamp, timestamp2) select "'.$id.'", ifnull(max(id), 0)+1, "1", "'.$title.'", "'.$message.'", "'.$user_id.'", "'.time().'", "'.time().'" from topics')){
	?>
	<div class="message"><div id="velykket">Tråden ble vellykket postet! <a href="forum_kat.php?parent=<?php echo $id; ?>">Tilbake til forum</a></div></div>
	<?php
	} else {
		echo '<div id="mislykket">En feil skjedde. Sjekk om posten ble postet, om ikke så vennligst prøv på nytt.</div>';
	}
} else {
?>
<center>
<form action="forum_ny_post.php?parent=<?php echo $id; ?>" method="post">
    <div id="support">
        <table>
            <li id="supportdesign">Opprett ny post <a href="forum_kat.php?parent=<?php echo $_GET['parent']; ?>">(tilbake til forum)</a></li>
            <li id="support_tekst">Tittel: <br><input type="text" name="title" id="title" style="width: 577px;" type="text" maxlength="110" />
            </li>
            <li id="support_tekst">Tekst: <textarea name="message" id="message" cols="77" rows="7" style="resize: none;"></textarea></li>
            <li id="support_tekst"><input class="button" type="submit" value="Opprett post" /></li>
        </table>
    </div>
</form> 
</center>
<?php
}
?>
		</div>
	</body>
</html>
<?php
                  
} else {
	echo '<div id="mislykket">Kategorien du ønsker å poste en post i finnes ikke.</div>';
}
} else {
?>
<?php
}
} else {
	echo '<div id="mislykket">IDen er ikke definert.</div>';
}
?>