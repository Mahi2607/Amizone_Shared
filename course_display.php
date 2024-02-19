<?php

include "amity_database_connection.php";
include "plugins.php";
// $querry = mysqli_query($conn,"SELECT course_configuration.CONFIG_ID,course_configuration.COURSE_TYPE,course_configuration.SEMESTER,program_details.PROGRAM_NAME,institute_details.INSTITUTE_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_details.CREDIT,course_details.THEORY,course_details.PRACTICAL,course_details.PRACTICAL,course_details.TUTORIAL,course_details.PROJECT,course_details.CONTINUOUS_EVALUATION,course_details.ATTENDANCE,course_details.ATTENDANCE,course_details.TOTAL_INTERNAL,course_details.TOTAL_EXTERNAL,course_details.COURSE_OUTCOME,course_details.COURSE_OBJECTIVE,course_details.MODULE_1,course_details.MODULE_1_HOURS,course_details.MODULE_2,course_details.MODULE_2_HOURS,course_details.MODULE_3,course_details.MODULE_3_HOURS,course_details.MODULE_4,course_details.MODULE_4_HOURS,course_details.MODULE_5,course_details.MODULE_5_HOURS,course_details.REFERENCE FROM course_configuration LEFT JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN course_details on course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID ORDER BY course_details.COURSE_CODE ASC;");
//$querry1 = mysqli_fetch_array($querry);
if(!empty($_GET["display_main_query"]))
{
    $get_main_querry = $_GET["display_main_query"];
}
if(!empty($_GET["config_id"]))
{
    $get_config_id = $_GET["config_id"];
}

$course_display_querry  = "SELECT course_configuration.CONFIG_ID,course_configuration.COURSE_TYPE,course_configuration.SEMESTER,program_details.PROGRAM_NAME,institute_details.INSTITUTE_NAME,course_details.COURSE_CODE,course_details.COURSE_NAME,course_details.CREDIT,course_details.THEORY,course_details.PRACTICAL,course_details.PRACTICAL,course_details.TUTORIAL,course_details.PROJECT,course_details.CONTINUOUS_EVALUATION,course_details.ATTENDANCE,course_details.ATTENDANCE,course_details.TOTAL_INTERNAL,course_details.TOTAL_EXTERNAL,course_details.COURSE_OUTCOME,course_details.COURSE_OBJECTIVE,course_details.MODULE_1,course_details.MODULE_1_HOURS,course_details.MODULE_2,course_details.MODULE_2_HOURS,course_details.MODULE_3,course_details.MODULE_3_HOURS,course_details.MODULE_4,course_details.MODULE_4_HOURS,course_details.MODULE_5,course_details.MODULE_5_HOURS,course_details.REFERENCE FROM course_configuration LEFT JOIN program_details on course_configuration.PROGRAM_ID = program_details.PROGRAM_ID INNER JOIN institute_details on course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN course_details on course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID";


if(!empty($get_main_querry))
{
    // $get_main_querry = $get_main_querry." ORDER BY course_configuration.SEMESTER ASC, course_configuration.COURSE_TYPE DESC, course_details.COURSE_CODE ASC";
    $get_main_querry = $get_main_querry." ORDER BY CASE WHEN `course_configuration`.`COURSE_TYPE`='CORE' THEN 'C' WHEN `course_configuration`.`COURSE_TYPE`='MINOR TRACK' THEN 'Z' ELSE `course_configuration`.`COURSE_TYPE` END ASC;";
    $course_display_querry = $course_display_querry.$get_main_querry;
}
else if(!empty($get_config_id))
{

    $course_display_querry = $course_display_querry." WHERE CONFIG_ID = $get_config_id ORDER BY CASE WHEN `course_configuration`.`COURSE_TYPE`='CORE' THEN 'C' WHEN `course_configuration`.`COURSE_TYPE`='MINOR TRACK' THEN 'Z' ELSE `course_configuration`.`COURSE_TYPE` END ASC;";
}
else{
    // $course_display_querry = $course_display_querry." ORDER BY course_configuration.SEMESTER ASC, course_configuration.COURSE_TYPE DESC, course_details.COURSE_CODE ASC";
    $course_display_querry = $course_display_querry." ORDER BY CASE WHEN `course_configuration`.`COURSE_TYPE`='CORE' THEN 'C' WHEN `course_configuration`.`COURSE_TYPE`='MINOR TRACK' THEN 'Z' ELSE `course_configuration`.`COURSE_TYPE` END ASC;";
}



// echo $get_main_querry;
// echo $course_display_querry;

$querry = mysqli_query($conn,$course_display_querry);
$page_count=1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    


    <title>Course Display</title>


    <style>
       ul,li
        {
            font-family: 'Roboto', sans-serif;
        }
        table,th,td,thead,tbody,div
        {
            font-family: 'Poppins', sans-serif;
        }
    </style>
  
</head>
<body>
    <?php 
        while($querry1 = mysqli_fetch_assoc($querry))
        {

    
    
    ?>
    <div class="container-fluid w-75 mt-5 mb-5 border border-2 border-dark p-5">
         
                <h3 class="text-center  border border-1 border-dark p-3 bg-warning"><?php echo $querry1["COURSE_NAME"] ?></h3>
                    <table class="table w-100 table-bordered text-center border border-1 border-dark object-fit-fill">
                            <thead>
                                    <tr>
                                        <th>Institute Name</th>
                                        <th>Program Name</th>
                                        <th>Course Type</th>
                                        <th>Semester</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $querry1["INSTITUTE_NAME"] ?> 
                                        </td>
                                        <td>
                                            <?php echo $querry1["PROGRAM_NAME"] ?> 
                                        </td>
                                        <td>
                                            <?php echo $querry1["COURSE_TYPE"] ?> 
                                        </td>
                                        <td>
                                            <?php echo $querry1["SEMESTER"] ?> 
                                        </td>
                                    </tr>
                                <tr>
                                <th scope="col">Course Code</th>
                                <th scope="col">Course Name</th>
                                <th scope="col" colspan="2">Credits</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>      <?php echo $querry1["COURSE_CODE"] ?>     </td>
                                <td>      <?php echo $querry1["COURSE_NAME"] ?>     </td>
                                <td colspan="2">      <?php echo $querry1["CREDIT"] ?>          </td>
                                
                                </tr>
                            

                            </tbody>
                    </table>

       

          

                    <table class="table table-bordered text-center border border-1 border-dark object-fit-fill">
                            <thead>
                                <tr>
                                <th colspan="3" scope="col">Contact Hours</th>
                                <th colspan="4" scope="col">Credit Assigned</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th>Theory</th>
                                <th>Practical</th>
                                <th>Tutorial</th>


                                <th>Theory</th>
                                <th>Practical</th>
                                <th>Tutorial</th>
                                <th>Total</th>
                                
                                </tr>

                                <tr>
                                    <!-- data from the database -->

                                    <td>      <?php echo $querry1["THEORY"] ?></td>
                                    <td>      <?php echo $querry1["PRACTICAL"] ?></td>
                                    <td>      <?php echo $querry1["TUTORIAL"] ?></td>
                                    <td>      <?php echo $querry1["THEORY"] ?></td>
                                    <td>      <?php echo $querry1["PRACTICAL"] ?></td>
                                    <td>      <?php echo $querry1["TUTORIAL"] ?></td>
                                    <td>      <?php echo $querry1["CREDIT"] ?>  </td>
                                </tr>
                            

                            </tbody>
                    </table>


           
                    <table class="table table-bordered text-center border border-1 border-dark">
                            <thead>
                                <tr>
                                <th colspan="6" scope="col">Theory</th>
                                <th colspan="4" scope="col">Term Work/Practical/Oral</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                <th colspan="4">Internal Assesment</th>
                                <th colspan="2">External Assesment</th>


                                
                                <th rowspan="2">Term Work</th>
                                <th rowspan="2">Prac.</th>
                                <th rowspan="2">Oral</th>
                                <th rowspan="2">Total</th>


                                
                                </tr>

                                <tr>
                                    <th>Project</th>
                                    <th>Continuous Evaluation</th>
                                    <th>Attendance</th>
                                    <th>Total Internal</th>

                                    <th >Duration Of End Sem Exam</th>
                                    <th >End Sem Exam</th>
                                    
                                    
                                   
                                </tr>
                                <tr>
                                    <!-- data from the database -->
                                    <td> <?php echo $querry1["PROJECT"] ?></td>
                                    <td> <?php echo $querry1["CONTINUOUS_EVALUATION"] ?></td>
                                    <td> <?php echo $querry1["ATTENDANCE"] ?></td>
                                    <td> <?php echo $querry1["TOTAL_INTERNAL"] ?></td>
                                    <td> <?php echo $querry1["TOTAL_EXTERNAL"] ?></td>
                                    <td> </td>
                                    <td>-</td>
                                    <td> <?php echo $querry1["PRACTICAL"] ?> Hours</td>
                                    <td>-</td>
                                    <td> 
                                        <?php $total_marks =  $querry1["TOTAL_INTERNAL"] + $querry1["TOTAL_EXTERNAL"];?> 
                                        <?php echo $total_marks; ?>
                                    </td>

                                </tr>
                            

                            </tbody>
                    </table>


                   
                  
                        <h5 class="text-center  border border-1 border-dark p-2 bg-warning">COURSE OUTCOME</h5>
                        <ul id="outputList">
                            <?php

                                    // Process form data when submitted
                                    $inputText = $querry1["COURSE_OUTCOME"];
                                    $lines = explode(".", $inputText);

                                    foreach ($lines as $line) {
                                        $trimmedLine = trim($line);
                                        if (!empty($trimmedLine)) {
                                            echo "<li>$trimmedLine</li>";
                                        }
                                    }
                               
                            ?>
                        </ul>
                             
              

                    <h5 class="text-center  border border-1 border-dark p-2 bg-warning">COURSE OBJECTIVE</h5>
            
                    <ul id="outputList">
                            <?php

                                    // Process form data when submitted
                                    $inputText = $querry1["COURSE_OBJECTIVE"];
                                    $lines = explode(".", $inputText);

                                    foreach ($lines as $line) {
                                        $trimmedLine = trim($line);
                                        if (!empty($trimmedLine)) {
                                            echo "<li>$trimmedLine</li>";
                                        }
                                    }
                               
                            ?>
                    </ul>
                 

                   

                    <table class="table table-bordered border border-1 border-dark">
                        
                            <thead>
                                <tr class="text-center">
                                 <th colspan="4" class="bg-warning">Detailed Syllabus</th>
                        
                                </tr>
                                <tr class="text-center">
                                    <th scope="col">Module/Unit</th>
                                    <th scope="col">Course Module / Contents</th>
                                    <th scope="col">Hours</th>
                                    <th scope="col">Marks Weightage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                 
                                    <th class="text-center"> 1 </th>
                                    <td> 
                                        <ul>
                                            <?php  
                                                
                                                    // Process form data when submitted
                                                $inputText =  $querry1["MODULE_1"];
                                                $lines = explode(".", $inputText);

                                                foreach ($lines as $line) {
                                                    $trimmedLine = trim($line);
                                                    if (!empty($trimmedLine)) {
                                                        echo "<li>$trimmedLine</li>";
                                                    }
                                                }
                                        
                                            ?>
                                        </ul>
                                    </td>

                                    <th class="text-center"> <?php echo $querry1["MODULE_1_HOURS"] ?> </th>
                                    <th class="text-center"> 
                                        <?php 
                                            $module1_percentage =  round($querry1["MODULE_1_HOURS"]/45*100);
                                            echo $module1_percentage." % ";
                                         ?>
                                    </th>
                                </tr>


                                <tr>
                                 
                                    <th class="text-center"> 2 </th>
                                    <td> 
                                        <ul>
                                            <?php  
                                                
                                                    // Process form data when submitted
                                                $inputText =  $querry1["MODULE_2"];
                                                $lines = explode(".", $inputText);

                                                foreach ($lines as $line) {
                                                    $trimmedLine = trim($line);
                                                    if (!empty($trimmedLine)) {
                                                        echo "<li>$trimmedLine</li>";
                                                    }
                                                }
                                        
                                            ?>
                                        </ul>
                                    </td>

                                    <th class="text-center"> <?php echo $querry1["MODULE_2_HOURS"] ?> </th>
                                    <th class="text-center"> 
                                        <?php 
                                            $module2_percentage =  round($querry1["MODULE_2_HOURS"]/45*100);
                                            echo $module2_percentage." % ";
                                         ?>
                                    </th>
                                </tr>
                            
                            



                                <tr>
                                 
                                    <th class="text-center"> 3 </th>
                                    <td> 
                                        <ul>
                                            <?php  
                                                
                                                    // Process form data when submitted
                                                $inputText =  $querry1["MODULE_3"];
                                                $lines = explode(".", $inputText);

                                                foreach ($lines as $line) {
                                                    $trimmedLine = trim($line);
                                                    if (!empty($trimmedLine)) {
                                                        echo "<li>$trimmedLine</li>";
                                                    }
                                                }
                                        
                                            ?>
                                        </ul>
                                    </td>

                                    <th class="text-center"> <?php echo $querry1["MODULE_3_HOURS"] ?> </th>
                                    <th class="text-center"> 
                                        <?php 
                                            $module3_percentage =  round($querry1["MODULE_3_HOURS"]/45*100);
                                            echo $module3_percentage." % ";
                                         ?>
                                    </th>
                                </tr>



                                <tr>
                                 
                                    <th class="text-center"> 4 </th>
                                    <td> 
                                        <ul>
                                            <?php  
                                                
                                                    // Process form data when submitted
                                                $inputText =  $querry1["MODULE_4"];
                                                $lines = explode(".", $inputText);

                                                foreach ($lines as $line) {
                                                    $trimmedLine = trim($line);
                                                    if (!empty($trimmedLine)) {
                                                        echo "<li>$trimmedLine</li>";
                                                    }
                                                }
                                        
                                            ?>
                                        </ul>
                                    </td>

                                    <th class="text-center"> <?php echo $querry1["MODULE_4_HOURS"] ?> </th>
                                    <th class="text-center"> 
                                        <?php 
                                            $module4_percentage =  round($querry1["MODULE_4_HOURS"]/45*100);
                                            echo $module4_percentage." % ";
                                         ?>
                                    </th>
                                </tr>



                                <!-- <tr>
                                 
                                    <th class="text-center"> 5 </th>
                                    <td> 
                                        <ul>
                                            <?php  
                                                
                                                    // Process form data when submitted
                                                // $inputText =  $querry1["MODULE_5"];
                                                $lines = explode(".", $inputText);

                                                foreach ($lines as $line) {
                                                    $trimmedLine = trim($line);
                                                    if (!empty($trimmedLine)) {
                                                        echo "<li>$trimmedLine</li>";
                                                    }
                                                }
                                        
                                            ?>
                                        </ul>
                                    </td>

                                    <th class="text-center"> <?php echo $querry1["MODULE_5_HOURS"] ?> </th>
                                    <th class="text-center"> 
                                        <?php 
                                            $module5_percentage =  round($querry1["MODULE_5_HOURS"]/45*100);
                                            echo $module5_percentage." % ";
                                         ?>
                                    </th>
                                </tr>
                             -->
                            


                                <tr class="text-center">
                                    <th colspan = "2">Total</th>
                                    <th>
                                        <?php 
                                            $total_module_hours = $querry1["MODULE_1_HOURS"] + $querry1["MODULE_2_HOURS"] + $querry1["MODULE_3_HOURS"] + $querry1["MODULE_4_HOURS"] + $querry1["MODULE_5_HOURS"];
                                            echo $total_module_hours;
                                        ?>
                                    </th>
                                    <th>
                                        <?php
                                        
                                             $total_module_percentage = $module1_percentage + $module2_percentage + $module3_percentage + $module4_percentage + $module5_percentage;
                                             echo $total_module_percentage. " % ";  
                                        
                                        ?>
                                    </th>
                                </tr>
                            

                            </tbody>
                    </table>

                    <h5 class="text-center  border border-1 border-dark p-2">References</h5>
                    <ul>
                        <?php  
                                                    
                                // Process form data when submitted
                            $inputText =  $querry1["REFERENCE"];
                            $lines = explode("*", $inputText);

                            foreach ($lines as $line) {
                                $trimmedLine = trim($line);
                                if (!empty($trimmedLine)) {
                                    echo "<li>$trimmedLine</li>";
                                }
                            }
                    
                          ?>
                    </ul>


            
                            <hr>
                            <p class="text-end">
                                <!-- Page No <?php echo $page_count; $page_count++;?> -->
                            </p>
                               
                            
    </div>

        <?php } ?>
</body>


</html>
