<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        $uname = $_SESSION['alogin'];

        //init
        $studentname=$roolid=$studentemail=$gender=$address=$classid=$dob=""; 

        if(isset($_POST['submit']))
        {
            //fetchingall from input
            $studentname=$_POST['fullanme'];
            $roolid=$_POST['rollid']; 
            $studentemail=$_POST['emailid']; 
            $gender=$_POST['gender']; 
            $address=$_POST['address'];
            $classid=$_POST['class']; 
            $dob=$_POST['dob']; 
            $status=1;
            $defpass = MD5("password");

            //echo "<script>console.log('yes ".$roolid."')</script>"; 
            //validation
            $sql = $dbh->prepare("SELECT * FROM student where rollid='$roolid'");
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            // if not empty result
            if (is_array($fetch))  {
                // echo "<script>alert('Alert! Roll no ".$roolid." is already registered with another student.')</script>"; 
                $error="Roll no '".$roolid."' is already reserved for a student";
            }else {
                echo "<script>console.log('not registered earlier')</script>";

                $sql="INSERT INTO  tblstudents(StudentName,RollId,StudentEmail,Gender,address,ClassId,DOB,Status) VALUES(:studentname,:roolid,:studentemail,:gender,:address,:classid,:dob,:status)";
                $sql1= "INSERT INTO student(rollid,password) VALUES(:roolid,:dpass)";
                $query = $dbh->prepare($sql);

                $query1 = $dbh->prepare($sql1);
                $query1->bindParam(':dpass',$defpass,PDO::PARAM_STR);
                $query1->bindParam(':roolid',$roolid,PDO::PARAM_STR);

                $query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
                $query->bindParam(':roolid',$roolid,PDO::PARAM_STR);
                $query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
                $query->bindParam(':gender',$gender,PDO::PARAM_STR);
                $query->bindParam(':address',$address,PDO::PARAM_STR);
                $query->bindParam(':classid',$classid,PDO::PARAM_STR);
                $query->bindParam(':dob',$dob,PDO::PARAM_STR);
                $query->bindParam(':status',$status,PDO::PARAM_STR);

                $query1->execute();
                $query->execute();

                $lastInsertId = $dbh->lastInsertId();
                if($lastInsertId)
                {
                $msg="Student info added successfully";
                }
                else 
                {
                $error="Something went wrong. Please try again";
                }
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Student Admission< </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <!-- Title Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> <!-- apple devices -->
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Admission</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Admission</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Success!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Alert!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="fullanme" class="form-control" id="fullanme" value="<?php echo $studentname ?>" minlength="5" required="required" autocomplete="off">
<!-- <span class="text-light"><small>Format : Firstname Lastname</small></span> -->
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Roll/ID No</label>
<div class="col-sm-10">
<input type="text" name="rollid" class="form-control" id="rollid" maxlength="5" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email ID</label>
<div class="col-sm-10">
<input type="email" name="emailid" class="form-control" value="<?php echo $studentemail ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="email" required="required" autocomplete="off">
</div>
</div>



<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Gender</label>
    <div class="col-sm-10">
        <input type="radio" name="gender" value="Male" required="required">Male 
        <input type="radio" name="gender" value="Female" required="required">Female 
        <input type="radio" name="gender" value="Other" required="required">Others
    </div>
</div>

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
    <input type="text" name="address" class="form-control" id="address" value="<?php echo $address ?>" minlength="5" autocomplete="off">
    </div>
</div>










                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Department & Semester</option>
<?php 
$sql = "SELECT * from tblclasses";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; <?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>
                                                        </div>
                                                    </div>
<div class="form-group">
                                                        <label for="date" class="col-sm-2 control-label">DOB</label>
                                                        <div class="col-sm-10">
                                                            <input type="date"  name="dob" class="form-control" value="<?php echo $dob ?>" id="date">
                                                        </div>
                                                    </div>
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP }
// ends else ?>
