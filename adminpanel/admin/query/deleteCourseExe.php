<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$id'");
$selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC);
if($selCourse->rowCount() > 0)
{
	$log['user_id'] = $_SESSION['admin']['admin_id'];
	$log['action_made'] = "Deleted course - " . $selCourseRow['cou_name'];
	// audit log
	addLog($log);
}

$delCourse = $conn->query("DELETE FROM course_tbl WHERE cou_id='$id'");
if($delCourse)
{
	$res = array("res" => "success");	
}
else
{
	$res = array("res" => "failed");
}

echo json_encode($res);
