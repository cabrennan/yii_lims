<?php
/* @var $this PatientController */
/* @var $model Patient */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'patient_id'); ?>
		<?php echo $form->textField($model,'patient_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'case_name'); ?>
		<?php echo $form->textField($model,'case_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mrn'); ?>
		<?php echo $form->textField($model,'mrn',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dod'); ?>
		<?php echo $form->textField($model,'dod'); ?>
	</div>

	<div class="row">
		<?php echo "Gender"; ?>
		<?php echo "<textfield name='gender'>";  ?>
	</div>

	<div class="row">
		<?php "Ethnicity"; ?>
		<?php echo "<textfield name'ethnicity'>"; ?>
	</div>

	<div class="row">
		<?php "Race"; ?>
		<?php echo "<textfield name='race'>"; ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'ref_phys'); ?>
		<?php echo $form->textField($model,'ref_phys',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_enroll'); ?>
		<?php echo $form->textField($model,'date_enroll'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->