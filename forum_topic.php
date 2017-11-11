<?php

include('functions/bbcodes.php');
include('header.php');
include('left.php');
include('right.php');

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $account_type = $row['account_type'];

if(isset($_GET['id'])){
	$id = intval($_GET['id']);
	$dn1 = mysqli_fetch_array(mysqli_query($con, 'select count(t.id) as nb1, t.title, t.parent, count(t2.id) as nb2, c.name from topics as t, topics as t2, categories as c where t.id="'.$id.'" and t.id2=1 and t2.id="'.$id.'" and c.id=t.parent group by t.id'));
        if($dn1['nb1']>0){
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/forum.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body style="margin: 0 auto; width: 1000px;">
<center>   
        <div id="sm-cntr-fixed1">
        <li id="sm-tp-hdr" style="text-align: left; height: 20px;"><t><?php echo $dn1['title']; ?> (<a href="forum_svar.php?id=<?php echo $id; ?>">svar</a>)</t></li>
    </div>  
    <?php
                          
$dn2 = mysqli_query($con, 'SELECT topics.id2, topics.authorid, topics.message, topics.timestamp, users.username as author, users.img FROM users, topics WHERE topics.id="'.$id.'" and users.id = topics.authorid order by topics.timestamp asc');
                          
while($dnn2 = mysqli_fetch_array($dn2)) { ?>

        <div id="sm-cntr-fixed">
        <div id="left_bar">
            <li id="sm-tp-hdr-small">
                
                <t><a href="profil.php?username=<?php echo $dnn2['author']; ?>"><?php echo $dnn2['author']; ?></a></t>
                <t><img src="<?php echo $dnn2['img']; ?>" width="135" style="margin-top: 5px; border: 1px solid black;"></t>
            </li>
    
        </div>
        <div id="right_bar">
            <li id="sm-tp-hdr-wide">
                <f style="color: grey;">Publisert: <?php echo date('d. F Y | H:i' ,$dnn2['timestamp']); ?></f><br>
                <f><?php
                    
// functions/bbcodes.php
$bbtext = $dnn2['message'];
$htmltext = showBBcodes($bbtext);
$formattedText = preg_replace("/(<[a-zA-Z0-9=\"\/\ ]+>)<br\ \/>/", "$1", nl2br($htmltext));
    
echo $formattedText;
?></f>
            </li>
        </div>
    </div>
    
<?php } ?>
    
</center> 
        
	</body>
</html>
<?php
} else {
	echo '<h2>This topic doesn\'t exist.</h2>';
}
} else {
	echo '<h2>The ID of this topic is not defined.</h2>';
}
?>