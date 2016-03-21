<?php
/* @var $this DerivativeController */
/* @var $model Derivative */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'derivative-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell_select'); ?>
		<?php echo $form->textField($model,'cell_select',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'cell_select'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell_count'); ?>
		<?php echo $form->textField($model,'cell_count'); ?>
		<?php echo $form->error($model,'cell_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deriv_use'); ?>
		<?php echo $form->textField($model,'deriv_use',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'deriv_use'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'note'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'user_mod'); ?>
		<?php echo $form->textField($model,'user_mod',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'user_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_mod'); ?>
		<?php echo $form->textField($model,'date_mod'); ?>
		<?php echo $form->error($model,'date_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->