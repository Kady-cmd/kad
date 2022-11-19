<?php 
include("../../../conn.php");
$sql = "SELECT * FROM unit_tbl WHERE cou_id=". $_POST['cou_id'] . " ORDER BY unit_id DESC";
$result = $conn->query($sql);

if ($result->rowCount() > 0)
{
    echo '<select class="form-control" name="unitSelected" id="unitSelected">';
    echo '<option value="0">Select Unit</option>';
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option value='" . $row['unit_id']. "'>" . $row['unit_name']. "</option>";
    }
    echo '</select>';
}
else 
{
    echo '<select class="form-control" name="unitSelected" id="unitSelected">';
    echo '<option value="0">Select Unit</option>';
    echo '<option value="0">No Unit Found</option>';
    echo '</select>';
}