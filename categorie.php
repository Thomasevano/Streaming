<?php

    $requete = $bdd->query("SELECT * FROM categorie");

    while($categorie = $requete->fetch())
    {
            echo "<a href='voircategorie.php?id=".$categorie['id_c']."'<a/>".$categorie['titre']."";
    }
    ?>
