<?php

    include '../controller/CourseController.php';
    $course = new CourseController();
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Briatek</title>
    <link rel="stylesheet" href="../asset/mystyle/admin.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../asset/boxicons/css/boxicons.min.css">
</head>
<body>
    <div class="display-modal" id="display-modal">
        <!-- view course apply  -->
    </div>
    </div>
    <div class="head">
        <div class="header-left">
            <div class="header-top">
                <p>Admin / </p>
                <h5>&nbsp; Dashboard</h5>
            </div>
            <h4>Dashboard</h4>
        </div>
        <div class="header-right">
            <div class="head-search">
                <input type="text" placeholder="Type Text">
                <p>Setting</p>
            </div>
            <div class="profile">
                <img src="../asset/images/photo-1542831371-29b0f74f9713.jpeg" alt="">
            </div>
        </div>
        <div class="mobile-menu">
            <i class="fa fa-bars" id="openMenu"></i>
        </div>
    </div>


   <!-- start letf side bar here  -->
   <div class="left-side" id="sideBar">
        <div class="nav-head">
            <i class="fa fa-book-open-reader"></i>
            <h3>Briatek Institude</h3>
        </div>
        <div class="nav-line">
            <!-- rgba line  -->
        </div>
        <div class="nav-links">
            <div class="nav-body">
                <li>
                    <a href="userdashboard.php">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="complete_profile.php">
                        <i class="fa fa-user"></i>
                        <p>Complete profile</p>
                    </a>
                </li>
                <li>
                    <a href="register_course.php" class="active">
                        <i class="fa fa-bookmark"></i>
                        <p>Register course</p>
                    </a>
                </li>
                <li>
                    <a href="receipt.php">
                        <i class="fa fa-check-to-slot"></i>
                        <p>Course Receipt</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-certificate"></i>
                        <p>Certificate</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-book-open"></i>
                        <p>Appliction Receipt</p>
                    </a>
                </li>
            </div>
        </div>
        <div class="nav-footer">
            <div class="nav-line">
                <!-- rgba line  -->
            </div>
            <li>
                <a href="#">
                    <p>Get New Update</p>
                </a>
            </li>
        </div>
   </div>
   <!-- end letf side bar here  -->

   <div class="add-course">
        <div class="add-new">
            <div class="add-head">
                <div class="add-toggle">
                    <i class="fa fa-add"></i>
                    <p>Register new courses</p>
                </div>
                <div class="add-btn">
                    <div class="add-button">
                        <i class="fa fa-bookmark"></i>
                        <p>100 courses</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="course">
            <div class="container">
                <div class="course-list">
                    <?php
                        $courses = $course->index();
                        while($getCourse = $courses->fetch()){
                            echo '<div class="col-md-4">
                                <div class="md-img">
                                    <img src="../asset/courseLogo/'.$getCourse['logo_course'].'">
                                    <div class="tabs">
                                        <img src="../asset/images/briatek_logo.png" alt="">
                                        <p>Briatek computer LTD</p>
                                    </div>
                                    <div class="course-title">
                                        <h4>Start '.$getCourse['course_name'].' Courses</h4>
                                    </div>
                                    <div class="course-duration">
                                        <div class="duration">
                                            <div class="durationtime">
                                                <h3>Amount: </h3>
                                                <p> '.$getCourse['amount'].'</p>
                                            </div>
                                            <div class="durationtime">
                                                <h3>Duration:  </h3>
                                                <p> '.$getCourse['duration'].'</p>
                                            </div>
                                        </div>
                                        <div class="apply">
                                            <p onclick="openApply('.$getCourse['course_id'].')"><i class="fa fa-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    
                    ?>
                    
                </div>
            </div>
        </div>
   </div>
   
<script src="../asset/myjs/javaScript.js"></script>
   <!-- JAVASCRIPT -->
<script src="apentchat.js"></script>
<script src="../asset/myjs/sidebar.js"></script>
</body>
</html>