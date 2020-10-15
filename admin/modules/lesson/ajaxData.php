<?php
//Include database configuration file
include('dbConfig.php');


if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $query = $db->query("SELECT * FROM states ORDER BY state_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Sem</option>';
        while($row = $query->fetch_assoc()){ 
          echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
        }
    }else{
      echo '<option value="">Sem not available</option>';    }
}


if(isset($_POST["stateID"]) && !empty($_POST["stateID"])){
	$branch=$_POST["countryID"];
	
    //Get all city data
	
    $query = $db->query("SELECT * FROM cities WHERE branch=".$_POST['countryID']." AND sem=".$_POST['stateID']."");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select Subject</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['sub_name'].'">'.$row['sub_name'].'</option>';
        }
    }else{
        //echo '<option value="">Branch not available</option>';
		echo $_POST['countryID'];
    }
}
?>