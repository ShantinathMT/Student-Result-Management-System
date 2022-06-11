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
                                                            <th>Sssno</th>
															<th>Subject</th>
                                                            <th>Test1</th>
															<th>Test2</th>
														    <th>Test3</th>
                                                            <th>Avg</th>
                                                        </tr>
                                               </thead>
  


                                                  
                                                  <tbody>
<?php												  
$_SESSION['Usn']=$Usn;
$_SESSION['Subject_Code']=$Subject_Code;

//$qery = "SELECT newstudents.StudentName,newstudents.Studentusn,newstudents.StudentSem,newstudents.StudentDivision,Result.Sub_Code,Result.Test1,Result.Test2,Result.Test3,Result.Avg1 from newstudents join Result on newstudents.Studentusn=Result.Usn where newstudents.Studentusn=:Studentusn and Result.Usn=:Usn ";

$qery="select * from result,newstudents where result.Usn= '{$_SESSION['Usn']}' and newstudents.Studentusn= '{$_SESSION['Usn']}' and result.Sub_Code= '{$_SESSION['Subject_Code']}'";

//$qery="select * from result,newstudents where Test1=14";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':Usn',$Usn,PDO::PARAM_STR);
$stmt->bindParam(':Sub_Code',$Subject_Code,PDO::PARAM_STR);
$stmt->execute();

$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
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
												//foreach($resultss as $row)
												//{ 
												?>
												
												<tr>
                                                <th scope="row"><?php 
												//echo "hi";
												//echo htmlentities($cnt);?></th>
                                                			<td><?php //echo htmlentities($row->Sub_Code);?></td>
                                                			<td><?php // echo htmlentities($row->Test1);?></td>
															<td><?php //echo htmlentities($row->Test2);?></td>
															<td><?php //echo htmlentities($row->Test3);?></td>
															<td><?php //echo htmlentities($row->Avg1);?></td>
                                                		</tr>
												
												
												<?php //}
													}
												?>												  

<?php                                              
// Code for result
/* $query ="select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=? and t.ClassId=?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss",$rollid,$classid);
$stmt->execute();
                 $res=$stmt->get_result();
                 $cnt=1;
                   while($row=$res->fetch_object())
                  {*/
			  
			  
			  

    ?>

                                                    <tr>
                                                <td ><?php //echo htmlentities($cnt);?></td>
                                                      <td><?php //echo htmlentities($row->SubjectName);?></td>
                                                      <td><?php //echo htmlentities($totalmarks=$row->marks);?></td>
                                                    </tr>
<?php 
//$totlcount+=$totalmarks;
//$cnt++;}
?>
<tr>
                                                <th scope="row" colspan="2">Total Marks</th>
<td><b><?php //echo htmlentities($totlcount); ?></b> out of <b><?php //echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
<tr>
                                                <th scope="row" colspan="2">Percntage</th>           
                                                            <td><b><?php //echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
                                                             </tr>

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