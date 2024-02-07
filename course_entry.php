<?php
include "amity_database_connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Course Entry</title>
</head>
<body>
<div class="container -fluid">
    <h2>Add Course</h2>
    <form method = "post">
            
                    <div class="">
                        
                        <select name="selected_program" id="">
                            <option value="">Select Program</option>
                            <?php
                            $getprograms = mysqli_query($conn,"SELECT * FROM `program_details`");
                            while($getprograms_rows = mysqli_fetch_assoc($getprograms))
                            {
                                ?>  
                                    <option value=" <?php echo $getprograms_rows["PROGRAM_ID"] ?>"> <?php echo $getprograms_rows["PROGRAM_NAME"] ?> </option>
                                <?php
                            }
                            
                            ?>
                    
                     
                    </select>


                    <select name="selected_course" id="">
                            <option value="">Select Course</option>
                            <?php
                            $getprograms = mysqli_query($conn,"SELECT * FROM `course_details`");
                            while($getprograms_rows = mysqli_fetch_assoc($getprograms))
                            {
                                ?>  
                                    <option value=" <?php echo $getprograms_rows["COURSE_DETAILS_ID"] ?>"> <?php echo $getprograms_rows["COURSE_NAME"] ?> </option>
                                <?php
                            }
                            
                            ?>
                    
                     
                    </select>



                    
                    <input type="submit" value="Save" name="save">
                    </div>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST["save"]))
{
    echo $_POST["selected_program"];
    echo $_POST["selected_course"];
}
?>
