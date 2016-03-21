<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'uniquename'); ?>
		<?php echo $form->textField($model,'uniquename',array('size'=>8,'maxlength'=>8)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'short_name'); ?>
		<?php echo $form->textField($model,'short_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'peerrs'); ?>
		<?php echo $form->textField($model,'peerrs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peerrs_expire'); ?>
		<?php echo $form->textField($model,'peerrs_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_rem'); ?>
		<?php echo $form->textField($model,'date_rem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->