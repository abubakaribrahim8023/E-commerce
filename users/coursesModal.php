<?php

    session_start();

    include '../controller/CourseController.php';
    $course = new CourseController();
    
    $courseId = $_GET['course_id'];

    $getResuit = $course->getCourse($courseId);
    $data = $getResuit->fetch();


    if(isset($_POST['registerCourse'])){
        header("location:index.php");
    }
?>
<div class="display-nonee">
    <div class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h3>Register new course</h3>
                <p>register new course</p>
            </div>
            <form id="courseData">
                <div class="modal-body">
                    <div class="flex-container">
                        <div class="form-group">
                            <label for="">Course name</label>
                            <input type="hidden" name="userId" placeholder="e.g java" value="<?php echo $_SESSION['id'];?>">
                            <input type="text" placeholder="e.g java" value="<?php echo $data['course_name'];?>" disabled>
                            <input type="hidden" name="courseid" placeholder="e.g java" value="<?php echo $data['course_id'];?>">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Duration</label>
                                <input type="text" placeholder="e.g six month" value="<?php echo $data['duration'];?>" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" placeholder="e.g 5000 naira" value="<?php echo $data['amount'];?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Course Number</label>
                            <input type="text" placeholder="e.g BR/20/001" value="<?php echo $data['course_number'];?>" disabled>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button class="btn-danger" id="closeApplyModal">Close</button>
                    <button type="submit" onclick="registerCourseUsers()" class="btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

