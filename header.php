
	<?php 
					$user_info = array(); // array
					$user_info2 = array(); // array
					$sql = "SELECT cin ,a_inscription FROM etudiants";
					$result = mysqli_query($dbprotect, $sql) or die ('SQL Error : '.mysql_error().'<br />');
					while ($datas = mysqli_fetch_assoc($result)) {   // fetching result to use_info array // fetching to array for javascript uses
						$user_info[] = $datas['cin'];
						$user_info2[] = $datas['a_inscription'];
						
					}
	// get the type of the user 
	$type=mysqli_query($dbprotect,"SELECT * FROM admins WHERE user_name='" . $_SESSION['login'] . "' and pwd = '". $_SESSION['pwd'] ."' ");
	//$count_t  =mysqli_num_rows($type);  
	$ss = mysqli_fetch_assoc($type);
	$_SESSION["type"] =$ss["type"];
	
				?>
 

<html lang="en">
  <head>

    <title>Admin Menu </title>
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

 <!-- sweet alert -->
 <script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
 <!-- sweet alert -->
 
	<style type="text/css">
       .modal .modal-dialog {
        width: 400px;
      }
    </style>
			
<!-- check radio button selected -->			
	 <script type="text/javascript">
		function show_info()
		{
			swal({
				  title: "Gestion des Attestations",
				  text: "Look Its Great.",
				  imageUrl: "images/esip.png"
				});

		}
		function clear_label() // vider le label en input focus
		{
			document.getElementById("cin_l").innerHTML=""; 
 
 		}

					 function reply_check()
					{
		
					var x = document.getElementById("dummyText").value;
					//alert(x);
					var jArray=[];
					var jArray2=[];
					jArray= <?php echo json_encode($user_info ); ?>;
					jArray2= <?php echo json_encode($user_info2 ); ?>;
 					var a = jArray.indexOf(x,0);
					if ( x.length!=8)
						document.getElementById("cin_l").innerHTML="Veillez saisie une CIN valide !";
					else if ( a==-1)
						document.getElementById("cin_l").innerHTML="L'etudiant avec cette CIN n'exsite pas !"; 
					else 
						{
							//alert(" exist");
							if(document.getElementById('p').checked) 
								{
									//alert("presence");
									document.cookie ="cin_="+ x; // set the cin the id to cookies
									window.open("models/model1-A4-print.php", "_blank");	
								}
								else if(document.getElementById('i').checked) 
								{				
								   //alert("inscription"); 
									   var p= jArray.indexOf(x); // position of the cin from jArray2 to get the number
									//alert("position: "+p);
									if ( jArray2[p]==0)
									{
										//document.getElementById("cin_l").innerHTML=" inprimer !";
										// check radio button checked and redirect the page 
										document.cookie ="cin_="+ x; // set the cin the id to cookies
										window.open("models/model1-A4-print-insciprtion.php", "_blank");
									}
									else if (jArray2[p]!=0) 
									{document.getElementById("cin_l").innerHTML=" allready has an attestation !";}
								}
						}
					}
					</script>
	
  </head>
  <body>
  
  
  
	
 		<div class="admin">
				<div class="logo">
					<a class="btn btn-inverse btn-block "  onClick="show_info()"  > <span class="fa fa-info"></span>nformation !</a>
				</div> 
		 
				<ul class="nav navbar-nav">
				
				
				<li class="active">
				 
				<a href="#"><span class="fa fa-id-card-o"></span> Attestation de presence <span class="sr-only">(current)</span></a>
				</li>
				<li><a href="#"><span class="fa fa-id-card-o"></span> Attestation de participation</a>
				</li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-newspaper-o"></span> Pages <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#"><span class="fa fa-user-o"></span>  Admins</a></li>
					<li><a href="#"><span class="fa fa-users"></span> Students</a></li>
					<li><a href="#"><span class="fa fa-id-card-o"></span> Attestations de presence</a></li>
					<li><a href="#"><span class="fa fa-id-card-o"></span> Attestations d'inscription</a></li>
					<li class="divider"></li>
					<li><a href="#"><span class="fa fa-table"></span> DataBase Tables</a></li>
					<li class="divider"></li>
					<li><a href="#"><span class="fa fa-home"></span> DashDoard</a></li>
				  </ul>
				</li>
				
				
				<li>
				<div class="info">
  				  <a title=" Imprimer un attestation pour un etudiant en utilisant CiN" type="button" href="#" id="showModal" class="btn btn-danger "><span class="fa fa-print"></span> Print by CIN</a> 
 				</div></li>
				
				 <!-- Modal -->
		   
		        <div class="row">	
					   <div id="modal" class="modal">
							<div class="modal-dialog animated">
								<div class="modal-content">
								<!-- submit the cin to print attestation -->
										
									
									<form class="form-horizontal" action="" method="post"  >
										<div class="modal-header">
											<strong>Print Attestation with CIN...</strong>
										</div>

										<div class="modal-body">
											<div class="form-group">
												<label for="dummyText" class="control-label col-xs-4">CIN</label>
												<div class="input-group col-xs-7">
													<input onfocus="clear_label()" type="number" name="dummyText" id="dummyText" class="form-control" />
												</div>
											</div>
										</div>
										
										 <!-- radio button -->
											<div class="pos-radio"> 
												 <div class="control-group">
													 Type :  
													<label class="control control--radio"> Presence 
														<input type="radio" id="p" name="radio" checked="checked" value="p"/>
													</label>
													<label class="control control--radio"> Inscription 
														<input type="radio" id="i"  name="radio" value="i"/>
													</label>
												</div> 
												</div>
												
												<label id="cin_l" class="" ></label>
										 <!-- radio button -->
											
											
										<div class="modal-footer">
											<button class="btn btn-default" type="button" onclick="modal.close();">Cancel</button>
											<button class="btn btn-primary"  type="button" onclick="reply_check();">Print</button>
											
											

										</div>
									</form>
							
							 
								</div>
								
							</div>
			</div>
				<!---->
				
				
			  </ul>
			
			
			  <ul class="nav navbar-nav navbar-right">

				<li class="dropdown">
				
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account <span class="caret"></span></a>
				  
				  <ul class="dropdown-menu" role="menu">
				 &nbsp; <label style="text-transform: uppercase; "><?php echo  $_SESSION["type"] ?></label>
					<li><a href="#"><span class="fa fa-user"></span> Profile</a></li>
					<li><a href="#"><span class="fa fa-envelope-o"></span> Contact</a></li>
					<li><a href="#"><span class="fa fa-cogs"></span> Settings</a></li>
					<li class="divider"></li>
					<li><a href="./logout.php"><span class="fa fa-power-off"></span> Log Out</a></li>
				  </ul>
				</li>
			  </ul>  
	  
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				
			  <div class="profile_pic"><img src="images/default-user-image.png" height="50" width="50" ></div>
				 
								 
				</li>
			  </ul> 
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
