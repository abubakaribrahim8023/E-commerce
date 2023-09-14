<?php
    include ("../controller/ApplyAndPayController.php");
    session_start();

    $new = new ApplyAndPayController;
    
    if(isset($_POST['save'])){
        if(!empty($_SESSION['first_name']) && !empty($_SESSION['last_name']) && !empty($_SESSION['email']) && !empty($_SESSION['pnumber']) && !empty($_SESSION['gender']) && !empty($_SESSION['app_role'])){
            $new->store($_SESSION['first_name'],$_SESSION['last_name'],$_SESSION['email'] ,$_SESSION['pnumber'],$_SESSION['gender'],$_SESSION['app_role'],$_SESSION['date']);
            header("location:index.php?true");
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
    <link rel="stylesheet" href="../asset/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../asset/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../asset/mystyle/invoice.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="head">
                <h4>Invoice</h4>
                <form action="" method="post">
                    <?php
                        if(isset($_SESSION['email'])){
                            echo '<p><button type="submit" name="save">Pay</button></p>';
                        }
                        else{
                            echo '<a href="index.php">Back</a>';
                        }
                    ?>
                </form>
            </div>
            <div class="body">
                <div class="table">
                    <h5>First name</h5>
                    <p><?php if(isset($_SESSION['first_name'])){
                        echo $_SESSION['first_name'];
                    }
                    else{
                        echo "Null";
                    }?></p>
                </div>
                <div class="table">
                    <h5>Last name</h5>
                    <p><?php if(isset($_SESSION['last_name'])){
                        echo $_SESSION['last_name'];
                    }
                    else{
                        echo "Null";
                    }?></p>
                </div>
                <div class="table">
                    <h5>Email</h5>
                    <p><?php if(isset($_SESSION['email'])){
                        echo $_SESSION['email'];
                    }
                    else{
                        echo "Null";
                    }?></p>
                </div>
                <div class="table">
                    <h5>Phone number</h5>
                    <p><?php if(isset($_SESSION['pnumber'])){
                        echo $_SESSION['pnumber'];
                    }
                    else{
                        echo "Null";
                    }?></p>
                </div>
                <div class="table">
                    <h5>Gender</h5>
                    <p><?php if(isset($_SESSION['gender'])){
                        echo $_SESSION['gender'];
                    }
                    else{
                        echo "Null";
                    }?></p>
                </div>
                <div class="table">
                    <h5>Application Role</h5>
                    <p><?php if(isset($_SESSION['app_role'])){
                        echo $_SESSION['app_role'];
                    }
                    else{
                        echo "Null";
                    }?></p>
                </div>

                <div class="table">
                    <h5>Date</h5>
                    <p><?php if(isset($_SESSION['date'])){
                        echo $_SESSION['date'];
                    }
                    else{
                        echo "Null";
                    }?></p>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>