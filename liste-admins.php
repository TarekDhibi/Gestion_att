
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

		
	<link rel="stylesheet" type="text/css" href="css/boostrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.bootgrid.css">
    <script src='js/jquery_min.js' type='text/javascript'></script>
    <script src='js/bootstrap.min.js' type='text/javascript'></script>
    <script src='js/jquery.bootgrid.js' type='text/javascript'></script>
    <script src='js/notify.js' type='text/javascript'></script>
	
	<!-- SweetAlert style -->
    <link rel="stylesheet" href="css/sweetalert/sweetalert.css">
 
<!-- responsive datatables -->
     <link rel="stylesheet" href="css/datatables/extensions/Responsive/css/dataTables.responsive.css">
 
<!-- ........ content ............. -->
  
<!-- Bootstrap-notify -->
<script src="css/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="css/datatables/jquery.dataTables.min.js"></script>
<script src="css/datatables/dataTables.bootstrap.min.js"></script>
  

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
		  
		  
	
			 
 </head>
<body>
   <!-- appel de page nav_bar -->
			<?php require "nav_bar.html"; ?>
		<!-- appel de page nav_bar -->
		
 		<!-- appel de page header -->
			<?php require "header.php"; ?>
		<!-- appel de page header -->
	
	
	
	
	  <div class='content container-fluid' style="background-color:#fafafa;">
		
				<a href="#"><span class="fa fa-home"></span></a> / Liste des utilisateurs <hr>
	  <h1> Liste des Admin</h1>
	<div class="square_top">
      <div class="col-sm-12">
		<div class="panel panel-default">
 
 
								<div class="panel panel-default panel-table">
								  <div class="panel-heading">
									<div class="row">
			

									  <div class="col col-xs-6">
										<h3 class="panel-title">Gerer les utilisateurs</h3>
			<button id="btn-add" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add User</button>
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
											<th>User Name</th>
											<th>Password</th>
											<th>type</th>
											<th>Date D'ajout</th>

										</tr> 
									  </thead>
									  <tbody>
											  <tr>
											  
																		<!-- Data from database to table -php--> 
											  <!-- Data from database to table -php--> 
											<?php
											$sql = "SELECT * FROM admins";
											$result = mysqli_query($dbprotect, $sql);
											$numb=mysqli_num_rows($result);
											if (mysqli_num_rows($result) > 0) {
												// output data of each row
												while($row = mysqli_fetch_assoc($result)) {
													echo "
													<tr id='".$row["id"]."'>
														<td  align=\"center\">
													    <a  data-toggle=\"modal\" data-target=\"#UpdateModal\"  id='".$row["id"]."' class=\"btn btn-default update_row \"  title=\" Modifier\"><em class=\"fa fa-pencil\"></em></a>
													    <a id='".$row["id"]."' class=\"btn btn-primary delete_row \"  title=\" Supprimer\" ><em class=\"fa fa-trash\"></em></a>
														</td>
														<td class=\"nr_id\" >" . $row["id"]. "</td> 
														<td class=\"nr_user\" >" . $row["user_name"]. "</td> 
														<td class=\"nr_pwd\" >" . $row["pwd"]. "</td>
														<td class=\"nr_type\" >" . $row["type"]. "</td>
														<td>" . $row["date"]. "</td>

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
 

	<!-- ------- add modal--->

<div class="modal fade" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insert_form">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">User Name:</label>
            <input  type="text" class="form-control" name="user_name" id="user_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Password:</label>
            <input type="password" class="form-control" name="pwd" id="pwd">
          </div>
		  
		  <div class="form-group">
            <label for="message-text" class="form-control-label">Role:</label>

			   <p>
 				   <input type="radio" name="user" value="admin" id="user" /> <label for="moins15">Admin</label><br />
				   <input type="radio" name="user" value="gestionnaire" id="user" checked /> <label for="medium15-25">Gestionnaire</label><br />
  			   </p>			
	<span id="error_message" class="text-danger"></span>
	<span id="success_message" class="text-success"></span>
            </div>
			
		   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="insert" value="add" id="insert"   class="btn btn-primary">Add user</button>
     
	 </div>
        </form>
      </div>
     
    </div>
  </div>
</div>



	<!-- ------- update modal--->

<div class="modal fade" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_form">
		
		<div class="form-group">
            <label for="recipient-name" class="form-control-label">User Id:</label>
            <input disabled type="text" class="form-control" name="user_id" id="user_id">
          </div>
		  
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">User Name:</label>
            <input  type="text" class="form-control" name="update_user_name" id="update_user_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Password:</label>
            <input type="text" class="form-control" name="update_pwd" id="update_pwd">
          </div>
		  
		  <div class="form-group">
            <label for="message-text" class="form-control-label">Role:</label>

			   <p>
 				   <input type="radio" name="update_user" value="admin" id="update_user" /> <label for="moins15">Admin</label><br />
				   <input type="radio" name="update_user" value="gestionnaire" id="update_user" checked /> <label for="medium15-25">Gestionnaire</label><br />
  			   </p>			
	<span id="error_message_update" class="text-danger"></span>
	<span id="success_message_update" class="text-success"></span>
            </div>
			
		   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update" value="update" id="update"   class="btn btn-primary">Update</button>
     
	 </div>
        </form>
      </div>
     </div>
  </div>
</div>



	    <script>
      $(document).ready(function () {
        $("#insert").click(function (e) {
			e.preventDefault();
           // alert('Please wait while form is submitting');
		  
          var user_name = $('#user_name').val();
          var pwd_u = $('#pwd').val();
          var role = $('#user').val();
			if ( user_name=='' || pwd_u=='')
			{
				 //alert('Please wait while form is submitting');
				$('#error_message').html("All fields are required");
			}else 
			{	$('#error_message').html('');
						
				$.ajax({
				data:{name:user_name,pwd:pwd_u,user:role},
				 type: "POST",
				 url: "php_action/insert.php",
				 success: function(data){
					 // alert("Data Save: " + data);	
						$('#success_message').html("Data Inserted");
 						location.reload();
					}
				
				  });
				 
			}
		  
        });
		
		// delete button 
			$('.delete_row').click(function(){
				 /* var r = confirm("Deleting Confirmation!");
				if (r == true) { // ok 
 					
						var del_id= $(this).attr('id');
							alert("Delete the row id = " + del_id);
							
							$.ajax({
									data:"id="+del_id,
									 type: "POST",
									 url: "php_action/delete.php",
									 success: function(data){
										 // alert("Data Save: " + data);	
											alert("Deleted ++ ");
 										}
									  });
							
				} else {  // no
				
 				}
				 */
				 var del_id= $(this).attr('id');		
				swal({
					  title: "Delete This User ?",
					  text: "Press Delete To Delete The User",
					  type: "error",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true,
					},
					function(){		
							$.ajax({
									data:"id="+del_id,
									 type: "POST",
									 url: "php_action/delete.php",
									 success: function(data){
										 // alert("Data Save: " + data);	
										 //alert("Deleted ++ ");
										 //on success, hide  element user wants to delete.
								      $("#"+del_id).remove(); // delete the row	
									}
							});
									  
					  setTimeout(function(){
						swal("User Deleted!");			  
					  }, 2000);
					  			  
									  
					}); 
						
		});
					
					
			// update button 
			$('.update_row').click(function(){
							var del_id= $(this).attr('id');
							// alert("Update the row id = " + del_id);
					// set the values into modal inputs 
					document.getElementById("user_id").value = del_id;
					 var $row = $(this).closest("tr");    // Find the row
					 var $up_id = $row.find(".nr_id").text(); // Find the id
					 var $user = $row.find(".nr_user").text(); // Find the user name
					 var $pwd = $row.find(".nr_pwd").text(); // Find the password
					 var $type = $row.find(".nr_type").text(); // Find the type
						// Let's test it out
						//alert($user);
						//alert($pwd);
						//alert($type);
					// set the values into modal inputs 
					document.getElementById("update_user_name").value = $user;					 
					document.getElementById("update_pwd").value = $pwd;					 
					   $("input[value='" + $type + "']").prop('checked', true);					 
 					
									
					});
			//update user the modal side 
			$("#update").click(function (e) {
			e.preventDefault();
          
		  // alert('update clicked');
		  var up_id = $('#user_id').val();
          var user_name = $('#update_user_name').val();
          var pwd_u = $('#update_pwd').val();
          var role = $('#update_user').val();
 			if ( user_name=='' || pwd=='')
			{
				 //alert('Please wait while form is submitting');
				$('#error_message').html("All fields are required");
			}else 
			{	$('#error_message').html('');
				
				$.ajax({
				 data:{id:up_id,u_name:user_name,u_pwd:pwd_u,u_user:role},
				 type: "POST",
				 url: "php_action/update.php",
				 success: function(data){
					 // alert("Data Save: " + data);	
						$('#success_message_update').html("Data Updated");
						// dismiss the modal after 1500ms
						setTimeout(function(){
						$('#UpdateModal').modal('hide');
						location.reload();
						}, 1500);
						
						// update table values relaod :-( 						
						
 					}
				  
	   
				  });
				 
			} 
		  
        });
		
					
					
		
      });
    </script>
			 
 

</body>
</html>
