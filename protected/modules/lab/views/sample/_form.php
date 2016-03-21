<?php
/* @var $this SampleController */
/* @var $model Sample */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sample-form',
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
    <?php
    if (!$model->isNewRecord) {
        echo "<table ><tr>";
        echo "<th>" . $model->getAttributeLabel('user_add') . "</th>";
        echo "<th>" . $model->getAttributeLabel('date_add') . "</th>";
        echo "<th>" . $model->getAttributeLabel('user_mod') . "</th>";
        echo "<th>" . $model->getAttributeLabel('date_mod') . "</th>";
        echo "</tr><tr>";
        echo "<td>" . $model->user_add . "</td>";
        echo "<td>" . date("m/d/Y g:iA", strtotime($model->date_add)) . "</td>";
        echo "<td>" . $model->user_mod . "</td>";
        echo "<td>" . date("m/d/Y g:iA", strtotime($model->date_mod)) . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>" . $model->getAttributeLabel('lib_id_sdb') . "</th>";
        echo "<th>" . $model->getAttributeLabel('exp_design_sdb') . "</th>";
        echo "<th>" . $model->getAttributeLabel('tissue_sdb') . "</th>";
        echo "<th>" . $model->getAttributeLabel('status_sdb') . "</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $model->lib_id_sdb . "</td>";
        echo "<td>" . $model->exp_design_sdb . "</td>";
        echo "<td>" . $model->tissue_sdb . "</td>";
        echo "<td>" . $model->status_sdb . "</td>";
        echo "</tr>";
        echo "<tr><th colspan='2'>" . $form->labelEx($model, 'tissue_mion') . "</th>";
        echo "<th colspan='2'>" . $form->labelEx($model, 'tissue_loc_mion') . "</th>";
        echo "</tr>";
        echo "<tr><td colspan='2'>" . $model->tissue_mion . "</td>";
        echo "<td colspan='2'>" . $model->tissue_loc_mion . "</td>";
        echo "</tr>";

        echo "</tr></table>";
        echo CHtml::hiddenField('Sample[user_mod]', Yii::app()->user->uniquename);
    } else {
        $model->researcher = Yii::app()->user->uniquename; 
        echo CHtml::hiddenField('Sample[user_add]', Yii::app()->user->uniquename);
        echo CHtml::hiddenField('Sample[user_mod]', Yii::app()->user->uniquename);
    }
    ?>

    <table>
        <tr>
            <th><?php echo $form->labelEx($model, 'name'); ?></th>
            <th><?php echo $form->labelEx($model, 'case_id'); ?></th>
            <th><?php echo $form->labelEx($model, 'sample_use'); ?> </th>
            <th><?php echo $form->labelEx($model, 'sample_type'); ?> </th>

            <th><?php echo $form->labelEx($model, 'status'); ?></th>
        </tr>

        <tr><td><?php echo $form->textField($model, 'name', array('size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'name'); ?></td>
            <td><?php echo CHtml::activeDropDownList($model, 'case_id', $model->getCase()); ?>  </td>
            <td><?php echo CHtml::activeDropDownList($model, 'sample_use', ZHtml::enumItem($model, 'sample_use')); ?></td>
            <td><?php echo CHtml::activeDropDownList($model, 'sample_type', ZHtml::enumItem($model, 'sample_type')); ?> </td>

            <td><?php echo CHtml::activeDropDownList($model, 'status', ZHtml::enumItem($model, 'status')); ?> </td>
        </tr>
        <tr><th><?php echo $form->labelEx($model, 'date_rec'); ?> </th>
            <th><?php echo $form->labelEx($model, 'date_out'); ?> </th>
            <th><?php echo $form->labelEx($model, 'date_in'); ?> </th>   
            <th><?php echo $form->labelEx($model, 'ext_inst_id'); ?> </th>
            <th><?php echo $form->labelEx($model, 'ext_label'); ?> </th>
        </tr>
        <tr><td><?php echo $form->textField($model, 'date_rec'); ?>
                <?php echo $form->error($model, 'date_rec'); ?> </td>
            <td><?php echo $form->textField($model, 'date_out'); ?>
                <?php echo $form->error($model, 'date_out'); ?></td>
            <td><?php echo $form->textField($model, 'date_in'); ?>
                <?php echo $form->error($model, 'date_in'); ?> </td>
            <td> <?php echo CHtml::activeDropDownList($model, 'ext_inst_id', $model->getExtInst()); ?>     </td>
            <td><?php echo $form->textField($model, 'ext_label', array('size' => 25, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'ext_label'); ?> </td>
        </tr>
        <tr><th><?php echo $form->labelEx($model, 'core_diameter'); ?> </th>
            <th><?php echo $form->labelEx($model, 'path_tumor_content'); ?> </th>
            <th><?php echo $form->labelEx($model, 'sample_preserve'); ?> </th>
            <th><?php echo $form->labelEx($model, 'material'); ?> </th>
            <th><?php echo $form->labelEx($model, 'site'); ?> </th>

        </tr>
        <tr><td><?php echo $form->textField($model, 'core_diameter', array('size' => 12, 'maxlength' => 12)); ?>
                <?php echo $form->error($model, 'core_diameter'); ?></td>
            <td><?php echo $form->textField($model, 'path_tumor_content', array('size' => 12, 'maxlength' => 12)); ?>
                <?php echo $form->error($model, 'path_tumor_content'); ?></td>
             <td><?php echo CHtml::activeDropDownList($model, 'sample_preserve', ZHtml::enumItem($model, 'sample_preserve')); ?> </td>
              <td><?php echo CHtml::activeDropDownList($model, 'material', ZHtml::enumItem($model, 'material')); ?> </td>
             <td><?php echo $form->textField($model, 'site', array('size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'site'); ?></td>
        </tr>
        <tr>
            <th colspan="10"><hr></th>
        </tr>
        <tr><td colspan="10"><table><tr><th><?php echo $form->labelEx($model, 'researcher'); ?> </th>
            <th><?php echo $form->labelEx($model, 'antibody'); ?> </th>
            <th><?php echo $form->labelEx($model, 'treatment'); ?> </th>
            <th><?php echo $form->labelEx($model, 'knockdown'); ?> </th>
        </tr>
        <tr><td>
            
            <?php echo CHtml::activeDropDownList($model, 'researcher', $model->getResearcherList()); ?> 
            </td>
            
            <td><?php echo $form->textField($model, 'antibody', array('size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'antibody'); ?></td>
            <td><?php echo $form->textField($model, 'treatment', array('size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'treatment'); ?></td>
            <td><?php echo $form->textField($model, 'knockdown', array('size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'knockdown'); ?></td>
        </tr><tr>
            <th><?php echo $form->labelEx($model, 'gene_mod'); ?> </th>
            <th><?php echo $form->labelEx($model, 'technology'); ?> </th>
            <th><?php echo $form->labelEx($model, 'vector'); ?> </th>
            <th><?php echo $form->labelEx($model, 'marker'); ?> </th>
        </tr>
        <tr><td><?php echo $form->textField($model, 'gene_mod', array('size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'gene_mod'); ?></td>
            <td><?php echo CHtml::activeDropDownList($model, 'technology', ZHtml::enumItem($model, 'technology')); ?> </td>
            <td><?php echo $form->textField($model, 'vector', array('size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'vector'); ?></td>
            <td><?php echo CHtml::activeDropDownList($model, 'marker', ZHtml::enumItem($model, 'marker')); ?> </td>
        </tr>
                
                </table></td></tr>
        <tr>
            <th colspan="10"><?php echo $form->labelEx($model, 'note'); ?>
                <?php echo $form->textField($model, 'note', array('size' => 200, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'note'); ?>
            </th>
        </tr>
        <tr> <th colspan="10"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update Sample'); ?> </th>
        </tr>
    </table>


    <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->