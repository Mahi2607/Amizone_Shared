<?php

include "amity_database_connection.php";
include "plugins.php";
include "header.php";

$course_module_id = $_GET["course_module_id"];
if(!empty($course_module_id))
{
    //echo $course_module_id;
    $querry = mysqli_query($conn,"SELECT * FROM `course_modules` WHERE COURSE_MODULE_ID = '$course_module_id';");
    $getcol = mysqli_fetch_fields($querry);
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Modules</title>
</head>
<body>
    
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
    

 
    <?php
            
    while($row = mysqli_fetch_assoc($querry))
    {

   
        ?> 
          <tr class="text-center">
        <td> <?php echo $row["COURSE_MODULE_ID"] ?> </td>
        <td> <textarea name="" id="" cols="30" rows="5"><?php echo $row["MODULE_1"] ?>  </textarea></td>
        <td> <input type="text" name="" id="" value="<?php echo $row["MODULE_1_HOURS"] ?> "></td>
        <td> <textarea name="" id="" cols="30" rows="5"><?php echo $row["MODULE_2"] ?>  </textarea></td>
        <td> <input type="text" name="" id="" value="<?php echo $row["MODULE_2_HOURS"] ?> "></td>
        <td> <textarea name="" id="" cols="30" rows="5"><?php echo $row["MODULE_3"] ?>  </textarea></td>
        <td> <input type="text" name="" id="" value="<?php echo $row["MODULE_3_HOURS"] ?>"> </td>
        <td> <textarea name="" id="" cols="30" rows="5"><?php echo $row["MODULE_4"] ?>  </textarea></td>
        <td> <input type="text" name="" id="" value="<?php echo $row["MODULE_4_HOURS"] ?> "></td>
        <td> <textarea name="" id="" cols="30" rows="5"><?php echo $row["MODULE_5"] ?>" </textarea></td>
        <td> <input type="text" name="" id="" value="<?php echo $row["MODULE_5_HOURS"] ?> "></td>
        <td> <textarea name="" id="" cols="30" rows="5"><?php echo $row["REFERENCE"] ?> </textarea> </td>
        <td><a href="#" class="btn btn-warning disabled">Update</a></td>
        <td><a href="#" class="btn btn-danger disabled">Delete</a></td>
      
        </tr>
        <?php

    
    }
     
    ?>
     
    
  </tbody>
</table>



</div>



</body>
</html>