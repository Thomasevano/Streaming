<?php include ('header.php');
	if(isset($_POST['submit']))
	{
		$login = $_POST['login'];
		$mdp = sha1($_POST['mdp']);
		$email = $_POST['email'];
		$i = 0;
		var_dump($_FILES); //contenu du tableau//
		//Vérification de l'avatar :
		if (!empty($_FILES['avatar']['size']))
		{
			
			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' ); //Liste des extensions valides
        
			if ($_FILES['avatar']['error'] > 0)
			{
				$avatar_erreur = "Erreur lors du transfert de l'avatar : ";
			}
			if ($_FILES['avatar']['size'] > 50000)
			{
                $i++;
                $avatar_erreur = "Le fichier est trop gros : <strong>".$_FILES['avatar']['size']." Octets</strong>";
			}
        
			
			$extension_upload = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
			if (!in_array($extension_upload,$extensions_valides) )
			{
                $i++;
				$avatar_erreur = "Extension de l'avatar incorrecte";
			}
		}
		if($i == 0)
		{
			//traitement
			$requete = $bdd->query("INSERT INTO user(login,mdp,email,lvl) 
			                        VALUES('".$login."','".$mdp."','".$email."',1)");
			$image_id = $bdd->lastInsertId();
			$image_name = $image_id.'.'.$extension_upload;
			move_uploaded_file($_FILES['avatar']['tmp_name'],'avatars/'.$image_name);
			$bdd->query("UPDATE user SET  avatar='avatars/$image_name' WHERE login = '".$login."'");
			$_SESSION['connecte'] = true;
			$_SESSION['id'] = $bdd->lastInsertId();
			echo "Votre inscription est reussi";
            session_destroy();
			header("Location:index.php");
		}
		else
		{
			echo $avatar_erreur;
		}
		
	}
?>
<link rel="stylesheet" href="css/form.css" />
<aside class="form">
<form action="#" method="post" enctype="multipart/form-data">
	<label for="login">Login: </label><input type="text" name="login" placeholder="Login" required /><br/>
	<label for="mdp">Password: </label><input type="password" name="mdp" placeholder="Password" required /><br/>
    <label for="email">Email: </label><input type="email" name="email" placeholder="email@gmail.com" required /><br/>
	<label for="avatar">Avatar: </label><input type="file" name="avatar" required/><br/>
	<input type="submit" name="submit" value="Valider" />
	<input type="reset" name="reset" value="Effacer"/>
</form>
</aside>