<?php
/* @var $this PatientSnpConcordanceController */
/* @var $model PatientSnpConcordance */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patient-snp-concordance-form',
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
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'md5sum'); ?>
		<?php echo $form->textField($model,'md5sum',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'md5sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'case_id'); ?>
		<?php echo $form->textField($model,'case_id',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'case_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'library_id'); ?>
		<?php echo $form->textField($model,'library_id',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'library_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flowcell'); ?>
		<?php echo $form->textField($model,'flowcell',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'flowcell'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lane'); ?>
		<?php echo $form->textField($model,'lane'); ?>
		<?php echo $form->error($model,'lane'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'md5sum_2'); ?>
		<?php echo $form->textField($model,'md5sum_2',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'md5sum_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'case_id_2'); ?>
		<?php echo $form->textField($model,'case_id_2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'case_id_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'library_id_2'); ?>
		<?php echo $form->textField($model,'library_id_2',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'library_id_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flowcell_2'); ?>
		<?php echo $form->textField($model,'flowcell_2',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'flowcell_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lane_2'); ?>
		<?php echo $form->textField($model,'lane_2'); ?>
		<?php echo $form->error($model,'lane_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'concordant_pos_count'); ?>
		<?php echo $form->textField($model,'concordant_pos_count'); ?>
		<?php echo $form->error($model,'concordant_pos_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_pos_count'); ?>
		<?php echo $form->textField($model,'total_pos_count'); ?>
		<?php echo $form->error($model,'total_pos_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pct_concordant'); ?>
		<?php echo $form->textField($model,'pct_concordant'); ?>
		<?php echo $form->error($model,'pct_concordant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_add'); ?>
		<?php echo $form->textField($model,'user_add',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'user_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_mod'); ?>
		<?php echo $form->textField($model,'date_mod'); ?>
		<?php echo $form->error($model,'date_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_mod'); ?>
		<?php echo $form->textField($model,'user_mod',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'user_mod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->