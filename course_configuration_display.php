<?php

include "amity_database_connection.php";
include "plugins.php";
include "header.php";

$querry="";
$getcol="";





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


        <!-- <a href="course_configuration.php" class="btn btn-primary">Add Course</a> -->
    
    
    
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Configure New Course
</button>


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
              <option value="OPEN ELECTIVES">OPEN ELECTIVES</option>
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
    
    
    





<div class="container w-25 border border 3 p-5 shadow text-center">

<form action="" method="post">
            <h5 class="mb-3 text-decoration-underline">Course Configuration</h5>
          <!-- <label for="institute_name"> Select Institute</label> -->
            <select name="institute_name_view" id="institute_name" class="form-control" required>

            <option value="">Select Institute</option>
            <option value="ALL_INSTITUTES">Select All Institutes</option>
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

          <!-- <label for="program_name"> Select Program</label> -->
            <select name="program_name_view" id="program_name"  class="form-control" required>

            <option value="">Select Program</option>
            <option value="ALL_PROGRAMS">Select All Programs </option>
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

            <!-- <label for="course_name" class="form-label">Select Course</label> -->
                <!-- <input class="form-control" list="datalistOptions" name="course_name_view" id="course_name" placeholder="Type to search...">
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

                   
                </datalist> -->

            
            <!-- <label for="course_type">Select Course Type</label> -->
            <select name="course_type_view" id="course_type" class="form-control">
              <option value="">Select Course Type</option>
              <option value="ALL_COURSES">Select All Courses</option>
              <option value="CORE">CORE</option>
              <option value="CONCENTRATIVE ELECTIVE">CONCENTRATIVE ELECTIVE</option>
              <option value="OPEN ELECTIVES">OPEN ELECTIVES</option>
              <option value="MINOR TRACK">MINOR TRACK</option>
            </select>

            <br>
          <!-- <label for="semester_name">Semester</label> -->
          <select name="semester_name_view" id="semester_name" class="form-control">
            <option value="">Select Semester</option>
            <option value="ALL_SEMESTERS">Select All Semesters</option>
            <option value="1">SEMESTER 1</option>
            <option value="2">SEMESTER 2</option>
            <option value="3">SEMESTER 3</option>
            <option value="4">SEMESTER 4</option>
            <option value="5">SEMESTER 5</option>
            <option value="6">SEMESTER 6</option>
          </select>

          <br><br>

      <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary" name="view_course">View Course</button>
      <!-- </div> -->     

      </form>
  
      </div>



    <?php

            if(isset($_POST["view_course"]))
            {
               
                $institute_name_view = $_POST["institute_name_view"];
                $program_name_view  =  $_POST["program_name_view"];
                $course_type_view = $_POST["course_type_view"];
                $semester_name_view = $_POST["semester_name_view"];
                $main_querry = "SELECT course_configuration.CONFIG_ID,institute_details.INSTITUTE_NAME,program_details.PROGRAM_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_configuration.COURSE_TYPE,course_configuration.SEMESTER,course_details.CREDIT FROM course_configuration LEFT JOIN institute_details ON course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN program_details ON course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN course_details ON course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID";
                $main_querry_count = "SELECT COUNT(*) FROM course_configuration LEFT JOIN institute_details ON course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN program_details ON course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN course_details ON course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID";
                $pass_main_querry="";
                //  $name = "Mahendra Name";
                // $main_querry = $main_querry." ".$name;
                // echo $main_querry;

                if($institute_name_view != "ALL_INSTITUTES" || $program_name_view != "ALL_PROGRAMS" || $course_type_view != "ALL_COURSES" || $semester_name_view != "ALL_SEMESTERS")
                {
                  $main_querry = $main_querry." WHERE ";
                  $pass_main_querry = $pass_main_querry." WHERE";
                  $main_querry_count = $main_querry_count." WHERE";
                  $and = " AND ";
                        if($institute_name_view !="ALL_INSTITUTES")
                        {
                            $institute_selection_querry  = " institute_details.INSTITUTE_ID = ". $institute_name_view;
                            
                        }
                        else
                        {
                          $institute_selection_querry  = "";  
                          
                          // echo "Else block";
                        }
                        if($program_name_view != "ALL_PROGRAMS")
                        {
                            $program_selection_querry  = " program_details.PROGRAM_ID = ". $program_name_view;

                            if($institute_name_view != "ALL_INSTITUTES")
                            {
                              $program_selection_querry = " AND ".$program_selection_querry;
                            }
                        }
                        else{
                          $program_selection_querry  = "";  
                        }
                        if($course_type_view != "ALL_COURSES")
                        {
                          $course_selection_querry  = " course_configuration.COURSE_TYPE = '". $course_type_view."'";

                            if($institute_name_view != "ALL_INSTITUTES" || $program_name_view != "ALL_PROGRAMS")
                            { 
                              $course_selection_querry  =  " AND ".$course_selection_querry;                   
                            }
                        }
                        else{
                          $course_selection_querry  = "";
                        }
                        if($semester_name_view != "ALL_SEMESTERS")
                        {
                          $semester_selection_querry  = " course_configuration.SEMESTER = ". $semester_name_view;

                          if($institute_name_view != "ALL_INSTITUTES" || $program_name_view != "ALL_PROGRAMS" || $course_type_view != "ALL_COURSES")
                          {
                            $semester_selection_querry = " AND ".$semester_selection_querry;
                          }
                        }
                        else{
                            $semester_selection_querry ="";
                        }
                        
                        $main_querry = $main_querry.$institute_selection_querry.$program_selection_querry.$course_selection_querry.$semester_selection_querry;
                        $pass_main_querry = $pass_main_querry.$institute_selection_querry.$program_selection_querry.$course_selection_querry.$semester_selection_querry;
                        $main_querry_count = $main_querry_count.$institute_selection_querry.$program_selection_querry.$course_selection_querry.$semester_selection_querry;
                }
                else{
                  // echo "Main Else block";
                }
               

               
                // echo "Before ".$main_querry."<br>".$main_querry_count;
               
                // $main_querry = $main_querry." ORDER BY course_details.COURSE_CODE ASC";
                $main_querry = $main_querry." ORDER BY course_configuration.SEMESTER ASC, course_configuration.COURSE_TYPE DESC, course_details.COURSE_CODE ASC";
                // $main_querry = $main_querry." ORDER BY CASE WHEN `course_configuration`.`COURSE_TYPE`='CORE' THEN 'C' WHEN `course_configuration`.`COURSE_TYPE`='MINOR TRACK' THEN 'Z' ELSE `course_configuration`.`COURSE_TYPE` END ASC;";
                // echo $main_querry;
                $get_course_configuration_querry = mysqli_query($conn,$main_querry);
                $getcol = mysqli_fetch_fields($get_course_configuration_querry);


                $get_course_configuration_querry_count = mysqli_query($conn,$main_querry_count);
                $get_course_configuration_querry_count_array = mysqli_fetch_array($get_course_configuration_querry_count);






              ?>
      
     <table class="table table-hover border border-2 mt-5 w-100 text-center">
     <thead>
                <tr>
                  <th colspan="9" class="fs-4 fw-bold" style="color:green;">
                  <?php echo $get_course_configuration_querry_count_array[0] ?> Courses Found 
                  </th>
                </tr>
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
       
   
    
       <?php
               
       while($row = mysqli_fetch_assoc($get_course_configuration_querry))
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
           <td class="text-start"> <?php echo $row["COURSE_NAME"] ?> </td>
           <td class="text-start"> <?php echo $row["COURSE_TYPE"] ?> </td>

           <td class=""> <?php echo $row["SEMESTER"] ?> </td>
           <td class=""> <?php echo $row["CREDIT"] ?> </td>
           <td><a href="course_display.php?config_id=<?php echo $row["CONFIG_ID"]?>" target="_blank"  class="btn btn-success">View Course</a></td>
         
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
           <td class="text-start"> <?php echo $row["COURSE_NAME"] ?> </td>
           <td class="text-start"> <?php echo $row["COURSE_TYPE"] ?> </td>
           <td> <?php echo $row["SEMESTER"] ?> </td>
           <td> <?php echo $row["CREDIT"] ?> </td>
            <td><a href="course_display.php?config_id=<?php echo $row["CONFIG_ID"]?>" target="_blank"  class="btn btn-success">View Course</a></td>  
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
           <td class="text-start"> <?php echo $row["COURSE_NAME"] ?> </td>
           <td class="text-start"> <?php echo $row["COURSE_TYPE"] ?> </td>
           <td> <?php echo $row["SEMESTER"] ?> </td>
           <td> <?php echo $row["CREDIT"] ?> </td>
            <td><a href="course_display.php?config_id=<?php echo $row["CONFIG_ID"]?>" target="_blank"  class="btn btn-success">View Course</a></td>
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
           <td class="text-start"> <?php echo $row["COURSE_NAME"] ?> </td>
            <td class="text-start"> <?php echo $row["COURSE_TYPE"] ?> </td>
           <td> <?php echo $row["SEMESTER"] ?> </td>
           <td> <?php echo $row["CREDIT"] ?> </td>
         <td><a href="course_display.php?config_id=<?php echo $row["CONFIG_ID"]?>" target="_blank"  class="btn btn-success">View Course</a></td>
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
           <td class="text-start"> <?php echo $row["COURSE_NAME"] ?> </td>
            <td class="text-start"> <?php echo $row["COURSE_TYPE"] ?> </td>
           <td> <?php echo $row["SEMESTER"] ?> </td>
           <td> <?php echo $row["CREDIT"] ?> </td>
         <td><a href="course_display.php?config_id=<?php echo $row["CONFIG_ID"]?>" target="_blank"  class="btn btn-success">View Course</a></td>
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
           <td class="text-start"> <?php echo $row["COURSE_NAME"] ?> </td>
           <td class="text-start"> <?php echo $row["COURSE_TYPE"] ?> </td>
           <td> <?php echo $row["SEMESTER"] ?> </td>
           <td> <?php echo $row["CREDIT"] ?> </td>
          <td><a href="course_display.php?config_id=<?php echo $row["CONFIG_ID"]?>" target="_blank"  class="btn btn-success">View Course</a></td>
           </tr>
           <?php
   
           break;
   
           }
       }
        
       ?>
        
       <tr>
        <td colspan="8"><a href="course_display.php?display_main_query=<?php echo $pass_main_querry?>"  target="_blank" class="btn btn-warning">Course Display</a></td>
       </tr>
     </tbody>
   </table>
   


<?php

            }
    ?>

   
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

