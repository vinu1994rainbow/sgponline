<h1><?php echo $title;?></h1>
<div class="col-lg-6">
	<h3></h3>
	<div class="table-responsive">
		<table id="example" class="table table-bordered">
			 <form class="form-horizontal span6" action="index.php?q=lesson" method="POST" enctype="multipart/form-data">
			<tbody>
			
			<?php
			$bb = $_SESSION['Branch'];
			$ss = $_SESSION['Sem'];
		
			include('dbConfig.php');
				 $query = $db->query("SELECT * FROM cities where branch = '$bb' AND sem = '$ss'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="sub_name" id="sub_name">
        <option value="">Select Subject</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['sub_name'].'">'.$row['sub_name'].'</option>';
            }
        }else{
            echo '<option value="">Subject not available</option>';
        }
        ?>
		
			</tbody>
		</table>
		<div class="col-md-10">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Submit</button> 
                         </div>
		<form>
	</div>
</div>

</div>