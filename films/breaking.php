<?php include ('header.php');


    $requete = $bdd->query("SELECT * FROM episodes
                        WHERE id_e=1");

 while($reponse = $requete->fetch())
    {
            echo "</br></br></br><img class='film__content' src='".$reponse['lien_img']."'>".$reponse['description'];
            
    }
    ?>
<video class="player" controls src="series/Breaking.Bad.S01E01.MULTi.720p.BluRay.DTS.AC3.x264.BoO.mp4" />
  <!-- Texte alternatif en cas de non prise en charge de la balise video -->
  <p class="warning">Le format *.mkv n'est pas pris en charge par votre navigateur</p>
</video>
<?php include ('footer.php');?>