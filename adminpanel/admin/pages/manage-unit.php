<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE UNITS</div>
                </div>
            </div>
        </div>        
        
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Unit List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                        <tr>
                            <th class="text-left pl-4">Unit Code</th>
                            <th class="text-left pl-4">Unit Name</th>
                            <th class="text-left pl-4">Course</th>
                            <th class="text-left pl-4">Last Updated</th>
                            <th class="text-center" width="20%">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $selUnit = $conn->query("SELECT * FROM unit_tbl ORDER BY unit_id DESC");
                            if($selUnit->rowCount() > 0)
                            {
                                while ($selUnitRow = $selUnit->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td class="pl-4">
                                            <?php echo $selUnitRow['unit_code']; ?>
                                        </td>
                                        <td class="pl-4">
                                            <?php echo $selUnitRow['unit_name']; ?>
                                        </td>
                                        <td class="pl-4">
                                            <?php 
                                                $unitCourse = $selUnitRow['cou_id'];
                                                $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$unitCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                echo $selCourse['cou_name'];
                                            ?>
                                        </td>
                                        <td class="pl-4">
                                            <?php echo date('F d, Y', strtotime($selUnitRow['unit_created'])) . ' @ ' . date('h:i:s a', strtotime($selUnitRow['unit_created'])); ?>
                                        </td>
                                        <td class="text-center">
                                            <a rel="facebox" style="text-decoration: none;" class="btn btn-primary btn-sm" href="facebox_modal/updateUnit.php?id=<?php echo $selUnitRow['unit_id']; ?>" id="updateUnit">Update</a>
                                            <button type="button" id="deleteUnit" data-id='<?php echo $selUnitRow['unit_id']; ?>' class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>

                                <?php }
                            }
                            else
                            { ?>
                                <tr>
                                    <td colspan="2">
                                    <h3 class="p-3">No Unit Found</h3>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
         
