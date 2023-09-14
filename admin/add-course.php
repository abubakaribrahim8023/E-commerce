<?php
    include '../controller/CourseController.php';
    $course = new CourseController();

    if(isset($_POST['add'])){
        $courseName     = $_POST['courseName'];
        $duration       = $_POST['duration'];
        $amount         = $_POST['amount'];
        $coursenumber   = $_POST['coursenumber'];
        $filename       = $_FILES['file']['name'];
        $filesize       = $_FILES['file']['size'];
        $filetmp        = $_FILES['file']['tmp_name'];
        $fileFolder     = "../asset/courseLogo/".$filename;

        if(!empty($courseName) && !empty($duration) && !empty($amount) && !empty($coursenumber) && !empty($filename)){
            if($filesize > 1000000){

            }
            else{
                $new = $course->stores($courseName,$duration,$amount,$coursenumber,$filename);
                move_uploaded_file($filetmp,$fileFolder);
            }
        }
    }

    $selectAll = $course->index();
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
    <link rel="stylesheet" href="../asset/">
</head>
<body>
    <div class="display-none" id="modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-header">
                    <h3>Add new course</h3>
                    <p>add new course and amount</p>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="flex-container">
                            <div class="form-group">
                                <label for="">Course name</label>
                                <input type="text" name="courseName" placeholder="e.g java">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Duration</label>
                                    <input type="text" name="duration" placeholder="e.g six month">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="text" name="amount" placeholder="e.g 5000 naira">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Course Number</label>
                                <input type="text" name="coursenumber" placeholder="e.g BR/20/001">
                            </div>
                            <div class="form-group">
                                <label for="">Course logo</label>
                                <input type="file" name="file" accept="image/*">
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button class="btn-danger" id="closeApplyModal">Close</button>
                        <button type="submit" name="add" class="btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- edit course modal  -->
    <div class="display-none" id="modalEdit">
        <!-- edit course with ajax here  -->
    </div>
    </div>

    <!-- delete course with modal and ajax  -->
    <div class="display-none" id="modalDelete">
        <!-- delete course using ajax with javaScript -->
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
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="add-course.php" class="active">
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
                    <a href="#">
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
                <a href="users_addmited.php">
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
                    <p>Add new courses</p>
                </div>
                <div class="add-btn">
                    <div class="add-button" id="modaling">
                        <i class="fa fa-add"></i>
                        <p>Create Course</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="course">
            <div class="container">
                <div id="responss">
                    
                </div>
                <div class="course-list">
                    <?php
                        while ($fetch = $selectAll->fetch()) {
                            echo '<div class="col-md-4">
                                    <div class="md-img">
                                        <img src="../asset/courseLogo/'.$fetch['logo_course'].'" alt="">
                                        <div class="tabs">
                                            <img src="../asset/images/briatek_logo.png" alt="">
                                            <p>Briatek computer LTD</p>
                                        </div>
                                        <div class="course-title">
                                            <h4>Start '.$fetch['course_name'].' Course</h4>
                                        </div>
                                        <div class="course-duration">
                                            <div class="duration">
                                                <div class="durationtime">
                                                    <h3>Amount: </h3>
                                                    <p> <i class="fa fa-naira-sign" style="color:#111;"></i> '.$fetch['amount'].'</p>
                                                </div>
                                                <div class="durationtime">
                                                    <h3>Duration:  </h3>
                                                    <p> '.$fetch['duration'].'</p>
                                                </div>
                                            </div>
                                            <div class="apply-flex">
                                                <div class="down-icon">
                                                    <i class="fa fa-edit" id="text-green" onclick="editCourseAjax('.$fetch['course_id'].')"></i>
                                                </div>
                                                <div class="down-icon">
                                                    <i class="fa fa-trash" id="text-danger" onclick="deleteCourse('.$fetch['course_id'].')"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>
                    <!-- <div class="col-md-4">
                        <div class="md-img">
                            <img src="../asset/images/briatek_logo.png" alt="">
                            <div class="tabs">
                                <img src="../asset/images/briatek_logo.png" alt="">
                                <p>Briatek computer LTD</p>
                            </div>
                            <div class="course-title">
                                <h4>Start Java Course</h4>
                            </div>
                            <div class="course-duration">
                                <div class="duration">
                                    <div class="durationtime">
                                        <h3>Amount: </h3>
                                        <p> <i class="fa fa-naira-sign" style="color:#111;"></i> 7000</p>
                                    </div>
                                    <div class="durationtime">
                                        <h3>Duration:  </h3>
                                        <p> six month</p>
                                    </div>
                                </div>
                                <div class="apply-flex">
                                    <div class="down-icon">
                                        <i class="fa fa-edit" id="text-green"></i>
                                        
                                    </div>
                                    <div class="down-icon">
                                        <i class="fa fa-trash" id="text-danger"></i>
                                            <div class="display-nones" id="modal">
                                                <div class="modal" style="left: 0; right: 0;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-header">
                                                            <h3>Are your sure you want to delete</h3>
                                                            <p>If you delete this course never backup</p>
                                                        </div>
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">

                                                                <div class="modal-footer">
                                                                    <button class="btn-danger" id="closeApplyModal">No</button>
                                                                    <button type="submit" name="add" class="btn-primary">Yes</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
   </div>
   
<script src="../asset/myjs/javaScript.js"></script>
   <!-- JAVASCRIPT -->
<script src="../asset/myjs/sidebar.js"></script>
</body>
</html>