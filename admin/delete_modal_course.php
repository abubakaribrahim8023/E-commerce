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
                    <form action="" method="post">
                        <input type="hidden" name="ided">
                        <button type="button" name="delete" class="btn-primary" onclick="deleteCourseModal('<?php echo $_GET['course_id'];?>')">Yes</button>
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>