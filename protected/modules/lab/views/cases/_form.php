<?php
/* @var $this CasesController */
/* @var $model Cases */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cases-form',
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
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <?php
    echo "<div class='row'>";
    echo $form->labelEx($model, 'case_type');
    echo CHtml::activeDropDownList($model, 'case_type', $model->getCaseCreateType());
    echo "</div>";


    echo "<div class='row'>";
    echo $form->labelEx($model, 'gender');
    echo CHtml::activeDropDownList($model, 'gender', ZHtml::enumItem($model, 'gender'));
    echo "</div>";

    echo "<div class='row'>";
    echo $form->labelEx($model, 'ethnic_id');
    echo CHtml::activeDropDownList($model, 'ethnic_id', $model->getEthnicity());
    echo "</div>";

    echo "<div class='row'>";
    echo $form->labelEx($model, 'race_id');
    echo CHtml::activeDropDownList($model, 'race_id', $model->getRace());
    echo "</div>";
    
    echo "<div class='row'>";
    echo $form->labelEx($model, 'cancer_id');
    echo CHtml::activeDropDownList($model, 'cancer_id', $model->getCancer());
    echo "</div>";
    ?>  



    <div class="row">
<?php echo $form->labelEx($model, 'yob'); ?>
        <?php echo $form->textField($model, 'yob', array('size' => 4, 'maxlength' => 4)); ?>
        <?php echo $form->error($model, 'yob'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'yod'); ?>
        <?php echo $form->textField($model, 'yod', array('size' => 4, 'maxlength' => 4)); ?>
        <?php echo $form->error($model, 'yod'); ?>
    </div>

    <div class="row">
<?php
echo $form->labelEx($model, 'icd3_id');
echo CHtml::activeDropDownList($model, 'icd3_id', $model->getIcd3(), array('prompt' => '(Select Icd 3 Classification)'));
?>

    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'note'); ?>
        <?php echo $form->textField($model, 'note', array('size' => 200, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'note'); ?>
    </div>



    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->