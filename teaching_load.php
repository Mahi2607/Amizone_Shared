<?php

include "amity_database_connection.php";
include "plugins.php";
include "header.php";

// $user_details = mysqli_query($conn,"SELECT user_details.USER_NAME,user_details.EMPLOYEE_CODE,course_details.COURSE_CODE,course_details.COURSE_NAME,course_details.CREDIT, institute_details.INSTITUTE_NAME,program_details.PROGRAM_NAME FROM faculty_allotment LEFT JOIN user_details ON faculty_allotment.USER_ID = user_details.USER_ID INNER JOIN course_configuration ON faculty_allotment.CONFIG_ID = course_configuration.CONFIG_ID INNER JOIN course_details ON course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID INNER JOIN institute_details ON course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN program_details ON course_configuration.PROGRAM_ID = program_details.PROGRAM_ID");
$user_details = mysqli_query($conn,"SELECT institute_details.INSTITUTE_NAME,program_details.PROGRAM_NAME,user_details.USER_NAME,user_details.EMPLOYEE_CODE, GROUP_CONCAT(course_details.COURSE_NAME Separator '\n\n') COURSE_NAME ,GROUP_CONCAT(course_details.COURSE_CODE Separator '\n') COURSE_CODE, Sum(course_details.CREDIT) CREDIT, GROUP_CONCAT(course_configuration.COURSE_TYPE SEPARATOR '\n') COURSE_TYPE, GROUP_CONCAT(course_configuration.SEMESTER SEPARATOR '\n')SEMESTER FROM faculty_allotment LEFT JOIN user_details ON faculty_allotment.USER_ID = user_details.USER_ID INNER JOIN course_configuration ON faculty_allotment.CONFIG_ID = course_configuration.CONFIG_ID INNER JOIN course_details ON course_configuration.COURSE_DETAILS_ID = course_details.COURSE_DETAILS_ID INNER JOIN institute_details ON course_configuration.INSTITUDE_ID = institute_details.INSTITUTE_ID INNER JOIN program_details ON course_configuration.PROGRAM_ID = program_details.PROGRAM_ID group by 1,2,3,4;");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teaching Load</title>

    <style>
        /* Font */
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');
*,
*::before,
*::after {
  box-sizing: border-box;
}
* {
padding: 0;
margin: 0;
box-sizing: border-box;
}



.container {
width: 90%;
margin: 20px auto;

}
.heading {
text-align: center;
font-size: 30px;
margin-bottom: 50px;
}

.row {
display: flex;
flex-direction: row;
justify-content: space-around;
flex-flow: wrap;
}


.card {
width: 30%;  
border: 1px solid #ccc;
margin-bottom: 50px;
transition: 0.3s;
display: flex;
flex-direction: column;
overflow: auto;
}
.card-body{
height: auto;
margin-bottom: 2px;
margin-top: 2px;
text-align: center;

}
.card-header {
text-align: center;
padding: 20px 0px;
background: linear-gradient(to right, #FFFF, #FFFF);
color: solid black;
}

.card-footer {
padding: 20px 0px;
background: linear-gradient(to right, #FFFF, #FFFF);
text-align: start;
font-size: 18px;

}

.card-footer .btn {
display: block;
/* color: #fff; */
text-align: center;
background: linear-gradient(to right, #781C68, #9A0680);
color: #fff;
/* background: linear-gradient(to right, #ff416c, #ff4b2b); */
margin-top: none;
text-decoration: none;
padding: 15px 10px;
margin-left: 12px;
margin-right: 12px;
}

.card:hover {
transform: scale(1.05);
box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
}

@media screen and (max-width: 1900px) {
.card {
width: 30%;
}
}
@media screen and (max-width: 1500px) {
.card {
width: 40%;
}
}


@media screen and (max-width: 620px) {
.container {
width: 100%;
}

.heading {
padding: 20px;
font-size: 20px;
}

.card {
width: 85%;
}
}

    
    </style>
</head>
<body>
    <div class="container">
    <div class="row">
        <?php
            while($user_details_row = mysqli_fetch_assoc($user_details))
            {
                ?>
                    <div class="col-4">
                        <div class="card w-75">
                            <div class="card-header fw-bold">
                                <p>
                                     <?php echo $user_details_row["USER_NAME"] ?>
                                </p>
                                <!-- <p>
                                    <?php echo $user_details_row["PROGRAM_NAME"] ?>
                                </p> -->
                              
                            </div>
                            <div class="card-body text-start">
                                <?php

                                // switch($user_details_row["SEMESTER"])
                                // {
                                //         case 1:
                                //             echo  "<p class='alert alert-primary'>SEMESTER ".$user_details_row["SEMESTER"]."</p><hr>";
                                //         break;

                                //         case 2:
                                //             echo  "<p class='alert alert-secondary'>SEMESTER ".$user_details_row["SEMESTER"]."</p><hr>";
                                //             break;

                                //         case 3:
                                //             echo  "<p class='alert alert-success'>SEMESTER ".$user_details_row["SEMESTER"]."</p><hr>";
                                //             break;

                                //         case 4:
                                //             echo  "<p class=''>SEMESTER ".$user_details_row["SEMESTER"]."</p><hr>";
                                //             break;

                                //         case 5:
                                //             echo  "<p class='alert alert-danger'>SEMESTER ".$user_details_row["SEMESTER"]."</p><hr>";
                                //             break;

                                //         case 6:
                                //             echo  "<p class='alert alert-warning'>SEMESTER ".$user_details_row["SEMESTER"]."</p><hr>";
                                //             break;
                                // }
                                        // Process form data when submitted
                                        $inputText =  $user_details_row["COURSE_NAME"];
                                        $lines = explode("\n", $inputText);
                                        $count = 1;
                                        echo "<p class='alert alert-warning'>SEMESTER (".$user_details_row["SEMESTER"].")<br></p>";
                                        foreach ($lines as $line) {
                                            $trimmedLine = trim($line);
                                            if (!empty($trimmedLine)) {
                                                echo $count.") "."$trimmedLine"."<br>";
                                                $count++;
                                            }
                                        }
                                ?>
                                <!-- <?php echo $user_details_row["COURSE_NAME"]."[ ".$user_details_row["COURSE_CODE"]."]" ?> -->
                            
                            </div>
                            <div class="card-footer">
                                <p class = "text-center fs-4">
                                    Total Credits:- <?php echo $user_details_row["CREDIT"] ?>
                                </p>
                               
                            </div>
                        </div>
                    </div>
                
                <?php
            }


        ?>    

    </div>
    </div>


</body>
</html>