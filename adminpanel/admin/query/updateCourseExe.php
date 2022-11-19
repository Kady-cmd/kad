<?php
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$course_id'");
$selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC);
if($selCourse->rowCount() > 0)
{
	$log['user_id'] = $_SESSION['admin']['admin_id'];
	$log['action_made'] = "Updated course - " . $selCourseRow['cou_name'];
	// audit log
	addLog($log);
}

$newCourseName = strtoupper($newCourseName);
$updCourse = $conn->query("UPDATE course_tbl SET cou_name='$newCourseName' WHERE cou_id='$course_id' ");
if($updCourse)
{
	$res = array("res" => "success", "newCourseName" => $newCourseName);
}
else
{
	$res = array("res" => "failed");
}

echo json_encode($res);