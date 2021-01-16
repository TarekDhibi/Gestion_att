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
      $user_name = $_POST['name'];
      $pwd = $_POST['pwd'];
      $role= $_POST['user'];
      $date=date('Y-m-d' );
      $sql = "INSERT INTO admins (user_name, pwd, type, date) VALUES ('".$user_name."', '".$pwd."', '".$role."', '".$date."')";

      $query = mysqli_query($dbprotect, $sql);

      if($query){
          echo json_encode("Data Inserted Successfully");
          }
      else {
          echo json_encode('problem');
          }
      }
	  else echo json_encode('problem2222222222222');

?>
 