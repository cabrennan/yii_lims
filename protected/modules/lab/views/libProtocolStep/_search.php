<?php
/* @var $this LibProtocolStepController */
/* @var $model LibProtocolStep */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'lib_protocol_step_id'); ?>
		<?php echo $form->textField($model,'lib_protocol_step_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'protocol_step_num'); ?>
		<?php echo $form->textField($model,'protocol_step_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_protocol_id'); ?>
		<?php echo $form->textField($model,'lib_protocol_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bench_step_id'); ?>
		<?php echo $form->textField($model,'bench_step_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->