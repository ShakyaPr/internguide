<?php
// Include config file
require_once ('connect.php');
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 'company'){
    header("location: company_login.php");
    exit;
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="resume, civic, onepage, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->   
    <link href="../admin/src/assets/images/logo-icon.png" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/flaticon.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/magnific-popup.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://kit.fontawesome.com/6d41dc11d3.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/src/assets/images/logo-icon.png">
    <title></title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <?php
    $s_id =  $_SESSION['id'];
    $get_admin = "select * from employee where id ='$s_id'";
    $run_edit_admin = mysqli_query($connection,$get_admin);
    $row = mysqli_fetch_array($run_edit_admin);
    $name = $row['ename'];
    $username = $row['username'];
    $id = $row['id'];
    $email = $row['email'];
    $phone = $row['phone'];
    $description = $row['description'];
    $phone = $row['address'];
    $introduction = $row['introduction'];
    $vision = $row['vision'];
    $mission = $row['mission'];
    $photo1 = $row['image'];
    $loc1 = "../admin/src/assets/".$photo1;
    $field = $row['field'];      
    $areas = (explode(",",$field));  
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $s_id;
    $_SESSION["username"] = $name;
    $_SESSION["usertype"] = "company";                        
    ?>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="#">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="../admin/src/assets/images/logo-icon.png" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../admin/src/assets/images/logo-icon.png"  class="light-logo" />
                            </b>
                            <span class="logo-text">
                            <img src="../admin/src/assets/images/logo-text.png"  class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../admin/src/assets/images/logo-text.png"  class="light-logo" />
                            </span>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                    data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <h1 style="font-size:120%; "selected><?php
                        date_default_timezone_set('Asia/Colombo');
                        $mydate=getdate(date("U"));
                        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                        ?></h1>
                        <li class="nav-item dropdown">

                        </li>
                        <li class="nav-item d-none d-md-block">

                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo $loc1 ?>"  style="max-height:500px; max-width : 100px" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark"><?php echo $username ?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="company_edit.php"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="php/logout.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link" href="studentlist.php"
                                aria-expanded="false"><i class= "fa fa-search"></i><span
                                    class="hide-menu">Search Student</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="studentsearch.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Applied Students
                                </span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="col-lg-6 text-md-center">
								<figure class="hero-image">
									<img src="<?php echo $loc1 ?>"  style="max-height:500px; max-width : 500px">
								</figure>
							</div>
            <div class="page-breadcrumb">
                <div class="row">
                        <div class="hero-info">
									<h2 style="font-size:300%; "selected><?php echo $row['ename'] ?></h2>
								</div>
                <div class="d-flex align-items-center">
           </div>
           <div class="hero-info">
               <p  style="font-size:150%; "selected><?php echo $row['description'] ?></p>
           </div>
       </div>
   </div>
   <div class="container-fluid">
    <div class="hero-info">
        <h2 style="font-size:250%; "selected>General Info</h2>
        <ul>
         <li ><span> &nbsp Address - </span>&nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $row['address'] ?></li>
         <li><span> &nbsp E-mail - </span>&nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $row['email'] ?></li>
         <li><span>  &nbsp Phone -  </span>&nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $row['phone'] ?></li>
     </ul>


 </div>
 <!-- *************************************************************** -->
 <!-- Start Sales Charts Section -->
 <!-- *************************************************************** -->
 &nbsp
 <h2  style="font-size:250%; "selected>About</h2>
 <div class="row">
    <ul class="resume-list">
     <li>
        <h1  style="font-size:200%; "selected>Introduction</h1>
        <p  style="font-size:100%; "selected><?php echo $row['introduction'] ?></p>
    </li>
    <li>
        <h1 style="font-size:200%; "selected>Vision</h1>
        <p  style="font-size:150%; "selected>&nbsp &nbsp &nbsp <?php echo $row['vision'] ?></p>
    </li>
    <li>
        <h1 style="font-size:200%; "selected>Mission</h1>
        <p  style="font-size:150%; "selected>&nbsp &nbsp &nbsp <?php echo $row['mission'] ?></p>
    </li>
    <li>
        <h1  style="font-size:200%; "selected>Current Working Areas</h1>
        <?php
        $count = 0;
        while($count < count($areas)){
            echo " <p  style='font-size:150%; 'selected >&nbsp &nbsp &nbsp $areas[$count]</p>";
            $count++;
        }
        ?>
    </li>
</ul>
</div>
</div>
<footer  class="footer text-center text-muted">
    <div class="social-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h2 class="hidden-md hidden-sm">Find Us</h2>
                    <div class="social-link-warp">
                        <div class="social-links">
                            <a href="<?php echo $row['pin'] ?>"><i class="fas fa-globe fa-1x"></i></a>
                            <a href="<?php echo $row['linkedin'] ?>"><i class="fab fa-linkedin-in fa-1x"></i></a>
                            <a href="<?php echo $row['facebook'] ?>"><i class="fab fa-facebook-f fa-1x"></i></a>
                            <a href="<?php echo $row['twitter'] ?>"><i class="fab fa-twitter fa-1x"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="dist/js/app-style-switcher.js"></script>
<script src="dist/js/feather.min.js"></script>
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="assets/extra-libs/c3/d3.min.js"></script>
<script src="assets/extra-libs/c3/c3.min.js"></script>
<script src="assets/libs/chartist/dist/chartist.min.js"></script>
<script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="dist/js/pages/dashboards/dashboard1.min.js"></script>

</body>

</html>