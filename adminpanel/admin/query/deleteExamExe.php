<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$id'");
$selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);
if($selExam->rowCount() > 0)
{
	$log['user_id'] = $_SESSION['admin']['admin_id'];
	$log['action_made'] = "Deleted exam - " . $selExamRow['ex_title'];
	// audit log
	addLog($log);
}


$delExam = $conn->query("DELETE FROM exam_tbl WHERE ex_id='$id'");
if($delExam)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>