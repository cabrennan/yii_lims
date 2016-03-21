<?php
/* @var $this CellLineController */
/* @var $model CellLine */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cell-line-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); echo $model->id ?>
		<?php echo $form->textField($model,'id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tissue'); ?>
		<?php echo $form->textField($model,'tissue',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tissue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell_type'); ?>
		<?php echo $form->textField($model,'cell_type',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'cell_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'morphology'); ?>
		<?php echo $form->textField($model,'morphology',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'morphology'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disease'); ?>
		<?php echo $form->textField($model,'disease',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'disease'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atcc_cat'); ?>
		<?php echo $form->textField($model,'atcc_cat',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'atcc_cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atcc_link'); ?>
		<?php echo $form->textField($model,'atcc_link',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'atcc_link'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->