<?php include ('header.php');


$requete1 = $bdd->query("SELECT * FROM categorie WHERE id_c = ".(int)$_GET['id']);

while($categorie = $requete1->fetch())
{
    echo "<h1>".$categorie['titre']."</h1></br>";
}


$requete = $bdd->query("SELECT * FROM films WHERE id_c = ".(int)$_GET['id']);

while($reponse = $requete->fetch())
{
        echo "<a href='voirfilms.php?id=".$reponse['id_f']."'><div class='movie-image'><span class='play'><span class='name'>".$reponse['titre']."</span></span><img src='".$reponse['lien_img']."'></div></a>";
}


$requete = $bdd->query("SELECT * FROM episodes WHERE id_c = ".(int)$_GET['id']);

while($reponse1 = $requete->fetch())
{
        echo "<a href='voirseries.php?id=".$reponse1['id_e']."'><div class='movie-image'><span class='play'><span class='name'>".$reponse1['titre']."</span></span><img src='".$reponse1['lien_img']."'></div></a>";   
}

?>