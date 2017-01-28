<?php include ('header.php');

    if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
    {
        $requete = $bdd->query("SELECT *,(SELECT count(*) FROM visionner v WHERE v.id_f = f.id_f AND v.id_u =".$_SESSION['id'].") vu FROM films f ORDER BY titre");
    }   
    else
    {
        $requete = $bdd->query("SELECT * FROM films ORDER BY titre");
    }
    ?>
    <h1>Films</h1></br></br>
    
    <?php
    
    while($reponse = $requete->fetch())
    {
       if(isset($_SESSION['id']) && ($reponse['vu']) >0)
        {
            echo "<a href='voirfilms.php?id=".$reponse['id_f']."'><div class='movie-image'><span class='play'><span class='name'>".$reponse['titre']."</span></span><img style='opacity:0.3' src='".$reponse['lien_img']."'/></div></a>";
        }
        else
        {
            echo "<a href='voirfilms.php?id=".$reponse['id_f']."'><div class='movie-image'><span class='play'><span class='name'>".$reponse['titre']."</span></span><img src='".$reponse['lien_img']."'></div></a>";
        }
    }
?>
<?php include ('footer.php');?>