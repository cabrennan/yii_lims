<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
  
    
    <div class="row">
        <?php echo $form->labelEx($model, 'uniquename'); ?>
        <?php echo $form->textField($model, 'uniquename', array('size' =>10, 'maxlength' => 8)); ?>
        <?php echo $form->error($model, 'uniquename'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'short_name'); ?>
        <?php echo $form->textField($model, 'short_name', array('size' =>25, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'short_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'peerrs'); ?>        
        <?php echo CHtml::activeDropDownList($model, 'peerrs', ZHtml::enumItem($model, 'peerrs')); ?>

    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'peerrs_expire'); ?>
        <?php echo $form->textField($model, 'peerrs_expire'); ?>
        <?php echo $form->error($model, 'peerrs_expire'); ?>
    </div>
    <?php
    // Only offere remove date field if this is an existing user
    if (!$model->isNewRecord) {
        echo '<div class = "row">',
        $form->labelEx($model, 'date_rem'),
        $form->textField($model, 'date_rem'),
        $form->error($model, 'date_rem'),
        '</div>';
    }
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>        
        <?php echo CHtml::activeDropDownList($model, 'status', ZHtml::enumItem($model, 'status')); ?>

    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'note'); ?>
        <?php echo $form->textField($model, 'note', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'note'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Add Uniquename to MCTP LIMS' : 'Update MCTP LIMS Access'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->