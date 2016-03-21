<?php
/* @var $this SnpController */
/* @var $model Snp */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'md5sum'); ?>
		<?php echo $form->textField($model,'md5sum',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_id'); ?>
		<?php echo $form->textField($model,'case_id',array('size'=>12,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'library_id'); ?>
		<?php echo $form->textField($model,'library_id',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flowcell'); ?>
		<?php echo $form->textField($model,'flowcell',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lane'); ?>
		<?php echo $form->textField($model,'lane'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qual'); ?>
		<?php echo $form->textField($model,'qual',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'snp_string'); ?>
		<?php echo $form->textField($model,'snp_string',array('size'=>60,'maxlength'=>166)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'snp_info'); ?>
		<?php echo $form->textField($model,'snp_info',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_mod'); ?>
		<?php echo $form->textField($model,'date_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_add'); ?>
		<?php echo $form->textField($model,'user_add',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_mod'); ?>
		<?php echo $form->textField($model,'user_mod',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_poll'); ?>
		<?php echo $form->textField($model,'date_poll'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->