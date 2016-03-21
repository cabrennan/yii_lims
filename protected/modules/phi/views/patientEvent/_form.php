<?php
/* @var $this PatientEventController */
/* @var $patientEvent PatientEvent */
/* @var $form CActiveForm */
?>
<div class="form">
    <div class="table">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'patient-event-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php
        echo $form->errorSummary($patientEvent);

        echo "\n<table>\n";
        echo "\n<tr>";
        echo "\n\t<th>Event Type</th>";
        echo "\n\t<th>Event Date</th>";
        echo "\n\t<th>Note</th>";
        echo "</tr>";
        echo "\n<tr class='shade'>";
        echo "\n\t<td>" . CHtml::activeDropDownList($patientEvent, 'type', ZHtml::enumItem($patientEvent, 'type')) .
        $form->error($patientEvent, 'event_type') . "</td>";

        echo "\n<td><input type='text' id=\"PatientEvent_date_event\" name=\"PatientEvent[date_event]\" size='10' maxsize='10' ";
        if (isset($patient->date_enroll)) {
            echo "value='" . date("m/d/Y", strtotime($patientEvent->date_event)) . "'";
        }
        echo "></td>";

        echo "\n\t<td>" . $form->textField($patientEvent, 'note', array('size' => 75, 'maxlength' => 200)) .
        $form->error($patientEvent, 'note') . "</td></tr>";

        echo "</table>\n</td></tr>";

        echo "\n<tr>\n\t<td>\n<table>\n";
        echo "\n<tr>\n\t<th>" . CHtml::submitButton($patientEvent->isNewRecord ? 'Create Patient Event' : 'Update Patient Event') . "</th></tr>\n";

        if (!$patientEvent->isNewRecord) {
            echo "\n<tr>\n\t<th>";
            echo PatientEvent::model()->getDeleteButton($patientEvent->patient_event_id);
            echo "</th></tr>";
        }

        echo "\n</table>\n</th></tr>";
        echo"</table>";

        $this->endWidget();

        echo "</div><!-- table -->";
        echo "</div><!-- form -->";


        