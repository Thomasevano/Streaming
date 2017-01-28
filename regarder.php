<?php include ('header.php');

if(isset($_POST['submit']))
	{
		$vu = $_POST['vu'];
    
    }
$requete = $bdd->query("INSERT INTO regarder (id_u, id_e, vu) VALUES ('".$_SESSION['id']."',  '".$_GET['id']."', '0')"); 

$requeteV = $bdd->query("SELECT * FROM regarder");
$reponseV = $requeteV->fetch();
header("Location:series.php");
?>