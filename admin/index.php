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
                    <a href="index.php" class="active">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="add-course.php">
                        <i class="fa fa-add"></i>
                        <p>Add Course</p>
                    </a>
                </li>
                <li>
                    <a href="courses_applied.php">
                        <i class="fa fa-check-to-slot"></i>
                        <p>Courses Applied</p>
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-book-open"></i>
                        <p>User Addmited</p>
                    </a>
                </li>
            </div>
        </div>
        <div class="nav-footer">
            <div class="nav-line">
                <!-- rgba line  -->
            </div>
            <li>
                <a href="users_addmited.php">
                    <p>Get New Update</p>
                </a>
            </li>
        </div>
   </div>
   <!-- end lett side bar here  -->

   <div class="admin-db">
        <div class="admindb-head">
            <div class="flex-24">
                <div class="position-flex">
                    <div class="position-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="position-text">
                        <p>Users</p>
                        <h4>34,000</h4>
                    </div>
                </div>
                <div class="flex-end">
                    <div class="horizantal-line"></div>
                    <div class="position-footer">
                        <h4>Users</h4>
                        <p>98%</p>
                    </div>
                </div>
            </div>
            <div class="flex-24">
                <div class="position-flex">
                    <div class="position-icon">
                        <i class="fa fa-bookmark"></i>
                    </div>
                    <div class="position-text">
                        <p>Available Courses</p>
                        <h4>20</h4>
                    </div>
                </div>
                <div class="flex-end">
                    <div class="horizantal-line"></div>
                    <div class="position-footer">
                        <h4>Available Courses</h4>
                        <p>12%</p>
                    </div>
                </div>
            </div>
            <div class="flex-24">
                <div class="position-flex">
                    <div class="position-icon">
                        <i class="fa fa-book-open"></i>
                    </div>
                    <div class="position-text">
                        <p>User Addmited</p>
                        <h4>120</h4>
                    </div>
                </div>
                <div class="flex-end">
                    <div class="horizantal-line"></div>
                    <div class="position-footer">
                        <h4>User Addmited</h4>
                        <p>23%</p>
                    </div>
                </div>
            </div>
            <div class="flex-24">
                <div class="position-flex">
                    <div class="position-icon">
                        <i class="fa fa-check-to-slot"></i>
                    </div>
                    <div class="position-text">
                        <p>Courses Applied</p>
                        <h4>14</h4>
                    </div>
                </div>
                <div class="flex-end">
                    <div class="horizantal-line"></div>
                    <div class="position-footer">
                        <h4>Courses Applied</h4>
                        <p>45%</p>
                    </div>
                </div>
            </div>            
        </div>
        <div class="chat-white">
            <div class="chat-head">
                <h4>Briatek Institude Calender</h4>
            </div>
            <div class="hight-100">
                <div id="chart">
                </div>
            </div>
        </div>
   </div>

   <!-- JAVASCRIPT -->
<script src="apentchat.js"></script>
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