<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$unit_name = strtoupper($unit_name);
$selCourse = $conn->query("SELECT * FROM unit_tbl WHERE unit_name='$unit_name' ");
$selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC);

if($courseSelected == "0")
{
	$res = array("res" => "noSelectedCourse");
}
else if($selCourse->rowCount() > 0)
{
	$res = array("res" => "exist", "unit_name" => $unit_name);
}
else
{
	$insUnit = $conn->query("INSERT INTO unit_tbl(cou_id, unit_code, unit_name) VALUES('$courseSelected', '$unit_code', '$unit_name') ");
	if($insUnit)
	{
		$res = array("res" => "success", "unit_name" => $unit_name);

		$log['user_id'] = $_SESSION['admin']['admin_id'];
		$log['action_made'] = "Created a new unit - " . $unit_name;
		// audit log
		addLog($log);
	}
	else
	{
		$res = array("res" => "failed", "unit_name" => $unit_name);
	}
}

echo json_encode($res);
?>