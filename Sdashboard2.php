<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if (strlen($_SESSION['slogin']) == "") {
    header("Location: index.php");
} else {
    $uname = $_SESSION['slogin'];
    echo "<script> console.log('RollId:" . $uname . "'); </script>"; 
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Team Future SDMP | Admin Dashboard</title>
        <!-- Title Favicons -->
        
        <link href="assets/img/favicon.png" rel="icon" />
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
        <!-- apple devices -->

        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" />
        <link
            rel="stylesheet"
            href="css/animate-css/animate.min.css"
            media="screen"
        />
        <link
            rel="stylesheet"
            href="css/lobipanel/lobipanel.min.css"
            media="screen"
        />
        <link
            rel="stylesheet"
            href="css/toastr/toastr.min.css"
            media="screen"
        />
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" />
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" />
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" />
        <link rel="stylesheet" href="css/main.css" media="screen" />
        
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>
            .her{
                border-color: black;
                
            }
            .mr-t{
                margin-top : 5%;
            }
            .pic1{
                margin-left : 15%;
                margin-bottom: 15%;
                margin-right:0px;
            }
            .det{
                list-style-type:none;
            }
            .det li{
                margin-top:5%;
                color:grey;
            }
            .det span{
                color:black;
                text-indent: 8%;
            }
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
            <?php include 'includes/stopbar.php';?>
            <div class="content-wrapper">
                <div class="content-container">
                    <?php include 'includes/sleftbar.php';?>
                    <div class="main-page">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-1">
                                    <?php
                                        $sql = "SELECT * FROM tblstudents WHERE RollId = $uname ";
                                        $result = $dbh->query($sql);
                                        $row = $result->fetch();
                                        echo "<script>
                                        console.log('name: " . $row[1]. "');
                                        </script>"; ?>
                                    <h6 style="margin-left:2%;color:grey"> Welcome back <span style="color:black;"><?php echo htmlentities($row['StudentName']);?>!</span></h6>
                                </div>
                            </div>
                            <div class="row mr-t" >
                                <div class="col-lg-2 col-md-2 col-sm-12 pic1">
                                    <img src="Images/dp.png" alt="picture" width="100px" style="border-radius: 10%;">
                                </div>
                                <div class="col-md-7">
                                    <h1 class="" style="margin-top:-50px;">Personal Details</h1>
                                    <hr class="her">
                                    <ul class="det">
                                        <li>Roll No:<span class="st" style="margin-left:41%;"><?php echo htmlentities($row['RollId']);?></span></li>
                                        <li>Name:<span class="st" style="margin-left:41.5%;"><?php echo htmlentities($row['StudentName']);?></span></li>
                                        <li>Email:<span class="st" style="margin-left:42%;"><?php echo htmlentities($row['StudentEmail']);?></span></li>
                                        <li>Sex:<span class="st" style="margin-left:44%;"><?php echo htmlentities($row['Gender']);?></span></li>
                                        <li>DOB:<span class="st" style="margin-left:43.5%;"><?php echo htmlentities($row['DOB']);?></span></li>
										<?php
                                        $sql1 = "SELECT * FROM tblclasses WHERE id ='".$row['ClassId']."' ";
                                        $result1 = $dbh->query($sql1);
                                        $row1 = $result1->fetch();
											?>
                                        <li>Department:<span class="st" style="margin-left:37%;"><?php echo htmlentities($row1['ClassName']);?></span></li>
                                        <li>Year:<span class="st" style="margin-left:43.5%;"><?php echo htmlentities($row1['ClassNameNumeric']);?>st Year</span></li>
                                        <li>Semester:<span class="st" style="margin-left:39.5%;"><?php echo htmlentities($row1['Section']);?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php }?>
