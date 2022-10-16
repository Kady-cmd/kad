<?php
include("../../../conn.php");
$id = $_GET['id'];

$selCourse = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$id' ")->fetch(PDO::FETCH_ASSOC);
?>

<fieldset style="width:543px;">
  <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Question</i></legend>

  <div class="col-md-12 mt-4">
    <form method="post" id="updateQuestionFrm">
      <div class="form-group">
        <legend>Question</legend>
        <input type="hidden" name="question_id" value="<?php echo $id; ?>">
        <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
      </div>

      <div class="form-group">
        <label>Question Type</label>
        <select class="form-control" name="question_type" id="question_type">
          <?php
          switch ($selCourse['question_type']) 
          {
            case 1:
          ?>
          <option value="1">Multiple Choice Question</option>
          <?php
              break;
            case 2:
          ?>
          <option value="2">Open Ended Question</option>
          <?php
            default:

          ?>
          <option value="0">Select Type of Question</option>
          <?php
              break;
          }
          ?>

          <option value="1">Multiple Choice Question</option>
          <option value="2">Open Ended Question</option>
        </select>
      </div>

      <?php
      if ($selCourse['question_type'] == 1)
      {
      ?>
      <div class="form-group">
        <legend>Choice A</legend>
        <input type="" name="exam_ch1" value="<?php echo $selCourse['exam_ch1']; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <legend>Choice B</legend>
        <input type="" name="exam_ch2" value="<?php echo $selCourse['exam_ch2']; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <legend>Choice C</legend>
        <input type="" name="exam_ch3" value="<?php echo $selCourse['exam_ch3']; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <legend>Choice D</legend>
        <input type="" name="exam_ch4" value="<?php echo $selCourse['exam_ch4']; ?>" class="form-control" required>
      </div>
      <?php
      }
      ?>

      <div class="form-group">
        <legend class="text-success">Correct Answer</legend>
        <textarea rows="2" type="" name="exam_answer" class="form-control" required><?php echo $selCourse['exam_answer']; ?></textarea>
      </div>


      <div class="form-group" align="right">
        <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
      </div>
    </form>
  </div>
</fieldset>