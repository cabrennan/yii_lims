<?php
/* @var $this CasesController */
/* @var $model Cases */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'case_id'); ?>
		<?php echo $form->textField($model,'case_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_type'); ?>
		<?php echo $form->textField($model,'case_type',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yob'); ?>
		<?php echo $form->textField($model,'yob',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yod'); ?>
		<?php echo $form->textField($model,'yod',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ethnic_id'); ?>
		<?php echo $form->textField($model,'ethnic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'race_id'); ?>
		<?php echo $form->textField($model,'race_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'icd3_id'); ?>
		<?php echo $form->textField($model,'icd3_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'cancer_id'); ?>
		<?php echo $form->textField($model,'cancer_id'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->