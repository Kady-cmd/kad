<?php
session_start();

if (!isset($_SESSION['admin']['adminLogin']) == true)
    header("location:index.php");
?>

<?php include("../../conn.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
    <?php include("includes/sidebar.php"); ?>

    <?php
    @$page = $_GET['page'];

    if ($page != '') 
    {
        if ($page == "add-course") 
        {
            include("pages/add-course.php");
        } 
        else if ($page == "manage-course") 
        {
            include("pages/manage-course.php");
        } 
        if ($page == "add-unit") 
        {
            include("pages/add-unit.php");
        } 
        else if ($page == "manage-unit") 
        {
            include("pages/manage-unit.php");
        } 
        else if ($page == "manage-exam") 
        {
            include("pages/manage-exam.php");
        } 
        else if ($page == "manage-examinee") 
        {
            include("pages/manage-examinee.php");
        } 
        else if ($page == "ranking-exam") 
        {
            include("pages/ranking-exam.php");
        } 
        else if ($page == "feedbacks") 
        {
            include("pages/feedbacks.php");
        } 
        else if ($page == "examinee-result") 
        {
            include("pages/examinee-result.php");
        }
        else if ($page == "result-preview") 
        {
            include("pages/result-preview.php");
        }
        else if ($page == "admin-audit-logs") 
        {
            include("pages/admin-audit-logs.php");
        }
        else if ($page == "examinee-audit-logs") 
        {
            include("pages/examinee-audit-logs.php");
        }
    } 
    else 
    {
        include("pages/home.php");
    }
    ?>

    <?php include("includes/footer.php"); ?>
    <?php include("includes/modals.php"); ?>