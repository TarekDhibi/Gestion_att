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
<!-- popup window-->
		<!-- scirot search-->
		<script>
					(function(document) {
				'use strict';

				var LightTableFilter = (function(Arr) {

					var _input;

					function _onInputEvent(e) {
						_input = e.target;
						var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
						Arr.forEach.call(tables, function(table) {
							Arr.forEach.call(table.tBodies, function(tbody) {
								Arr.forEach.call(tbody.rows, _filter);
							});
						});
					}

					function _filter(row) {
						var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
						row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
					}

					return {
						init: function() {
							var inputs = document.getElementsByClassName('light-table-filter');
							Arr.forEach.call(inputs, function(input) {
								input.oninput = _onInputEvent;
							});
						}
					};
				})(Array.prototype);

				document.addEventListener('readystatechange', function() {
					if (document.readyState === 'complete') {
						LightTableFilter.init();
					}
				});

			})(document);
		</script>
		<!-- scirot search end-->
  </head>
  <body>
  
  <!-- appel de page nav_bar -->
			<?php require "nav_bar.html"; ?>
		<!-- appel de page nav_bar -->
		
 		<!-- appel de page header -->
			<?php require "header.php"; ?>
		<!-- appel de page header -->

    <div class='content container-fluid' style="background-color:#fafafa;">
		
				<a href="#"><span class="fa fa-home"></span></a> / Liste des etudiants <hr>
	  <h1> Liste des etudiants</h1>
	<div class="square_top">
      <div class="col-sm-12">
		<div class="panel panel-default">
 
 
								<div class="panel panel-default panel-table">
								  <div class="panel-heading">
									<div class="row">
			

									  <div class="col col-xs-6">
										<h3 class="panel-title">Liste des etudiants</h3>
										<span><a class="btn btn-primary"  title="Add" ><em class="fa fa-plus"></em></a></span>
									  </div>
										
									  <div class="col col-xs-6 text-right">
											
											<div class="a-search" >
											<input type="text" class="light-table-filter" data-table="order-table"  placeholder="Search..">
											</div>	
											
									  </div>
										 
									</div>
								  </div>
								  <div class="panel-body">
						

									<table id="table-search" class="order-table table table-striped table-bordered table-list  ">
									  <thead>
										<tr>
											<th><em class="fa fa-cog"></em></th>
											<th class="hidden-xs">ID</th>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Date de naissance</th>
											<th>Place</th>
											<th>Cin</th>
											<th>Inscrit</th>
											<th>Spécialité</th>
											<th>Inscription</th>
											<th>Presence</th>
										</tr> 
									  </thead>
									  <tbody>
											  <tr>
											  
																		<!-- Data from database to table -php--> 
											  <!-- Data from database to table -php--> 
											<?php
											$sql = "SELECT * FROM etudiants";
											$result = mysqli_query($dbprotect, $sql);
											$numb=mysqli_num_rows($result);
											if (mysqli_num_rows($result) > 0) {
												// output data of each row
												while($row = mysqli_fetch_assoc($result)) {
													echo "
													<tr>
														<td align=\"center\">
													    <a class=\"btn btn-default\"  title=\" Modifier\"><em class=\"fa fa-pencil\"></em></a>
													    <a class=\"btn btn-primary\"  title=\" Supprimer\" ><em class=\"fa fa-trash\"></em></a>
														</td>
														<td>" . $row["id"]. "</td> 
														<td>" . $row["nom"]. "</td> 
														<td>" . $row["prenom"]. "</td>
														<td>" . $row["date"]. "</td>
														<td>" . $row["place"]. "</td>
														<td>" . $row["cin"]. "</td>
														<td>" . $row["inscrit"]. "</td>
														<td>" . $row["specialite"]. "</td>
														<td>" . $row["a_inscription"]. "</td>
														<td>" . $row["a_presence"]. "</td>
 													";	
													// here goes the php code for the button to print 
													
													//...
												}
											} else {
												echo "0 results";
											}
											?>
											  </tr>
											</tbody>
									</table>
								
								  </div>
								  <div class="panel-footer">
									<div class="row">
									  <div class="col col-xs-4">Page 1 of 5
									  </div>
									  <div class="col col-xs-8">
										<ul class="pagination hidden-xs pull-right">
										  <li><a href="#">1</a></li>
										  <li><a href="#">2</a></li>
										  <li><a href="#">3</a></li>
										  <li><a href="#">4</a></li>
										  <li><a href="#">5</a></li>
										</ul>
										<ul class="pagination visible-xs pull-right">
											<li><a href="#">«</a></li>
											<li><a href="#">»</a></li>
										</ul>
									  </div>
									</div>
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
