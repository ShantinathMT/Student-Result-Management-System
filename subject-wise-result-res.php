<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])=="")
  {   
  header("Location: index.php"); 
   }
    else
	{


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
												
	                               				<?php
										
												$Subject_Code=$_POST['Subject_Code'];

												$_SESSION['Subject_Code']=$Subject_Code;
												
												echo("<h5>Selected Subject Code is");
												
												echo $_SESSION['Subject_Code']."</h5>";
												
												
												$sql = "SELECT * from result where Sub_code= '{$_SESSION['Subject_Code']}'";
												
													$query = $dbh->prepare($sql);
													$query->execute();
													$results=$query->fetchAll(PDO::FETCH_OBJ);
													$cnt=1;
													$r1=$r2=$r3=0;
													if($query->rowCount() > 0)
													{
													foreach($results as $result)
													{   ?>
													<tr>
													        
															
															<?php
															if(($result->Avg1>0) and ($result->Avg1<=10))
																$r1=$r1+1;
															else
																if(($result->Avg1>=11) and ($result->Avg1<=15))
																$r2=$r2+1;
																else
																	if(($result->Avg1>=16) and ($result->Avg1<=20))
																	$r3=$r3+1;
															?>
										
													</tr>
													<?php 
													$cnt=$cnt+1;
													}
													
													}
													
													?>
												<table class="table table-hover table-bordered">
                                                <thead>
                                                        <tr>
														    <th>Sno</th>
															<th>Range</th>
                                                            <th>Number of Students</th>  
                                                        </tr>
                                               </thead>
												<tbody>
														<tr>
															<td>1</td>
															<td>0-10</td>
															<td><?php echo $r1; ?></td>
														</tr>
														<tr>
															<td>2</td>
															<td>11-15</td>
															<td><?php echo $r2; ?></td>
														</tr>
														<tr>
															<td>3</td>
															<td>16-20</td>
															<td><?php echo $r3; ?></td>
														</tr>
												</tbody>	
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
