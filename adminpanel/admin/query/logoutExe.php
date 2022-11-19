<?php 
session_start();
include("./addAdminAuditLog.php");

$log['user_id'] = $_SESSION['admin']['admin_id'];
$log['action_made'] = "Logged out of the system";
// audit log
addLog($log);

session_unset();
session_destroy();


header("location:../");
?>