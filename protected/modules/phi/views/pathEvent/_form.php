<?php
/* @var $this PathEventController */
/* @var $pathEvent PathEvent */
/* @var $form CActiveForm */
?>
<?php
echo "<script type=\"text/javascript\">\n";
echo "function editSample(sample_id) { \n";
echo "     var URL = 'https://172.20.54.136/mctp-lims/lab/sample/pathedit/id/' + sample_id; ";
echo "     window.open(URL, 'editSample', 'height=600,width=700' );";
echo "     return false; \n";
echo "}";
echo "\n</script>";
?>
<div class="form">
    <div class="table">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'path-event-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php
        echo $form->errorSummary($pathEvent);
        echo"<table>";

        echo "<tr><td><table>\n";
        echo "\n<tr>";
        echo "\n\t<th>Event Type</th>";
        echo "\n\t<th>Event Name</th>";
        echo "\n\t<th>Material</th>";
        echo "\n\t<th>Site</th>";
        echo "\n\t<th>External Institution</th>";
        echo "\n\t<th>Tumeroid Attemtped</th>";
        echo "\n\t<th>Event Date</th>";
        echo "</tr>";
        echo "\n<tr>";
        echo "\n\t<td>" . CHtml::activeDropDownList($pathEvent, 'event_type', ZHtml::enumItem($pathEvent, 'event_type')) .
        $form->error($pathEvent, 'event_type') . "</td>";
        echo "\n\t<td>" . $form->textField($pathEvent, 'name', array('size' => 25, 'maxlength' => 25)) .
        $form->error($pathEvent, 'name') . "</td>";
        echo "\n\t<td>" . CHtml::activeDropDownList($pathEvent, 'material', ZHtml::enumItem($pathEvent, 'material')) .
        $form->error($pathEvent, 'material') . "</td>";
        echo "\n\t<td>" . $form->textField($pathEvent, 'site', array('size' => 25, 'maxlength' => 50)) .
        $form->error($pathEvent, 'site') . "</td>";
        echo "\n\t<td>" . CHtml::activeDropDownList($pathEvent, 'ext_inst_id', ExtInst::model()->getExtInstList()) . "</td>";
        echo "\n\t<td>" . CHtml::activeDropDownList($pathEvent, 'tumeroid', ZHtml::enumItem($pathEvent, 'tumeroid'));

        echo "\n\t<td>" . $form->textField($pathEvent, 'date_event', array('size' => 10, 'maxlength' => 10)) . $form->error($pathEvent, 'date_event') . "</td></tr>";

        echo "\n</table>\n</td>\n</tr>\n";

        echo "\n<tr>\n<td>\n<table>\n";
        echo "\n<tr>";
        echo "\n\t<td>" . CHtml::activeTextArea($pathEvent, 'PathEvent[note]', array('name' => 'PathEvent[note]', 'value' => "$pathEvent->note",
            'rows' => 20, 'cols' => 115, 'maxlength' => '4000')) . "</td></tr>\n";
        echo "\n<tr>";
        echo "\n\t<th>" . CHtml::submitButton($pathEvent->isNewRecord ? 'Create Pathology Event' : 'Update Pathology Event') . "</th></tr>\n";


        echo "\n</table>\n";
        echo "\n\t</td>";
        echo "\n</tr>";


        $this->endWidget();
        echo"\n</table>";
        echo "</div><!-- table -->";
        echo "</div><!-- form -->";


        