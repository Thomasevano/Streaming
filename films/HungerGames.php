<?php include ('header.php');

    $requete = $bdd->query("SELECT * FROM films
                        WHERE id_f=4");

 while($reponse = $requete->fetch())
    {
        if(isset($_SESSION['id']) && ($fin_abon == 1))
        {
            echo "</br></br></br><img class='film__content' src='".$reponse['lien_img']."'>".$reponse['description'];?>
            
            <input type="button" name="button" value="Vu" onclick="visionner.php" />
            <video class="player" controls src="films/The.Hunger.Games.Mockingjay.Part.2.2015.MULTi.1080p.BluRay.x264-LOST.Premium.mp4" />
            <!-- Texte alternatif en cas de non prise en charge de la balise video -->
            <p class="warning">Le format n'est pas pris en charge par votre navigateur</p>
            </video>
<?php       }

        else
        {
            echo "</br></br></br><img class='film__content' src='".$reponse['lien_img']."'>".$reponse['description'];
            echo "Vous devez etre Membre Premium pour voir cette vidéos";
        }
            
    }
    ?>
<?php include ('footer.php');?>