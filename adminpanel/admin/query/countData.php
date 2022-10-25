<?php 
// Count All Courses
$selCourse = $conn->query("SELECT COUNT(cou_id) as totCourse FROM course_tbl")->fetch(PDO::FETCH_ASSOC);

// Count All Exams
$selExam = $conn->query("SELECT COUNT(ex_id) as totExam FROM exam_tbl")->fetch(PDO::FETCH_ASSOC);

// Count All Examinees
$selExaminee = $conn->query("SELECT COUNT(exmne_id) as totExaminee FROM examinee_tbl")->fetch(PDO::FETCH_ASSOC);
