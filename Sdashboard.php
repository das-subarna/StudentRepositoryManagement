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
        <title>Team Future SDMP | Student Dashboard</title>
        
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
                padding-left : 15%;
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
                                    <h6 style="margin-left:2%;color:grey"> Welcome <span style="color:black;"><?php echo htmlentities($row['StudentName']);?>!</span></h6>
                                </div>
                            </div>
                            <div class="row mr-t" >
                                <div class="col-md-3 pic1">
                                    <!-- <img src="Images/dp.png" alt="picture" width="100px" style="border-radius: 10%;"> -->
                                </div>
                                <div class="col-md-7">
                                    <h1 class="" style="margin-top:-50px;">Personal Details</h1>
                                    <hr class="her">
                                    <!-- table -->
                                    <table class=" table-hover"><tbody>
                                        <!-- <tr class="float-right">
                                        <img src="Images/dp.png" alt="picture" width="100px" style="border-radius: 10%;">
                                        </tr> -->
                                        <tr>
                                            <td>Roll No:</td>
                                            <td><?php echo htmlentities($row['RollId']);?></td>
                                        </tr>
                                        <tr>
                                            <td>Name:</td>
                                            <td><?php echo htmlentities($row['StudentName']);?></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><?php echo htmlentities($row['StudentEmail']);?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td><?php echo htmlentities($row['Gender']);?></td>
                                        </tr>
                                        <tr>
                                            <td>DOB:</td>
                                            <td><?php $date=$row['DOB']; echo htmlentities(date("d-m-Y", strtotime($date)) );?> <small>(DD-MM-YYYY)</span></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><?php echo htmlentities($row['address']);?></td>
                                        </tr>
                                        <?php
                                        $sql1 = "SELECT * FROM tblclasses WHERE id ='".$row['ClassId']."' ";
                                        $result1 = $dbh->query($sql1);
                                        $row1 = $result1->fetch();
										?>
                                        <tr>
                                            <td>Department:</td>
                                            <td><?php echo htmlentities($row1['ClassName']);?></td>
                                        </tr>
                                        <tr>
                                            <td>Year:</td>
                                            <td><?php echo htmlentities($row1['ClassNameNumeric']);?></td>
                                        </tr>
                                        <tr>
                                            <td>Semester:</td>
                                            <td><?php echo htmlentities($row1['Section']);?></td>
                                        </tr>
                                    </tbody></table>
                                    <!-- table -->
                                    
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
