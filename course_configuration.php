<?php

include "amity_database_connection.php";
include "plugins.php";

$institute_details = mysqli_query($conn,"SELECT * FROM `institute_details`");
$program_details = mysqli_query($conn,"SELECT * FROM `program_details`");
$course_details = mysqli_query($conn,"SELECT * FROM `course_details`");

//$querry1 = mysqli_fetch_array($querry);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Configuration</title>
</head>
<body>
            
        <div class="container-fluid">
                <h1>Course Configuration</h1>
        

                <form action="" method="POST">
                            <label for="institute">Select Institute</label>
                            <select name="selected_institute" id="institute">
                                <option value="">Select Institute</option>

                                <?php

                                    while($institute_details_row = mysqli_fetch_assoc($institute_details))
                                    {
                                        ?><option value=" <?php echo $institute_details_row["INSTITUTE_ID"]?>"> <?php echo $institute_details_row["INSTITUTE_NAME"]?> </option> <?php
                                    }

                                ?>

                            </select>


                                    <br>

                            <label for="program">Select Program</label>
                            <select name="selected_program" id="program">
                                <option value="">Select Program</option>

                                <?php

                                    while($program_details_row = mysqli_fetch_assoc($program_details))
                                    {
                                        ?><option value=" <?php echo $program_details_row["PROGRAM_ID"]?>"> <?php echo $program_details_row["PROGRAM_NAME"]?> </option> <?php
                                    }

                                ?>

                            </select>
                            
                                    <br>


                            <label for="course">Select Course</label>
                            <select name="selected_course" id="course">
                                <option value="">Select Course</option>

                                <?php

                                    while($course_details_row = mysqli_fetch_assoc($course_details))
                                    {
                                        ?><option value=" <?php echo $course_details_row["COURSE_DETAILS_ID"]?>"> <?php echo $course_details_row["COURSE_NAME"]." (".$course_details_row["COURSE_CODE"].")"?> </option> <?php
                                    }

                                ?>

                            </select>

                            <br>

                            <label for="semester">Select Semester</label>
                            <select name="selected_semester" id="semester">
                                <option value="">Select Semester</option>
                                <option value="1">SEMESTER 1</option>
                                <option value="2">SEMESTER 2</option>
                                <option value="3">SEMESTER 3</option>
                                <option value="4">SEMESTER 4</option>
                                <option value="5">SEMESTER 5</option>
                                <option value="6">SEMESTER 6</option>                  
                                
                            </select>


                            <br>

                            <input type="submit" value="Save" name="save">
                            <a href="course_configuration_display.php" class="btn btn-primary">Show Data</a>
                            
                </form>                
        </div>

</body>
</html>


<?php



if(isset($_POST["save"]))
{

    $institute_id = $_POST["selected_institute"];
    $program_id = $_POST["selected_program"];
    $course_id = $_POST["selected_course"];
    $selected_semester = $_POST["selected_semester"];
    
    // echo $institute_id.$program_id.$course_id.$selected_semester;


    if(mysqli_query($conn,"INSERT INTO `course_configuration`(`CONFIG_ID`, `INSTITUDE_ID`, `PROGRAM_ID`, `COURSE_DETAILS_ID`, `SEMESTER`) VALUES ('','$institute_id','$program_id','$course_id','$selected_semester')"))
    {
        // echo "Data Added!!";
        ?><script>window.location="course_configuration_display.php";</script> <?php
    }
    else {
        echo "Failed!!!";
    }


    
    
}

?>
