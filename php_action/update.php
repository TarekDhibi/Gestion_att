<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
require_once('../connexion.php');
?> 

<?php
//insert.php
//echo "ahmed";
    //Create connection
 if(isset($_REQUEST))
 {
	  $id= $_POST['id'];
      $user_name = $_POST['u_name'];
      $pwd = $_POST['u_pwd'];
      $role= $_POST['u_user'];
  
      $sql = "UPDATE admins SET user_name='".$user_name."', pwd='".$pwd."',type='".$role."' where id= '".$id."'" ;
       
	   $query = mysqli_query($dbprotect, $sql);

      if($query){
          echo json_encode("Data Updated Successfully");
          }
      else {
          echo json_encode('problem');
          }
      }
	  else echo json_encode('problem2222222222222');

?>
 