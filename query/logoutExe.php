<?php 
session_start();
include("./addExamineeAuditLog.php");

$log['user_id'] = $_SESSION['examineeSession']['exmne_id'];
$log['action_made'] = "Logged out of the system";
// audit log
addLog($log);

session_unset();
session_destroy();

header("location:../");
?>