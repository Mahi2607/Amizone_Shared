<?php

include "amity_database_connection.php";
include "plugins.php";

$querry = mysqli_query($conn,"SELECT course_configuration.CONFIG_ID,institute_details.INSTITUTE_NAME,program_details.PROGRAM_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_configuration.SEMESTER,course_details.CREDIT FROM course_configuration LEFT JOIN institute_details ON course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID RIGHT JOIN program_details ON course_configuration.PROGRAM_ID = program_details.PROGRAM_ID RIGHT JOIN course_details ON course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID;");
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
    <h1>Course Configuration Display</h1>

        <a href="course_configuration.php" class="btn btn-primary">Add Course</a>
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

    
    }
     
    ?>
     
    
  </tbody>
</table>
   
    </div>
    
</body>
</html>