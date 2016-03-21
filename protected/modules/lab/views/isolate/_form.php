<?php
/* @var $this IsolateController */
/* @var $model Isolate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'isolate-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nano_conc'); ?>
		<?php echo $form->textField($model,'nano_conc',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'nano_conc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vol'); ?>
		<?php echo $form->textField($model,'vol',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'vol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'yield'); ?>
		<?php echo $form->textField($model,'yield'); ?>
		<?php echo $form->error($model,'yield'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rin'); ?>
		<?php echo $form->textField($model,'rin',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'rin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_nano'); ?>
		<?php echo $form->textField($model,'user_nano',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'user_nano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_nano'); ?>
		<?php echo $form->textField($model,'date_nano'); ?>
		<?php echo $form->error($model,'date_nano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_bio'); ?>
		<?php echo $form->textField($model,'user_bio',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'user_bio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_bio'); ?>
		<?php echo $form->textField($model,'date_bio'); ?>
		<?php echo $form->error($model,'date_bio'); ?>
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
		<?php echo $form->labelEx($model,'date_mod'); ?>
		<?php echo $form->textField($model,'date_mod'); ?>
		<?php echo $form->error($model,'date_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_mod'); ?>
		<?php echo $form->textField($model,'user_mod',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'user_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qual'); ?>
		<?php echo $form->textField($model,'qual',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'qual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_use'); ?>
		<?php echo $form->textField($model,'iso_use',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'iso_use'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purity'); ?>
		<?php echo $form->textField($model,'purity',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'purity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purity_260_280'); ?>
		<?php echo $form->textField($model,'purity_260_280',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'purity_260_280'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->