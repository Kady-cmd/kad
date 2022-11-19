<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selQuestion = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$id'");
$selQuestionRow = $selQuestion->fetch(PDO::FETCH_ASSOC);
if($selQuestion->rowCount() > 0)
{
	$log['user_id'] = $_SESSION['admin']['admin_id'];
	$log['action_made'] = "Deleted question - " . $selQuestionRow['exam_question'];
	// audit log
	addLog($log);
}

$delExam = $conn->query("DELETE FROM exam_question_tbl WHERE eqt_id='$id'");
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