<?php
    include '../controller/CourseController.php';
    $courses = new CourseController();

    // if(isset($_GET['course_id'])){
        $id = $_GET['course_id'];

        $get = $courses->show($id);

        $row = $get->fetch();
    // }

    
    

?>
<div class="modal" style="left: 0;">
    <div class="modal-dialog">
        <div class="modal-header">
            <h3>Edit course</h3>
            <p>Edit course and click edit button</p>
        </div>
        <form action="" method="POST" id="form">
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <label for="">Course name</label>
                        <input type="text" name="courseName" placeholder="e.g java" value="<?php echo $row['course_name'];?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Duration</label>
                            <input type="text" name="duration" placeholder="e.g six month" value="<?php echo $row['duration'];?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="text" name="amount" placeholder="e.g 5000 naira" value="<?php echo $row['amount'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Course Number</label>
                        <input type="text" name="coursenumber" placeholder="e.g BR/20/001" value="<?php echo $row['course_number'];?>">
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button class="btn-danger" id="closeApplyModal">Close</button>
                <button type="button" name="editCourse" class="btn-primary" onclick="updateRecords()">Edit</button>
            </div>
        </form>
    </div>
</div>