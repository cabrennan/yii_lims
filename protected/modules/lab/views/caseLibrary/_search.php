<?php
/* @var $this CaseLibraryController */
/* @var $model CaseLibrary */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_id'); ?>
		<?php echo $form->textField($model,'case_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_name'); ?>
		<?php echo $form->textField($model,'case_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_id'); ?>
		<?php echo $form->textField($model,'sample_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_name'); ?>
		<?php echo $form->textField($model,'sample_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_status'); ?>
		<?php echo $form->textField($model,'sample_status',array('size'=>19,'maxlength'=>19)); ?>
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
		<?php echo $form->label($model,'sample_use'); ?>
		<?php echo $form->textField($model,'sample_use',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_antibody'); ?>
		<?php echo $form->textField($model,'sample_antibody',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_treatment'); ?>
		<?php echo $form->textField($model,'sample_treatment',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_knockdown'); ?>
		<?php echo $form->textField($model,'sample_knockdown',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_researcher'); ?>
		<?php echo $form->textField($model,'sample_researcher'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_gene_mod'); ?>
		<?php echo $form->textField($model,'sample_gene_mod',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_techology'); ?>
		<?php echo $form->textField($model,'sample_techology',array('size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_vec'); ?>
		<?php echo $form->textField($model,'sample_vec',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_marker'); ?>
		<?php echo $form->textField($model,'sample_marker',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_note'); ?>
		<?php echo $form->textField($model,'sample_note',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_note'); ?>
		<?php echo $form->textField($model,'iso_note',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sample_iso_id'); ?>
		<?php echo $form->textField($model,'sample_iso_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_id'); ?>
		<?php echo $form->textField($model,'iso_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_name'); ?>
		<?php echo $form->textField($model,'iso_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_type'); ?>
		<?php echo $form->textField($model,'iso_type',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_rin'); ?>
		<?php echo $form->textField($model,'iso_rin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_qual'); ?>
		<?php echo $form->textField($model,'iso_qual',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_status'); ?>
		<?php echo $form->textField($model,'iso_status',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_consumed'); ?>
		<?php echo $form->textField($model,'iso_consumed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_iso_id'); ?>
		<?php echo $form->textField($model,'lib_iso_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_id'); ?>
		<?php echo $form->textField($model,'lib_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_label'); ?>
		<?php echo $form->textField($model,'lib_label',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_name'); ?>
		<?php echo $form->textField($model,'lib_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_bio_conc'); ?>
		<?php echo $form->textField($model,'lib_bio_conc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_bio_size'); ?>
		<?php echo $form->textField($model,'lib_bio_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_barcode'); ?>
		<?php echo $form->textField($model,'lib_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_status'); ?>
		<?php echo $form->textField($model,'lib_status',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_qual'); ?>
		<?php echo $form->textField($model,'lib_qual',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_cap_kit'); ?>
		<?php echo $form->textField($model,'lib_cap_kit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_tech'); ?>
		<?php echo $form->textField($model,'lib_tech',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_molarity'); ?>
		<?php echo $form->textField($model,'lib_molarity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_molarity_cal'); ?>
		<?php echo $form->textField($model,'lib_molarity_cal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_note'); ?>
		<?php echo $form->textField($model,'lib_note',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lib_type_id'); ?>
		<?php echo $form->textField($model,'lib_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->