 <head>
 <link type="text/css" rel="stylesheet" href="css/style.css" />


<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Branch first</option>');
            $('#city').html('<option value="">Select Sem first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
		var countryId=$("#country").val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:{"stateID":stateID,"countryID":countryId},
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select Sem first</option>'); 
        }
    });
});
</script>
</head>


                    <?php 
                    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}

                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

                       ?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Upload New Lesson</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
 <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "Category">Select Branch:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                        <?php
    //Include database configuration file
    include('dbConfig.php');
    
    //Get all country data
    $query = $db->query("SELECT * FROM countries ORDER BY country_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="country" id="country">
        <option value="">Select Branch</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
            }
        }else{
            echo '<option value="">Branch not available</option>';
        }
        ?>
    </select>
                      </div>
                    </div>
                  </div>
				 
				   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "Category">Select Sem:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                          <select name="state" id="state">
        <option value="">Select Branch first</option>
    </select>
						 
						 
						 
                      </div>
                    </div>
                  </div>

  <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "Category">Select Subject:</label>

                      <div class="col-md-10">
                         
						 <select name="city" id="city">
        <option value="">Select Sem first</option>
    </select>
						 
						 
                      </div>
                    </div>
                  </div>


          

            <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonChapter">Chapter:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="LessonChapter" name="LessonChapter" placeholder=
                            "Chapter" type="text" value="">
                      </div>
                    </div>
                  </div>
                      
                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonTitle">Title:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="LessonTitle" name="LessonTitle" placeholder=
                            "Title" type="text" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "Category">Select File Type:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <select class="form-control input-sm" id="Category" name="Category" >
                            <option>Docs</option>
                            <option>Video</option>
                         </select>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2" align = "right" for="file">Upload File:</label>

                      <div class="col-md-10">
                      <input type="file" name="file"/>
                      </div>
                    </div>
                  </div>
				  
 
             <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "idno"></label>

                      <div class="col-md-10">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                         </div>
                    </div>
                  </div> 
        </form> 