<?php
/* @var $this LibBatchController */
/* @var $model LibBatch */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'lib-batch-form',
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
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php echo $form->textField($model, 'date'); ?>
        <?php echo $form->error($model, 'date'); ?>
    </div>

    <div class="row">
        <?php
        $user_arry = User::model()->getActiveUserPulldown();
        echo $form->labelEx($model, 'user_batch');
        echo CHtml::dropdownList('LibBatch[user_batch]', $model->user_batch, $user_arry);
        echo $form->error($model, 'user_batch');
        ?>
    </div>

    <div class="row">       
        <?php
        echo $form->labelEx($model, 'lib_protocol_id');
        $lib_protocol_arry = LibProtocol::model()->getPulldown();
        echo CHtml::activeDropDownList($model, 'lib_protocol_id', $lib_protocol_arry);
        echo $form->error($model, 'lib_protocol_id');
        ?>

    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->