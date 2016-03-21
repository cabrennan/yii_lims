<?php
/* @var $this SampleController */
/* @var $model Sample */
/* @var $form CActiveForm */
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="/mctp-lims/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="/mctp-lims/css/print.css" media="print" />
        <link rel="stylesheet" type="text/css" href="/mctp-lims/css/ie.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="/mctp-lims/css/main.css" />
        <link rel="stylesheet" type="text/css" href="/mctp-lims/css/form.css" />
        <title>Edit Sample <?php echo $sample->sample_id; ?></title>
    </head>

    <body>

        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'sample-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
                'htmlOptions' => array('onSubmit' => "window.opener.location.reload(false);"), //refresh the parent (PathEvent/edit) window
            ));
            ?>

            <?php echo $form->errorSummary($sample); ?>
            <div class="table">
                <table>
                    <?php
                    echo "\n<tr>";
                    echo "\n\t<td colspan='6'>\n\t<table>";
                    
                    echo "\n\t\t<tr>";
                    echo "\n\t\t<th>" . $sample->getAttributeLabel('lib_id_sdb') . "</th>";
                    echo "\n\t\t<th>" . $sample->getAttributeLabel('exp_design_sdb') . "</th>";
                    echo "\n\t\t<th>" . $sample->getAttributeLabel('tissue_sdb') . "</th>";
                    echo "\n\t\t<th>" . $sample->getAttributeLabel('status_sdb') . "</th>";
                    echo "\n\t\t</tr>\n";
                    echo "\n\t\t<tr>";
                    echo "\n\t\t<td>" . $sample->lib_id_sdb . "</td>";
                    echo "\n\t\t<td>" . $sample->exp_design_sdb . "</td>";
                    echo "\n\t\t<td>" . $sample->tissue_sdb . "</td>";
                    echo "\n\t\t<td>" . $sample->status_sdb . "</td>";
                    echo "</tr>\n";
                    echo "\n\t\t<tr><th colspan='2'>" . $form->labelEx($sample, 'tissue_mion') . "</th>";
                    echo "\n\t\t<th colspan='2'>" . $form->labelEx($sample, 'tissue_loc_mion') . "</th>";
                    echo "</tr>\n";
                    echo "\n\t\t<tr>";
                    echo "\n\t\t<td colspan='2'>" . $sample->tissue_mion . "</td>";
                    echo "\n\t\t<td colspan='2'>" . $sample->tissue_loc_mion . "</td>";
              

                    echo "\n\t\t</tr>";
                    echo "\n\t</table>";
                    echo "\n\t</td>";
                    echo "\n\t</tr>\n";
                    echo "\n\t<tr>";
                    echo "\n\t<td colspan='6'><hr></td></tr>\n";
                    echo "\n\t<tr>";
                    echo "\n\t<td colspan='7'>";
                    echo "\n\t<table>";
                    echo "\n\t\t<tr>\n";
                    echo "\n\t\t<th>" . $form->labelEx($sample, 'name') . "</th>";
                    echo "\n\t\t<th>" . $form->labelEx($sample, 'case_id') . "</th>";
                    echo "\n\t\t<th>" . $form->labelEx($sample, 'sample_use') . "</th>";
                    echo "\n\t\t<th>" . $form->labelEx($sample, 'box') . "</th>";
                    echo "\n\t\t<th>" . $form->labelEx($sample, 'sample_type') . "</th>";
                    echo "\n\t\t<th>" . $form->labelEx($sample, 'status') . "</th>";
                    echo "\n\t\t</tr>";
                    echo "\n\t\t<tr>";
                    echo "\n\t\t<td>" . $form->textField($sample, 'name', array('size' => 50, 'maxlength' => 50)) .
                    $form->error($sample, 'name') . "</td>";
                    echo "\n\t\t<td>" . Cases::model()->getCaseNameById($sample->case_id) . "</td>";
                    echo "\n\t\t<td>" . CHtml::activeDropDownList($sample, 'sample_use', ZHtml::enumItem($sample, 'sample_use')) . "</td>";
                    echo "\n\t\t<td>" . $form->textField($sample, 'box', array('size' => 12, 'maxlength' => 12)) . "</td>";
                    echo "\n\t\t<td>" . CHtml::activeDropDownList($sample, 'sample_type', ZHtml::enumItem($sample, 'sample_type')) . "</td>";
                    echo "\n\t\t<td>" . CHtml::activeDropDownList($sample, 'status', ZHtml::enumItem($sample, 'status')) . "</td>";
                    echo "\n\t\t</tr>";
                    echo "\n\t</table>";
                    echo "\n\t</td>";
                    echo "\n\t</tr>\n";
                    ?>


                    <tr><th><?php echo $form->labelEx($sample, 'date_rec'); ?> </th>
                        <th><?php echo $form->labelEx($sample, 'date_out'); ?> </th>
                        <th><?php echo $form->labelEx($sample, 'date_in'); ?> </th>   
                        <th><?php echo $form->labelEx($sample, 'ext_inst_id'); ?> </th>
                        <th><?php echo $form->labelEx($sample, 'ext_label'); ?> </th>
                    </tr>
                    <tr><td><?php echo $form->textField($sample, 'date_rec'); ?>
                            <?php echo $form->error($sample, 'date_rec'); ?> </td>
                        <td> <?php echo CHtml::activeDropDownList($sample, 'ext_inst_id', $sample->getExtInst()); ?>     </td>
                        <td><?php echo $form->textField($sample, 'ext_label', array('size' => 25, 'maxlength' => 50)); ?>
                            <?php echo $form->error($sample, 'ext_label'); ?> </td>
                    </tr>
                    <tr><th><?php echo $form->labelEx($sample, 'core_diameter'); ?> </th>
                        <th><?php echo $form->labelEx($sample, 'path_tumor_content'); ?> </th>
                        <th><?php echo $form->labelEx($sample, 'sample_preserve'); ?> </th>
                        <th><?php echo $form->labelEx($sample, 'material'); ?> </th>
                        <th><?php echo $form->labelEx($sample, 'site'); ?> </th>

                    </tr>
                    <tr><td><?php echo $form->textField($sample, 'core_diameter', array('size' => 12, 'maxlength' => 12)); ?>
                            <?php echo $form->error($sample, 'core_diameter'); ?></td>
                        <td><?php echo $form->textField($sample, 'path_tumor_content', array('size' => 12, 'maxlength' => 12)); ?>
                            <?php echo $form->error($sample, 'path_tumor_content'); ?></td>
                        <td><?php echo CHtml::activeDropDownList($sample, 'sample_preserve', ZHtml::enumItem($sample, 'sample_preserve')); ?> </td>
                        <td><?php echo CHtml::activeDropDownList($sample, 'material', ZHtml::enumItem($sample, 'material')); ?> </td>
                        <td><?php echo $form->textField($sample, 'site', array('size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($sample, 'site'); ?></td>
                    </tr>
                    <tr>
                        <th colspan="10"><hr></hr></th>
                    </tr>
                    <tr>
                        <th colspan="10"><?php echo $form->labelEx($sample, 'note'); ?>
                            <?php echo $form->textField($sample, 'note', array('size' => 200, 'maxlength' => 250)); ?>
                            <?php echo $form->error($sample, 'note'); ?>
                        </th>
                    </tr>
                    <tr> <th colspan="10"><?php echo CHtml::submitButton('Update Sample'); ?> </th>
                    </tr>
                    <tr> <th colspan="10">
                            <?php
                            // This subroutine checks if this sample has not yet had an isolate made  
                            // If no isolate - then offere delete button, otherwise give isolate msg 
                            echo PathEventSample::model()->getDeleteButton($sample->sample_id);
                            ?> </th></tr>
                </table>


<?php $this->endWidget(); ?>
            </div>
        </div><!-- form -->