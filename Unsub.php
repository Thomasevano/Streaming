<?php include ('header.php');

if(isset($_POST['submit']))
	{
		$fin_abon = $_POST['fin_abon'];
    }
$requete = $bdd->query("UPDATE user set fin_abon = '0' WHERE id_u = " .$_SESSION['id']);
session_destroy();
session_start();
header('location:index.php');
?>