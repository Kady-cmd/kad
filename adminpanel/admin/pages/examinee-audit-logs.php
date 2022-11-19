<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE EXAMINEE AUDIT LOGS</div>
                </div>
            </div>
        </div>        
        
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Examinee Audit Logs
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Action Made</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $selExamineeAuditLogs = $conn->query("SELECT * FROM examinee_audit_logs ORDER BY id DESC ");
                            if($selExamineeAuditLogs->rowCount() > 0)
                            {
                                while ($selExamineeAuditLogsRow = $selExamineeAuditLogs->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td>
                                        <?php 
                                            $examineeId = $selExamineeAuditLogsRow['user_id'];
                                            $selExamineeAcc = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$examineeId' ")->fetch(PDO::FETCH_ASSOC);
                                            echo $selExamineeAcc['exmne_fullname'];
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                            $examineeId = $selExamineeAuditLogsRow['user_id'];
                                            $selExamineeAcc = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$examineeId' ")->fetch(PDO::FETCH_ASSOC);
                                            echo $selExamineeAcc['exmne_email'];
                                        ?>
                                        </td>
                                        <td><?php echo $selExamineeAuditLogsRow['action_made']; ?></td>
                                        <td><?php echo date('F d, Y', strtotime($selExamineeAuditLogsRow['date_created'])) . ' @ ' . date('h:i:s a', strtotime($selExamineeAuditLogsRow['date_created'])); ?></td>
                                    </tr>
                                <?php }
                            }
                            else
                            { ?>
                                <tr>
                                    <td colspan="2">
                                    <h3 class="p-3">No Admin Audit Logs Found</h3>
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
         
