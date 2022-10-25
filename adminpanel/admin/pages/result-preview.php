<?php
$examId = $_GET['id'];
$examineeId = $_GET['examinee_id'];
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId'")->fetch(PDO::FETCH_ASSOC);
$selExaminee = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$examineeId'")->fetch(PDO::FETCH_ASSOC);
?>

<style type="text/css">
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .text:after {
        position: absolute;
        top: 7px;
        right: 25px;
        content: "Switch off";
        -webkit-transition: opacity 0.5s ease-in-out;
        -moz-transition: opacity 0.5s ease-in-out;
        transition: opacity 0.5s ease-in-out;
    }

    .text:before {
        position: absolute;
        top: 7px;
        left: 25px;
        content: "Switch on";
        -webkit-transition: opacity 0.5s ease-in-out;
        -moz-transition: opacity 0.5s ease-in-out;
        transition: opacity 0.5s ease-in-out;
    }

    input + .slider + .text:after {
        opacity: 1;
    }
    input + .slider + .text:before {
        opacity: 0;
    }

    input:checked + .slider + .text:after {
        opacity: 0;
    }

        input:checked + .slider + .text:before {
        opacity: 1;
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div id="refreshData">
            <div class="col-md-12">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div>
                                <?php echo $selExam['ex_title']; ?>
                                <div class="page-title-subheading">
                                    <?php echo $selExam['ex_description']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-md-12">
                    <h1 class="text-primary">RESULTS</h1>
                </div>

                <div class="row col-md-6 float-left">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $selExaminee['exmne_fullname'] . "'s"; ?> Answers</h5>
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                                <?php
                                $selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id WHERE eqt.exam_id='$examId' AND ea.axmne_id='$examineeId' AND ea.exans_status='new'");
                                $i = 1;
                                while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td>
                                            <b>
                                                <p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p>
                                            </b>
                                            <label class="pl-4 text-success">
                                                Answer :
                                                <?php
                                                if ($selQuestRow['exam_answer'] != $selQuestRow['exans_answer']) {
                                                    if ($selQuestRow['question_type'] == 2 && $selQuestRow['correct']) {
                                                ?>
                                                        <span class="text-success"><?php echo $selQuestRow['exans_answer']; ?></span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span style="color:red;"><?php echo $selQuestRow['exans_answer']; ?></span>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <span class="text-success"><?php echo $selQuestRow['exans_answer']; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </label>
                                            <br>
                                            <label class="pl-4 text-success">
                                                <?php
                                                if ($selQuestRow['question_type'] == 2) {
                                                ?>
                                                    <label class="switch">
                                                        <?php
                                                        if ($selQuestRow['correct']) {
                                                        ?>
                                                            <input type="checkbox" checked id="updateAnswer" data-id='<?php echo $selQuestRow['exans_id']; ?>' data-val="false">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input type="checkbox" id="updateAnswer" data-id='<?php echo $selQuestRow['exans_id']; ?>' data-val="true">
                                                        <?php
                                                        }
                                                        ?>
                                                        <span class="slider round"></span>
                                                    </label>
                                                <?php
                                                }
                                                ?>
                                            </label>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 float-left">
                    <div class="col-md-6 float-left">
                        <div class="card mb-3 widget-content bg-night-fade">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">
                                        <h5>Score</h5>
                                    </div>
                                    <div class="widget-subheading" style="color: transparent;">/</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white">
                                        <?php
                                        $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$examineeId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                                        ?>
                                        <span>
                                            <?php echo $selScore->rowCount(); ?>
                                            <?php
                                            $over  = $selExam['ex_questlimit_display'];
                                            ?>
                                        </span> / <?php echo $over; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 float-left">
                        <div class="card mb-3 widget-content bg-happy-green">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">
                                        <h5>Percentage</h5>
                                    </div>
                                    <div class="widget-subheading" style="color: transparent;">/</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white">
                                        <?php
                                        $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$examineeId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                                        ?>
                                        <span>
                                            <?php
                                            $score = $selScore->rowCount();
                                            $ans = $score / $over * 100;
                                            echo number_format($ans, 2);
                                            echo "%";

                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>