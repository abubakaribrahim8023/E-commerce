<?php
    include '../controller/CourseController.php';
    $course = new CourseController();


    if (isset($_POST['courseid'])) {
        $id = $_POST['userId'];
        $courseid = $_POST['courseid'];

        $course->RegisterCourse($id,$courseid);
        echo "register course successfully";

    }

?>