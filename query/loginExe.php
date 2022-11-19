<?php 
session_start();
include("../conn.php");
include("./addExamineeAuditLog.php");

extract($_POST);

$selAcc = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$username' AND exmne_password='$pass'  ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

if($selAcc->rowCount() > 0)
{
    $_SESSION['examineeSession'] = array(
        'exmne_id' => $selAccRow['exmne_id'],
        'examineeLogin' => true
    );

    $res = array("res" => "success");

    $log['user_id'] = $selAccRow['exmne_id'];
    $log['action_made'] = "Logged into the system";
    // audit log
    addLog($log);
}
else
{
    $res = array("res" => "invalid");
}

echo json_encode($res);
?>