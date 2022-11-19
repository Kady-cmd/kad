<?php
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selQuestion = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$question_id'");
$selQuestionRow = $selQuestion->fetch(PDO::FETCH_ASSOC);
if($selQuestion->rowCount() > 0)
{
	$log['user_id'] = $_SESSION['admin']['admin_id'];
	$log['action_made'] = "Updated question - " . $selQuestionRow['exam_question'];
	// audit log
	addLog($log);
}

$updCourse = $conn->query("UPDATE exam_question_tbl SET exam_question='$question', question_type='$question_type', exam_ch1='$exam_ch1', exam_ch2='$exam_ch2', exam_ch3='$exam_ch3', exam_ch4='$exam_ch4', exam_answer='$exam_answer' WHERE eqt_id='$question_id' ");
if($updCourse)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}

echo json_encode($res);
