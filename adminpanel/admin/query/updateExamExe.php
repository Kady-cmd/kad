<?php
session_start();
include("../../../conn.php");
include("./addAdminAuditLog.php");

extract($_POST);

$selExam = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$id'");
$selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);
if($selExam->rowCount() > 0)
{
    $log['user_id'] = $_SESSION['admin']['admin_id'];
    $log['action_made'] = "Updated exam - " . $selExamRow['ex_title'];
    // audit log
    addLog($log);
}

$updExam = $conn->query("UPDATE exam_tbl SET cou_id='$courseId', unit_id='$unitId', ex_title='$examTitle', ex_type='$examType', ex_time_limit='$examLimit', ex_questlimit_display='$examQuestDipLimit' , ex_description='$examDesc' WHERE  ex_id='$examId'");
if($updExam)
{
    $res = array("res" => "success", "msg" => $examTitle);
}
else
{
    $res = array("res" => "failed");
}

echo json_encode($res);
