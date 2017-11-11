<?php 

include('header.php');
include('left.php');
include('right.php');

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $account_type = $row['account_type'];

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/forum.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">

    <?php // hvis man er admin kan man opprette kategori
        if($account_type == 3){ ?>
	   <a href="forum_ny_kat.php" class="button">Ny kategori (ADMIN ONLY)</a>
    <?php } ?>
        
        <center>
            <table class="categories_table">
                <tr>
                    <th class="forum_cat">Kategori</th>
                    <th class="forum_ntop">Poster</th>
                    <th class="forum_nrep">Svar</th>

            <?php if($account_type == 3){ ?>
                    <th class="forum_act">Admin-panel</th>
            <?php } ?>

                </tr>
            <?php
            $dn1 = mysqli_query($con, 'select c.id, c.name, c.description, c.position, (select count(t.id) from topics as t where t.parent=c.id and t.id2=1) as topics, (select count(t2.id) from topics as t2 where t2.parent=c.id and t2.id2!=1) as replies from categories as c group by c.id order by c.position asc');
            $nb_cats = mysqli_num_rows($dn1);
            while($dnn1 = mysqli_fetch_array($dn1)){
            ?>
                <tr class="categories_overview">
                    <td class="forum_cat"><a href="forum_kat.php?parent=<?php echo $dnn1['id']; ?>" class="title"><?php echo htmlentities($dnn1['name'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <div class="description"><?php echo $dnn1['description']; ?></div></td>
                    
                    <td><?php echo $dnn1['topics']; ?></td>
                    
                    <td><?php echo $dnn1['replies']; ?></td>
            <?php

            // Slette kategori om man er admin
            if($account_type == 3){
            ?>
                    <td><a href="delete_category.php?id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/delete.png" alt="Delete" /></a>
                    <?php if($dnn1['position']>1){ ?><?php } ?>
                    <?php if($dnn1['position']<$nb_cats){ ?><?php } ?>
                    <a href="edit_category.php?id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/edit.png" alt="Edit" /></a></td>
            <?php } ?>
                </tr>
            <?php } ?>
            </table>
        </center>
    </body>
</html>














