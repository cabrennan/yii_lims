<?php
/* @var $this LibProtocolStepController */
/* @var $model LibProtocolStep */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'lib-protocol-step-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="table">
        <?php echo $form->labelEx($model, 'protocol_step_num'); ?>
        <?php echo $form->textField($model, 'protocol_step_num'); ?>
        <?php echo $form->error($model, 'protocol_step_num'); ?>

        <?php
        echo $form->labelEx($model, 'lib_protocol_id');
        $lib_protocol_arry = LibProtocol::model()->getPulldown();
        echo CHtml::activeDropDownList($model, 'lib_protocol_id', $lib_protocol_arry);
        echo $form->error($model, 'lib_protocol_id');
        ?>


        <?php
        echo $form->labelEx($model, 'bench_step_id');
        $bench_step_arry = BenchStep::model()->getPulldown();
        echo CHtml::activeDropDownList($model, 'bench_step_id', $bench_step_arry);
        echo $form->error($model, 'bench_step_id');
        ?>


<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div><!-- table -->


<?php $this->endWidget(); ?>

</div><!-- form -->