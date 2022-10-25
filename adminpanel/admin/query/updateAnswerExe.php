<?php 
include("../../../conn.php");

extract($_POST);

$updateAnswer = $conn->query("UPDATE exam_answers SET correct='$correct' WHERE exans_id='$id'");
if($updateAnswer)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}

echo json_encode($res);
