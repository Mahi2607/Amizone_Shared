<?php

include "amity_database_connection.php";
include "plugins.php";
include "header.php";

$querry = mysqli_query($conn,"SELECT * FROM `course_details`  ORDER BY `course_details`.`COURSE_DETAILS_ID` DESC");
$getcol = mysqli_fetch_fields($querry);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
</head>
<body>
<hr> <h1 class="text-center">Course Details</h1><hr>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  ADD COURSE
</button>


<!-- Modal -->

<form action="" method="post">

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Course Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <label for="course_code_entry">Enter COURSE_CODE</label>  
                <input type="text" name="course_code_entry" class="form-control" required  id="course_code_entry">
                
          <br>

        <label for="course_name_entry">Enter COURSE_NAME</label>
        <input type="text" name="course_name_entry" class="form-control" required  id="course_name_entry">

        <br>

        <label for="course_credit_entry">Enter CREDIT</label>
        <input type="number" name="course_credit_entry" class="form-control" required  id="course_credit_entry">

        <br>

        <label for="course_theory_entry">Enter THEORY</label>
        <input type="number" name="course_theory_entry" class="form-control" required  id="course_theory_entry">

        <br>

        <label for="course_practical_entry">Enter PRACTICAL</label>
        <input type="number" name="course_practical_entry" class="form-control" required  id="course_practical_entry">

        <br>

        <label for="course_tutorial_entry">Enter TUTORIAL</label>
        <input type="number" name="course_tutorial_entry" class="form-control" required  id="course_tutorial_entry">

        <br>

        <label for="course_project_entry">Enter PROJECT</label>
        <input type="number" name="course_project_entry" class="form-control" required  id="course_project_entry">

        <br>

        <label for="course_c_ecaluation_entry">Enter CONTINUOUS_EVALUATION</label>
        <input type="number" name="course_c_ecaluation_entry" class="form-control" required  id="course_c_evaluation_entry">

        <br>

        <label for="course_attendance_entry">Enter Attendance</label>
        <input type="number" name="course_attendance_entry" class="form-control" required  id="course_attendance_entry">

        <br>
        
        <label for="course_total_internal_entry">Enter TOTAL_INTERNAL</label>
        <input type="number" name="course_total_internal_entry" class="form-control" required  id="course_total_internal_entry">

        <br>

        <label for="course_total_external_entry">Enter TOTAL_EXTERNAL</label>
        <input type="number" name="course_total_external_entry" class="form-control" required  id="course_total_external_entry">

        <br>



        <label for="course_course_outcome_entry">Enter COURSE_OUTCOME</label>
        <textarea name="course_course_outcome_entry" class="form-control" required  id="course_course_outcome_entry" cols="30" rows="5"></textarea>
        <br>

        <label for="course_course_objective_entry">Enter COURSE_OBJECTIVE</label>
        <textarea name="course_course_objective_entry" class="form-control" required  id="course_course_objective_entry" cols="30" rows="5"></textarea>
        <br>


        <hr>
        <p class="text-center">Enter Modules</p>

        <label for="course_course_module_1_entry">Enter MODULE_1</label>
        <textarea name="course_course_module_1_entry" class="form-control" required  id="course_course_module_1_entry" cols="30" rows="5"></textarea>
        <br>


        <label for="course_course_module_1_hours_entry">Enter MODULE_1_HOURS</label>
        <input type="number" name="course_course_module_1_hours_entry" class="form-control" required  id="course_course_module_1_hours_entry">
    
        <br>

        <hr>

        <label for="course_course_module_2_entry">Enter MODULE_2</label>
        <textarea name="course_course_module_2_entry" class="form-control" required  id="course_course_module_2_entry" cols="30" rows="5"></textarea>
        <br>

        <label for="course_course_module_2_hours_entry">Enter MODULE_2_HOURS</label>
        <input type="number" name="course_course_module_2_hours_entry" class="form-control" required  id="course_course_module_2_hours_entry">
        
        <br>
        <hr>
        <label for="course_course_module_3_entry">Enter MODULE_3</label>
        <textarea name="course_course_module_3_entry" class="form-control" required  id="course_course_module_3_entry" cols="30" rows="5"></textarea>
        <br>

        <label for="course_course_module_3_hours_entry">Enter MODULE_3_HOURS</label>
        <input type="number" name="course_course_module_3_hours_entry" class="form-control" required  id="course_course_module_3_hours_entry">
    
        <br>
        <hr>
        <label for="course_course_module_4_entry">Enter MODULE_4</label>
        <textarea name="course_course_module_4_entry" class="form-control" required  id="course_course_module_4_entry" cols="30" rows="5"></textarea>
        <br>

        <label for="course_course_module_4_hours_entry">Enter MODULE_4_HOURS</label>
        <input type="number" name="course_course_module_4_hours_entry" class="form-control" required  id="course_course_module_4_hours_entry">
        
        <br>
        <hr>
        <label for="course_course_module_5_entry">Enter MODULE_5</label>
        <textarea name="course_course_module_5_entry" class="form-control" required  id="course_course_module_5_entry" cols="30" rows="5"></textarea>
        <br>

        <label for="course_course_module_5_hours_entry">Enter MODULE_5_HOURS</label>
        <input type="number" name="course_course_module_5_hours_entry" class="form-control" required  id="course_course_module_5_hours_entry">
        
        <br>    
        <hr>

        <label for="course_reference_entry">REFERENCE</label>
        <textarea name="course_reference_entry" class="form-control" required  id="course_reference_entry" cols="30" rows="5"></textarea>
        







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" value="Add Course" name="add_new_course" class="btn btn-primary">
        
        
      </div>
    </div>
  </div>
</div>
</form>


<div class="container-fluid">

<table class="table table-hover">
  <thead>
    <tr>

        <?php

                foreach ($getcol as $val) {
                //printf("Name: %s\n", $val->name);
                // printf("%s\n", $val->name);
                

                ?>
                <th scope="col"> <?php echo $val->name; ?></th>
                
                <?php

                // printf("Table: %s\n", $val->table);
                // printf("Max. Len: %d\n", $val->max_length);
                }
        ?>

      <!-- <th scope="col">Config ID</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th> -->
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    
    <form action="" method="get">
 
    <?php
            
    while($row = mysqli_fetch_assoc($querry))
    {

   
        ?> 
          <tr class="text-center">
        <td><input type="text" class="form-control" readonly name="course_id_update"  placeholder="" id=""  value="<?php echo $row["COURSE_DETAILS_ID"] ?>"> </td>
        <td> <input type="text"  class="form-control" name="course_code_update" id="" value="<?php echo $row["COURSE_CODE"] ?>">  </td>
        <td> <input type="text"  class="form-control" name="course_name_update" id="" value="<?php echo $row["COURSE_NAME"] ?>"> </td>
        <td> <input type="text"  class="form-control" name="course_credit_update" id="" value="<?php echo $row["CREDIT"] ?> "></td>
        <td> <input type="text"  class="form-control" name="course_theory_update" id="" value="<?php echo $row["THEORY"] ?> "></td>
        <td> <input type="text"  class="form-control" name="course_practical_update" id="" value="<?php echo $row["PRACTICAL"] ?> "></td>
        <td> <input type="text"  class="form-control" name="course_tutorial_update" id="" value="<?php echo $row["TUTORIAL"] ?>"> </td>
        <td> <input type="text"  class="form-control" name="course_project_update" id="" value="<?php echo $row["PROJECT"] ?> "></td>
        <td> <input type="text"  class="form-control" name="course_c_evaluation_update" id="" value="<?php echo $row["CONTINUOUS_EVALUATION"] ?> "></td>
        <td> <input type="text"  class="form-control" name="course_attendance_update" id="" value="<?php echo $row["ATTENDANCE"] ?> "></td>
        <td> <input type="text"  class="form-control" name="course_total_internal_update" id="" value="<?php echo $row["TOTAL_INTERNAL"] ?> "></td>
        <td> <input type="text"  class="form-control" name="course_total_external_update" id="" value="<?php echo $row["TOTAL_EXTERNAL"] ?> "></td>
        <td>  <textarea name="course_outcome_update"  class="form-control" id="" cols="30" rows="5"><?php echo $row["COURSE_OUTCOME"] ?></textarea></td>
        <td> <textarea name="course_objective_update"  class="form-control" id="" cols="30" rows="5"><?php echo $row["COURSE_OBJECTIVE"] ?></textarea></td>

        <td>
            <textarea name="course_module_1_update" class="form-control" id="" cols="30" rows="5"><?php echo $row["MODULE_1"] ?></textarea>
        </td>
        
        
        <td> 
            <input type="text"  class="form-control" name="course_module_1_hours_update" id="" value="<?php echo $row["MODULE_1_HOURS"] ?> ">
        </td>


        <td>
            <textarea name="course_module_2_update" class="form-control" id="" cols="30" rows="5"><?php echo $row["MODULE_2"] ?></textarea>
        </td>
        
        
        <td> 
            <input type="text"  class="form-control" name="course_module_2_hours_update" id="" value="<?php echo $row["MODULE_2_HOURS"] ?> ">
        </td>


        <td>
            <textarea name="course_module_3_update" class="form-control" id="" cols="30" rows="5"><?php echo $row["MODULE_3"] ?></textarea>
        </td>
        
        
        <td> 
            <input type="text"  class="form-control" name="course_module_3_hours_update" id="" value="<?php echo $row["MODULE_3_HOURS"] ?> ">
        </td>

        <td>
            <textarea name="course_module_4_update" class="form-control" id="" cols="30" rows="5"><?php echo $row["MODULE_4"] ?></textarea>
        </td>
        
        
        <td> 
            <input type="text"  class="form-control" name="course_module_4_hours_update" id="" value="<?php echo $row["MODULE_4_HOURS"] ?> ">
        </td>


        <td>
            <textarea name="course_module_5_update" class="form-control" id="" cols="30" rows="5"><?php echo $row["MODULE_5"] ?></textarea>
        </td>
        
        
        <td> 
            <input type="text"  class="form-control" name="course_module_5_hours_update" id="" value="<?php echo $row["MODULE_5_HOURS"] ?> ">
        </td>

        <td>
            <textarea name="course_reference_update" class="form-control" id="" cols="30" rows="5"><?php echo $row["REFERENCE"] ?></textarea>
        </td>

       



        

        <td>
          <?php 
           
           
           ?>
            <a href="query.php?course_id=<?php echo $row["COURSE_DETAILS_ID"]?>"  class="btn btn-warning">Update</a>
            <!-- <input type="submit" value="Update" name="update_course_details" class="btn btn-warning form-control"> -->
           
        <td><a href="#" class="btn btn-danger disabled">Delete</a></td>
      
        </tr>
        <?php


    }
    
     
    ?>
     
     </form>
  </tbody>
</table>


</div>




    
</body>
</html>





<!-- Form Entry PHP code -->
<?php 

if(isset($_POST["add_new_course"]))
{

    $course_code_entry = $_POST["course_code_entry"];
    $course_name_entry = $_POST["course_name_entry"];
    $course_credit_entry = $_POST["course_credit_entry"];
    $course_theory_entry = $_POST["course_theory_entry"];
    $course_practical_entry = $_POST["course_practical_entry"];
    $course_tutorial_entry = $_POST["course_tutorial_entry"];
    $course_project_entry = $_POST["course_project_entry"];
    $course_c_ecaluation_entry = $_POST["course_c_ecaluation_entry"];
    $course_attendance_entry = $_POST["course_attendance_entry"];
    $course_total_internal_entry = $_POST["course_total_internal_entry"];
    $course_total_external_entry  = $_POST["course_total_external_entry"];
    $course_course_outcome_entry = $_POST["course_course_outcome_entry"];
    $course_course_objective_entry = $_POST["course_course_objective_entry"];
    $course_course_module_1_entry = $_POST["course_course_module_1_entry"];
    $course_course_module_1_hours_entry = $_POST["course_course_module_1_hours_entry"];
    // echo $course_course_module_1_hours_entry;
    $course_course_module_2_entry = $_POST["course_course_module_2_entry"];
    $course_course_module_2_hours_entry = $_POST["course_course_module_2_hours_entry"];
    // echo $course_course_module_2_hours_entry;
    $course_course_module_3_entry = $_POST["course_course_module_3_entry"];
    $course_course_module_3_hours_entry = $_POST["course_course_module_3_hours_entry"];
    // echo $course_course_module_3_hours_entry;
    $course_course_module_4_entry = $_POST["course_course_module_4_entry"];
    $course_course_module_4_hours_entry = $_POST["course_course_module_4_hours_entry"];
    // echo $course_course_module_4_hours_entry;
    $course_course_module_5_entry = $_POST["course_course_module_5_entry"];
    $course_course_module_5_hours_entry = $_POST["course_course_module_5_hours_entry"];
    // echo $course_course_module_5_hours_entry;
    $course_reference_entry = $_POST["course_reference_entry"];


        if(mysqli_query($conn,"INSERT INTO `course_details`(`COURSE_DETAILS_ID`, `COURSE_CODE`, `COURSE_NAME`, `CREDIT`, `THEORY`, `PRACTICAL`, `TUTORIAL`, `PROJECT`, `CONTINUOUS_EVALUATION`, `ATTENDANCE`, `TOTAL_INTERNAL`, `TOTAL_EXTERNAL`, `COURSE_OUTCOME`, `COURSE_OBJECTIVE`, `MODULE_1`, `MODULE_1_HOURS`, `MODULE_2`, `MODULE_2_HOURS`, `MODULE_3`, `MODULE_3_HOURS`, `MODULE_4`, `MODULE_4_HOURS`, `MODULE_5`, `MODULE_5_HOURS`, `REFERENCE`) 
        VALUES ('','$course_code_entry','$course_name_entry','$course_credit_entry','$course_theory_entry','$course_practical_entry','$course_tutorial_entry','$course_project_entry','$course_c_ecaluation_entry','$course_attendance_entry','$course_total_internal_entry','$course_total_external_entry','$course_course_outcome_entry','$course_course_objective_entry','$course_course_module_1_entry','$course_course_module_1_hours_entry','$course_course_module_2_entry','$course_course_module_2_hours_entry','$course_course_module_3_entry','$course_course_module_3_hours_entry','$course_course_module_4_entry','$course_course_module_4_hours_entry','$course_course_module_5_entry','$course_course_module_5_hours_entry','$course_reference_entry')"))
        {
            echo "Data Saved Successfully";
            ?>
                <script>

                    window.location = "course_details.php";
                </script>
            <?php
        }
        else
        {
            echo "Failed to saved the record";  
        }
}  


if(isset($_POST["update_course_details"]))
{
    $course_id_update = $_POST["course_id_update"];
    echo $course_id_update;
  //   $course_code_update = $_POST["course_code_update"];
  //  // echo $course_code_update."C";
  //   $course_name_update = $_POST["course_name_update"];
  //  // echo $course_name_update;
  //   $course_credit_update = $_POST["course_credit_update"];
  //   $course_theory_update = $_POST["course_theory_update"];
  //   $course_practical_update = $_POST["course_practical_update"];
  //   $course_tutorial_update = $_POST["course_tutorial_update"];
  //   $course_project_update = $_POST["course_project_update"];
  //   $course_c_evaluation_update = $_POST["course_c_evaluation_update"];
  //   $course_attendance_update = $_POST["course_attendance_update"];
  //   $course_total_internal_update = $_POST["course_total_internal_update"];
  //   $course_total_external_update = $_POST["course_total_external_update"];
  //   $course_outcome_update = $_POST["course_outcome_update"];
  //   $course_objective_update = $_POST["course_objective_update"];

    // if(mysqli_query($conn,"UPDATE `course_details` SET `COURSE_CODE`='$course_code_update',`COURSE_NAME`='$course_name_update',`CREDIT`='$course_credit_update',`THEORY`='$course_theory_update',`PRACTICAL`='$course_practical_update',`TUTORIAL`='$course_tutorial_update',`PROJECT`='$course_project_update',`CONTINUOUS_EVALUATION`='$course_c_evaluation_update',`ATTENDANCE`='$course_attendance_update',`TOTAL_INTERNAL`='$course_total_internal_update',`TOTAL_EXTERNAL`='$course_total_external_update',`COURSE_OUTCOME`='$course_outcome_update',`COURSE_OBJECTIVE`='$course_objective_update' WHERE COURSE_DETAILS_ID = $course_id_update"))
    // {
    //         echo "Data Updated Successfully!!!";
    //         ?> 
    //             <!-- <script>

    //                    window.location = "course_details.php";
    //             </script> -->
    //         <?php

    // }
    // else
    // {
    //     echo "Data Not Updated!!!!";
    // }



}
else{
   // echo "isset Failed";
}


?>
