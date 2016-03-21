<?php
/* @var $this PatientEventController */
/* @var $model PatientEvent */
/* @var $form CActiveForm */
?>
<div class="form">
    <div class="table">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'patient-file-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'), // for file upload
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php
        echo $form->errorSummary($model);
        echo CHtml::hiddenField('PatientFile[user_mod]', Yii::app()->user->uniquename);
        echo CHtml::hiddenField('PatientFile[patient_id]', $patient->patient_id);
        echo"<table>";
        if (!$model->isNewRecord) {
            echo "\n<tr><td>\n<table>\n<tr>";
            echo "<th>" . $form->labelEx($model, 'date_add') . "</th>";
            echo "<th>" . $form->labelEx($model, 'user_add') . "</th>";
            echo "<th>" . $form->labelEx($model, 'date_mod') . "</th>";
            echo "<th>" . $form->labelEx($model, 'user_mod') . "</th>";
            echo "</tr>";

            echo "\n<tr>";
            echo "<td>" . date("m/d/Y g:iA", strtotime($model->date_add)) . "</td>";
            echo "<td>" . User::model()->getShortName($model->user_add) . "</td>";
            echo "<td>" . date("m/d/Y g:iA", strtotime($model->date_mod)) . "</td>";
            echo "<td>" . User::model()->getShortName($model->user_mod) . "</td>";
            echo "</tr>\n</table>\n</td></tr>";
        }

        echo "<tr><td><table>\n";
        echo "<tr>";
        echo "<th>Event Type</th>";
        echo "<th>File Date</th>";
        echo "<th>Note</th>";
        echo "<th>File</th>";

        echo "</tr>";
        echo "<tr class='shade'>";
        echo "<td>" . CHtml::activeDropDownList($model, 'file_type', ZHtml::enumItem($model, 'file_type')) .
        $form->error($model, 'file_type') . "</td>";
        echo "<td>" . $form->textField($model, 'date_file', array('size' => 10, 'maxlength' => 10)) . $form->error($model, 'date_file') . "</td>";
        echo "<td>" . $form->textField($model, 'note', array('size' => 75, 'maxlength' => 200)) .
        $form->error($model, 'note') . "</td>";
        echo "\n<td>";
        if ($model->isNewRecord) {
            echo $form->fileField($model, 'filename'); 
        } else {
            echo PatientFile::getFileIconByFilename($model->filename);
        }
        echo "</td></tr>\n";

        echo "</table>\n</td></tr>";

        echo "<tr><td>\n<table>\n";
        echo "<tr><th>" . CHtml::submitButton($model->isNewRecord ? 'Upload Patient File' : 'Update Patient File') . "</th></tr>\n";

        if (!$model->isNewRecord) {
            echo "<tr><th>";
            echo PatientFile::model()->getDeleteButton($model->id);
            echo "</th></tr>";
        }

        echo "\n</table>\n</th></tr>";
        echo"</table>";

        $this->endWidget();

        echo "</div><!-- table -->";
        echo "</div><!-- form -->";



        