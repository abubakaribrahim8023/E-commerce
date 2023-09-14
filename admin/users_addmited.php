<?php

include '../controller/CourseController.php';
$course = new CourseController();
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


   <!-- start lett side bar here  -->
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
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="add-course.php">
                        <i class="fa fa-add"></i>
                        <p>Add Course</p>
                    </a>
                </li>
                <li>
                    <a href="courses_applied.php">
                        <i class="fa fa-check-to-slot"></i>
                        <p>Courses Applied</p>
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="users_addmited.php" class="active">
                        <i class="fa fa-book-open"></i>
                        <p>User Addmited</p>
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
   <!-- end lett side bar here  -->

   <div class="add-course">
        <div class="add-new">
            <div class="add-head">
                <div class="add-toggle">
                    <i class="fa fa-users"></i>
                    <p>Users Addmited</p>
                </div>
                <div class="add-btn">
                    <div class="add-button">
                        <i class="fa fa-add"></i>
                        <p>Create User</p>
                    </div>
                </div>
            </div>
            <div class="users">
                <div class="tabs" id="tabls">
                    <div class="table-st">
                        <div class="table-st-head">
                            <h4>Users Addmited</h4>
                            <input type="text" placeholder="Search" onkeyup="search()" id="searchBar">
                        </div>
                        <table class="student-data">
                            <tr class="border">
                                <th>#</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Contact</th>
                                <th>App role</th>
                                <th>Courses</th>
                                <th>Duration</th>
                                <th>Amount</th>
                                <th>Payment Status</th>
                                <th>Data</th>
                                <th>Addimition</th>
                            </tr>
                            <?php
                                $coursesApp = $course->coursesApplied();  
                                $sn=0;
                                while($row = $coursesApp->fetch()){
                                    $sn++;
                                    echo '
                                    <tr class="searchtab">
                                        <td>'.$sn.'</td>
                                        <td>'.$row['first_name'].'</td>
                                        <td>'.$row['last_name'].'</td>
                                        <td>'.$row['phone_number'].'</td>
                                        <td>'.$row['app_role'].'</td>
                                        <td>'.$row['course_name'].'</td>
                                        <td>'.$row['duration'].'</td>
                                        <td><i class="fa fa-naira-sign" style="color:white;"></i> '.$row['amount'].'</td>';
                                        
                                        if($row['pay_status'] == 1){
                                            echo '<td>Yes</td>';
                                        }
                                        else{
                                            echo '<td>No</td>';
                                        }
                                        echo '<td>'.$row['date'].'</td>
                                        <td>
                                            <a href="#" class="no">Delete</a>
                                        </td>
                                    </tr>';
                                }
                            ?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </div>

   <!-- JAVASCRIPT -->
<script src="apentchat.js"></script>
<script src="../asset/myjs/sidebar.js"></script>

</body>
</html>