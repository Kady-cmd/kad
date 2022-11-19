<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$course_name = strtoupper($course_name);
$selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_name='$course_name' ");
$selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC);

if($selCourse->rowCount() > 0)
{
	$res = array("res" => "exist", "course_name" => $course_name);
}
else
{
	$insCourse = $conn->query("INSERT INTO course_tbl(cou_name) VALUES('$course_name') ");
	if($insCourse)
	{
		$res = array("res" => "success", "course_name" => $course_name);

		$log['user_id'] = $_SESSION['admin']['admin_id'];
		$log['action_made'] = "Created a new course - " . $course_name;
		// audit log
		addLog($log);
	}
	else
	{
		$res = array("res" => "failed", "course_name" => $course_name);
	}
}

echo json_encode($res);
?>