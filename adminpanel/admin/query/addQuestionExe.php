<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' AND exam_question='$question'");
if($selQuest->rowCount() > 0)
{
  $res = array("res" => "exist", "msg" => $question);
}
else
{
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id, exam_question, question_type, exam_ch1, exam_ch2, exam_ch3, exam_ch4, exam_answer) VALUES('$examId', '$question', '$question_type', '$choice_A', '$choice_B', '$choice_C', '$choice_D', '$correctAnswer') ");

	if($insQuest)
	{
    	$res = array("res" => "success", "msg" => $question);

		$log['user_id'] = $_SESSION['admin']['admin_id'];
		$log['action_made'] = "Created a new question - " . $question;
		// audit log
		addLog($log);
	}
	else
	{
       $res = array("res" => "failed");
	}
}



echo json_encode($res);
 ?>