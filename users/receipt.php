<?php
	session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
        echo 'cccc';
    }
	include '../controller/CourseController.php';
	$course = new CourseController();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/mystyle/receipt.css">
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
                    <a href="register_course.php">
                        <i class="fa fa-bookmark"></i>
                        <p>Register course</p>
                    </a>
                </li>
                <li>
                    <a href="receipt.php" class="active">
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
                    <i class="fa fa-receipt"></i>
                    <p>Courses Receipt</p>
                </div>
                <div class="add-btn">
                    <div class="add-button">
                        <i class="fa fa-bookmark"></i>
                        <p>3 courses receipt</p>
                    </div>
                </div>
            </div>
        </div>
       <!-- start html receipt  -->
	   <div class="container">
			<div class="course-list">
				<!-- <div class="col-md-4">
					<div id="invoice-POS">
						<div class="receipt-head">
							<h4>Courses Receipt</h4>
						</div>
						<div class="receipt-body">
							<div class="receipt-voice">
								<h4>First name</h4>
								<p>Musa</p>
							</div>
							<div class="receipt-voice">
								<h4>Last name</h4>
								<p>Musa</p>
							</div>
							<div class="receipt-voice">
								<h4>Course name</h4>
								<p>Musa</p>
							</div>
							<div class="receipt-voice">
								<h4>Duration</h4>
								<p>Musa</p>
							</div>
							<div class="receipt-voice">
								<h4>Amount</h4>
								<p>Musa</p>
							</div>
							<div class="receipt-voice">
								<h4>Date</h4>
								<p>Musa</p>
							</div>
							<div class="receipt-print">
								<div class="btn-all">
									<a href="#!">Print</a>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<?php
				// echo $_SESSION['id'];
					$coursesApp = $course->coursesReceipt($_SESSION['id']);  
					$sn=0;
					while($row = $coursesApp->fetch()){
						$sn++;
						echo '
							<div class="col-md-4" id="print">
								<div id="invoice-POS">
									<div class="receipt-head">
										<h4>Courses Receipt</h4>
									</div>
									<div class="receipt-body">
										<div class="receipt-voice">
											<h4>First name</h4>
											<p>'.$row['first_name'].'</p>
										</div>
										<div class="receipt-voice">
											<h4>Last name</h4>
											<p>'.$row['last_name'].'</p>
										</div>
										<div class="receipt-voice">
											<h4>Course name</h4>
											<p>'.$row['course_name'].'</p>
										</div>
										<div class="receipt-voice">
											<h4>Duration</h4>
											<p>'.$row['duration'].'</p>
										</div>
										<div class="receipt-voice">
											<h4>Amount</h4>
											<p><i class="fa fa-naira-sign" style="color: black;"></i> '.$row['amount'].'</p>
										</div>
										<div class="receipt-voice">
											<h4>Date</h4>
											<p>'.$row['date'].'</p>
										</div>
										<div class="receipt-print">
											<div class="btn-all">
												<button onclick="printDiv()">Print</button>
											</div>
										</div>
									</div>
								</div>
							</div>';
					}
				?>		
			</div>
		</div>
   </div>
</head>
  

<script>
    function printDiv() {
        var divContents = document.getElementById("print").innerHTML;
        var a = window.open();
        a.document.write(divContents);
        a.document.close();
        a.print();
    }
</script>
<script src="../asset/myjs/javaScript.js"></script>
   <!-- JAVASCRIPT -->
<script src="apentchat.js"></script>
<script src="../asset/myjs/sidebar.js"></script>
<script>
    function printRec(pramed) {
        
        document.getElementById("print") = window.print();
    }
</script>

</body>
</html>

