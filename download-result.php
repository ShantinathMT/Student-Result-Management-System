<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';
session_start();
ob_start();
require_once('includes/configpdo.php');
error_reporting(0);
?>

<html>
<style>
body {
  padding: 4px;
  text-align: center;
}

table {
  width: 100%;
  margin: 10px auto;
  table-layout: auto;
}

.fixed {
  table-layout: fixed;
}

table,
td,
th {
  border-collapse: collapse;
}

th,
td {
  padding: 1px;
  border: solid 1px;
  text-align: center;
}


</style>
<?php 
//$rollid=$_SESSION['rollid'];
//$classid=$_SESSION['classid'];


$Usn=$_SESSION['Usn'];
$Subject_Code=$_SESSION['Subject_Code'];


//$qery = "SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=? and tblstudents.ClassId=?";

$qery="select * from result,newstudents where result.Usn= '{$_SESSION['Usn']}' and newstudents.Studentusn= '{$_SESSION['Usn']}' and result.Sub_Code= '{$_SESSION['Subject_Code']}'";

$stmt21 = $mysqli->prepare($qery);
$stmt21->bind_param("ss",$Usn,$Subject_Code);
$stmt21->execute();
                 $res1=$stmt21->get_result();
                 $cnt=1;
                   while($result=$res1->fetch_object())
                  {  ?>
<p><b>Student Name :</b> <?php echo htmlentities($result->StudentName);?></p>
<p><b>Student USN :</b> <?php echo htmlentities($result->Studentusn);?>
<p><b>Student Sem:</b> <?php echo htmlentities($result->StudentSem);?>
<?php }

    ?>
 <table class="table table-inverse" border="1">
                      
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
																								
												//foreach($result as $row)
												while($result=$res1->fetch_object())
												{   ?>
												
												<tr>
                                                <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                			<td><?php //echo htmlentities($result->Sub_Code);?></td>
                                                			<td><?php //echo htmlentities($result->Test1);?></td>
															<td><?php //echo htmlentities($result->Test2);?></td>
															<td><?php // echo htmlentities($result->Test3);?></td>
															<td><?php //echo htmlentities($result->Avg1);?></td>
                                                		</tr>
												
												
												<?php 
												}

												?>

                                                  
                                                  <tbody>
<?php                                              
// Code for result
// $query ="select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=? and t.ClassId=?)";

$qery="select * from result,newstudents where result.Usn= '{$_SESSION['Usn']}' and newstudents.Studentusn= '{$_SESSION['Usn']}' and result.Sub_Code= '{$_SESSION['Subject_Code']}'";


$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss",$Usn,$Subject_Code);
$stmt->execute();
$res=$stmt->get_result();
$cnt=1;
                  while($row=$res->fetch_object())
                 {

    ?>

                                                    <tr>
                                                <td ><?php echo htmlentities($cnt);?></td>
                                                      <td><?php echo htmlentities($row->Sub_Code);?></td>
													  <td><?php echo htmlentities($row->Sub_Code);?></td>
                                                      <td><?php //echo htmlentities($totalmarks=$row->marks);?></td>
                                                    </tr>

								<?php 
												}

												?>
                            </tbody>
                        </table>
                    </div>
</html>

<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'landscape');
$dompdf->load_html($html);
$dompdf->render();
//dompdf->stream("",array("Attachment" => false));
$dompdf->stream("result.pdf");
?>