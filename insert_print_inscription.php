
<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
require_once('connexion.php');
?>

<?php 
 // get the ajax request
 if(isset($_COOKIE["cin_"])) 
	{
			$userAnswer =$_COOKIE["cin_"]; 
			//$userAnswer ="09987673";
			// check the attestation type and make the request 
			echo " Attestation d'inscription ";
			$sql="UPDATE etudiants SET a_inscription= a_inscription+1  WHERE cin='" .$userAnswer."' ";
		
			setcookie("cin_", "", time() - 3600);// delete the cookie
			$result = mysqli_query($dbprotect, $sql);
			if($result){
			echo "Table updated.";
			$message=1;
			}
			$user_name=$_SESSION['login'];
			$type=$_SESSION['type'];
			$type_attestation="Inscription";
			$etudiant=$userAnswer;
 			$date=date('d/m/Y  H:i:s' );
 			$date_now=date('Y-m-d');
			$sql_insert="INSERT INTO historique(user_name,type,type_attestation,etudiant,date,date_now)VALUES('".$user_name."','".$type."','".$type_attestation."','".$etudiant."','".$date."','".$date_now."')";
			//$sql_insert="INSERT INTO historique(user_name,type,type_attestation,etudiant,date,date_now)VALUES('','','','','')";
			$result_insert = mysqli_query($dbprotect,$sql_insert);
			if($result_insert){
			echo "insert historique.";
 			}else {echo"failed historique."; 
 			}
 
	}
	else{echo "cookies not set"; $message=0;
  	}
?>
<html>
<head><title> Impression avec succee</title>
		<link rel="stylesheet"  href="css/bootstrap.min.css">
		<link rel="stylesheet"  href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style_elter.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	
		<script type="text/javascript">
		
			var message;
			message = <?php echo json_encode($message); ?>;
			//alert(message);
		
		if(message==1)
		{
		//	alert("Impression avec succee");
 		
		}
		else 
		{ //	alert("Impression failed");
			
  		}
		</script>
		
</head>
<body> 

</body>
</html>