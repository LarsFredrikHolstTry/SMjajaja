<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/admin_area.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">

        <center>
            <?php  if($account_type == 3 || $account_type == 2){ ?>
            <form action="admin_area_nyhet.php" method="post" enctype="multipart/form-data"> 
                <div id="admin">
                    <table>
                        <li id="admindesign"><a href="admin_area.php">Tilbake til admin area</a></li>
                        <li id="admindesign"><b> LEGG TIL NYHET </b></li>
                        <img src="images/handlinger/news.png">

                        <li id="admin_nyhet">Tittel <t id="red">*</t> <br/>
                        <input type="text" name="news_title" required/></li>
                        <li id="admin_nyhet">Innhold <t id="red">*</t> <br/>
                        <textarea class="nyhettext" name="news_desc"></textarea></li>

                        <li id="admin_nyhet"><center><input type="submit" name="add_news" value="Publiser nyhet!"/></center></li>
                    </table>
                </div>
            </form>
            <?php } ?>
            
            <?php if($account_type == 1) { ?>
    
            <div id="mislykkket">KUN FOR ADMINS</div>

            <?php } ?>
        </center>

    </body>
</html>

<?php
    include('connection/db.php');

    if(isset($_POST['add_news'])){
        
        // henter text data fra tekstbolkene
		$news_title   = $_POST['news_title'];     // Nyhet tittel
		$news_desc    = $_POST['news_desc'];      // Nyhet beskrivelse
		$news_author  = $_SESSION['username'];    // Nyhet forfatter
    
        $add_news = "insert into news 
        (news_author, news_title, news_desc) 
        values ('$news_author','$news_title','$news_desc')";

        $add_news = mysqli_query($con, $add_news);
		 
        if($add_news){
            echo '<div id="velykket">Nyhet ble publisert!</div>';
        }
	}
?>
