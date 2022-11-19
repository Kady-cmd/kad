<?php
session_start(); 
include("../conn.php");
include("./addExamineeAuditLog.php");

extract($_POST);
$exmne_id = $_SESSION['examineeSession']['exmne_id'];

$selExAttempt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmne_id' AND exam_id='$exam_id'");
$selAns = $conn->query("SELECT * FROM exam_answers WHERE axmne_id='$exmne_id' AND exam_id='$exam_id'");

$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exam_id'");
$selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);

if($selExAttempt->rowCount() > 0)
{
	$res = array("res" => "alreadyTaken");
}
else if($selAns->rowCount() > 0)
{
	$updLastAns = $conn->query("UPDATE exam_answers SET exans_status='old' WHERE axmne_id='$exmne_id' AND exam_id='$exam_id'");
	if($updLastAns)
	{
		foreach ($_REQUEST['answer'] as $key => $value) 
		{
			$value = $value['correct'];
		  	$insAns = $conn->query("INSERT INTO exam_answers(axmne_id, exam_id, quest_id, exans_answer) VALUES('$exmne_id', '$exam_id', '$key', '$value')");
		}

		if($insAns)
		{
			 $insAttempt = $conn->query("INSERT INTO exam_attempt(exmne_id, exam_id)  VALUES('$exmne_id', '$exam_id') ");
			 if($insAttempt)
			 {
				$res = array("res" => "success");

				if ($selExam->rowCount() > 0)
				{
					$log['user_id'] = $exmne_id;
					$log['action_made'] = "Subsequent exam attempt - " . $selExamRow['ex_title'];
					// audit log
					addLog($log);
				}
			 }
			 else
			 {
				$res = array("res" => "failed");
			 }
		}
		else
		{
			$res = array("res" => "failed");
		}
	}
}
else
{
	foreach ($_REQUEST['answer'] as $key => $value) 
	{
		$value = $value['correct'];
		$insAns = $conn->query("INSERT INTO exam_answers(axmne_id, exam_id, quest_id, exans_answer) VALUES('$exmne_id', '$exam_id', '$key', '$value')");
	}
	
	if($insAns)
	{
		$insAttempt = $conn->query("INSERT INTO exam_attempt(exmne_id, exam_id)  VALUES('$exmne_id', '$exam_id') ");
		if($insAttempt)
		{
			$res = array("res" => "success");

			if ($selExam->rowCount() > 0)
			{
				$log['user_id'] = $exmne_id;
				$log['action_made'] = "New exam attempt - " . $selExamRow['ex_title'];
				// audit log
				addLog($log);
			}
		}
		else
		{
			$res = array("res" => "failed");
		}
	}
	else
	{
		$res = array("res" => "failed");
	}
}

echo json_encode($res);
