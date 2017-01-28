<?php include ('header.php');

$requete = $bdd->query("SELECT * FROM episodes WHERE id_e = ".(int)$_GET['id']);
$reponse = $requete->fetch();

	echo "<h1>".$reponse['titre']."</h1></br><img class='film__content' src='".$reponse['lien_img']."'>".$reponse['description'];

if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
{
$requeteU = $bdd->query("SELECT * FROM user WHERE fin_abon = " .$_SESSION['abo']);
$reponseU = $requeteU->fetch();
        
        if(($_SESSION['abo']) == 0)
        {
        echo "</br></br></br><h3>Vous devez etre premium pour lire cette video</h3>";
        echo "<a href='Subscribe.php'>Devenir Premium</a>";
        }
        
        else
        {
            echo "</br></br></br><h3><a href='regarder.php?id=".$reponse['id_e']."'>J'ai vu cette épisode</a></h3>";
             if(isset($reponse['lien_video']) == NULL)
            {
                echo "<img src='img/video-non-dispo.png'>";
            }
            else
            {
                echo "<video class='player' controls src='".$reponse['lien_video']."'/>";
            }          
        }
}

else
{
    echo "</br></br></br><h3>Vous devez etre connecté ainsi qu'être membre premium pour accéder a ce contenu</h3>";
}
include ('footer.php');?>