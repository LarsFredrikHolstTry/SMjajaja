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
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/forum.css" />
    </head>
        <body style="margin: 0 auto; width: 1000px;">

        <div class="content">
        <?php
            $dn2 = mysqli_query($con, 'select t.id, t.title, t.authorid, u.username as author, count(r.id) as replies from topics as t left join topics as r on r.parent="'.$id.'" and r.id=t.id and r.id2!=1  left join users as u on u.id=t.authorid where t.parent="'.$id.'" and t.id2=1 group by t.id order by t.timestamp2 desc');
            if(mysqli_num_rows($dn2)>0) {
        ?>
            <center>
                <div id="sm-tp-hdr">
                    <?php if($id == 1){ ?>
                    <li>Off-topic <a href="forum_ny_post.php?parent=<?php echo $id; ?>">( Ny post )</a></li>
                    <?php } elseif($id == 2){ ?>
                    <li>In Game <a href="forum_ny_post.php?parent=<?php echo $id; ?>">( Ny post )</a></li>
                    <?php } elseif($id == 3){ ?>
                    <li>Salg og Søknad <a href="forum_ny_post.php?parent=<?php echo $id; ?>">( Ny post )</a></li>
                    <?php } ?>

                </div>
            <table class="topics_table">
                <tr>
                    <td class="forum_cat">Post</td>
                    <td class="forum_ntop">Trådstarter</td>
                    <td class="forum_nrep">Svar</td>
        <?php
        // hvis man er admin ser man action
        if($account_type == 3){
        ?>
                    <td class="forum_act">Admin-panel</td>
        <?php } ?>
                </tr>
        <?php
        while($dnn2 = mysqli_fetch_array($dn2)) {
        ?>
            <tr class="categories_overview">
                <td class="forum_tops"><a href="forum_topic.php?id=<?php echo $dnn2['id']; ?>"><?php echo htmlentities($dnn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                <td><a href="profil.php?username=<?php echo $dnn2['author']; ?>"><?php echo htmlentities($dnn2['author'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                <td><?php echo $dnn2['replies']; ?></td>
        <?php
        // hvis man er admin kan man slette poster
        if($account_type == 3){
        ?>
            <td><a href="forum_slett.php?id=<?php echo $dnn2['id']; ?>"><img src="<?php echo $design; ?>images/delete.png" alt="Delete" /></a></td>
        <?php } ?>
            </tr>
        <?php } ?>
            </table>
                </center>
        <?php } else { ?>
            <div id="mislykket">Denne kategorien har ingen poster.</div>
        <?php } ?>
        </div>
	</body>
</html>
<?php } ?>