<?php
/* @var $this CaseLibraryController */
/* @var $model CaseLibrary */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'case-library-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'case_id'); ?>
		<?php echo $form->textField($model,'case_id'); ?>
		<?php echo $form->error($model,'case_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'case_name'); ?>
		<?php echo $form->textField($model,'case_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'case_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_id'); ?>
		<?php echo $form->textField($model,'sample_id'); ?>
		<?php echo $form->error($model,'sample_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_name'); ?>
		<?php echo $form->textField($model,'sample_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sample_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_status'); ?>
		<?php echo $form->textField($model,'sample_status',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'sample_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_type'); ?>
		<?php echo $form->textField($model,'sample_type',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'sample_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_preserve'); ?>
		<?php echo $form->textField($model,'sample_preserve',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'sample_preserve'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_use'); ?>
		<?php echo $form->textField($model,'sample_use',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'sample_use'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_antibody'); ?>
		<?php echo $form->textField($model,'sample_antibody',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sample_antibody'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_treatment'); ?>
		<?php echo $form->textField($model,'sample_treatment',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sample_treatment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_knockdown'); ?>
		<?php echo $form->textField($model,'sample_knockdown',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sample_knockdown'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_researcher'); ?>
		<?php echo $form->textField($model,'sample_researcher'); ?>
		<?php echo $form->error($model,'sample_researcher'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_gene_mod'); ?>
		<?php echo $form->textField($model,'sample_gene_mod',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'sample_gene_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_techology'); ?>
		<?php echo $form->textField($model,'sample_techology',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'sample_techology'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_vec'); ?>
		<?php echo $form->textField($model,'sample_vec',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'sample_vec'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_marker'); ?>
		<?php echo $form->textField($model,'sample_marker',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'sample_marker'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_note'); ?>
		<?php echo $form->textField($model,'sample_note',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'sample_note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_note'); ?>
		<?php echo $form->textField($model,'iso_note',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'iso_note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sample_iso_id'); ?>
		<?php echo $form->textField($model,'sample_iso_id'); ?>
		<?php echo $form->error($model,'sample_iso_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_id'); ?>
		<?php echo $form->textField($model,'iso_id'); ?>
		<?php echo $form->error($model,'iso_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_name'); ?>
		<?php echo $form->textField($model,'iso_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'iso_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_type'); ?>
		<?php echo $form->textField($model,'iso_type',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'iso_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_rin'); ?>
		<?php echo $form->textField($model,'iso_rin'); ?>
		<?php echo $form->error($model,'iso_rin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_qual'); ?>
		<?php echo $form->textField($model,'iso_qual',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'iso_qual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_status'); ?>
		<?php echo $form->textField($model,'iso_status',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'iso_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_consumed'); ?>
		<?php echo $form->textField($model,'iso_consumed'); ?>
		<?php echo $form->error($model,'iso_consumed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_iso_id'); ?>
		<?php echo $form->textField($model,'lib_iso_id'); ?>
		<?php echo $form->error($model,'lib_iso_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_id'); ?>
		<?php echo $form->textField($model,'lib_id'); ?>
		<?php echo $form->error($model,'lib_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_label'); ?>
		<?php echo $form->textField($model,'lib_label',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'lib_label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_name'); ?>
		<?php echo $form->textField($model,'lib_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'lib_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_bio_conc'); ?>
		<?php echo $form->textField($model,'lib_bio_conc'); ?>
		<?php echo $form->error($model,'lib_bio_conc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_bio_size'); ?>
		<?php echo $form->textField($model,'lib_bio_size'); ?>
		<?php echo $form->error($model,'lib_bio_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_barcode'); ?>
		<?php echo $form->textField($model,'lib_barcode'); ?>
		<?php echo $form->error($model,'lib_barcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_status'); ?>
		<?php echo $form->textField($model,'lib_status',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'lib_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_qual'); ?>
		<?php echo $form->textField($model,'lib_qual',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'lib_qual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_cap_kit'); ?>
		<?php echo $form->textField($model,'lib_cap_kit'); ?>
		<?php echo $form->error($model,'lib_cap_kit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_tech'); ?>
		<?php echo $form->textField($model,'lib_tech',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'lib_tech'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_molarity'); ?>
		<?php echo $form->textField($model,'lib_molarity'); ?>
		<?php echo $form->error($model,'lib_molarity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_molarity_cal'); ?>
		<?php echo $form->textField($model,'lib_molarity_cal'); ?>
		<?php echo $form->error($model,'lib_molarity_cal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_note'); ?>
		<?php echo $form->textField($model,'lib_note',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'lib_note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lib_type_id'); ?>
		<?php echo $form->textField($model,'lib_type_id'); ?>
		<?php echo $form->error($model,'lib_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->