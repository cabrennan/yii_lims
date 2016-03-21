<?php
/* @var $this PathEventSampleController */
/* @var $model PathEventSample */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'path-event-sample-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'path_event_id'); ?>
		<?php echo $form->textField($model,'path_event_id'); ?>
		<?php echo $form->error($model,'path_event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_id'); ?>
		<?php echo $form->textField($model,'sample_id'); ?>
		<?php echo $form->error($model,'sample_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->