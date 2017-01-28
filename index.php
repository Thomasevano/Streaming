<?php include ('header.php');

    /** Recuperation des films **/
    if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
    {
        $requete = $bdd->query("SELECT *,(SELECT count(*) FROM visionner v WHERE v.id_f = f.id_f AND v.id_u =".$_SESSION['id'].") vu FROM films f ORDER BY RAND() LIMIT 0,6");
    }   
    else
    {
        $requete = $bdd->query("SELECT * FROM films ORDER BY RAND()LIMIT 0,6");
    }

    ?>
    <div class="box">
        <div class="head">
    <h1>Films</h1>
    <p class="text-right"><a href="films.php">Tout voir</a></p>
        </div>
    
    <?php
    
    while($reponse = $requete->fetch())
    {
        if(isset($_SESSION['id']) && ($reponse['vu']) >0)
        {
            echo "<a href='voirfilms.php?id=".$reponse['id_f']."'><div class='movie-image'><span class='play'><span class='name'>".$reponse['titre']."</span></span><img style='opacity:0.3' src='".$reponse['lien_img']."'/></div></a>";
        }
        else
        {
            echo "<a href='voirfilms.php?id=".$reponse['id_f']."'><div class='movie-image'><span class='play'><span class='name'>".$reponse['titre']."</span></span><img src='".$reponse['lien_img']."'/></div></a>";
        }
    }
        
    /** Recupération des séries **/        
    if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
    {
        $requete1 = $bdd->query("SELECT *,(SELECT count(*) FROM regarder r WHERE r.id_e = e.id_e AND r.id_u =".$_SESSION['id'].") vu FROM episodes e ORDER BY RAND() LIMIT 0,6");
    }
    else
    {
        $requete1 = $bdd->query("SELECT * FROM episodes ORDER BY RAND()LIMIT 0,6");
    }

?>
   
    <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
    <h1>Series/Anime</h1>
    <p class="text-right"><a href="series.php">Tout voir</a></p>
        </div>
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
    <div class="cl">&nbsp;</div>
      </div>
      
<?php include ('footer.php');?>