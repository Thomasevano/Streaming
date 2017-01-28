<?php include ('header.php');

    if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
    {
        $requete1 = $bdd->query("SELECT *,(SELECT count(*) FROM regarder r WHERE r.id_e = e.id_e AND r.id_u =".$_SESSION['id'].") vu FROM episodes e ORDER BY titre");
    }
    else
    {
        $requete1 = $bdd->query("SELECT * FROM episodes ORDER BY titre");
    }

?>
    <h1>Series/Anime</h1></br></br>
    
    <?php
    
    while($reponse1 = $requete1->fetch())
    {
          if(isset($_SESSION['id']) && ($reponse1['vu']) >0)
        {
            echo "<a href='voirseries.php?id=".$reponse1['id_e']."'><div class='movie-image'><span class='play'><span class='name'>".$reponse1['titre']."</span></span><img style='opacity:0.3' src='".$reponse1['lien_img']."'/></div></a>";
        }
        else
        {
            echo "<a href='voirseries.php?id=".$reponse1['id_e']."'><div class='movie-image'><span class='play'><span class='name'>".$reponse1['titre']."</span></span><img src='".$reponse1['lien_img']."'/></div>";
        }
    }
?>
<?php include ('footer.php');?>