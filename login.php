<?php require_once('connexion.php'); ?>


<?php
// get information from table
 	
// On d�finit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez tr�s bien interroger votre base de donn�es afin de savoir si le visiteur qui se connecte est bien membre de votre site

// on teste si nos variables sont d�finies
if (isset($_POST['login']) && isset($_POST['pwd'])) {
	
	// verifier s'il est admin oramge
	// on v�rifie les informations du formulaire, � savoir si le pseudo saisi est bien un pseudo autoris�, de m�me pour le mot de passe
	
	$result = mysqli_query($dbprotect,"SELECT * FROM admins WHERE user_name='" . $_POST["login"] . "' and pwd = '". $_POST["pwd"]."' ");
	$count  =mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	
	//$type=mysqli_query($dbprotect,"SELECT type FROM admins WHERE user_name='" . $_POST["login"] . "' and pwd = '". $_POST["pwd"]."' ");
	//$count_t  =mysqli_num_rows($type);
	//$ss = mysql_result($type);
	if($count!=0) {
		// dans ce cas, tout est ok, on peut d�marrer notre session
		// on la d�marre :)
		
		session_start ();
		// on enregistre les param�tres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['pwd'] = $_POST['pwd'];
		//$_SESSION["type"] =$ss;

		// on redirige notre visiteur vers une page de notre section membre
		header ('location: admin.php');
	}
	
	else {
		// Le visiteur n'a pas �t� reconnu comme �tant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Admin non reconnu...Veuillez verifier votre nom d-utilisateur et le mot de passe\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
}
else {
	echo '<meta http-equiv="refresh" content="0;URL=page_not_found.html">';
}
?>
 