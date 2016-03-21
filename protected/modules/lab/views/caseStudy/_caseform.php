<?php
/* @var $this CaseStudyController */
/* @var $model CaseStudy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'case-study-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    	<?php echo $form->errorSummary($model); ?>
    <div class='table'>
    <table>
        <tr><th>Case</th>
            <th>Study</th>
            <th>Case Study Id</th>
        </tr>
        <tr><td> <?php echo Cases::model()->findByPk($model->case_id)->name; ?> </td>
            <td> <?php echo MctpStudy::model()->findByPk($model->study_id)->name; ?> </td>
            <td> <?php echo $form->textField($model,'case_study_id'); 
		       echo $form->error($model,'case_study_id'); ?></td>
        </tr>
        <tr>
            <th colspan='3'>
                <?php echo CHtml::submitButton('Update'); ?>
            </th>
        </tr>
        
    </table>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->