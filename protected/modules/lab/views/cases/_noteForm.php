<?php
/* @var $this PatientController */
/* @var $model Patient */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'case-note-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary(array($model)); ?>

    <?php
    echo CHtml::hiddenField('Cases[case]', $model->name);
    echo "<table>\n";

    echo "<tr><td><table><tr>";
    echo "<th>" . $form->labelEx($model, 'cancer_id') . "</th>";
    echo "<th>" . $form->labelEx($model, 'yob') . "</th>";
    echo "<th>" . $form->labelEx($model, 'yod') . "</th>";
    echo "<th>" . $form->labelEx($model, 'ext_inst_id') . "</th>";
    echo "<th>" . $form->labelEx($model, 'ext_case_id') . "</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $model->cancer_id . "</td>";
    echo "<td>" . $model->yob . "</td>";
    echo "<td>" . $model->yod . "</td>";
    echo "<td>" . CHtml::decode(ExtInst::model()->getName($model->ext_inst_id)) . "</td>";
    echo "<td>" . $model->ext_case_id . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>" . $form->labelEx($model, 'case_type') . "</th>";
    echo "<th>" . $form->labelEx($model, 'gender') . "</th>";
    echo "<th>" . $form->labelEx($model, 'ethnic_id') . "</th>";
    echo "<th>" . $form->labelEx($model, 'race_id') . "</th>";
    echo "<th>Study Info</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $model->case_type . "</td>";
    echo "<td>" . $model->gender . "</td>";
    echo "<td>" . CHtml::decode(Ethnicity::model()->getEthnicityName($model->ethnic_id)) . "</td>";
    echo "<td>" . CHtml::decode(Race::model()->getRaceName($model->race_id)) . "</td>";
    echo "<td>" . CHtml::decode(CaseStudy::model()->getCaseStudyTable($model->name)) . "</td>";
    echo "</tr>";
    echo "</table></td></tr>";

    echo "\n<tr class='shade'>";
    echo "<td>" . $form->textField($model, 'note', array('size' => 100, 'maxlength' => 200)) . $form->error($model, 'note') . "</td>";
    echo "</tr>";

    echo "\n<tr><th>" . CHtml::submitButton('Update Case Note') . "</th></tr>";
    echo "\n</table>";

    $this->endWidget();

    echo "</div><!-- form -->";
    echo "</div><!-- table -->";
    