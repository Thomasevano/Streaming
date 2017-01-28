<?php
    
    $requete = $bdd->query("SELECT count(*) AS nb FROM films");
    $reponse = $requete->fetch();
    $nb_films = $reponse['nb'];
    $parPage = 3;
    $nb_pages = ceil($nb_films / $parPage);
    /*if(issset($_GET['page']))//condition
        $deb = (int)$_GET['page'];//cast en int
    else
        $deb = 0;*/
    //ternaire
    $page = isset($_GET['page'])?(int)$_GET['page']:0;
    $deb = isset($_GET['page'])?(($page-1)) * $parPage:0;
    //LIMIT ".$deb.",".$parPage."");//
    if($page == 1)
        echo"&lt;&lt; ";//Précédent
    else
        echo "<a href='index.php?page=".($page-1)."'>&lt;&lt;</a> ";

    for($i = 1 ; $i <= $nb_pages; $i++)
    {
        if ($i == $page)
            echo ".$i.";
        else
            echo " <a href='index.php?page=".$i."'>".$i."</a>";
    }
    if($page == $nb_pages)
        echo "&gt;&gt; ";//Suivant
    else
        echo "<a href='index.php?page=".($page+1)."'>&gt;&gt; </a>";
?>