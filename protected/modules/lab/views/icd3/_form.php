<?php
/* @var $this Icd3Controller */
/* @var $model Icd3 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'icd3-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'site_recode'); ?>
		<?php echo $form->textField($model,'site_recode',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'site_recode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_desc'); ?>
		<?php echo $form->textField($model,'site_desc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'site_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hist'); ?>
		<?php echo $form->textField($model,'hist'); ?>
		<?php echo $form->error($model,'hist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hist_desc'); ?>
		<?php echo $form->textField($model,'hist_desc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'hist_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hist_behv'); ?>
		<?php echo $form->textField($model,'hist_behv',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'hist_behv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hist_behv_desc'); ?>
		<?php echo $form->textField($model,'hist_behv_desc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'hist_behv_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->