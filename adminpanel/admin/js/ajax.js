// Admin Log in
$(document).on("submit", "#adminLoginFrm", function () {
  $.post("query/loginExe.php", $(this).serialize(), function (data) {
    if (data.res == "invalid") {
      Swal.fire(
        'Invalid',
        'Please Input Valid Username / Password',
        'error'
      )
    }
    else if (data.res == "success") {
      $('body').fadeOut();
      window.location.href = 'home.php';
    }
  }, 'json');

  return false;
});

// Add Course 
$(document).on("submit", "#addCourseFrm", function () {
  $.post("query/addCourseExe.php", $(this).serialize(), function (data) {
    if (data.res == "exist") {
      Swal.fire(
        'Already Exists',
        data.course_name.toUpperCase() + ' Already Exists',
        'error'
      )
    }
    else if (data.res == "success") {
      Swal.fire(
        'Success',
        data.course_name.toUpperCase() + ' Successfully Added',
        'success'
      )
      // $('#course_name').val("");
      refreshDiv();
      setTimeout(function () {
        $('#body').load(document.URL);
      }, 2000);
    }
  }, 'json')
  return false;
});

// Update Course
$(document).on("submit", "#updateCourseFrm", function () {
  $.post("query/updateCourseExe.php", $(this).serialize(), function (data) {
    if (data.res == "success") {
      Swal.fire(
        'Success',
        'Selected course has been successfully updated!',
        'success'
      )
      refreshDiv();
    }
  }, 'json')
  return false;
});

// Delete Course
$(document).on("click", "#deleteCourse", function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  $.ajax({
    type: "post",
    url: "query/deleteCourseExe.php",
    dataType: "json",
    data: { id: id },
    cache: false,
    success: function (data) {
      if (data.res == "success") {
        Swal.fire(
          'Success',
          'Selected Course successfully deleted',
          'success'
        )
        refreshDiv();
      }
    },
    error: function (xhr, ErrorStatus, error) {
      console.log(status.error);
    }

  });

  return false;
});

// Add Unit 
$(document).on("submit", "#addUnitFrm", function () {
  $.post("query/addUnitExe.php", $(this).serialize(), function (data) {
    if (data.res == "noSelectedCourse") {
      Swal.fire(
        'No Course Selected',
        'Please select a course',
        'error'
      )
    }
    else if (data.res == "exist") {
      Swal.fire(
        'Already Exists',
        data.unit_name.toUpperCase() + ' Already Exists',
        'error'
      )
    }
    else if (data.res == "success") {
      Swal.fire(
        'Success',
        data.unit_name.toUpperCase() + ' Successfully Added',
        'success'
      )
      $('#addUnitFrm')[0].reset();
      $('#unit_name').val("");
      refreshDiv();
      setTimeout(function () {
        $('#body').load(document.URL);
      }, 2000);
    }
  }, 'json')
  return false;
});

// Update Unit
$(document).on("submit", "#updateUnitFrm", function () {
  $.post("query/updateUnitExe.php", $(this).serialize(), function (data) {
    if (data.res == "success") {
      Swal.fire(
        'Success',
        'Selected unit has been successfully updated!',
        'success'
      )
      refreshDiv();
    }
  }, 'json')
  return false;
});

// Delete Unit
$(document).on("click", "#deleteUnit", function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  $.ajax({
    type: "post",
    url: "query/deleteUnitExe.php",
    dataType: "json",
    data: { id: id },
    cache: false,
    success: function (data) {
      if (data.res == "success") {
        Swal.fire(
          'Success',
          'Selected unit has been successfully deleted',
          'success'
        )
        refreshDiv();
      }
    },
    error: function (xhr, ErrorStatus, error) {
      console.log(status.error);
    }

  });

  return false;
});

// Delete Exam
$(document).on("click", "#deleteExam", function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  $.ajax({
    type: "post",
    url: "query/deleteExamExe.php",
    dataType: "json",
    data: { id: id },
    cache: false,
    success: function (data) {
      if (data.res == "success") {
        Swal.fire(
          'Success',
          'Selected Course successfully deleted',
          'success'
        )
        refreshDiv();
      }
    },
    error: function (xhr, ErrorStatus, error) {
      console.log(status.error);
    }

  });

  return false;
});

// Add Exam 
$(document).on("submit", "#addExamFrm", function () {
  $.post("query/addExamExe.php", $(this).serialize(), function (data) {
    if (data.res == "noSelectedCourse") {
      Swal.fire(
        'No Course Selected',
        'Please select a course',
        'error'
      )
    }

    if (data.res == "noSelectedUnit") {
      Swal.fire(
        'No Unit Selected',
        'Please select a unit',
        'error'
      )
    }

    if (data.res == "noSelectedTime") {
      Swal.fire(
        'No Time Limit',
        'Please select time limit',
        'error'
      )
    }
    
    if (data.res == "noDisplayLimit") {
      Swal.fire(
        'No Display Limit',
        'Please input question display limit',
        'error'
      )
    }

    else if (data.res == "exist") {
      Swal.fire(
        'Already Exist',
        data.examTitle.toUpperCase() + '<br>Already Exist',
        'error'
      )
    }
    else if (data.res == "success") {
      Swal.fire(
        'Success',
        data.examTitle.toUpperCase() + '<br>Successfully Added',
        'success'
      )
      $('#addExamFrm')[0].reset();
      $('#course_name').val("");
      refreshDiv();
    }
  }, 'json')
  return false;
});

// Update Exam 
$(document).on("submit", "#updateExamFrm", function () {
  $.post("query/updateExamExe.php", $(this).serialize(), function (data) {
    if (data.res == "success") {
      Swal.fire(
        'Update Successfully',
        data.msg + ' <br>are now successfully updated',
        'success'
      )
      refreshDiv();
    }
    else if (data.res == "failed") {
      Swal.fire(
        "Something's went wrong!",
        'Somethings went wrong',
        'error'
      )
    }

  }, 'json')
  return false;
});

// Update Question
$(document).on("submit", "#updateQuestionFrm", function () {
  $.post("query/updateQuestionExe.php", $(this).serialize(), function (data) {
    if (data.res == "success") {
      Swal.fire(
        'Success',
        'Selected question has been successfully updated!',
        'success'
      )
      refreshDiv();
    }
  }, 'json')
  return false;
});

// Delete Question
$(document).on("click", "#deleteQuestion", function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  $.ajax({
    type: "post",
    url: "query/deleteQuestionExe.php",
    dataType: "json",
    data: { id: id },
    cache: false,
    success: function (data) {
      if (data.res == "success") {
        Swal.fire(
          'Deleted Success',
          'Selected question successfully deleted',
          'success'
        )
        refreshDiv();
      }
    },
    error: function (xhr, ErrorStatus, error) {
      console.log(status.error);
    }

  });

  return false;
});

// Add Question 
$(document).on("submit", "#addQuestionFrm", function () {
  $.post("query/addQuestionExe.php", $(this).serialize(), function (data) {
    if (data.res == "exist") {
      Swal.fire(
        'Already Exist',
        data.msg + ' question <br>already exist in this exam',
        'error'
      )
    }
    else if (data.res == "success") {
      Swal.fire(
        'Success',
        data.msg + ' question <br>Successfully added',
        'success'
      )
      $('#addQuestionFrm')[0].reset();
      refreshDiv();
    }

  }, 'json')
  return false;
});

// Add Examinee
$(document).on("submit", "#addExamineeFrm", function () {
  $.post("query/addExamineeExe.php", $(this).serialize(), function (data) {
    if (data.res == "noGender") {
      Swal.fire(
        'No Gender',
        'Please select gender',
        'error'
      )
    }
    else if (data.res == "noCourse") {
      Swal.fire(
        'No Course',
        'Please select course',
        'error'
      )
    }
    else if (data.res == "noLevel") {
      Swal.fire(
        'No Year Level',
        'Please select year level',
        'error'
      )
    }
    else if (data.res == "fullnameExist") {
      Swal.fire(
        'Fullname Already Exist',
        data.msg + ' are already exist',
        'error'
      )
    }
    else if (data.res == "emailExist") {
      Swal.fire(
        'Email Already Exist',
        data.msg + ' are already exist',
        'error'
      )
    }
    else if (data.res == "success") {
      Swal.fire(
        'Success',
        data.msg + ' are now successfully added',
        'success'
      )
      refreshDiv();
      $('#addExamineeFrm')[0].reset();
    }
    else if (data.res == "failed") {
      Swal.fire(
        "Something's Went Wrong",
        '',
        'error'
      )
    }
  }, 'json')
  return false;
});


// Update Examinee
$(document).on("submit", "#updateExamineeFrm", function () {
  $.post("query/updateExamineeExe.php", $(this).serialize(), function (data) {
    if (data.res == "success") {
      Swal.fire(
        'Success',
        data.exFullname + ' <br>has been successfully updated!',
        'success'
      )
      refreshDiv();
    }
  }, 'json')
  return false;
});

function refreshDiv() {
  $('#tableList').load(document.URL + ' #tableList');
  $('#refreshData').load(document.URL + ' #refreshData');
}

// Update Answer
$(document).on("click", "#updateAnswer", function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  var val = $(this).data("val");

  $.ajax({
    type: "post",
    url: "query/updateAnswerExe.php",
    dataType: "json",
    data: { 
      id: id,
      correct: val ? 1 : 0,
    },
    cache: false,
    success: function (data) {
      if (data.res == "success") {
        Swal.fire(
          'Success',
          'Examinee Answer Updated Successfully',
          'success'
        )
        refreshDiv();
      }
    },
    error: function (xhr, ErrorStatus, error) {
      console.log(error);
    }

  });

  return false;
});