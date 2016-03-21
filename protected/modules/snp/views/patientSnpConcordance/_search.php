<?php
/* @var $this PatientSnpConcordanceController */
/* @var $model PatientSnpConcordance */
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
		<?php echo $form->label($model,'md5sum'); ?>
		<?php echo $form->textField($model,'md5sum',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_id'); ?>
		<?php echo $form->textField($model,'case_id',array('size'=>60,'maxlength'=>100)); ?>
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
		<?php echo $form->label($model,'md5sum_2'); ?>
		<?php echo $form->textField($model,'md5sum_2',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_id_2'); ?>
		<?php echo $form->textField($model,'case_id_2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'library_id_2'); ?>
		<?php echo $form->textField($model,'library_id_2',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flowcell_2'); ?>
		<?php echo $form->textField($model,'flowcell_2',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lane_2'); ?>
		<?php echo $form->textField($model,'lane_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'concordant_pos_count'); ?>
		<?php echo $form->textField($model,'concordant_pos_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_pos_count'); ?>
		<?php echo $form->textField($model,'total_pos_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pct_concordant'); ?>
		<?php echo $form->textField($model,'pct_concordant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_add'); ?>
		<?php echo $form->textField($model,'user_add',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_mod'); ?>
		<?php echo $form->textField($model,'date_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_mod'); ?>
		<?php echo $form->textField($model,'user_mod',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->