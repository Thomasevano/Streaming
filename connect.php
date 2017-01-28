<?php
if(isset($_POST['submit']))
	{
		$login = $_POST['login'];
		$mdp = sha1($_POST['mdp']);
		
		$requete = $bdd->query("SELECT * FROM user
		                        WHERE mdp ='".$mdp."' 
								AND login ='".$login."'");
		if($reponse = $requete->fetch())
		{
			$_SESSION['connecte'] = true;
			$_SESSION['id'] = $reponse['id'];
			header("Location:index.php");
			die();
		}
        else
            echo"Login ou Mot de Passe incorrect";
	}
?>
<link rel="stylesheet" href="css/form.css" />
<aside class="form">
<form action="#" method="post">
<label for="login">Login:</label><input type="text" name="login"/></br>
    <label for="mdp">Password:</label><input type="password" name="mdp"/></br></br>
    <input type="submit" name="submit" value="Valider" /></br>
    <input type="reset" name="reset" value="Effacer"/>
</form>
</aside>
