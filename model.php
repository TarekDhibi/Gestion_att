
<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
require_once('connexion.php');
?>
<html lang="en">
  <head>

    <title>Admin Menu </title>
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
		
				<a href="#"><span class="fa fa-home"></span></a> / Models <hr>
	  <h1>Models</h1>
		
			<div class="col-sm-6">
				<div class="panel panel-default">
				  <div class="panel-heading">Model attestation de presence</div>
					  <div class="panel-body">
						<p>
 						</p>
					  </div>
					</div>
				</div>
 			  <!-- -------------------------------- -->
			  <div class="col-sm-6">
				<div class="panel panel-default">
				  <div class="panel-heading">Model attestation d'inscription</div>
				  <div class="panel-body">
					<p>
 					</p>
				  </div>
				</div>
			  </div>
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
