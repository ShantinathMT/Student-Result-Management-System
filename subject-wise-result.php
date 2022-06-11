<?php
session_start();
error_reporting(0);
include('includes/config.php');

//if(strlen($_SESSION['alogin'])=="")
  //  {   
  //  header("Location: index.php"); 
  //  }
   // else{
//if(isset($_POST['submit']))
//{
//$Usn=$_POST['Usn'];
//$Sub_Code=$_POST['Sub_Code']; 
//$Subject_Code=$_POST['Subject_Code'];

//$_SESSION['Usn']=$Usn;
//$_SESSION['Subject_Code']=$Subject_Code;
/*$Test1=$_POST['Test1']; 
$Test2=$_POST['Test2']; 
$Test3=$_POST['Test3']; 

if(($Test1>$Test2) && ($Test1>$Test3))
{
	$gr1=$Test1;
	
}
else
if(($Test2>$Test1) && ($Test2>$Test3))
{
	$gr1=$Test2;
	
}

else
if(($Test3>$Test1) && ($Test3>$Test2))
{

	$gr1=$Test3;
	
}
*/
/*if(($Test1>$Test2 && $Test1<$Test3) || ($Test1<$Test2 && $Test1>$Test3))
{
	$gr2=$Test1;
}
if(($Test2>$Test3 && $Test2<$Test1) || ($Test2<$Test3 && $Test2>$Test1))
{
	$gr2=$Test2;
}

if(($Test3>$Test1 && $Test3<$Test2) || ($Test3<$Test1 && $Test3>$Test2))
{
	$gr2=$Test3;
}
*/
/*
if(($Test1==$Test2) && ($Test2==$Test3))
{
	$gr1=$gr2=$Test1;
}
else
{
if(($Test1>=$Test2 && $Test1<=$Test3) || ($Test1<=$Test2 && $Test1>=$Test3))
{
	$gr2=$Test1;
}
if(($Test2>=$Test3 && $Test2<=$Test1) || ($Test2<=$Test3 && $Test2>=$Test1))
{
	$gr2=$Test2;
}

if(($Test3>=$Test1 && $Test3<=$Test2) || ($Test3<=$Test1 && $Test3>=$Test2))
{
	$gr2=$Test3;
}
}
$Avg1=(($gr1+$gr2)/2);
*/

//echo("Avg=");
//echo($Avg1);
	 
/*$sql="INSERT INTO Result(Usn,Sub_Code,Test1,Test2,Test3,Avg1) VALUES(:Usn,:Sub_Code,:Test1,:Test2,:Test3,:Avg1)";
$query = $dbh->prepare($sql);
$query->bindParam(':Usn',$Usn,PDO::PARAM_STR);
$query->bindParam(':Sub_Code',$Sub_Code,PDO::PARAM_STR);
$query->bindParam(':Test1',$Test1,PDO::PARAM_STR);
$query->bindParam(':Test2',$Test2,PDO::PARAM_STR);
$query->bindParam(':Test3',$Test3,PDO::PARAM_STR);
$query->bindParam(':Avg1',$Avg1,PDO::PARAM_STR);*/

//$query->bindParam(':Avg1',10,PDO::PARAM_STR);

//$lastInsertId = $dbh->lastInsertId();
//if($lastInsertId)
	/*if($query->execute())
{
$msg="Result Created successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
*/

//}

$Subject_Code=$_POST['Subject_Code'];

//$_SESSION['Usn']=$Usn;
//$_SESSION['Subject_Code']=$Subject_Code;

echo $Subject_Code;

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin Subject Creation </title>
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
                                    <h2 class="title">Subject Wise Result</h2>
                                
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
                                                    <h5>Select Subject Code</h5>
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
                                                <form class="form-horizontal" method="post" action="subject-wise-result-res.php">
												
	                               <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Sub_Code</label>
 <select name="Subject_Code" class="form-control" id="default" required="required">
<option value="">Select Sub_code</option>
<?php $sql = "SELECT * from Subject";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->Subject_Code); ?>"><?php echo htmlentities($result->Subject_Code); ?>&nbsp; </option>
<?php }} ?>
 </select>
 
</div>											
												
	
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
<?PHP //} ?>
