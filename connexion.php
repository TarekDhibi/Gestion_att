
<?php // connexion avec la base de donn�e oramge
$hostname_dbprotect = "localhost"; // nom ou ip de votre serveur
$database_dbprotect = "Gestion_des_attestations"; // nom de votre base de donn�es
$username_dbprotect = "root"; // nom d'utilisateur (root par d�faut) !!! ATTENTION, en utilisant root, vos visiteurs on tout les droits sur la base
$password_dbprotect = ""; // mot de passe (aucun par d�faut mais il est fortement recommand� d'en mettre un ... sinon, � quoi bon la s�curit� ?)
$dbprotect = mysqli_connect($hostname_dbprotect, $username_dbprotect, $password_dbprotect,$database_dbprotect) or trigger_error(mysql_error(),E_USER_ERROR); 
?> <?php define( 'RESTRICTED', true ); ?> 