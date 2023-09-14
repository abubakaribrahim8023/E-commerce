<?php
    include ("../controller/ApplyAndPayController.php");
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
    }
    $message = "";
    $new = new ApplyAndPayController();

    $edit = $new->show($_SESSION['id']);
    $fetch = $edit->fetch();

    if(isset($_POST['update'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $pnumber = $_POST['pnumber'];
        $gender = $_POST['gender'];
        $app_role = $_POST['app_role'];
        $state                 = $_POST['state'];
        $lga                 = $_POST['lga'];
        $courseStudy                 = $_POST['courseStudy'];
        $address                 = $_POST['address'];
        
        if(
            empty($first_name) ||
            empty($last_name) ||
            empty($email) ||
            empty($pnumber) ||
            empty($gender) ||
            empty($app_role) ||
            empty($state) ||
            empty($lga) ||
            empty($courseStudy) ||
            empty($address)
        )
        {
            $message = '<div class="alert alert-danger">
                        <p>All fields must not be empty !!</p>
                        <i class="fa fa-times" id="closeAlert"></i>
                    </div>'; 
        }
        elseif(
            !empty($first_name) &&
            !empty($last_name) &&
            !empty($email) &&
            !empty($pnumber) &&
            !empty($gender) &&
            !empty($app_role) &&
            !empty($state) &&
            !empty($lga) &&
            !empty($courseStudy) &&
            !empty($address)

        )
        {
            $update = $new->update(
                $first_name,
                $last_name,
                $email,
                $pnumber,
                $gender,
                $app_role,
                $state,
                $lga,
                $courseStudy,
                $address,
                $_SESSION['id']
            );

            header("location:return.php?true");
        }
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
    <link rel="stylesheet" href="../asset/">
</head>
<body>
    
    <div class="head">
        <div class="header-left">
            <div class="header-top">
                <p>User / </p>
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
                    <a href="userdashboard.php">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="active">
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
   <!-- end lett side bar here  -->

   <div class="admin-db">
        <div class="profile-flex">
            <div class="user-profile">
                <div class="profile-user">
                    <img src="../asset/images/c++.png" alt="">
                    <div class="user-name-space">
                        <h4><?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname'];?></h4>
                        <p><?php echo $_SESSION['app_role'];?> Student</p>
                    </div>
                </div>
                <div class="biodata">
                    <h4>Bio Graphy</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque ad maiores
                    impedit, pariatur repellat exercitationem non harum possimus architecto
                    provident nostrum, unde, eveniet velit at officia? Quas quaerat dolore assumenda.</p>
                </div>
            </div>
            <div class="complete-p">
                <div class="complete-head">
                    <h4>My profile</h4>
                    <p>Complete your profile before register any courses</p>
                </div>
                <?php
                    if(isset($_GET['true'])){
                        echo '<div class="alert alert-success">
                                <p>Update profile successfull !!</p>
                                <i class="fa fa-times" id="closeAlert"></i>
                            </div>';
                    }
                 echo $message;
                ?>
                <div class="complete-body">
                    <form action="" method="post">
                        <div class="container-fluide">
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" name="first_name" value="<?php echo $fetch['first_name'];?>">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" name="last_name" value="<?php echo $fetch['last_name'];?>">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="<?php echo $fetch['email'];?>">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">Phone number</label>
                                    <input type="text" name="pnumber" value="<?php echo $fetch['phone_number'];?>">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">Application Role</label>
                                    <select name="app_role" id="">
                                        <option hidden value="<?php echo $_SESSION['app_role'];?>"><?php echo $fetch['app_role'];?></option>
                                        <option value="IT">IT</option>
                                        <option value="Not IT">Not IT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="">
                                        <option hidden value="<?php echo $_SESSION['gender'];?>"><?php echo $fetch['gender'];?></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">State</label>
                                    <input type="text" name="state" value="<?php echo $fetch['state'];?>">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">LGA</label>
                                    <input type="text" name="lga" value="<?php echo $fetch['ltd'];?>">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">Course Of Study</label>
                                    <input type="text" name="courseStudy" value="<?php echo $fetch['course_of_study'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address"><?php echo $fetch['home_address'];?></textarea>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <button class="btn-change" name="update">save change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="" method="post">
                        <div class="password">
                            <h4>Change Password</h4>
                        </div>
                        <div class="container-fluide">
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="password">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <label for="">Comfirm Password</label>
                                    <input type="password">
                                </div>
                            </div>
                            <div class="col-ms-4">
                                <div class="form-group">
                                    <button class="btn-password">Change password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>

   <!-- JAVASCRIPT -->
<script src="../admin/apentchat.js"></script>
<script src="../asset/myjs/sidebar.js"></script>
<script>
  var options = {
    chart: {
        height: 550,
        type: "area"
    },
    dataLabels: {
        enabled: false
    },
    series: [
        {
            name: "Briatek Institude",
            data: [15, 25, 38, 55, 69, 83, 99]
        }
    ],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 4,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100]
        }
    },
    xaxis: {
        categories: [
            "01 Jan",
            "02 Feb",
            "03 March",
            "04 April",
            "05 May",
            "06 June",
            "07 July",
            "08 July"
        ]
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
</body>
</html>