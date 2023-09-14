<?php
    include '../controller/CourseController.php';
    $course = new CourseController();

    if(isset($_GET['course_id'])){

        $id = $_GET['course_id'];

        $delete = $course->delete($id);

        echo '<div class="alert alert-success">
                <p>Deleted course successfull !!</p>
                <i class="fa fa-times" id="closeAlert"></i>
            </div>';
    }


?>