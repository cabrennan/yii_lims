<?php
/* @var $this PatientEventController */
/* @var $model PatientEvent */
/* @var $form CActiveForm */
?>
<div class="form">
    <div class="table">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'pedigree-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php
        echo $form->errorSummary($model);
        echo CHtml::hiddenField('Pedigree[user_mod]', Yii::app()->user->uniquename);
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
        echo "<th>Note</th>";
        echo "</tr>";
        echo "<tr class='shade'>";
        echo "<td>" . $form->textField($model, 'note', array('size' => 100, 'maxlength' => 300)) .
        $form->error($model, 'note') . "</td></tr>";



        echo "</table>\n</td></tr>";

        echo "<tr><td>\n<table>\n";
        echo "<tr><th>" . CHtml::submitButton($model->isNewRecord ? 'Create Pedigree' : 'Update Pedigree') . "</th></tr>\n";

        if (!$model->isNewRecord) {
            echo "<tr><th>";
            echo Pedigree::model()->getDeleteButton($model->pedigree_id);
            echo "</th></tr>";
        }

        echo "\n</table>\n</th></tr>";
        echo"</table>";

        $this->endWidget();

        echo "</div><!-- table -->";
        echo "</div><!-- form -->";


        