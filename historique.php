
<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
require_once('connexion.php');
?>  

<html lang="en">
  <head>

    <title>Historique </title>
	<link rel="stylesheet" type="text/css" href="css/essential.css">
	<link rel="stylesheet" type="text/css" href="css/style_elter.css">
	<link rel="stylesheet"  href="css/font-awesome.css">
     <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src='js/index.js' type='text/javascript'></script>
<!-- popup window-->
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/rmodal.css" type="text/css" />
    <script type="text/javascript" src="js/rmodal.js"></script>
	<!-- called file for the table -->
	 <link rel="stylesheet" href="css/boostrap.min.css" type="text/css" />
	 <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" type="text/css" />
	<script src='js/jquery.dataTables.min.js' type='text/javascript'></script>
	<script src='js/dataTables.bootstrap.min.js' type='text/javascript'></script>
	
	<!-- called file for the table -->
 
	
	<style type="text/css">
       .modal .modal-dialog {
        width: 400px;
      }
    </style>

  </head>
  <body>
  
  
  <!-- appel de page nav_bar -->
			<?php require "nav_bar.html"; ?>
		<!-- appel de page nav_bar -->
		
 		<!-- appel de page header -->
			<?php require "header.php"; ?>
		<!-- appel de page header -->

    <div class='content container-fluid' style="background-color:#fafafa;">
		
				<a href="#"><span class="fa fa-home"></span></a> / Historique <hr>
	  <h1>Historique</h1>
		
		<div class="col-sm-12">
			
			<?php
					$sql = "SELECT * FROM historique ORDER BY id DESC ;";
					$result = mysqli_query($dbprotect, $sql);
					$numb=mysqli_num_rows($result);
					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
							echo "<div class=\"hist\">".$row["type"]." " .$row["user_name"]." a imprimer une attestation de ".$row["type_attestation"].
									" pour Etudiant ".$row["etudiant"] 
									."<span style=\"float:right; font-style: italic;\" > <a href=\"#\">Voir detail</a>&nbsp; <a href=\"#\">Supprimer</a>&nbsp; &nbsp;[ ".$row["date"]." ]</span>
									</div>";	
							// here goes the php code for the button to print 
							//...
						}
					} else {
						echo "<div class=\"hist\"> 0 results </div>";
					}
					?>
					
			<!--
			<div class="hist">Admin X a imprimer une attestation de X pour Etudiant X
			<span style="float:right; font-style: italic;" > <a href="#">Voir detail</a>&nbsp; <a href="#">Supprimer</a>&nbsp; &nbsp;  06/04/2017</span>
			</div>
			<div class="hist">eazeaz</div>
			<div class="hist">eazeaz</div>
			<div class="hist">eazeaz</div>
			-->
			
			
		</div>
	  
 			
	  </div>

	<script src='js/jquery_min.js' type='text/javascript'></script>
	<script src='js/boostrap.js' type='text/javascript'></script>
     <script src='js/SidebarNav.min.js' type='text/javascript'></script>
  <script>
      $('.sidebar-menu').SidebarNav()
    </script>
  
  </body>
</html>
