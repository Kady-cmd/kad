<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE ADMIN AUDIT LOGS</div>
                </div>
            </div>
        </div>        
        
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Admin Audit Logs
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                        <tr>
                            <th>User Email</th>
                            <th>Action Made</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $selAdminAuditLogs = $conn->query("SELECT * FROM admin_audit_logs ORDER BY id DESC ");
                            if($selAdminAuditLogs->rowCount() > 0)
                            {
                                while ($selAdminAuditLogsRow = $selAdminAuditLogs->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td>
                                        <?php 
                                            $adminId = $selAdminAuditLogsRow['user_id'];
                                            $selAdminAcc = $conn->query("SELECT * FROM admin_acc WHERE admin_id='$adminId' ")->fetch(PDO::FETCH_ASSOC);
                                            echo $selAdminAcc['admin_user'];
                                        ?>
                                        </td>
                                        <td><?php echo $selAdminAuditLogsRow['action_made']; ?></td>
                                        <td><?php echo date('F d, Y', strtotime($selAdminAuditLogsRow['date_created'])) . ' @ ' . date('h:i:s a', strtotime($selAdminAuditLogsRow['date_created'])); ?></td>
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
         
