<?php include ('header.php');

    $requete = $bdd->query("SELECT * FROM episodes
                        WHERE id_e=3");

 while($reponse = $requete->fetch())
    {
            echo "</br></br></br><img class='film__content' src='".$reponse['lien_img']."'>".$reponse['description'];
            
    }
    ?>
<video class="player" controls src="series/The.Walking.Dead.S01E01.mp4" />
  <!-- Texte alternatif en cas de non prise en charge de la balise video -->
  <p class="warning">Le format n'est pas pris en charge par votre navigateur</p>
</video>
<?php include ('footer.php');?>