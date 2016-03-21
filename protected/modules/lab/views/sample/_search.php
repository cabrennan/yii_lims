<?php
/* @var $this SampleController */
/* @var $model Sample */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sample_id'); ?>
		<?php echo $form->textField($model,'sample_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_id'); ?>
		<?php echo $form->textField($model,'case_id'); ?>
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
		<?php echo $form->label($model,'date_rec'); ?>
		<?php echo $form->textField($model,'date_rec'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_out'); ?>
		<?php echo $form->textField($model,'date_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_in'); ?>
		<?php echo $form->textField($model,'date_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ext_inst_id'); ?>
		<?php echo $form->textField($model,'ext_inst_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ext_label'); ?>
		<?php echo $form->textField($model,'ext_label',array('size'=>50,'maxlength'=>50)); ?>
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
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'researcher'); ?>
		<?php echo $form->textField($model,'researcher',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_type'); ?>
		<?php echo $form->textField($model,'sample_type',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_preserve'); ?>
		<?php echo $form->textField($model,'sample_preserve',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tissue_mion'); ?>
		<?php echo $form->textField($model,'tissue_mion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tissue_loc_mion'); ?>
		<?php echo $form->textField($model,'tissue_loc_mion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exp_design_sdb'); ?>
		<?php echo $form->textField($model,'exp_design_sdb',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tissue_sdb'); ?>
		<?php echo $form->textField($model,'tissue_sdb',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_id_sdb'); ?>
		<?php echo $form->textField($model,'lib_id_sdb',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_use'); ?>
		<?php echo $form->textField($model,'sample_use',array('size'=>8,'maxlength'=>8)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'antibody'); ?>
		<?php echo $form->textField($model,'antibody',array('size'=>50,'maxlength'=>50)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'treatment'); ?>
		<?php echo $form->textField($model,'treatment',array('size'=>50,'maxlength'=>50)); ?>
	</div>
 	<div class="row">
		<?php echo $form->label($model,'knockdown'); ?>
		<?php echo $form->textField($model,'knockdown',array('size'=>50,'maxlength'=>50)); ?>
	</div>
       
    
    
	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->