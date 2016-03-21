<?php
/* @var $this ReagentInvController */
/* @var $model ReagentInv */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'reagent-inv-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
    echo $form->errorSummary($model);

    echo '<div class="table">';
    echo "\n<table>";
    echo "\n<tr>";
    echo "\n\t<th>" . $form->labelEx($model, 'reagent_info') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'qty') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'lot') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'date_rec') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'user_rec') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'date_exp') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'datasheet') . "</th>";
    echo "\n</tr>";
    echo "\n<tr>";

    echo "\n<tr>";

    echo "\n\t<td>";

    $supplier_arry = Supplier::model()->getSupplierPulldown();
    if ($model->isNewRecord) {
        $supplierDefault = key($supplier_arry);
    } else {
        $supplierDefault = $model->reagent->supplier_id;
    }

    echo CHtml::dropDownList('supplier_id', $supplierDefault, $supplier_arry, array(
        'ajax' => array(
            'type' => 'POST',
            'url' => Yii::app()->createUrl('/lab/reagentInv/dynReagent'),
            'success' => 'function(data) { $("#reagent_id").html(data) }',
    )));


    $reagent_arry = Reagent::model()->getReagentPulldown($supplierDefault);
    echo CHtml::dropDownList('reagent_id', $model->reagent_id, $reagent_arry, array(
        'ajax' => array(
            'type' => 'POST',
            'url' => Yii::app()->createUrl('/lab/reagentInv/dynReagentKit'),
            'success'=>'function(data) { $("#reagent_kit_item_id").html(data) }',
    )));


    echo CHtml::dropDownList('reagent_kit_item_id', '', array());
    echo "\n\t</td>";



    $user_arry = User::model()->getActiveUserPulldown();
    echo "\n\t<td>" . $form->textField($model, 'qty', array('size' => 4, 'maxlength' => 4)) . $form->error($model, 'qty') . "</td>";
    echo "\n\t<td>" . $form->textField($model, 'lot', array('size' => 32, 'maxlength' => 32)) . $form->error($model, 'lot') . "</td>";

    echo "\n\t<td><input type='text' id=\"ReagentInv_date_rec\" name=\"ReagentInv[date_rec]\" size='10' maxsize='10' ";
    if (isset($model->date_rec)) {
        echo "value='" . date("m/d/Y", strtotime($model->date_rec)) . "'";
    }
    echo "></td>";

    echo "\n\t<td>" . CHtml::dropdownList('ReagentInv[user_rec]', $model->user_rec, $user_arry) . "</td>";

    echo "\n\t<td><input type='text' id=\"ReagentInv_date_exp\" name=\"ReagentInv[date_exp]\" size='10' maxsize='10' ";
    if (isset($model->date_exp)) {
        echo "value='" . date("m/d/Y", strtotime($model->date_exp)) . "'";
    }
    echo "></td>";
    echo "\n\t<td>" . $form->textField($model, 'datasheet') . $form->error($model, 'datasheet') . "</td>";
    echo "\n</tr>";



    echo "\n<tr>";
    echo "\n\t<th>" . $form->labelEx($model, 'date_auth') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'user_auth') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'date_disc') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'reason_disc') . "</th>";
    echo "\n\t<th>" . $form->labelEx($model, 'user_disc') . "</th>";
    echo "\n\t</tr>";







    echo"\n\t<tr>";
    array_unshift($user_arry, "Not Applicable");
    echo "\n\t<td><input type='text' id=\"ReagentInv_date_auth\" name=\"ReagentInv[date_auth]\" size='10' maxsize='10' ";
    if (isset($model->date_auth)) {
        echo "value='" . date("m/d/Y", strtotime($model->date_auth)) . "'";
    }
    echo "></td>";


    echo "\n\t<td>" . CHtml::dropdownList('ReagentInv[user_auth]', '', $user_arry) . "</td>";
    echo "\n\t<td><input type='text' id=\"ReagentInv_date_disc\" name=\"ReagentInv[date_disc]\" size='10' maxsize='10' ";
    if (isset($model->date_disc)) {
        echo "value='" . date("m/d/Y", strtotime($model->date_disc)) . "'";
    }
    echo "></td>";


    echo "\n\t<td>" . CHtml::dropDownList("ReagentInv[reason_disc]", $model->reason_disc, ZHtml::enumItem(ReagentInv::model(), "reason_disc", "")) . "</td>";
    echo "\n\t<td>" . CHtml::dropdownList('ReagentInv[user_disc]', $model->user_disc, $user_arry) . "</td>";
    echo "\n</tr>";

    echo "\n<tr>";
    echo "\n\t<th colspan='10'>" . $form->labelEx($model, 'note') . "</th>";
    echo "\n<tr>";
    echo "\n\t<td colspan='10'>" . $form->textField($model, 'note', array('size' => 150, 'maxlength' => 300)) . $form->error($model, 'note') . "</td>";
    echo "\n</tr>";

    echo "\n<tr>";


    echo "\n\t<th colspan='10'>" . CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save') . "</th>";
    echo "\n</tr>";
    echo "\n</table>";
    echo "\n</div> <!--table -->";
    $this->endWidget();
    echo "\n</div><!-- form -->";
    