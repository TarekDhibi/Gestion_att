<?php require_once('../connexion.php'); 
 ?>

<?php // get all rows from id here using cookies , name cookie= cin_
 /*
if(!isset($_COOKIE["cin_"])) {
	
    echo "Cookie named '" . "cin_". "' is not set!";
} else {
    echo "Cookie '" . "cin_" . "' is set!<br>";
    echo "Value is: " . $_COOKIE["cin_"];
} */



  	if(isset($_COOKIE["cin_"])) 
	{
		//echo $_COOKIE["cin_"];
		$userAnswer =$_COOKIE["cin_"]; 
  		$result = mysqli_query($dbprotect,"SELECT * FROM etudiants WHERE cin='" .$userAnswer."' ");
		$row = mysqli_fetch_assoc($result);
		//$numb=mysqli_num_rows($result);
		//echo $numb;
		$name=$row["nom"]; 
		$surname=$row["prenom"];
		$date=$row["date"];
		$place=$row["place"];
		$cin=$row["cin"];
		$inscrit=$row["inscrit"] ;
		$specialite=$row["specialite"] ; 
		//echo"$name";	
		//setcookie("cin_", "", time() - 3600);// delete the cookie
	}
	else{echo "cookies not set";}
?>
<html>
<head><title>Attestation de presence</title>
		<link rel="stylesheet" type="text/css" href="model1-A4.css">
		
		<script type="text/javascript">
		
 		window.onload = function() { window.print();
}
		//window.onafterprint = function(){alert("Printing completed...");} // only firefox
		// check the afterprint event 	
		
 	(function() {
		var beforePrint = function() {
				//console.log('Functionality to run before printing.');					
 			
			};
			var afterPrint = function() {
 				//alert("Printing completed...");
 				 //location.href = '../insert_print.php';
				 //	window.open("../insert_print.php","_self")
				window.open('../insert_print.php', 'test', 'width=400, height=200',"_self"); // pop up
				window.close();
			};

			if (window.matchMedia) {
				var mediaQueryList = window.matchMedia('print');
				mediaQueryList.addListener(function(mql) {
					if (mql.matches) {
						beforePrint();
					} else {
						afterPrint();
					}
				});
			}
			window.onbeforeprint = beforePrint;
			window.onafterprint = afterPrint;
		}());

	
		</script>
</head>
<body>
 <page size="A4">

<div class="border1">
	<div class="border-child">
		<div class="header">
			<div class="text-header">
			<p>République Tunisienne<br>******<br> Ecole Supérieure d'Ingénieurs Privé<br> De Gafsa <br>*******<br>
			Etablissement d'Eseignement <br>Supérieure  Privée Agréée Par l'Etat<br> Sous N° 05-2013</p>
			</div>
			 
			 <div class="logo">
			<img src="slide-1-img.png" width="200px">
			</div>
			
			<div class="text-header">
			<p>الجمهورية التونسية<br><br>******<br> المدرسة العليا الخاصة للمهندسين بقفصة<br><br>*******<br>
			مؤسسة جامعية خاصة مرخص لها من طرف<br>الدولة تحت عدد :05-2013</p>
			</div>
		</div>
		
		<div class="containt">
			<div class="titre-1">
				<h1> ATTESTATION DE PRESENCE <br>2016/2017<h1>
			</div>
			
			<div class="main">
				Le Directeur de <B>l'Ecole Supérieure d'Ingénieurs Privé De Gafsa</B> soussigné, atteste que l'étudiant(e):<br><br><br><br>
				<b>Nom:<?php echo " $name";?></b><br><br>
				<b>Prénom:<?php echo " $surname";?></b><br><br>
				<b>Né(e) Le: <?php echo " $date";?>&nbsp;&nbsp; à:<?php echo " $place";?> </b><br><br>
				<b>CIN:<?php echo " $cin";?></b><br><br>
				<b>Spécialité:<?php echo " $specialite";?></b><br><br>
				suit régulierement ses études pour l'année universitaire en cours.<br><br><br> 
				La présente attestation est délivrée à l'intéressé(e) pour servir et valoir ce que de droit.
			</div>
			
				
			<div class="side-box">
				<div class="box">
				<b>Gafsa Le:<?php $now = new DateTime();echo $now->format(' d-m-Y'); // MySQL datetime format?><br><br></b>
				<p><b>LE DIRECTEUR</b><br>
				Zamen BEN ROMDHANE</p>
				</div>
			</div>
			
		</div>
		
		<div class="footer">
		<p>
			<b>Ecole Supérieure d'Ingénieurs Privé De Gafsa: SA au capital de 2000000 TND. </b><br>
			<b>MF:</b> 000/M/A/1288848 <b>RC:</b> B1747902013<br>
			<b>Siége social: </b> Campus universitaire Sidi Ahmed Zarroug, 2112 Gafsa.<br>
			<b>Tél/Fax: </b>(+216) 76 211 930 - (+216) 23 344 817 <b>Site:</b> www.esip.tn <b>Email:</b> contact@esip.tn
			</p>
		</div>
		
 	</div>
 </div>
 

 </body>
</html>