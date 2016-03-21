<?php
/* @var $this ReagentController */
/* @var $model Reagent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reagent-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
     	<div class="row">
           
		<?php echo $form->labelEx($model,'supplier_id'); ?>
		<?php $supplier_arry = Supplier::model()->getSupplierPulldown(); 
                echo CHtml::activeDropDownList($model, 'supplier_id', $supplier_arry); ?>
		<?php echo $form->error($model,'supplier_id'); ?>
	</div>   
        

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>75,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

        	<div class="row">
		<?php echo $form->labelEx($model,'short_name'); ?>
		<?php echo $form->textField($model,'short_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'short_name'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'catalog'); ?>
		<?php echo $form->textField($model,'catalog',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'catalog'); ?>
	</div>

     	<div class="row">
           
		<?php echo $form->labelEx($model,'is_kit'); ?>
		<?php $supplier_arry = Supplier::model()->getSupplierPulldown(); 
                echo CHtml::activeDropDownList($model, 'is_kit', ZHtml::enumNew($model, 'is_kit', '')); ?>
		<?php echo $form->error($model,'is_kit'); ?>
	</div>  



        	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>
        
        


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->