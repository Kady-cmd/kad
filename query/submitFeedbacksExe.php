<?php 
session_start();
include("../conn.php");
include("./addExamineeAuditLog.php");

extract($_POST);

$exmneSess = $_SESSION['examineeSession']['exmne_id'];
$selMyFeedbacks = $conn->query("SELECT * FROM feedbacks_tbl WHERE exmne_id='$exmneSess' ");

if($selMyFeedbacks->rowCount() >= 3)
{
	$res = array("res" => "limit");
}
else
{
	$date = date("F d, Y");
 	$insFedd = $conn->query("INSERT INTO feedbacks_tbl(exmne_id, fb_exmne_as, fb_feedbacks, fb_date) VALUES('$exmneSess', '$asMe', '$myFeedbacks', '$date') ");

 	if($insFedd)
 	{
 		$res = array("res" => "success");

		if ($selMyFeedbacks->rowCount() > 0)
		{
			$log['user_id'] = $exmneSess;
			$log['action_made'] = "New feedback submitted";
			// audit log
			addLog($log);
		}
 	}
 	else
 	{
 		$res = array("res" => "failed");
 	}
}

echo json_encode($res);
