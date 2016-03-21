<?php
/* @var $this SnpController */
/* @var $model Snp */
/* @var $form CActiveForm */
?>

<div class="form">
    <div class="table">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'snp-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>


        <?php
        echo $form->errorSummary($model);

        if (!$model->isNewRecord) {

            echo "\n<table><tr>";
            echo "<th>" . $form->labelEx($model, 'date_add') . "</th>";
            echo "<th>" . $form->labelEx($model, 'user_add') . "</th>";
            echo "<th>" . $form->labelEx($model, 'date_mod') . "</th>";
            echo "<th>" . $form->labelEx($model, 'user_mod') . "</th>";
            echo "</tr>";

            echo "\n<tr class='shade'>";
            echo "<td>" . date("m/d/Y h:i A", strtotime($model->date_add)) . "</td>";
            echo "<td>" . User::model()->getShortName($model->user_add) . "</td>";
            echo "<td>" . date("m/d/Y h:i A", strtotime($model->date_mod)) . "</td>";
            echo "<td>" . User::model()->getShortName($model->user_mod) . "</td>";
            echo "</tr></table>";
            echo CHtml::hiddenField('Cases[user_mod]', Yii::app()->user->uniquename);
        } else {
            echo CHtml::hiddenField('Cases[user_add]', Yii::app()->user->uniquename);
            echo CHtml::hiddenField('Cases[user_mod]', Yii::app()->user->uniquename);
        }

        echo "\n<table>";
        echo "\n<tr>";
        echo "\n\t<th>" . $form->labelEx($model, 'md5sum') . "</th>";
        echo "\n\t<th>" . $form->labelEx($model, 'filename') . "</th>";
        echo "\n\t<th colspan='2'>" . $form->labelEx($model, 'snp_info') . "</th>";
        echo "\n\t<th>" . $form->labelEx($model, 'date_poll') . "</th>";
        
        echo "</tr>\n";
        echo "\n<tr class='shade'>";
        echo "\n\t<td>" . $model->md5sum . "</td>";
        echo "\n\t<td>" . $model->filename . "</td>";
        echo "\n\t<td colspan='2'>" . $model->snp_info . "</td>";
        echo "\n\t<td>" . $model->date_poll . "</td>";
        echo "</tr>\n";
        
        echo "\n<tr>";
        echo "\n\t<th>" . $form->labelEx($model, 'case_id') . "</th>";
        echo "\n\t<th>" . $form->labelEx($model, 'library_id') . "</th>";
        echo "\n\t<th>" . $form->labelEx($model, 'flowcell') . "</th>";
        echo "\n\t<th>" . $form->labelEx($model, 'lane') . "</th>";
        echo "\n\t<th>" . $form->labelEx($model, 'qual') . "</th>";
        echo "</tr>\n";
        echo "\n<tr class='shade'>";
        echo "\n\t<td>" . $model->case_id . "</td>";
        echo "\n\t<td>" . $model->library_id . "</td>";
        echo "\n\t<td>" . $model->flowcell . "</td>";
        echo "\n\t<td>" . $model->lane . "</td>";
        echo "\n\t<td>" . CHtml::activeDropDownList($model, 'qual', ZHtml::enumItem($model, 'qual')) . "</td>";
        echo "</tr>\n";
        
        echo "\n<tr>";
        echo "\n\t<th colspan='5'>" . $form->labelEx($model, 'snp_string') . "</th>";
        echo "</tr>\n";
        echo "\n<tr class='shade'>";
        echo "\n\t<td colspan='5'>" . $model->snp_string . "</td>";
        echo "</tr>\n";
        
        echo "\n<tr>";
        echo "\n\t<th colspan='5'>" . $form->labelEx($model, 'note') . "</th>";
        echo "</tr>\n";
        echo "\n<tr class='shade'>";
        echo "\n\t<td colspan='5'>" . $form->textField($model, 'note', array('size' =>  100, 'maxlength' => 200)) . "</td>";
        echo "</tr>\n";
        
        echo "\n<tr>";
        echo "\n\t<th colspan='5'>" . CHtml::submitButton('Update Record') . "</th>";
        echo "\n</table>\n";
       
        $this->endWidget(); 
        
        ?>
    </div> <!-- table -->
</div><!-- form -->