<?php
    session_start();
    session_destroy();
    session_start();

    include "../controller/ApplyAndPayController.php";
    if(isset($_POST['apply'])){
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pnumber'] = $_POST['pnumber'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['app_role'] = $_POST['app_role'];
        $_SESSION['date'] = date("d M, Y. h:i a");

        if(!empty($_SESSION['first_name']) && !empty($_SESSION['last_name']) && !empty($_SESSION['email']) && !empty($_SESSION['pnumber']) && !empty($_SESSION['gender']) && !empty($_SESSION['app_role'])){
            header("location:invoice.php");
        }
    }

    $new = new ApplyAndPayController;

    $alert = "";

    if(isset($_POST['login'])){
        $email = $_POST['emaillogin'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            $alert = '<div class="alert alert-danger">
                    <p>Email or password is empty !!</p>
                    <i class="fa fa-times" id="closeAlert"></i>
                </div>';
        }
        else{
            $login = $new->login($email,$password);
            if($login->rowCount()>0){
                while ($fetch = $login->fetch()) {
                    $_SESSION['fname'] = $fetch['first_name'];
                    $_SESSION['id'] = $fetch['pay_id'];
                    $_SESSION['lname'] = $fetch['last_name'];
                    $_SESSION['email'] = $fetch['email'];
                    $_SESSION['pnumber'] = $fetch['phone_number'];
                    $_SESSION['gender'] = $fetch['gender'];
                    $_SESSION['app_role'] = $fetch['app_role'];
                    $_SESSION['pay_status'] = $fetch['pay_status'];
                }
                if($_SESSION['pay_status'] == 1){
                    // 6
                    header("location:userdashboard.php");
                }
                else{
                    $alert = '<div class="alert alert-danger">
                            <p>Please complete your payment  !!</p>
                            <i class="fa fa-times" id="closeAlert"></i>
                        </div>';
                }
            }
            else{
                $alert = '<div class="alert alert-danger">
                    <p>User not found</p>
                    <i class="fa fa-times" id="closeAlert"></i>
                </div>';
            }
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
    <link rel="stylesheet" href="../asset/mystyle/style.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../asset/boxicons/css/boxicons.min.css">
</head>
<body>
<div class="display-none-logo" id="modalLogin">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-header">
                    <h3>Login</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non adipisci ullam commodi</p>
                    
                </div>
                <div class="modal-body">
                    <?php echo $alert;?>
                    <form action="" method="post" id="">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="emaillogin" placeholder="e.g test@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="e.g 00000000">
                        </div>
                        <div class="modal-footer">
                            <button class="btn-danger" type="button" id="closeLoginModal">Close</button>
                            <button class="btn-primary" type="submit" name="login">Login</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
    <!-- start here here -->
    <div class="bg-white" >
        <div class="header-flex" id="scrollBar">
            <div class="header-left">
                <img src="../asset/images/briatek_logo.png" alt="">
                <h4>Briatek Institude</h4>
            </div>
            <div class="header-right">
                <li>
                    <p id="modaling">Apply</p>
                </li>
                <li>
                <p id="loginmodal">Login</p>
                </li>
            </div>
        </div>
    </div>
    <!-- end here here -->
    <div class="bg-images">
        <div class="welocome">
            <h4>Welcome To Briatek Institude.</h4>
            <p>learn programming</p>
        </div>
    </div>

    <!-- start courses applied  -->
    <div class="course">
        <div class="container">
            <div class="course-head">
                <h4>Available Programs</h4>
                <i class="fa fa-code" style="color: black;"></i>
            </div>
            <?php
                if(isset($_GET['true'])){
                    echo '<div class="alert alert-success">
                            <p>Application successfull, you receive email !!</p>
                            <i class="fa fa-times" id="closeAlert"></i>
                        </div>';
                }
            ?>
            <div class="course-list">
                <div class="col-md-4">
                    <div class="md-img">
                        <img src="../asset/images/c++.png" alt="">
                        <div class="tabs">
                            <img src="../asset/images/briatek_logo.png" alt="">
                            <p>Briatek computer LTD</p>
                        </div>
                        <div class="course-title">
                            <h4>Start C++ Courses</h4>
                        </div>
                        <div class="course-duration">
                            <div class="duration">
                                <div class="durationtime">
                                    <h3>Amount: </h3>
                                    <p> $10</p>
                                </div>
                                <div class="durationtime">
                                    <h3>Duration:  </h3>
                                    <p> 4 month</p>
                                </div>
                            </div>
                            <div class="apply">
                                <p id="modaling"><i class="fa fa-brands fa-c"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-img">
                        <img src="../asset/images/python.png" alt="">
                        <div class="tabs">
                            <img src="../asset/images/briatek_logo.png" alt="">
                            <p>Briatek computer LTD</p>
                        </div>
                        <div class="course-title">
                            <h4>Start Python Courses</h4>
                        </div>
                        <div class="course-duration">
                            <div class="duration">
                                <div class="durationtime">
                                    <h3>Amount: </h3>
                                    <p> $154</p>
                                </div>
                                <div class="durationtime">
                                    <h3>Duration:  </h3>
                                    <p> 9 month</p>
                                </div>
                            </div>
                            <div class="apply">
                                <p id="modaling"><i class="fa fa-brands fa-python"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-img">
                        <img src="../asset/images/Java.png" alt="">
                        <div class="tabs">
                            <img src="../asset/images/briatek_logo.png" alt="">
                            <p>Briatek computer LTD</p>
                        </div>
                        <div class="course-title">
                            <h4>Start Java Courses</h4>
                        </div>
                        <div class="course-duration">
                            <div class="duration">
                                <div class="durationtime">
                                    <h3>Amount: </h3>
                                    <p> $23</p>
                                </div>
                                <div class="durationtime">
                                    <h3>Duration:  </h3>
                                    <p> 6 month</p>
                                </div>
                            </div>
                            <div class="apply">
                                <p id="modaling"><i class="fa fa-brands fa-java"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-img">
                        <img src="../asset/images/php.png" alt="">
                        <div class="tabs">
                            <img src="../asset/images/briatek_logo.png" alt="">
                            <p>Briatek computer LTD</p>
                        </div>
                        <div class="course-title">
                            <h4>Start Php Courses</h4>
                        </div>
                        <div class="course-duration">
                            <div class="duration">
                                <div class="durationtime">
                                    <h3>Amount: </h3>
                                    <p> $230</p>
                                </div>
                                <div class="durationtime">
                                    <h3>Duration:  </h3>
                                    <p> 11 month</p>
                                </div>
                            </div>
                            <div class="apply">
                                <p id="modaling"><i class="fa fa-brands fa-paypal"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="show-more">
                <a href="#">Show all</a>
            </div>
        </div>
    </div>

    <!-- start footer here  -->
    <div class="footer">
        <div class="about">
            <h4>Briatek Institude</h4>
            <p>Lorem ipsum dolor sit amet consectetur 
                adipisicing elit. Voluptate tenetur 
                doloremque nam culpa reprehenderit 
                dolor soluta, aspernatur adipisci? 
                Delectus enim maiores odit rem 
                aspernatur temporibus est, accusamus
                autem sapiente molestiae!</p>
        </div>
        <div class="footer-icon">
            <div class="icons">
                <i class="bx bxl-facebook"></i>
            </div>
            <div class="icons">
                <i class="bx bxl-whatsapp"></i>
            </div>
            <div class="icons">
                <i class="bx bxl-twitter"></i>
            </div>
            <div class="icons">
                <i class="bx bxl-gmail"></i>
            </div>
            <div class="icons">
                <i class="fa fa-location-dot" id="padding-10"></i>
            </div>
        </div>
    </div>
    <div class="footer-end">
        <footer>copyright &copy; all right reserved. 2023-2024</footer>
    </div>
    <!-- end footer here  -->
    <div class="display-none" id="modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-header">
                    <h3>Buy Application</h3>
                    <p>After buy application, login your to complete your profile and register your course</p>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="flex-container">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" name="first_name" placeholder="e.g abubakar">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" name="last_name" placeholder="e.g sani">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="text" name="email" placeholder="e.g abubakar@gmail.com">
                        </div>
                        <div class="flex-container">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Phone number</label>
                                    <input type="text" name="pnumber" placeholder="000 0000 0000">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender">
                                        <option hidden>-- gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Application Role</label>
                            <select name="app_role">
                                <option hidden>-- appliction role --</option>
                                <option value="IT">IT</option>
                                <option value="Non it">Non it</option>
                            </select>
                        </div>
                    <div class="modal-footer">
                        <button class="btn-danger" type="button" id="closeApplyModal">Close</button>
                        <button class="btn-primary" name="apply">Apply</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
    <script src="../asset/myjs/javaScript.js"></script>
    <script src="../asset/myjs/login.js"></script>
</body>
</html>