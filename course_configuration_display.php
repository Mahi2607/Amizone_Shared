<?php

include "amity_database_connection.php";
include "plugins.php";
include "header.php";

$querry = mysqli_query($conn,"SELECT course_configuration.CONFIG_ID,institute_details.INSTITUTE_NAME,program_details.PROGRAM_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_configuration.SEMESTER,course_details.CREDIT FROM course_configuration LEFT JOIN institute_details ON course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN program_details ON course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN course_details ON course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID ORDER BY `course_configuration`.`SEMESTER` ASC;");
$getcol = mysqli_fetch_fields($querry);





// if ($result = mysqli_query($conn , $querry)) {

//     // Get field information for all fields
//     $fieldinfo = mysqli_fetch_fields($result);

//     foreach ($fieldinfo as $val) {
//       //printf("Name: %s\n", $val->name);
//         printf("%s\n", $val->name);
        
//      // printf("Table: %s\n", $val->table);
//      // printf("Max. Len: %d\n", $val->max_length);
//     }
   
//   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Configuration Display</title>
</head>
<body>
    <div class="conatiner-fluid">
   <hr> <h1 class="text-center">Course Configuration</h1><hr>

        <!-- <a href="course_configuration.php" class="btn btn-primary">Add Course</a> -->
    
    
    
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Course
</button>

<a href="course_display.php"  target="_blank" class="btn btn-warning">Course Display</a>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <label for="institute_name"> Select Institute</label>
            <select name="institute_name_entry" id="institute_name" class="form-control" required>

            <option value="">Select Institute</option>
          <?php
            
            $get_institute_name = mysqli_query($conn,"SELECT * FROM `institute_details`");
            while($institute_name = mysqli_fetch_assoc($get_institute_name))
            {
        
           
                ?> 
                <option value="<?php echo $institute_name["INSTITUTE_ID"];?>"><?php echo $institute_name["INSTITUTE_NAME"];?></option>
                
            
                <?php
            
            } ?>
          
          </select>
<br>

          <label for="program_name"> Select Program</label>
            <select name="program_name_entry" id="program_name"  class="form-control" required>

            <option value="">Select Program</option>
          <?php
            
            $get_program_name = mysqli_query($conn,"SELECT * FROM `program_details`");
            while($program_name = mysqli_fetch_assoc($get_program_name))
            {
        
           
                ?> 
                <option value="<?php echo $program_name["PROGRAM_ID"];?>"><?php echo $program_name["PROGRAM_NAME"];?></option>
                
            
                <?php
            
            } ?>
          
          </select>

            <br>

            <label for="course_name" class="form-label">Select Course</label>
                <input class="form-control" list="datalistOptions" name="course_name_entry" id="course_name" placeholder="Type to search...">
                <datalist id="datalistOptions">
                    <option value="Select Course">
                    <?php
            
            $get_course_name = mysqli_query($conn,"SELECT * FROM `course_details`");
            while($course_name = mysqli_fetch_assoc($get_course_name))
            {
        
           
                ?> 
                
                <option value="<?php echo $course_name["COURSE_DETAILS_ID"];?>" > <?php echo $course_name["COURSE_NAME"]." [". $course_name["COURSE_CODE"]."]";?></option>
                
            
                <?php
            
            } ?>

                   
                </datalist>

            <br>
            <label for="course_type">Select Course Type</label>
            <select name="course_type_entry" id="course_type" class="form-control">
              <option value="">Select Course Type</option>
              <option value="CORE">CORE</option>
              <option value="CONCENTRATIVE ELECTIVE">CONCENTRATIVE ELECTIVE</option>
              <option value="MINOR TRACK">MINOR TRACK</option>
            </select>

            <br>
          <label for="semester_name">Semester</label>
          <select name="semester_name_entry" id="semester_name" class="form-control">
            <option value="">Select Semester</option>
            <option value="1">SEMESTER 1</option>
            <option value="2">SEMESTER 2</option>
            <option value="3">SEMESTER 3</option>
            <option value="4">SEMESTER 4</option>
            <option value="5">SEMESTER 5</option>
            <option value="6">SEMESTER 6</option>
          </select>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="configure_course">Configure Course</button>
      </div>
      </form>

    </div>
  </div>
</div>
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
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
    </tr>
  </thead>
  <tbody>
    

 
    <?php
            
    while($row = mysqli_fetch_assoc($querry))
    {
        switch($row["SEMESTER"])
        {
            case 1:

          
   
        ?> 
        
          <tr class="table-primary">
        <td class=""> <?php echo $row["CONFIG_ID"] ?> </td>
        <td class=""> <?php echo $row["INSTITUTE_NAME"] ?> </td>
        <td class=""> <?php echo $row["PROGRAM_NAME"] ?> </td>
        <td class=""> <?php echo $row["COURSE_CODE"] ?> </td>
        <td class=""> <?php echo $row["COURSE_NAME"] ?> </td>
        <td class=""> <?php echo $row["SEMESTER"] ?> </td>
        <td class=""> <?php echo $row["CREDIT"] ?> </td>
      
        </tr>
        <?php

        break;

        case 2:

          ?> 
        
          <tr class="table-secondary">
        <td> <?php echo $row["CONFIG_ID"] ?> </td>
        <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
        <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
        <td> <?php echo $row["COURSE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_NAME"] ?> </td>
        <td> <?php echo $row["SEMESTER"] ?> </td>
        <td> <?php echo $row["CREDIT"] ?> </td>
      
        </tr>
        <?php

        break;


        case 3:

          ?> 
        
          <tr class="table-success">
        <td> <?php echo $row["CONFIG_ID"] ?> </td>
        <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
        <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
        <td> <?php echo $row["COURSE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_NAME"] ?> </td>
        <td> <?php echo $row["SEMESTER"] ?> </td>
        <td> <?php echo $row["CREDIT"] ?> </td>
      
        </tr>
        <?php

        break;

        case 4:

          ?> 
        
          <tr>
        <td> <?php echo $row["CONFIG_ID"] ?> </td>
        <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
        <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
        <td> <?php echo $row["COURSE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_NAME"] ?> </td>
        <td> <?php echo $row["SEMESTER"] ?> </td>
        <td> <?php echo $row["CREDIT"] ?> </td>
      
        </tr>
        <?php

        break;

        case 5:

          ?> 
        
          <tr class="table-danger">
        <td> <?php echo $row["CONFIG_ID"] ?> </td>
        <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
        <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
        <td> <?php echo $row["COURSE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_NAME"] ?> </td>
        <td> <?php echo $row["SEMESTER"] ?> </td>
        <td> <?php echo $row["CREDIT"] ?> </td>
      
        </tr>
        <?php

        break;

        case 6:

          ?> 
        
          <tr class="table-warning">
        <td> <?php echo $row["CONFIG_ID"] ?> </td>
        <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
        <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
        <td> <?php echo $row["COURSE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_NAME"] ?> </td>
        <td> <?php echo $row["SEMESTER"] ?> </td>
        <td> <?php echo $row["CREDIT"] ?> </td>
      
        </tr>
        <?php

        break;

        }
    }
     
    ?>
     
    
  </tbody>
</table>
   
    </div>
    
</body>
</html>


<?php 



if(isset($_POST["configure_course"]))
{

  $institute_id_entry = $_POST["institute_name_entry"];
  $program_id_entry = $_POST["program_name_entry"];
  $course_id_entry = $_POST["course_name_entry"];
  $course_type_entry = $_POST["course_type_entry"];
  $semester_name_entry = $_POST["semester_name_entry"];

  // echo $institute_name_entry.$program_name_entry.$course_name_entry.$course_type_entry.$semester_name_entry;

  if(mysqli_query($conn,"INSERT INTO `course_configuration`(`CONFIG_ID`, `INSTITUDE_ID`, `PROGRAM_ID`, `COURSE_DETAILS_ID`, `COURSE_TYPE`, `SEMESTER`)
   VALUES ('','$institute_id_entry','$program_id_entry','$course_id_entry','$course_type_entry','$semester_name_entry')"))
  {
      echo "Data Saved Successfully";
      ?><script>window.location="course_configuration_display.php";</script> <?php
  }
  else
  {
    echo "Data Failed...!!!!";
  }

}

?>

