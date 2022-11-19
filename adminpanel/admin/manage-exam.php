<?php
session_start();
if (!isset($_SESSION['admin']['adminLogin']) == true) header("location:index.php");
?>

<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>

<?php
  $exId = $_GET['id'];

  $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exId' ");
  $selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);

  $courseId = $selExamRow['cou_id'];
  $selCourse = $conn->query("SELECT cou_name as courseName FROM course_tbl WHERE cou_id='$courseId'")->fetch(PDO::FETCH_ASSOC);

  $unitId = $selExamRow['unit_id'];
  $selUnit = $conn->query("SELECT unit_name as unitName FROM unit_tbl WHERE unit_id='$unitId'")->fetch(PDO::FETCH_ASSOC);
?>

  <div class="app-main__outer">
    <div class="app-main__inner">
      <div class="app-page-title">
        <div class="page-title-wrapper">
          <div class="page-title-heading">
            <div> MANAGE EXAM
              <div class="page-title-subheading">
                Add Questions for <?php echo $selExamRow['ex_title']; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div id="refreshData">
          <div class="row">
            <div class="col-md-6">
              <div class="main-card mb-3 card">
                <div class="card-header">
                  <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Information
                </div>
                <div class="card-body">
                  <form method="post" id="updateExamFrm">
                    <div class="form-group">
                      <label>Course</label>
                      <select class="form-control" name="courseId" required="">
                        <option value="<?php echo $selExamRow['cou_id']; ?>"><?php echo $selCourse['courseName']; ?></option>
                        <?php
                        $selAllCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                        while ($selAllCourseRow = $selAllCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                          <option value="<?php echo $selAllCourseRow['cou_id']; ?>"><?php echo $selAllCourseRow['cou_name']; ?></option>
                        <?php }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Unit</label>
                      <select class="form-control" name="unitId" required="">
                        <option value="<?php echo $selExamRow['unit_id']; ?>"><?php echo $selUnit['unitName']; ?></option>
                        <?php
                        $selAllUnit = $conn->query("SELECT * FROM unit_tbl ORDER BY unit_id DESC");
                        while ($selAllUnitRow = $selAllUnit->fetch(PDO::FETCH_ASSOC)) { ?>
                          <option value="<?php echo $selAllUnitRow['unit_id']; ?>"><?php echo $selAllUnitRow['unit_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Exam Title</label>
                      <input type="hidden" name="examId" value="<?php echo $selExamRow['ex_id']; ?>">
                      <input type="" name="examTitle" class="form-control" required="" value="<?php echo $selExamRow['ex_title']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Exam Description</label>
                      <input type="" name="examDesc" class="form-control" required="" value="<?php echo $selExamRow['ex_description']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Exam Time limit</label>
                      <select class="form-control" name="examLimit" required="">
                        <option value="<?php echo $selExamRow['ex_time_limit']; ?>"><?php echo $selExamRow['ex_time_limit']; ?> Minutes</option>
                        <option value="10">10 Minutes</option>
                        <option value="20">20 Minutes</option>
                        <option value="30">30 Minutes</option>
                        <option value="40">40 Minutes</option>
                        <option value="50">50 Minutes</option>
                        <option value="60">60 Minutes</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Exam Type</label>
                      <select class="form-control" name="examType" required="">
                        <?php
                        $examType = $selExamRow['ex_type'];
                        $typeText = '';
                        switch ($examType)
                        {
                            case 1:
                        ?>
                        <option value="1">Multiple Choice Questions</option>
                        <?php
                                break;
                            case 2:
                        ?>
                        <option value="2">Open Ended Questions</option>
                        <?php
                                break;
                            case 3:
                        ?>
                        <option value="3">Hybrid Questions</option>
                        <?php
                                break;
                            default:
                        ?>
                        <option value="0">Select Type of Questions for Exam</option>
                        <?php
                                break;
                        }
                        ?>

                        <option value="1">Multiple Choice Questions</option>
                        <option value="2">Open Ended Questions</option>
                        <option value="3">Hybrid Questions</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Display limit</label>
                      <input type="number" name="examQuestDipLimit" class="form-control" value="<?php echo $selExamRow['ex_questlimit_display']; ?>">
                    </div>

                    <div class="form-group" align="right">
                      <button type="submit" class="btn btn-primary btn-lg">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <?php
              $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$exId' ORDER BY eqt_id desc");
              ?>
              <div class="main-card mb-3 card">
                <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Question's
                  <span class="badge badge-pill badge-primary ml-2">
                    <?php echo $selQuest->rowCount(); ?>
                  </span>
                  <div class="btn-actions-pane-right">
                    <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddQuestion">Add Question</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="scroll-area-sm" style="min-height: 400px;">
                    <div class="scrollbar-container">
                      <?php
                      if ($selQuest->rowCount() > 0) 
                      {  
                      ?>
                        <div class="table-responsive">
                          <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                              <tr>
                                <th class="text-left pl-1">Course Name</th>
                                <th class="text-center" colspan="2">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                              if ($selQuest->rowCount() > 0) 
                              {
                                $i = 1;
                                while ($selQuestionRow = $selQuest->fetch(PDO::FETCH_ASSOC)) 
                                { 
                              ?>
                                  <tr>
                                    <td>
                                      <b><?php echo $i++; ?> .) <?php echo $selQuestionRow['exam_question']; ?></b><br>
                                      <?php
                                      if ($selQuestionRow['question_type'] == 1)
                                      {
                                        // Choice A
                                        if ($selQuestionRow['exam_ch1'] == $selQuestionRow['exam_answer']) 
                                        { 
                                        ?>
                                          <span class="pl-4 text-success">A - <?php echo  $selQuestionRow['exam_ch1']; ?></span><br>
                                        <?php 
                                        } 
                                        else 
                                        { 
                                        ?>
                                          <span class="pl-4">A - <?php echo $selQuestionRow['exam_ch1']; ?></span><br>
                                        <?php 
                                        }

                                        // Choice B
                                        if ($selQuestionRow['exam_ch2'] == $selQuestionRow['exam_answer']) 
                                        { 
                                        ?>
                                          <span class="pl-4 text-success">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                        <?php 
                                        } 
                                        else 
                                        { 
                                        ?>
                                          <span class="pl-4">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                        <?php 
                                        }

                                        // Choice C
                                        if ($selQuestionRow['exam_ch3'] == $selQuestionRow['exam_answer']) 
                                        { 
                                        ?>
                                          <span class="pl-4 text-success">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                        <?php 
                                        } 
                                        else 
                                        { 
                                        ?>
                                          <span class="pl-4">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                        <?php 
                                        }

                                        // Choice D
                                        if ($selQuestionRow['exam_ch4'] == $selQuestionRow['exam_answer']) 
                                        { 
                                        ?>
                                          <span class="pl-4 text-success">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                        <?php 
                                        } 
                                        else 
                                        { 
                                        ?>
                                          <span class="pl-4">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                        <?php 
                                        }
                                      }
                                      else
                                      {
                                      ?>
                                        <span class="pl-4 text-success"><?php echo $selQuestionRow['exam_answer']; ?></span>
                                      <?php
                                      }
                                      ?>
                                    </td>
                                    <td class="text-center">
                                      <a rel="facebox" href="facebox_modal/updateQuestion.php?id=<?php echo $selQuestionRow['eqt_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                    </td>
                                    <td class="text-center">
                                      <button type="button" id="deleteQuestion" data-id='<?php echo $selQuestionRow['eqt_id']; ?>' class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                  </tr>
                                <?php }
                              } else { ?>
                                <tr>
                                  <td colspan="2">
                                    <h3 class="p-3">No Course Found</h3>
                                  </td>
                                </tr>
                              <?php }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      <?php 
                      } 
                      else 
                      { 
                      ?>
                        <h4 class="text-primary">No questions found...</h4>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MAO NI IYA FOOTER -->
    <?php include("includes/footer.php"); ?>
    <?php include("includes/modals.php"); ?>