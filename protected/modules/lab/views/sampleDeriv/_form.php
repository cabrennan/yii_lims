<?php
/* @var $this SampleDerivController */
/* @var $model SampleDeriv */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sample-deriv-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_id'); ?>
		<?php echo $form->textField($model,'sample_id'); ?>
		<?php echo $form->error($model,'sample_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deriv_id'); ?>
		<?php echo $form->textField($model,'deriv_id'); ?>
		<?php echo $form->error($model,'deriv_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_add'); ?>
		<?php echo $form->textField($model,'user_add',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'user_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->