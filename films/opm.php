<?php include ('header.php');

    $requete = $bdd->query("SELECT * FROM episodes
                        WHERE id_e=6");

 while($reponse = $requete->fetch())
    {
            echo "</br></br></br><img class='film__content' src='".$reponse['lien_img']."'>".$reponse['description'];
            
    }
    ?>
<video class="player" controls src="series/One%20Punch%20Man%2001%20vostfr%20%5B720p%5D.MaChO@zone-telechargement.com.mp4" />
  <!-- Texte alternatif en cas de non prise en charge de la balise video -->
  <p class="warning">Le format n'est pas pris en charge par votre navigateur</p>
</video>
<?php include ('footer.php');?>