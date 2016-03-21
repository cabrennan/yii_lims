<?php
/* @var $this PatientController */
/* @var $patient Patient */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'patient-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            //'enableAjaxValidation' => false,
            // 'enableAjaxValidation' => true,
            // 'enableClientValidation' => true,
            // 'clientOptions' => array('validateOnSubmit' => true),
    ));
    ?>

    <?php echo $form->errorSummary($patient); ?>

    <?php
    echo "<div class='table'>";

    echo "\n<table>\n<tr>\n<td>\n\t<table>\n\t<tr>";
    echo "\n\t<th>" . $form->labelEx($patient, 'case_name') . "<font color='red'>(Required)</font></th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'study_id') . "<font color='red'>(Required)</font></th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'ref_phys') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'ref_phys_2') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'ref_phys_3') . "</th>";
    echo "\n\t</tr>";

    echo "\n\t<tr>";
    echo "\n\t<td>" . $form->textField($patient, 'case_name', array('size' => 15, 'maxlength' => 50)) . $form->error($patient, 'case_name') . "</td>";



    echo "\n\t<td>" . CHtml::activeDropDownList($patient, 'study_id', $patient->getMctpStudy()) . "</td>";
    echo "\n\t<td>" . $form->textField($patient, 'ref_phys', array('size' => 25, 'maxlength' => 100)) . $form->error($patient, 'ref_phys') . "</td>";
    echo "\n\t<td>" . $form->textField($patient, 'ref_phys_2', array('size' => 25, 'maxlength' => 100)) . $form->error($patient, 'ref_phys_2') . "</td>";
    echo "\n\t<td>" . $form->textField($patient, 'ref_phys_3', array('size' => 25, 'maxlength' => 100)) . $form->error($patient, 'ref_phys_3') . "</td>";
    echo "\n\t</tr>";
    echo "\n\t</table>\n";
    echo "\n</td>\n</tr>\n";

    echo "\n<tr>";
    echo "\n<td>";
    echo "\n\t<table><tr>";
    echo "\n\t<th>" . $form->labelEx($patient, 'mrn') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'first_name') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'middle_name') . "</th>";
    echo "\n\t<th>" . $form->labelEx($patient, 'last_name') . "</th>";
    echo "\n\t<th>Cancer</th>";
    echo "\n\t</tr>";

    echo "\n\t<tr>";
    echo "\n\t<td>" . $form->textField($patient, 'mrn', array('size' => 11, 'maxlength' => 32)) .
    $form->error($patient, 'mrn') . "</td>";

    echo "\n\t<td>" . $form->textField($patient, 'first_name', array('size' => 15, 'maxlength' => 50)) .
    $form->error($patient, 'first_name') . "</td>";
    echo "\n\t<td>" . $form->textField($patient, 'middle_name', array('size' => 15, 'maxlength' => 50)) .
    $form->error($patient, 'middle_name') . "</td>";
    echo "\n\t<td>" . $form->textField($patient, 'last_name', array('size' => 15, 'maxlength' => 50)) .
    $form->error($patient, 'last_name') . "</td>";


    if (isset($case->cancer_id)) {
        $selected = $case->cancer_id;
    } else {
        $selected = "Unspecified";
    }
    $cancer_arry = CHtml::listData(Cancer::model()->findAll(array('order' => 'origin_site, name')), 'cancer_id', 'name');
    echo "\n\t<td>" . CHtml::dropDownList('Cases[cancer_id]', $selected, $cancer_arry) . "</td>";


    echo "\n\t</tr>";

    echo "\n\t</table>";
    echo "\n</td>";



    echo "\n</tr>";

    echo "\n<tr><td><table><tr>";
    echo "<th>Gender</th>";
    echo "<th>Ethnicity</th>";
    echo "<th>Race</th>";
    echo "<th>" . $form->labelEx($patient, 'dob') . "</th>";
    echo "<th>" . $form->labelEx($patient, 'dod') . "</th>";

    echo "</tr>";

    echo "\n<tr>";


    if (isset($case->gender)) {
        $selected = $case->gender;
    } else {
        $selected = "Unknown";
    }
    echo "<td>" . CHtml::dropDownList("Cases[gender]", $selected, ZHtml::enumItem(Cases::model(), "gender", "")) . "</td>";


    if (isset($case->ethnicity)) {
        $selected = $case->ethnicity;
    } else {
        $selected = "Unknown";
    }
    echo "<td>" . CHtml::dropDownList("Cases[ethnicity]", $selected, ZHtml::enumItem(Cases::model(), "ethnicity", "")) . "</td>";

    if (isset($case->race)) {
        $selected = $case->race;
    } else {
        $selected = "Unknown";
    }
    echo "<td>" . CHtml::dropDownList("Cases[race]", $selected, ZHtml::enumItem(Cases::model(), "race", "")) . "</td>";

    echo "<td><input type='text' id = \"Patient_dob\" name=\"Patient[dob]\" size='10' maxsize='10' ";

    if (isset($patient->dob)) {
        echo "value='" . date("m/d/Y", strtotime($patient->dob)) . "'";
    }
    echo "></td>";

    echo "<td><input type='text' id=\"Patient_dod\" name=\"Patient[dod]\" size='10' maxsize='10' ";
    if (isset($patient->dod)) {
        echo "value='" . date("m/d/Y", strtotime($patient->dod)) . "'";
    }
    echo "></td>";
    echo "</tr></table></td></tr>";

    echo "\n<tr><td><table><tr>";


    echo "\n<th>" . $form->labelEx($patient, 'date_enroll') . "</th>";
    echo "\n<th>External Institution</th>";
    echo "\n<th>External Institution Case ID</th>";
    echo "</tr>";

    echo "\n<tr>";


    echo "\n<td><input type='text' id=\"Patient_date_enroll\" name=\"Patient[date_enroll]\" size='10' maxsize='10' ";
    if (isset($patient->date_enroll)) {
        echo "value='" . date("m/d/Y", strtotime($patient->date_enroll)) . "'";
    }
    echo "></td>";

    if (isset($case->ext_inst_id)) {
        $selected = $case->ext_inst_id;
    } else {
        $selected = "Not Applicable";
    }
    echo "\n<td>" . CHtml::dropDownList('Cases[ext_inst_id]', $selected, $patient->getExtInst()) . "</td>";


    echo "\n<td><input type='text' id=\"Cases_ext_case_id\" name=\"Cases[ext_case_id]\" size='15' maxsize='50' ";
    if (isset($case->ext_inst_case_id)) {
        echo "value='" . $case->ext_inst_case_id . "'";
    }
    echo ">" . "</td>";
    echo "\n</tr></table></td></tr>";

    echo "\n<tr>\n<th colspan='6'>";
    echo CHtml::submitButton($patient->isNewRecord ? 'Create New Patient' : 'Update Patient');
    echo "</th></tr>";
    echo "\n</table>";


    $this->endWidget();

    echo "</div><!-- table -->";
    echo "</div><!-- form -->";
    