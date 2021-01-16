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
      $id = $_POST['id'];
      $sql = "DELETE FROM admins WHERE id='".$id."' ";
      $query = mysqli_query($dbprotect, $sql);

      if($query){
          echo json_encode("Deleted Successfully");
          }
      else {
          echo json_encode('problem');
          }
      }
	  else echo json_encode('problem2222222222222');

?>
 