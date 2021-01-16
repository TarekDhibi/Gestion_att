<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
require_once('../connexion.php');
?> 
<?php // add csv to databse table 

if(isset($_POST['importSubmit'])){
	/* 
	$row = 1;
		if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				echo "<p> $num champs à la ligne $row: <br /></p>\n";
				$row++;
				for ($c=0; $c < $num; $c++) {
					echo $data[$c] . "<br />\n";
				}
			}
			fclose($handle);
}
*/

     
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name']))
		{
            
        $row = 1;
		if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) { // , --> we read data seperated by ; not by , (text file)
				$num = count($data);
				//echo count($_FILES['file']['name']);
				echo "<p> $num champs à la ligne $row: <br /></p>\n";
				$row++;
				//echo $data[36];
				// affichage du donne 
				for ($c=0; $c < $num; $c++) {
					echo $data[$c]; echo "\n";
   				}//echo $data[0] . "<br>";
				 
				//insert into database 
				$prevQuery = "SELECT * FROM tria_eleves WHERE numero_eleve = '".$data["36"]."'";               
			    $query = mysqli_query($dbprotect, $prevQuery);
				  if($query){
					  echo ("Successfully");
					  
					  $a=mysqli_num_rows($query) ;
					echo "Nombre de ligne = ".$a;
					  }
				  else {
					  echo ('no one here ');
					  }
					  
				if(mysqli_num_rows($query) > 0){
					
                    //update member data  // problem in champ option -> change to option_e
					$sql_update="UPDATE tria_eleves SET 
					eleve_id = '".$data[0]."', nom = '".$data[1]."', prenom = '".$data[2]."',
					classe = '".$data[3]."' , lv1 = '".$data[4]."' , lv2 = '".$data[5]."' ,
					option_e  = '".$data[6]."', regime = '".$data[7]."' , date_naissance = '".$data[8]."' , lieu_naissance = '".$data[9]."' ,
					nationalite = '".$data[10]."', passwd = '".$data[11]."' , passwd_eleve = '".$data[12]."' , civ_1 = '".$data[13]."' ,
					nomtuteur = '".$data[14]."', prenomtuteur = '".$data[15]."' , adr1 = '".$data[16]."' , code_post_adr1 = '".$data[17]."' ,
					commune_adr1 = '".$data[18]."', tel_port_1 = '".$data[19]."' , civ_2 = '".$data[20]."' , nom_resp_2 = '".$data[21]."' ,
					prenom_resp_2 = '".$data[22]."', adr2 = '".$data[23]."' , code_post_adr2 = '".$data[24]."' , commune_adr2 = '".$data[25]."' ,
					tel_port_2 = '".$data[26]."', telephone = '".$data[27]."' , profession_pere = '".$data[28]."' , tel_prof_pere = '".$data[29]."' ,
					profession_mere = '".$data[30]."', tel_prof_mere = '".$data[31]."' , nom_etablissement = '".$data[32]."' , numero_etablissement = '".$data[33]."' ,
					code_postal_etablissement = '".$data[34]."', commune_etablissement = '".$data[35]."', numero_eleve = '".$data[36]."'
					WHERE numero_eleve = '".$data[36]."' " ;
					
					$sql_query_update = mysqli_query($dbprotect, $sql_update);
                    if ($sql_query_update) 
						echo " updated succesful";
					else echo "failed updating ";
                 }else
				 {//insert member data into database
					echo " stat isnert ";
					
					$sql_insert="INSERT INTO tria_eleves (nom, prenom, classe, lv1, lv2, option_e,regime,date_naissance,lieu_naissance,nationalite,passwd,passwd_eleve,civ_1,nomtuteur,
					prenomtuteur,adr1,code_post_adr1,commune_adr1,tel_port_1,civ_2,nom_resp_2,prenom_resp_2,adr2,code_post_adr2,commune_adr2,
					tel_port_2,telephone,profession_pere,tel_prof_pere,profession_mere,tel_prof_mere,nom_etablissement,numero_etablissement,
					code_postal_etablissement,commune_etablissement,numero_eleve)
					VALUES (
					'".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."'
					,'".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".$data[9]."'
					,'".$data[10]."','".$data[11]."','".$data[12]."','".$data[13]."','".$data[14]."'
					,'".$data[15]."','".$data[16]."','".$data[17]."','".$data[18]."','".$data[19]."'
					,'".$data[20]."','".$data[21]."','".$data[22]."','".$data[23]."','".$data[24]."'
					,'".$data[25]."','".$data[26]."','".$data[27]."','".$data[28]."','".$data[29]."'
					,'".$data[30]."','".$data[31]."','".$data[32]."','".$data[33]."','".$data[34]."'
					,'".$data[35]."','".$data[36]."')";
					
					$sql_query_insert = mysqli_query($dbprotect,$sql_insert);
                    if ($sql_query_insert) 
						echo " inserting succesful";
					else echo "failed-inserting ";
                } 
				
				
 				
			}
			fclose($handle);
 			} // while
    
            } // if uploaded 
          $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
		echo " file not set ";    
		} 


//redirect to the listing page
header("Location: ../import.php".$qstring);
 
 /* 
 
 $prevQuery = "SELECT * FROM tria_eleves WHERE numero_eleve = '".$data["37"]."'";               
			    $query = mysqli_query($dbprotect, $prevQuery);
				  if($query){
					  echo ("Successfully");
					  }
				  else {
					  echo ('no one here ');
					  }
				if(mysqli_num_rows($query) > 0){
                    //update member data
                    if (mysqli_query($dbprotect,"UPDATE tria_eleves SET 
					eleve_id = '".$data[0]."', nom = '".$data[1]."', prenom = '".$data[2]."',
					classe = '".$data[3]."' , lvl1 = '".$data[4]."' , lvl2 = '".$data[5]."'
					option  = '".$data[6]."', regime = '".$data[7]."' , date_naissance = '".$data[8]."' , lieu_naissance = '".$data[9]."'
					nationalite = '".$data[10]."', passwd = '".$data[11]."' , passwd_eleve = '".$data[12]."' , civ_1 = '".$data[13]."'
					nomtuteur = '".$data[14]."', prenomtuteur = '".$data[15]."' , adr1 = '".$data[16]."' , code_post_adr1 = '".$data[17]."'
					commune_adr1 = '".$data[18]."', tel_port_1 = '".$data[19]."' , civ_2 = '".$data[20]."' , nom_resp_2 = '".$data[21]."'
					prenom_resp_2 = '".$data[22]."', adr2 = '".$data[23]."' , code_post_adr2 = '".$data[24]."' , commune_adr2 = '".$data[25]."'
					tel_port_2 = '".$data[26]."', telephone = '".$data[27]."' , profession_pere = '".$data[28]."' , tel_prof_pere = '".$data[29]."'
					profession_mere = '".$data[30]."', tel_prof_mere = '".$data[31]."' , nom_etablissement = '".$data[32]."' , numero_etablissement = '".$data[33]."'
					code_postal_etablissement = '".$data[34]."', commune_etablissement = '".$data[35]."', numero_eleve = '".$data[36]."' 
					WHERE numero_eleve = '".$data[36]."' ")) echo " updated succesful";
                 }else{
                    //insert member data into database
                    if(mysqli_query($dbprotect,"INSERT INTO tria_eleves 
					(nom, prenom, classe, lvl1, lvl2, option,regime,date_naissance,lieu_naissance,nationalite,passwd,passwd_eleve,civ_1,nomtuteur,
					prenomtuteur,adr1,code_post_adr1,commune_adr1,tel_port_1,civ_2,nom_resp_2,prenom_resp_2,adr2,code_post_adr2,commune_adr2,
					tel_port_2,telephone,profession_pere,tel_prof_pere,profession_mere,tel_prof_mere,nom_etablissement,numero_etablissement,
					code_postal_etablissement,commune_etablissement,numero_eleve) 
					VALUES 
					('".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."'
					,'".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".$data[9]."'
					,'".$data[10]."','".$data[11]."','".$data[12]."','".$data[13]."','".$data[14]."'
					,'".$data[15]."','".$data[16]."','".$data[17]."','".$data[18]."','".$data[19]."'
					,'".$data[20]."','".$data[21]."','".$data[22]."','".$data[23]."','".$data[24]."'
					,'".$data[25]."','".$data[26]."','".$data[27]."','".$data[28]."','".$data[29]."'
					,'".$data[30]."','".$data[31]."','".$data[32]."','".$data[33]."','".$data[34]."'
					,'".$data[35]."','".$data[36]."'
					)")) echo " add succ";
                }
 
 
 */
?>



 