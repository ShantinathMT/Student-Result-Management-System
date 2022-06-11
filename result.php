<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Result Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" align="center">Result Management System</h2>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                              
                             

                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
<?php
// code Student Data
/*$rollid=$_POST['rollid'];
$classid=$_POST['class'];
$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$qery = "SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=:rollid and tblstudents.ClassId=:classid ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
$stmt->execute();*/



$Usn=$_POST['Usn'];
//$Subject_Code=$_POST['Subject_Code'];

$_SESSION['Usn']=$Usn;
//$_SESSION['Subject_Code']=$Subject_Code;

//$qery = "SELECT newstudents.StudentName,newstudents.Studentusn,newstudents.StudentSem,newstudents.StudentDivision,Result.Sub_Code,Result.Test1,Result.Test2,Result.Test3,Result.Avg1 from newstudents join Result on newstudents.Studentusn=Result.Usn where newstudents.Studentusn=:Studentusn and Result.Usn=:Usn ";

//$qery="select * from result,newstudents where result.Usn= '{$_SESSION['Usn']}' and newstudents.Studentusn= '{$_SESSION['Usn']}' and result.Sub_Code= '{$_SESSION['Subject_Code']}'";

$qery="select * from result,newstudents where result.Usn= '{$_SESSION['Usn']}' and newstudents.Studentusn= '{$_SESSION['Usn']}' ";


//$qery="select * from result,newstudents where Test1=14";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':Usn',$Usn,PDO::PARAM_STR);
$stmt->bindParam(':Sub_Code',$Subject_Code,PDO::PARAM_STR);
$stmt->execute();

$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$fl=0;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   

if($fl==0)
{
	?>
<p><b>Student Name :</b> <?php 

echo htmlentities($row->StudentName);
//echo htmlentities($row->Usn);


?></p>
<p><b>Student Usn :</b> <?php 
echo htmlentities($row->Studentusn);
?>
<p><b>Student sem:</b> <?php 
echo htmlentities($row->StudentSem);
?>
<p><b>Student Div:</b> <?php 
echo htmlentities($row->StudentDivision);
}//if block

$fl=1;
?>
<?php }//foreach block

    ?>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                        <tr>
														    <th>Sno</th>
															<th>Subject</th>
                                                            <th>Test1</th>
															<th>Test2</th>
														    <th>Test3</th>
                                                            <th>Avg</th>    
                                                        </tr>
                                               </thead>
												<tbody>
												<?php
												foreach($resultss as $row)
												{   ?>
												
												<tr>
                                                <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                			<td><?php echo htmlentities($row->Sub_Code);?></td>
                                                			<td><?php echo htmlentities($row->Test1);?></td>
															<td><?php echo htmlentities($row->Test2);?></td>
															<td><?php echo htmlentities($row->Test3);?></td>
															<td><?php echo htmlentities($row->Avg1);?></td>
                                                		</tr>
												
												
												<?php }

												?>
	<tr>
                                                <th scope="row" colspan="2">Download Result</th>           
                                                            <td><b><button onclick="window.print();">Download</button></b></td>
                                                             </tr>
											
												
												
<?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
												</tbody>


                                                	
                                                
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="form-group">
                                                           
                                                            <div class="col-sm-6">
                                                               <a href="index.php">Back to Home</a>
                                                            </div>
                                                        </div>

                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>

