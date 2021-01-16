
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
<script>
	 function printDiv() {
      var divToPrint = document.getElementById('table-search');
      newWin = window.open("");
      newWin.document.write(divToPrint.outerHTML);
      newWin.print();
      newWin.close();
   }
		
	 
</script>
  </head>
  <body>
  
  
  <!-- appel de page nav_bar -->
			<?php require "nav_bar.html"; ?>
		<!-- appel de page nav_bar -->
		
 		<!-- appel de page header -->
			<?php require "header.php"; ?>
		<!-- appel de page header -->

    <div class='content container-fluid' style="background-color:#fafafa;">
		
		<a href="#"><span class="fa fa-home"></span></a> / Import Data <hr>
	  <h1>Import</h1>
		
		 
					
			<?php
				//load the database configuration file
 
				if(!empty($_GET['status'])){
					switch($_GET['status']){
						case 'succ':
							$statusMsgClass = 'alert-success';
							$statusMsg = 'Students data has been inserted successfully.';
							break;
						case 'err':
							$statusMsgClass = 'alert-danger';
							$statusMsg = 'Some problem occurred, please try again.';
							break;
						case 'invalid_file':
							$statusMsgClass = 'alert-danger';
							$statusMsg = 'Please upload a valid CSV file.';
							break;
						default:
							$statusMsgClass = '';
							$statusMsg = '';
					}
				}
				?>
<div class="col-sm-12">				
    
	  <?php if(!empty($statusMsg)){ // show msg
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
     } ?>
	
	
    <div class="panel panel-default">
        <div class="panel-heading">
             List Des etudiants
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import</a> ||
            <button class="btn btn-warning btn-xs" href="#" onclick="printDiv()"><span class="fa fa-print "></span> Print All Table</button>
        </div>
        <div class="panel-body">
		
		<form class="form-inline" action="php_action/importData.php" method="post" enctype="multipart/form-data" id="importFrm" >
		 
		 <div class="form-group">
 			<div class="input-group">
			  
			  <input type="file" name="file"/>
			  
			</div>
		  </div>
		  <button type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
		  <span class="fa fa-upload "></span> Upload</button>
		
		
		</form>
		 
           
            <hr>
			<!-- importing table  -->
			<table   id="table-search" class="order-table table table-striped table-bordered table-list  ">
									  <thead>
										<tr>
  											<th>Id</th>
  											<th>Nom</th>
											<th>Prenom</th>
											<th>Date de naissance</th>
											<th>Place</th>
											<th>Cin</th>
											<th>Inscrit</th>
											<th>Specialite</th>
  										</tr> 
									  </thead>
									  <tbody>
											  <tr>
											  
																		<!-- Data from database to table -php--> 
											  <!-- Data from database to table -php--> 
											<?php
											$sql = "SELECT * FROM tria_eleves";
											$result = mysqli_query($dbprotect, $sql);
											$numb=mysqli_num_rows($result);
											if (mysqli_num_rows($result) > 0) {
												// output data of each row
												while($row = mysqli_fetch_assoc($result)) {
													echo "
													<tr>
														<td>" . $row["eleve_id"]. "</td> 
														<td>" . $row["nom"]. "</td> 
														<td>" . $row["prenom"]. "</td>
														<td>" . $row["date_naissance"]. "</td>
														<td>" . $row["lieu_naissance"]. "</td>
														<td>" . $row["numero_eleve"]. "</td>
														<td>" . $row["date_naissance"]. "</td>
														<td>" . $row["regime"]. "</td>
   													";	
													// here goes the php code for the button to print 
													
													//...
												}
											} else {
 												  echo '<div class="alert-danger"> 0 results </div>';
											}
											?>
											  </tr>
											</tbody>
									</table>
			
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
