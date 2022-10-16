<?php
include("../../../conn.php");
extract($_POST);


$updCourse = $conn->query("UPDATE exam_question_tbl SET exam_question='$question', question_type='$question_type', exam_ch1='$exam_ch1', exam_ch2='$exam_ch2', exam_ch3='$exam_ch3', exam_ch4='$exam_ch4', exam_answer='$exam_answer' WHERE eqt_id='$question_id' ");
if($updCourse)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}

echo json_encode($res);
