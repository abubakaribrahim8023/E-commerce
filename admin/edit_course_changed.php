
<?php
    include '../controller/CourseController.php';
    $courses = new CourseController();
    
    if(isset($_POST['id'])){
        $id             = $_POST['id'];
        $courseName     = $_POST['courseName'];
        $duration       = $_POST['duration'];
        $amount         = $_POST['amount'];
        $coursenumber   = $_POST['coursenumber'];
        // echo $courseNameEdit;
            
        if(empty($courseName) || empty($duration) || empty($amount) || empty($coursenumber)){
            echo '<div class="alert alert-danger">
                    <p>All fields must not be empty !!</p>
                    <i class="fa fa-times" id="closeAlert"></i>
                </div>';
        }
        elseif(!empty($courseName) && !empty($duration) && !empty($amount) && !empty($coursenumber)){
            $new = $courses->updateCourse($courseName,$duration,$amount,$coursenumber,$id);
            echo '<div class="alert alert-success">
                    <p>Update course successfull !!</p>
                    <i class="fa fa-times" id="closeAlert"></i>
                </div>';
        }
    }


?>