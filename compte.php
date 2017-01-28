<?php include('header.php');
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
{
    echo "<img class='avatar' src='".$_SESSION['avatar']."'/><h3>Vous êtes connecter en tant que ".$_SESSION['login']."</h3>";
    
    if(($_SESSION['abo']) == 0)
        {
        echo "<h3>Vous n'êtes pas membre Premium</h3>";
        }
        else
        {
            echo "<h3>Vous êtes membre Premium</h3>";
        }
}
else
{?>
<div class="form">
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
			$_SESSION['id'] = $reponse['id_u'];
            $_SESSION['login'] = $reponse['login'];
            $_SESSION['avatar'] = $reponse['avatar'];
            $_SESSION['abo'] = $reponse['fin_abon'];
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
</br>
<h3><a href="register.php">Créer un compte</a></h3>
</div>
<?php
}
include ('footer.php');?>