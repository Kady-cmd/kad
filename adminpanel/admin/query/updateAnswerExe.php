<?php
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selExam = $conn->query("SELECT * FROM exam_answers WHERE exans_id='$id'");
$selExamRow = $selCourse->fetch(PDO::FETCH_ASSOC);
if($selExam->rowCount() > 0)
{
	$log['user_id'] = $_SESSION['admin']['admin_id'];
	$log['action_made'] = "Updated exam answer - " . $selExamRow['exans_answer'];
	// audit log
	addLog($log);
}

$updateAnswer = $conn->query("UPDATE exam_answers SET correct='$correct' WHERE exans_id='$id'");
if($updateAnswer)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}

echo json_encode($res);
