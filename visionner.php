<?php include ('header.php');

if(isset($_POST['submit']))
	{
		$vu = $_POST['vu'];
    
    }
$requete = $bdd->query("INSERT INTO visionner (id_u, id_f, vu) VALUES ('".$_SESSION['id']."',  '".$_GET['id']."', '0')"); 

$requeteV = $bdd->query("SELECT * FROM visionner");
$reponseV = $requeteV->fetch();
header("Location:films.php");
?>