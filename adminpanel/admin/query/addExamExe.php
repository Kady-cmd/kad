<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);
$selCourse = $conn->query("SELECT * FROM exam_tbl WHERE ex_title='$examTitle' ");

if($examCourse == "0")
{
	$res = array("res" => "noSelectedCourse");
}
else if($unitSelected == "0")
{
	$res = array("res" => "noSelectedUnit");
}
else if($timeLimit == "0")
{
	$res = array("res" => "noSelectedTime");
}
else if($examQuestDipLimit == "" && $examQuestDipLimit == null)
{
	$res = array("res" => "noDisplayLimit");
}
else if($selCourse->rowCount() > 0)
{
	$res = array("res" => "exist", "examTitle" => $examTitle);
}
else
{
	$insExam = $conn->query("INSERT INTO exam_tbl(cou_id, unit_id, ex_title, ex_type, ex_time_limit, ex_questlimit_display, ex_description) VALUES('$examCourse', '$unitSelected', '$examTitle', '$examType', '$timeLimit', '$examQuestDipLimit', '$examDesc') ");
	if($insExam)
	{
		$res = array("res" => "success", "examTitle" => $examTitle);

		$log['user_id'] = $_SESSION['admin']['admin_id'];
		$log['action_made'] = "Created a new exam - " . $examTitle;
		// audit log
		addLog($log);
	}
	else
	{
		$res = array("res" => "failed", "examTitle" => $examTitle);
	}
}

 echo json_encode($res);
