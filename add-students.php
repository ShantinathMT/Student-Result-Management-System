<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$studentusn=$_POST['usn'];
$studentname=$_POST['name']; 
$studentrollno=$_POST['rollno']; 
$studentsem=$_POST['sem']; 
$studentdivision=$_POST['division']; 
$studentEmail=$_POST['emailid'];
$studentgender=$_POST['gender'];
$studentdob=$_POST['dob']; 

$sql="INSERT INTO  newstudents(Studentusn,StudentName,RollNo,StudentSem,StudentDivision,StudentEmail,Gender,DOB) VALUES(:Studentusn,:StudentName,:RollNo,:StudentSem,:StudentDivision,:StudentEmail,:Gender,:DOB)";
$query = $dbh->prepare($sql);
$query->bindParam(':Studentusn',$studentusn,PDO::PARAM_STR);
$query->bindParam(':StudentName',$studentname,PDO::PARAM_STR);
$query->bindParam(':RollNo',$studentrollno,PDO::PARAM_STR);
$query->bindParam(':StudentSem',$studentsem,PDO::PARAM_STR);
$query->bindParam(':StudentDivision',$studentdivision,PDO::PARAM_STR);
$query->bindParam(':StudentEmail',$studentEmail,PDO::PARAM_STR);
$query->bindParam(':Gender',$studentgender,PDO::PARAM_STR);
$query->bindParam(':DOB',$studentdob,PDO::PARAM_STR);
//$query->execute();
//$lastInsertId = $dbh->lastInsertId();


//if($lastInsertId)
	if($query->execute())
//if(mysql_query($sql))
{
$msg="Student info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Student Result Management System</title>
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
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">

<div class="form-group">
<label for="default" class="col-sm-2 control-label">USN</label>
<div class="col-sm-10">
<input type="text" name="usn" class="form-control" id="usn" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Name</label>
<div class="col-sm-10">
<input type="text" name="name" class="form-control" id="name" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Roll No</label>
<div class="col-sm-10">
<input type="text" name="rollno" class="form-control" id="rollno" maxlength="5" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Sem</label>
<div class="col-sm-10">
<input type="text" name="sem" class="form-control" id="sem" maxlength="5" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Division</label>
<div class="col-sm-10">
<input type="text" name="division" class="form-control" id="division" required="required" autocomplete="off">
</div>
</div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="Male" required="required" checked="">Male 
<input type="radio" name="gender" value="Female" required="required">Female 
<input type="radio" name="gender" value="Other" required="required">Other
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email id</label>
<div class="col-sm-10">
<input type="email" name="emailid" class="form-control" id="email" required="required" autocomplete="off">
</div>
</div>
                                               
<div class="form-group">
<label for="date" class="col-sm-2 control-label">DOB</label>
<div class="col-sm-10">
<input type="date"  name="dob" class="form-control" id="date">
</div>
</div>
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
<?PHP } ?>
