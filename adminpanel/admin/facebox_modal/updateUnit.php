<?php
include("../../../conn.php");
$id = $_GET['id'];
$selUnit = $conn->query("SELECT * FROM unit_tbl WHERE unit_id='$id' ")->fetch(PDO::FETCH_ASSOC);
?>

<fieldset>
    <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Unit (<?php echo strtoupper($selUnit['unit_name']); ?>)</i></legend>
    <div class="col-md-12 mt-4">
        <form method="post" id="updateUnitFrm">
            <div class="form-group">
                <legend>Course</legend>
                <?php 
                    $unitCourse = $selUnit['cou_id'];
                    $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$unitCourse' ")->fetch(PDO::FETCH_ASSOC);
                ?>
                <select class="form-control" name="unitCourse">
                    <option value="<?php echo $unitCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
                    <?php 
                      $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id!='$unitCourse' ");
                      while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                      <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                    <?php  }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <legend>Unit Code</legend>
                <input type="hidden" name="unit_id" value="<?php echo $id; ?>">
                <input type="" name="newUnitCode" class="form-control" required="" value="<?php echo $selUnit['unit_code']; ?>">
            </div>

            <div class="form-group">
                <legend>Unit Name</legend>
                <input type="" name="newUnitName" class="form-control" required="" value="<?php echo $selUnit['unit_name']; ?>">
            </div>

            <div class="form-group" align="right">
                <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
            </div>
        </form>
    </div>
</fieldset>
