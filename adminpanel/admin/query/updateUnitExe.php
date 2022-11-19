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
    $log['action_made'] = "Updated unit - " . $selUnitRow['unit_name'];
    // audit log
    addLog($log);
}

$updUnit = $conn->query("UPDATE unit_tbl SET cou_id='$unitCourse', unit_code='$newUnitCode', unit_name='$newUnitName' WHERE unit_id='$unit_id'");
if($updUnit)
{
    $res = array("res" => "success", "msg" => $examTitle);
}
else
{
    $res = array("res" => "failed");
}

echo json_encode($res);
