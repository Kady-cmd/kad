<?php 
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selAcc = $conn->query("SELECT * FROM admin_acc WHERE admin_user='$username' AND admin_pass='$pass'");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

if($selAcc->rowCount() > 0)
{
    $_SESSION['admin'] = array(
        'admin_id' => $selAccRow['admin_id'],
        'adminLogin' => true
    );

    $res = array("res" => "success");

    $log['user_id'] = $selAccRow['admin_id'];
    $log['action_made'] = "Logged into the system";
    // audit log
    addLog($log);
}
else 
{
    $res = array("res" => "invalid");
}
 
echo json_encode($res);
