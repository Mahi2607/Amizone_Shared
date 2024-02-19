<?php

include "amity_database_connection.php";
include "plugins.php";
include "header.php";


$user_details_details = mysqli_query($conn,"SELECT * FROM `user_details`");
$course_configuration_details = mysqli_query($conn,"SELECT course_configuration.CONFIG_ID,program_details.PROGRAM_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME FROM course_configuration INNER JOIN course_details ON course_details.COURSE_DETAILS_ID = course_configuration.COURSE_DETAILS_ID INNER JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID;");

$faculty_details = mysqli_query($conn,"SELECT faculty_allotment.F_ALLOTMENT_ID,institute_details.INSTITUTE_NAME,program_details.PROGRAM_NAME,user_details.USER_NAME,user_details.EMPLOYEE_CODE,course_details.COURSE_CODE,course_details.COURSE_NAME,course_configuration.COURSE_TYPE,course_details.CREDIT,course_configuration.SEMESTER FROM faculty_allotment LEFT JOIN user_details on faculty_allotment.USER_ID = user_details.USER_ID INNER JOIN course_configuration on faculty_allotment.CONFIG_ID = course_configuration.CONFIG_ID INNER JOIN course_details on course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID ORDER BY `course_details`.`COURSE_CODE` ASC;");
$faculty_details_col = mysqli_fetch_fields($faculty_details);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Allotment</title>
</head>
<body>
    <div class="container-fluid p-3">


    <hr>
    <div class="container w-25 float-center border border-5 p-3">
        <h1>Faculty Allotment</h1>


        <form action="" method="post">


        <label for="faculty_name" class="form-label">Select Faculty</label>
                <input class="form-control" list="facuty_datalistOptions" required name="selected_faculty" id="faculty_name" placeholder="Type to search...">
                <datalist id="facuty_datalistOptions">
                    <option value="Select Faculty">
                    <?php
            
        
            while($user_details_details_row = mysqli_fetch_assoc($user_details_details))
            {
        
           
                ?> 
                
                <option value="<?php echo $user_details_details_row["USER_ID"];?>" > <?php echo $user_details_details_row["USER_NAME"]." [". $user_details_details_row["EMPLOYEE_CODE"]."]";?></option>
                
            
                <?php
            
            } ?>

                   
                </datalist>


            <br>



            <label for="selected_course" class="form-label">Select Configured Course</label>
                <input class="form-control" list="course_datalistOptions" name="selected_course" required id="course_name" placeholder="Type to search...">
                <datalist id="course_datalistOptions">
                    <option value="Select Configured Course">
                    <?php
            
         
            while($course_configuration_details_row = mysqli_fetch_assoc($course_configuration_details))
            {
        
           
                ?> 
                
                <option value="<?php echo $course_configuration_details_row["CONFIG_ID"];?>" > <?php echo $course_configuration_details_row["COURSE_NAME"]." [". $course_configuration_details_row["COURSE_CODE"]."]"." [". $course_configuration_details_row["PROGRAM_NAME"]."]";?></option>
                
            
                <?php
            
            } ?>

                   
                </datalist>


     <br>
            <input type="submit" value="Allot Faculty" name="fallot" class="btn btn-primary">

        </form>


    </div>


    <div class="container border border-2 p-2 mt-5">
    <table class="table table-hover">
  <thead>
    <tr>

        <?php

                foreach ($faculty_details_col as $val) {
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
            
    while($row = mysqli_fetch_assoc($faculty_details))
    {
        switch($row["SEMESTER"])
        {
            case 1:
           
   
        ?> 
          <tr class="table-primary">
        <td class="text-center"> <?php echo $row["F_ALLOTMENT_ID"] ?> </td>
        <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
        <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
        <td> <?php echo $row["USER_NAME"] ?> </td>
        <td> <?php echo $row["EMPLOYEE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_NAME"] ?> </td>
        <td> <?php echo $row["COURSE_TYPE"]?> </td>
        <td class="text-center"> <?php echo $row["CREDIT"] ?> </td>
        <td class="text-center"> <?php echo $row["SEMESTER"] ?> </td>
      
        </tr>
        
        <?php

            break;
            case 2:
                ?> 
                <tr class="table-secondary">
              <td class="text-center"> <?php echo $row["F_ALLOTMENT_ID"] ?> </td>
              <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
              <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
              <td> <?php echo $row["USER_NAME"] ?> </td>
              <td> <?php echo $row["EMPLOYEE_CODE"] ?> </td>
              <td> <?php echo $row["COURSE_CODE"] ?> </td>
              <td> <?php echo $row["COURSE_NAME"] ?> </td>
              <td> <?php echo $row["COURSE_TYPE"]?> </td>
              <td class="text-center"> <?php echo $row["CREDIT"] ?> </td>
              <td class="text-center"> <?php echo $row["SEMESTER"] ?> </td>
            
              </tr>
              
              <?php
              
        break;
        case 3:
            ?> 
            <tr class="table-success">
          <td class="text-center"> <?php echo $row["F_ALLOTMENT_ID"] ?> </td>
          <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
          <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
          <td> <?php echo $row["USER_NAME"] ?> </td>
          <td> <?php echo $row["EMPLOYEE_CODE"] ?> </td>
          <td> <?php echo $row["COURSE_CODE"] ?> </td>
          <td> <?php echo $row["COURSE_NAME"] ?> </td>
          <td> <?php echo $row["COURSE_TYPE"]?> </td>
          <td class="text-center"> <?php echo $row["CREDIT"] ?> </td>
          <td class="text-center"> <?php echo $row["SEMESTER"] ?> </td>
        
          </tr>
          
          <?php
          break;
          case 4:
            ?> 
            <tr>
          <td class="text-center"> <?php echo $row["F_ALLOTMENT_ID"] ?> </td>
          <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
          <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
          <td> <?php echo $row["USER_NAME"] ?> </td>
          <td> <?php echo $row["EMPLOYEE_CODE"] ?> </td>
          <td> <?php echo $row["COURSE_CODE"] ?> </td>
          <td> <?php echo $row["COURSE_NAME"] ?> </td>
          <td> <?php echo $row["COURSE_TYPE"]?> </td>
          <td class="text-center"> <?php echo $row["CREDIT"] ?> </td>
          <td class="text-center"> <?php echo $row["SEMESTER"] ?> </td>
        
          </tr>
          
          <?php

          break;
          case 5: 
          ?> 
          <tr class="table-danger">
        <td class="text-center"> <?php echo $row["F_ALLOTMENT_ID"] ?> </td>
        <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
        <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
        <td> <?php echo $row["USER_NAME"] ?> </td>
        <td> <?php echo $row["EMPLOYEE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_CODE"] ?> </td>
        <td> <?php echo $row["COURSE_NAME"] ?> </td>
        <td> <?php echo $row["COURSE_TYPE"]?> </td>
        <td class="text-center"> <?php echo $row["CREDIT"] ?> </td>
        <td class="text-center"> <?php echo $row["SEMESTER"] ?> </td>
      
        </tr>
        
        <?php
        break;
        case 6:
            ?> 
            <tr class="table-warning">
          <td class="text-center"> <?php echo $row["F_ALLOTMENT_ID"] ?> </td>
          <td> <?php echo $row["INSTITUTE_NAME"] ?> </td>
          <td> <?php echo $row["PROGRAM_NAME"] ?> </td>
          <td> <?php echo $row["USER_NAME"] ?> </td>
          <td> <?php echo $row["EMPLOYEE_CODE"] ?> </td>
          <td> <?php echo $row["COURSE_CODE"] ?> </td>
          <td> <?php echo $row["COURSE_NAME"] ?> </td>
          <td> <?php echo $row["COURSE_TYPE"]?> </td>
          <td class="text-center"> <?php echo $row["CREDIT"] ?> </td>
          <td class="text-center"> <?php echo $row["SEMESTER"] ?> </td>
        
          </tr>
          
          <?php
          break;
        }
    
    }
     
    ?>
     
    
  </tbody>
</table>
   
    </div>

    </div>
</body>
</html>

<?php
if(isset($_POST["fallot"]))
{
    $user_id = $_POST["selected_faculty"];
    $config_id = $_POST["selected_course"];

    //echo $user_id.$config_id;


    
    if(mysqli_query($conn,"INSERT INTO `faculty_allotment`(`F_ALLOTMENT_ID`, `USER_ID`, `CONFIG_ID`) VALUES ('','$user_id','$config_id')"))
    {
        echo "Data Added!!";
        ?><script>window.location="faculty_allotment.php";</script> <?php
        
    }
    else {
        echo "Failed!!!";
    }
}



?>
