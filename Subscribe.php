<?php include ('header.php');

if(isset($_POST['submit']))
	{
		$fin_abon = $_POST['fin_abon'];
    
    }
$requete = $bdd->query("UPDATE user set fin_abon = '2' WHERE id_u = " .$_SESSION['id']); 

$requeteU = $bdd->query("SELECT * FROM user");
$reponseU = $requeteU->fetch();

            echo "<h3>Vous êtes maintenant abonné a notre service</h3>";
            echo "<a href='Unsub.php'>Me désabonner</a>";
session_destroy();
session_start();
header('location:index.php');
?>