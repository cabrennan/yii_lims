<?php
/* @var $this ReagentInvController */
/* @var $model ReagentInv */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'reagent_inv_id'); ?>
		<?php echo $form->textField($model,'reagent_inv_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reagent_id'); ?>
		<?php echo $form->textField($model,'reagent_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reagent_kit_item_id'); ?>
		<?php echo $form->textField($model,'reagent_kit_item_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qty'); ?>
		<?php echo $form->textField($model,'qty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lot'); ?>
		<?php echo $form->textField($model,'lot',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_exp'); ?>
		<?php echo $form->textField($model,'date_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_rec'); ?>
		<?php echo $form->textField($model,'date_rec'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_rec'); ?>
		<?php echo $form->textField($model,'user_rec',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_auth'); ?>
		<?php echo $form->textField($model,'date_auth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_auth'); ?>
		<?php echo $form->textField($model,'user_auth',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_disc'); ?>
		<?php echo $form->textField($model,'date_disc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_disc'); ?>
		<?php echo $form->textField($model,'user_disc',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reason_disc'); ?>
		<?php echo $form->textField($model,'reason_disc',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datasheet'); ?>
		<?php echo $form->textField($model,'datasheet',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->