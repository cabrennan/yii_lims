<?php
/* @var $this PathEventController */
/* @var $model PathEvent */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($pathEvent,'path_event_id'); ?>
		<?php echo $form->textField($pathEvent,'path_event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'patient_id'); ?>
		<?php echo $form->textField($pathEvent,'patient_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'event_type'); ?>
		<?php echo $form->textField($pathEvent,'event_type',array('size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'event_name'); ?>
		<?php echo $form->textField($pathEvent,'event_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'material'); ?>
		<?php echo $form->textField($pathEvent,'material',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'site'); ?>
		<?php echo $form->textField($pathEvent,'site',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'ext_inst_id'); ?>
		<?php echo $form->textField($pathEvent,'ext_inst_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'date_event'); ?>
		<?php echo $form->textField($pathEvent,'date_event'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'date_add'); ?>
		<?php echo $form->textField($pathEvent,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'user_add'); ?>
		<?php echo $form->textField($pathEvent,'user_add',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'date_mod'); ?>
		<?php echo $form->textField($pathEvent,'date_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'user_mod'); ?>
		<?php echo $form->textField($pathEvent,'user_mod',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'note'); ?>
		<?php echo $form->textField($pathEvent,'note',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($pathEvent,'mion_event_id'); ?>
		<?php echo $form->textField($pathEvent,'mion_event_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->