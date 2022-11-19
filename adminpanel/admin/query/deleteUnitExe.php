<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selUnit = $conn->query("SELECT * FROM unit_tbl WHERE unit_id='$id'");
$selUnitRow = $selUnit->fetch(PDO::FETCH_ASSOC);
if($selUnit->rowCount() > 0)
{
	$log['user_id'] = $_SESSION['admin']['admin_id'];
	$log['action_made'] = "Deleted unit - " . $selUnitRow['unit_name'];
	// audit log
	addLog($log);
}

$delCourse = $conn->query("DELETE FROM unit_tbl WHERE unit_id='$id'");
if($delCourse)
{
	$res = array("res" => "success");	
}
else
{
	$res = array("res" => "failed");
}

echo json_encode($res);
