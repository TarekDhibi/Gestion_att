
<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
require_once('connexion.php');
?>
			<?php 
					$user_info = array(); // array
					$user_info2 = array(); // array
					$sql = "SELECT cin ,a_inscription FROM etudiants";
					$result = mysqli_query($dbprotect, $sql) or die ('SQL Error : '.mysql_error().'<br />');
					while ($datas = mysqli_fetch_assoc($result)) {   // fetching result to use_info array // fetching to array for javascript uses
						$user_info[] = $datas['cin'];
						$user_info2[] = $datas['a_inscription'];
					}
				?>
				
<html lang="en">
  <head>

    <title>DashBoard Menu </title>
	<link rel="stylesheet" type="text/css" href="css/essential.css">
	<link rel="stylesheet" type="text/css" href="css/style_elter.css">
	<link rel="stylesheet"  href="css/font-awesome.css">
     <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script  type='text/javascript' src='js/index.js' ></script>
<!-- popup window-->
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/rmodal.css" type="text/css" />
    <script type="text/javascript" src="js/rmodal.js"></script>
<!-- popup window-->
	<style type="text/css">
       .modal .modal-dialog {
        width: 400px;
      }
    </style>
	
 
		

		<script type="text/javascript">
		// disabling button 
		/*$(document).ready(function () {
			
				  	var jArray=[];
					var jArray2=[];
					var cin ;
					jArray= <?php echo json_encode($user_info ); ?>;
					jArray2= <?php echo json_encode($user_info2 ); ?>;
					
					for (var i = 0; i < jArray.length ; i++) {
					//alert(jArray[i]);
						if(jArray2[i]!=0)
						{	
							
							cin =jArray[i];
							//alert (cin);
							document.getElementById(cin).disabled = true;
						}
						
					}
		}*/
					</script>
					
					
				<script type="text/javascript">
					function reply_click(clicked_id)
					{
						var x=clicked_id;
						//alert(x);
						document.cookie ="cin_="+ x; // set the cin the id to cookies
 						//alert(document.cookie);  
					 }
					</script>
					
				
	<!-- popup window--> 
	<!-- search -->
	<script>
		function myFunction() {
		  // Declare variables 
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			} 
		  }
		}
		</script>
	<!-- search -->
  </head>
  <body>

		<!-- appel de page nav_bar -->
			<?php require "nav_bar.html"; ?>
		<!-- appel de page nav_bar -->
		
 		<!-- appel de page header -->
			<?php require "header.php"; ?>
		<!-- appel de page header -->

    <div class='content container-fluid' style="background-color:#fafafa;">
		

		
  
      				<a href="#"><span class="fa fa-home"></span></a> / DhashBoard <label style="text-transform: uppercase; "><?php echo  $_SESSION["type"] ?></label> <hr>
	  <h1> </h1>
	<div class="square_top">
			
		 <div class="col-lg-3 col-md-6">
                    <div class="panel_ps green "> <!-- changer la couleur de square grid ! custom style panel_ps - style_eter -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="images/attestation.png"  height="50" width="50" ></img>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<!-- echo the attestation de presence numbers-->
									<?php
										$sql1 = "SELECT count(*) as total FROM admins WHERE type ='admin'";
										$result1 = mysqli_query($dbprotect, $sql1);
										$data1=mysqli_fetch_assoc($result1);
										if ( $data1['total'] > 0) 
										{echo ($data1['total']);}else{echo "0";}
									?>
									 - <b>Admin</b>
									</div>
                                  
								  <div class="huge">
									<!-- echo the attestation de presence numbers-->
									<?php
										$sql = "SELECT count(*) as total FROM admins WHERE type='gestionnaire'";
										$result = mysqli_query($dbprotect, $sql);
										$data=mysqli_fetch_assoc($result);
										if ( $data['total'] > 0) 
										{echo ($data['total']);}else{echo "0";}
									?>
									 - <b>Gestionnaire</b>
									</div>
									
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-6">
                     <div class="panel_ps yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   <img src="images/attestation.png"  height="50" width="50" ></img>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<!-- echo the attestation de presence numbers-->
									<?php
										$sql = "SELECT SUM(a_presence) as total FROM etudiants";
										$result = mysqli_query($dbprotect, $sql);
										$data=mysqli_fetch_assoc($result);
										if ( $data['total'] > 0) 
										{echo ($data['total']);}else{echo "0";}
									?>
									</div>
                                    <div><b>Atesstation de presence</b></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
              </div>
			
			<div class="col-lg-3 col-md-6">
                     <div class="panel_ps blue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="images/attestation.png"  height="50" width="50" ></img>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									
									<!-- echo the attestation d'inscription numbers-->
									<?php
										$sql = "SELECT SUM(a_inscription) as total FROM etudiants";
										$result = mysqli_query($dbprotect, $sql);
										$data=mysqli_fetch_assoc($result);
										if ( $data['total'] > 0) 
										{echo ($data['total']);}else{echo "0";}
									?>
									
									</div>
                                    <div><b>Atesstation d'inscription</b> </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-6">
                     <div class="panel_ps red ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   <img src="images/35778-200-c.png"  height="50" width="50" ></img>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<!-- echo the students numbers-->
									<?php
										$sql = "SELECT * FROM etudiants";
										$result = mysqli_query($dbprotect, $sql);
										$numb=mysqli_num_rows($result);
										if (mysqli_num_rows($result) > 0) 
										{echo ($numb);}else{echo "0";}
									?>
									
									</div>
                                    <div><b>Etudiants</b></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
              </div>
			  
  		</div>

    
	  
	     <div class="col-sm-12"> <!-- table -->
        <div class="panel panel-default">
          <div class="panel-heading">Print Attestation</div>
          <div class="panel-body">
            <p>
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
		<button title=" Print all table"  onclick="printData()">Print</button>
		<div style="height:300px;overflow:auto; margin-bottom:10px;">
			
		 

			<!-- Data from database to table -php--> 
			<form  target="_blank">
				<table id="myTable">
				  <tr class="header">
					<th>Nom</th>
					<th>Prénom</th>
					<th>Date de naissance</th>
					<th>Place</th>
					<th>Cin</th>
					<th>Inscrit</th>
					<th>Spécialité</th>
					<th>A_Presence</th>
					<th>A_Inscription</th>
				  </tr>
				  
				  <!-- Data from database to table -php--> 
					  <!-- Data from database to table -php--> 
					<?php
					$sql = "SELECT * FROM etudiants";
					$result = mysqli_query($dbprotect, $sql);
					$numb=mysqli_num_rows($result);
					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
							<td>" . $row["nom"]. "</td> 
							<td>" . $row["prenom"]. "</td>
							<td>" . $row["date"]. "</td>
							<td>" . $row["place"]. "</td>
							<td> <input type=\"hidden\" name=\"td_1\" value=\"".$row["cin"]."\">".$row["cin"]."</td>
							<td>" . $row["inscrit"]. "</td>
							<td>" . $row["specialite"]. "</td>
							<td> <button  formmethod=\"post\" id=\"".$row["cin"]."\" onclick=\"form.action='models/model1-A4-print.php';reply_click(this.id)\"   type=\"submit\" title=\" Imprimer un attestation d'inscription pour cet etudiant\" class=\"btn-xs btn-inverse \"/><span class=\"fa fa-print\"></span> Print </button>.</td>
							<td> <button  formmethod=\"post\" id=\"".$row["cin"]."\" onclick=\"form.action='models/model1-A4-print-insciprtion.php';reply_click(this.id)\" type=\"submit\" title=\" Imprimer un attestation de presence pour cet etudiant\" class=\"btn-xs btn-inverse \"/><span class=\"fa fa-print\"></span> Print </button>.</td>
							";	
							// here goes the php code for the button to print 
							//...
						}
					} else {
						echo "0 results";
					}
					?>
				</form>
				<!-- 
				<td><button title=" Imprimer un attestation d'inscription pour cet etudiant" 
					class="btn-xs btn-inverse "/><span class="fa fa-print" ></span> Print </button></td> <!-- pour button print -->
					<!--
					<td><button title=" Imprimer un attestation de presence pour cet etudiant" 
					class="btn-xs btn-inverse "/><span class="fa fa-print" ></span> Print </button></td> <!-- pour button print -->
					
					</tr>
			<!-- Data from database to table -php--> 

			<!-- Data from database to table -php--> 
			
				
				</table>
		
			</p>
          </div>
		  <button class="btn btn-primary" title=" <?php echo " Il y a " .$numb ." Etudiants" ?> " >Afficher Tous...</button><span><?php echo " Il y a " .$numb ." Etudiants" ?></span>
		   

        </div>
      </div>
	  
	  </div>
	  
	       
		  
	   <!--
       <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">Admin Menu Content</div>
          <div class="panel-body">
            <p>
			
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">Admin Menu Content</div>
          <div class="panel-body">
            <p></p>
          </div>
        </div>
      </div>
    -->
 </div>
	 
	<script src='js/jquery_min.js' type='text/javascript'></script>
	<script src='js/boostrap.js' type='text/javascript'></script>
     <script src='js/SidebarNav.min.js' type='text/javascript'></script>
  <script>
      $('.sidebar-menu').SidebarNav()
    </script>

  </body>
</html>
