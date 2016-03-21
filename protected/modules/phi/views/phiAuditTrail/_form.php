<?php
/* @var $this PhiAuditTrailController */
/* @var $model PhiAuditTrail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phi-audit-trail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'old_value'); ?>
		<?php echo $form->textArea($model,'old_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'old_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_value'); ?>
		<?php echo $form->textArea($model,'new_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'new_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'field'); ?>
		<?php echo $form->textField($model,'field',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'field'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stamp'); ?>
		<?php echo $form->textField($model,'stamp'); ?>
		<?php echo $form->error($model,'stamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model_id'); ?>
		<?php echo $form->textField($model,'model_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'model_id'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->