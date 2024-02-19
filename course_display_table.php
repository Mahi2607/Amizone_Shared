<?php 
include "amity_database_connection.php";
include "plugins.php";
// include "header.php";

$course_display_querry = "SELECT DISTINCT course_configuration.SEMESTER,institute_details.INSTITUTE_NAME,program_details.PROGRAM_NAME FROM course_configuration INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID WHERE institute_details.INSTITUTE_ID = 1 AND program_details.PROGRAM_ID = 2 AND course_configuration.SEMESTER > 0;";
$querry = mysqli_query($conn,$course_display_querry);
$semester = 2;
$program_id = 2;
$total_core_credits = 0;
$total_elective_credits = 0;
$total_open_elective_credit = 0;
$total_minor_track_credit = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Display Table</title>

    <style>
        th{
            font-family: "Times New Roman", sans-serif;
        
        }
        td{
            font-family: "Times New Roman", sans-serif;
            font-size : 15px;
        }
    </style>
</head>
<body>


<?php

while($semester <= 2)
{
    // echo $semester;
   
?>
    <div class="container w-100 mt-3 mb-5">
    <table class="table w-100 table-bordered text-center border border-2 border-dark object-fit-fill">
    <thead class="border border-2 border-dark">
        <tr class="border border-2 border-dark">
                <th colspan="8" class="fs-2 bg-warning">
                    SEMESTER <?php echo $semester?>
                </th>
        </tr>
                <tr>
                    <th>
                        COURSE CODE
                    </th>
                    <th>
                        COURSE TITLE
                    </th>
                    <th>
                        LECTURES (L) HOURS PER WEEK
                    </th>
                    <th>
                        TUTORIAL (T) HOURS PER WEEK
                    </th>
                    <th>
                        PRACTICAL (P) HOURS PER WEEK
                    </th>
                    <th>
                        TOTAL CREDITS
                    </th>
                </tr>
            </thead> 
    <?php 
         
    ?>
    
            <tbody>
                


                        <?php
                         
                        $course_core_display_querry = "SELECT course_configuration.CONFIG_ID,course_configuration.COURSE_TYPE,course_configuration.SEMESTER,program_details.PROGRAM_NAME,institute_details.INSTITUTE_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_details.CREDIT,course_details.THEORY,course_details.PRACTICAL,course_details.TUTORIAL FROM course_configuration LEFT JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN course_details on course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID WHERE institute_details.INSTITUTE_ID = 1 AND program_details.PROGRAM_ID = $program_id AND course_configuration.SEMESTER = $semester AND course_configuration.COURSE_TYPE = 'CORE' ORDER BY course_details.COURSE_CODE ASC;";
                        $querry = mysqli_query($conn,$course_core_display_querry);
                        while($course_core_display_row = mysqli_fetch_assoc($querry))
                        {
                            
                            if($course_core_display_row["COURSE_TYPE"] == "CORE")
                            {
                                ?> 
                                <tr>
                                    <td>
                                            <?php echo $course_core_display_row["COURSE_CODE"] ?>
                                    </td>
                                    <td class="text-start">
                                            <?php echo $course_core_display_row["COURSE_NAME"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_core_display_row["THEORY"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_core_display_row["TUTORIAL"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_core_display_row["PRACTICAL"] 
        
                                            ?>
                                          
                                    </td>
                                    <td class="fw-bold">
                                            <?php echo $course_core_display_row["CREDIT"] ?>
                                    </td>
                                    </tr>
                                <?php
                            }
                        }
                        ?>



                        <tr>
                            <th colspan="6" class="border border-2 border-dark bg-success-subtle">
                                CONCENTRATIVE ELECTIVES (ANY ONE) <strong>(3 CREDIT)</strong>
                            </th>
                            
                        </tr>


                    <?php
                        $course_elective_display_querry = "SELECT course_configuration.CONFIG_ID,course_configuration.COURSE_TYPE,course_configuration.SEMESTER,program_details.PROGRAM_NAME,institute_details.INSTITUTE_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_details.CREDIT,course_details.THEORY,course_details.PRACTICAL,course_details.TUTORIAL FROM course_configuration LEFT JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN course_details on course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID WHERE institute_details.INSTITUTE_ID = 1 AND program_details.PROGRAM_ID = $program_id AND	course_configuration.SEMESTER = $semester AND course_configuration.COURSE_TYPE = 'CONCENTRATIVE ELECTIVE' ORDER BY course_details.COURSE_CODE ASC;";
                        $querry = mysqli_query($conn,$course_elective_display_querry);
                        while($course_elective_display_row = mysqli_fetch_assoc($querry))
                        {
                            
                            if($course_elective_display_row["COURSE_TYPE"] == "CONCENTRATIVE ELECTIVE")
                            {
                                ?> 
                                <tr>
                                            <td>
                                            <?php echo $course_elective_display_row["COURSE_CODE"] ?>
                                    </td>
                                    <td class="text-start">
                                            <?php echo $course_elective_display_row["COURSE_NAME"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_elective_display_row["THEORY"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_elective_display_row["TUTORIAL"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_elective_display_row["PRACTICAL"] ?>
                                    </td>
                                    <td class="fw-bold">
                                            <?php echo $course_elective_display_row["CREDIT"] ?>
                                    </td>
                                    </tr>
                                <?php
                            }
                        }
                        ?>
                        


                        <tr>
                            <th colspan="6" class="border border-2 border-dark bg-danger-subtle">
                                OPEN ELECTIVES <strong>(7 CREDIT)</strong>
                            </th>
                        </tr>

                        <?php
                        $course_open_elective_display_querry = "SELECT course_configuration.CONFIG_ID,course_configuration.COURSE_TYPE,course_configuration.SEMESTER,program_details.PROGRAM_NAME,institute_details.INSTITUTE_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_details.CREDIT,course_details.THEORY,course_details.PRACTICAL,course_details.TUTORIAL FROM course_configuration LEFT JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN course_details on course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID WHERE institute_details.INSTITUTE_ID = 1 AND program_details.PROGRAM_ID = $program_id AND	course_configuration.SEMESTER = $semester AND course_configuration.COURSE_TYPE = 'OPEN ELECTIVES' AND course_details.CREDIT <=2 ORDER BY course_details.COURSE_CODE ASC;";
                        $querry = mysqli_query($conn,$course_open_elective_display_querry);
                        while($course_open_elective_display_row = mysqli_fetch_assoc($querry))
                        {
                            
                            if($course_open_elective_display_row["COURSE_TYPE"] == "OPEN ELECTIVES")
                            {
                                ?> 
                                    <tr>
                                            <td>
                                            <?php echo $course_open_elective_display_row["COURSE_CODE"] ?>
                                    </td>
                                    <td class="text-start">
                                            <?php echo $course_open_elective_display_row["COURSE_NAME"] ?> <strong style="color:red;">*</strong>
                                    </td>
                                    <td>
                                            <?php echo $course_open_elective_display_row["THEORY"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_open_elective_display_row["TUTORIAL"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_open_elective_display_row["PRACTICAL"] ?>
                                    </td>
                                    <td class="fw-bold">
                                            <?php echo $course_open_elective_display_row["CREDIT"] ?>
                                    </td>
                                    </tr>
                                <?php
                            }
                        }
                        ?>


                        <tr>
                            <th colspan="6" class="border border-2 border-dark bg-danger-subtle">
                                FOREIGN LANGUAGE - I <strong style="color:red;">*</strong>
                            </th>
                        </tr>

                    <?php
                        $course_open_elective_display_querry2 = "SELECT course_configuration.CONFIG_ID,course_configuration.COURSE_TYPE,course_configuration.SEMESTER,program_details.PROGRAM_NAME,institute_details.INSTITUTE_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_details.CREDIT,course_details.THEORY,course_details.PRACTICAL,course_details.TUTORIAL FROM course_configuration LEFT JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN course_details on course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID WHERE institute_details.INSTITUTE_ID = 1 AND program_details.PROGRAM_ID = $program_id AND course_configuration.SEMESTER = $semester AND course_configuration.COURSE_TYPE = 'OPEN ELECTIVES' AND course_details.CREDIT= 3 ORDER BY course_details.COURSE_CODE ASC;";
                        $querry = mysqli_query($conn,$course_open_elective_display_querry2);
                        while($course_open_elective_display_row2 = mysqli_fetch_assoc($querry))
                        {
                            
                            if($course_open_elective_display_row2["COURSE_TYPE"] == "OPEN ELECTIVES")
                            {
                                ?> 
                                    <tr>
                                            <td>
                                            <?php echo $course_open_elective_display_row2["COURSE_CODE"] ?>
                                    </td>
                                    <td class="text-start">
                                            <?php echo $course_open_elective_display_row2["COURSE_NAME"] ?> 
                                    </td>
                                    <td>
                                            <?php echo $course_open_elective_display_row2["THEORY"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_open_elective_display_row2["TUTORIAL"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_open_elective_display_row2["PRACTICAL"] ?>
                                    </td>
                                    <td class="fw-bold">
                                            <?php echo $course_open_elective_display_row2["CREDIT"] ?>
                                    </td>
                                    </tr>
                                <?php
                            }
                        }
                        ?>


                        <tr>
                            <th colspan="6" class="border border-2 border-dark bg-info-subtle">
                                MINOR TRACK <strong>(3 CREDIT)</strong>
                            </th>
                        </tr>
                       
                    <?php
                        $course_minor_track_display_querry = "SELECT course_configuration.CONFIG_ID,course_configuration.COURSE_TYPE,course_configuration.SEMESTER,program_details.PROGRAM_NAME,institute_details.INSTITUTE_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_details.CREDIT,course_details.THEORY,course_details.PRACTICAL,course_details.TUTORIAL FROM course_configuration LEFT JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN course_details on course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID WHERE institute_details.INSTITUTE_ID = 1 AND program_details.PROGRAM_ID = $program_id AND	course_configuration.SEMESTER = $semester AND course_configuration.COURSE_TYPE = 'MINOR TRACK';";
                        $querry = mysqli_query($conn,$course_minor_track_display_querry);
                        while($course_minor_track_display_row = mysqli_fetch_assoc($querry))
                        {
                            
                            if($course_minor_track_display_row["COURSE_TYPE"] == "MINOR TRACK")
                            {
                                ?> 
                                    <tr>
                                            <td>
                                            <?php echo $course_minor_track_display_row["COURSE_CODE"] ?>
                                    </td>
                                    <td class="text-start">
                                            <?php echo $course_minor_track_display_row["COURSE_NAME"] ?> <strong style="color:red;">*</strong>
                                    </td>
                                    <td>
                                            <?php echo $course_minor_track_display_row["THEORY"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_minor_track_display_row["TUTORIAL"] ?>
                                    </td>
                                    <td>
                                            <?php echo $course_minor_track_display_row["PRACTICAL"] ?>
                                    </td>
                                    <td class="fw-bold">
                                            <?php echo $course_minor_track_display_row["CREDIT"] ?>
                                    </td>
                                    </tr>

                                    
                                <?php
                            }
                        }
                        ?>
                        <tr class="border border-2 border-dark fw-bold fs-4">
                            <th colspan="5" >
                                Total
                            </th>
                            <th class="border border-2 border-dark">
                                25
                            </th>
                    </tr>
                        

                
            </tbody>
            <?php    
?>
        </table>

    </div>
   
        <?php
         $semester++;
          }?>
  
    
</body>
</html>