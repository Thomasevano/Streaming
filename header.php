<?php
       session_start();
    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=streaming;charset=utf8","root","");
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    catch(Exception $e)
    {
        die("erreur de connection"). $e->getMessage();
    }   

?>
<!DOCTYPE html>
<html>
<head>
    <title>YouStream</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="icon" href="img/movie_play_red.png" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-func.js"></script>
    
</head>
<body>
<div id="shell">
  <div id="header">
    <h1 id="logo"><a href="index.php"><img src="img/cooltext181754367145917.png" alt="Image"/></a></h1>
      <div class="social"> <span>Réseaux Sociaux:</span>
      <ul>
        <li><a class="twitter" href="https://twitter.com/">Twitter</a></li>
        <li><a class="facebook" href="https://www.facebook.com/">Facebook</a></li>
      </ul>
        </div>
        <div id="navigation">
		<ul>
			<li><a href="index.php">Acceuil</a></li>
			<li><a href="films.php">Films</a></li>
			<li><a href="series.php">Séries</a></li>
			<li><a href="compte.php">Mon Compte</a></li>
		</ul>
        </div>
        <div id="sub-navigation">
    <nav>
    <ul>
    <li>
    <div class="head">
        <h1>Catégories</h1></br>
    </div>
    <?php include ('categorie.php')?>
    </li>
    </ul>
    </nav>
    <ul>
        <li><a href="films.php">Tous</a></li>
        <li><a href="index.php">Top Films</a></li>
        <?php
    if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
    {
        echo '<li><a href="logout.php">Se Déonnecter</a></li>';
        
        if(($_SESSION['abo']) == 2)
        {
        //echo "<li><a href='subscribe.php'>S'abonner</a></li>";
        echo "<li><a href='Unsub.php'>Me désabonner</a></li>";
        }
        else
        {
        //echo "<li><a href='Unsub.php'>Me désabonner</a></li>";
        echo "<li><a href='subscribe.php'>S'abonner</a></li>";
        }
        //echo "<li><a href='visionner.php'>Films/Séries Visionnées</a></li>";
        
    }
    else
    {
        echo '<li><a href="compte.php" class="connect">Connexion</a></li>';
        
        echo '<li><a href="register.php">Créer un compte</a></li>';
    }
        ?>
      </ul>
      <div id="search">
        <form action="#" method="get" accept-charset="utf-8">
          <label for="search-field">Chercher </label>
          <input type="text" name="search field" placeholder="Rechercher" id="search-field" class="blink search-field" required/>
          <input type="submit" value="GO!" class="search-button" />
        </form>
      </div>
    </div>
  </div>
	</nav></br>
    
    </body>