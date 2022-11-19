<!-- Modal For Add Course -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addCourseFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Course</label>
              <input type="" name="course_name" id="course_name" class="form-control" placeholder="Input Course" required="" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Now</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal For Update Course -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <form class="refreshFrm" id="addCourseFrm" method="post">
      <div class="modal-content myModal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update ( <?php echo $selCourseRow['cou_name']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Course</label>
              <input type="" name="course_name" id="course_name" class="form-control" value="<?php echo $selCourseRow['cou_name']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Now</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal For Add Unit -->
<div class="modal fade" id="modalForAddUnit" tabindex="-1" role="dialog" aria-labelledby="addNewUnit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addUnitFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Select Course</label>
              <select class="form-control" name="courseSelected">
                <option value="0">Select Course</option>
                <?php
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if ($selCourse->rowCount() > 0) {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php }
                } else { ?>
                  <option value="0">No Course Found</option>
                <?php }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Unit Code</label>
              <input type="" name="unit_code" id="unit_code" class="form-control" placeholder="Input Unit Code" required="" autocomplete="off">
            </div>

            <div class="form-group">
              <label>Unit Name</label>
              <input type="" name="unit_name" id="unit_name" class="form-control" placeholder="Input Unit Name" required="" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Now</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addExamFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Select Course</label>
              <select class="form-control" id="examCourse" name="examCourse">
                <option value="0">Select Course</option>
                <?php
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if ($selCourse->rowCount() > 0) {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php }
                } else { ?>
                  <option value="0">No Course Found</option>
                <?php }
                ?>
              </select>
            </div>

            <div class="form-group" id="selectUnit">
              <label>Select Unit</label>
              <span id="examUnit"></span>
            </div>

            <div class="form-group">
              <label>Exam Time Limit</label>
              <select class="form-control" name="timeLimit" required="">
                <option value="0">Select Time</option>
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
                <option value="0">Select Type of Questions for Exam</option>
                <option value="1">Multiple Choice Questions</option>
                <option value="2">Open Ended Questions</option>
                <option value="3">Hybrid Questions</option>
              </select>
            </div>

            <div class="form-group">
              <label>Question Limit to Display</label>
              <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Input Question Limit to Display">
            </div>

            <div class="form-group">
              <label>Exam Title</label>
              <input type="" name="examTitle" class="form-control" placeholder="Input Exam Title" required="">
            </div>

            <div class="form-group">
              <label>Exam Description</label>
              <textarea name="examDesc" class="form-control" rows="4" placeholder="Input Exam Description" required=""></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Now</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addExamineeFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Examinee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Fullname</label>
              <input type="" name="fullname" id="fullname" class="form-control" placeholder="Input Fullname" autocomplete="off" required="">
            </div>

            <div class="form-group">
              <label>Birhdate</label>
              <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Input Birhdate" autocomplete="off">
            </div>

            <div class="form-group">
              <label>Gender</label>
              <select class="form-control" name="gender" id="gender">
                <option value="0">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>

            <div class="form-group">
              <label>Course</label>
              <select class="form-control" name="course" id="course">
                <option value="0">Select course</option>
                <?php
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Year Level</label>
              <select class="form-control" name="year_level" id="year_level">
                <option value="0">Select year level</option>
                <option value="first year">First Year</option>
                <option value="second year">Second Year</option>
                <option value="third year">Third Year</option>
                <option value="fourth year">Fourth Year</option>
              </select>
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Input Email" autocomplete="off" required="">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Input Password" autocomplete="off" required="">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Now</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addQuestionFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Question for <br><?php echo $selExamRow['ex_title']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="refreshFrm" method="post" id="addQuestionFrm">
          <div class="modal-body">
            <div class="col-md-12">
              <div class="form-group">
                <label>Question Type</label>
                <select class="form-control" name="question_type" id="question_type">
                  <option value="0">Select Type of Question</option>
                  <option value="1">Multiple Choice Question</option>
                  <option value="2">Open Ended Question</option>
                </select>
              </div>

              <div class="form-group">
                <label>Question</label>
                <input type="hidden" name="examId" value="<?php echo $exId; ?>">
                <input type="" name="question" id="course_name" class="form-control" placeholder="Input question" autocomplete="off">
              </div>

              <fieldset id="1">
                <legend>Input Words for Choices</legend>
                <div class="form-group">
                  <label>Choice A</label>
                  <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Input choice A" autocomplete="off">
                </div>

                <div class="form-group">
                  <label>Choice B</label>
                  <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Input choice B" autocomplete="off">
                </div>

                <div class="form-group">
                  <label>Choice C</label>
                  <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Input choice C" autocomplete="off">
                </div>

                <div class="form-group">
                  <label>Choice D</label>
                  <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Input choice D" autocomplete="off">
                </div>
              </fieldset>

              <div class="form-group">
                <label>Correct Answer</label>
                <textarea type="" name="correctAnswer" id="correctAnswer" class="form-control" placeholder="Input correct answer" autocomplete="off" rows="5"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Now</button>
          </div>
        </form>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
  $('fieldset').hide();
  $('#0').show();
  $('select').change(function() {
    $('fieldset').hide();
    var a = $(this).val();
    $("#" + a).show();
    $('#correctAnswer').val('');
  });

  $(document).ready(function() {
    $("#selectUnit").hide();
    $("#examUnit").hide();
    $('#examCourse').on('change', getCourseUnits);
  });

  function getCourseUnits() {
    var selected = $('#examCourse').val();
    if (selected) {
      $.ajax({
        type: 'POST',
        url: 'query/courseUnits.php',
        data: 'cou_id=' + selected,
        success: function(html) {
          $('#examUnit').html(html);
          $("#selectUnit").show();
          $("#examUnit").show();
        }
      });
    } else {
      $('#examCourse').html('<option value="">Select Unit First</option>');
    }
  }
</script>