<?php
/* @var $this Icd3Controller */
/* @var $model Icd3 */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_recode'); ?>
		<?php echo $form->textField($model,'site_recode',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_desc'); ?>
		<?php echo $form->textField($model,'site_desc',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hist'); ?>
		<?php echo $form->textField($model,'hist'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hist_desc'); ?>
		<?php echo $form->textField($model,'hist_desc',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hist_behv'); ?>
		<?php echo $form->textField($model,'hist_behv',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hist_behv_desc'); ?>
		<?php echo $form->textField($model,'hist_behv_desc',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->