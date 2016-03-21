<?php
/* @var $this PatientController */
/* @var $patient Patient */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'history-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>


    <?php
    echo "<div class='table'>\n<table>";

    echo "\n<tr>";
    echo "\n\t<th>" . $form->labelEx($patient, 'case_name') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'mrn') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'first_name') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'middle_name') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'last_name') . "</th>";
    echo "\n\t<th>" . $form->labelEx($case, 'cancer_id') . "</th>";
    echo "</tr>";

    echo "\n<tr>";
    echo "\n\t<td>" . $patient->case_name . "</td>";
    echo "\n\t<td>" . $patient->mrn . "</td>";
    echo "\n\t<td>" . $patient->first_name . "</td>";
    echo "\n\t<td>" . $patient->middle_name . "</td>";
    echo "\n\t<td>" . $patient->last_name . "</td>";
    echo "\n\t<td>" . $case->cancer->name . "</td>";
    echo " </tr>";

    echo "\n<tr>";
    echo "\n\t<th>" . $form->labelEx($case, 'gender') . "</th>";
    echo "\n\t<th>" . $form->labelEx($case, 'ethnicity') . "</th>";
    echo "\n\t<th>" . $form->labelEx($case, 'race') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'dob') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'dod') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'study_id') . "</th>";
    echo "</tr>";

    echo "\n<tr>";
    echo "\n\t<td>" . $case->gender . "</td>";
    echo "\n\t<td>" . $case->ethnicity . "</td>";
    echo "\n\t<td>" . $case->race . "</td>";
    echo "\n\t<td>" . $patient->dob . "</td>";
    echo "\n\t<td>" . $patient->dod . "</td>";
    echo "\n\t<td>" . $patient->mctp_study->name . "</td>";
    echo "</tr>";

    echo "\n<tr>";
    echo "\n\t<td colspan='6'>";
    echo "\n\t<table>";
    echo "\n\t<tr>";
    echo "\n\t\t<th>" . $form->labelEx($patient, 'ref_phys') . "</th>";
    echo "\n\t\t<th>" . $form->labelEx($patient, 'date_enroll') . "</th>";
    echo "\n\t\t<th>" . $form->labelEx($case, 'ext_inst_id') . "</th>";
    echo "\n\t\t<th>" . $form->labelEx($case, 'ext_case_id') . "</th>";
    echo "</tr>";
    echo "\n\t<tr>";
    echo "\n\t\t<td>" . $patient->ref_phys . "</td>";
    echo "\n\t\t<td>" . $patient->date_enroll . "</td>";
    echo "\n\t\t<td>" . $case->ext_inst->name . "</td>";
    echo "\n\t\t<td>" . $case->ext_case_id . "</td>";

    echo CHtml::hiddenField('PatientHistory[patient_id]', $patient->patient_id);

    echo "\n<tr>";
    echo "\n\t\t<td colspan='6'>";
    // Yes, this is a hack, I'm tired....CB
    if ($history->summary) {
        $defText = $history->summary;
    } else {
        $defText = "";
    }
    echo CHtml::activeTextArea($history, 'PatientHistory_summary', array('name' => 'PatientHistory[summary]',
        'value' => $defText, 'rows' => 27, 'cols' => 150, 'maxlength' => '4000'));

    echo "</td>";
    echo "</tr>";

    echo "\n\t</table>";
    echo "\n\t</td>";
    echo "</tr>";
    echo "\n<tr>";
    echo "<th colspan='6'>" . CHtml::submitButton($patient->isNewRecord ? 'Create Patient History' : 'Update Patient History') . "</th>";
    echo "</table>";
    $this->endWidget();
    echo "</div><!-- table -->";
    echo "</div><!-- form -->";
    