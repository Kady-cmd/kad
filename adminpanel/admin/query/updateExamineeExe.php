<?php
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selExaminee = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmne_id'");
$selExamineeRow = $selExaminee->fetch(PDO::FETCH_ASSOC);
if($selExaminee->rowCount() > 0)
{
	$log['user_id'] = $_SESSION['admin']['admin_id'];
	$log['action_made'] = "Updated examinee - " . $selExamineeRow['exmne_fullname'];
	// audit log
	addLog($log);
}

$updCourse = $conn->query("UPDATE examinee_tbl SET exmne_fullname='$exFullname', exmne_course='$exCourse', exmne_gender='$exGender', exmne_birthdate='$exBdate', exmne_year_level='$exYrlvl', exmne_email='$exEmail', exmne_password='$exPass' WHERE exmne_id='$exmne_id'");
if($updCourse)
{
	$res = array("res" => "success", "exFullname" => $exFullname);
}
else
{
	$res = array("res" => "failed");
}



 echo json_encode($res);	
?>