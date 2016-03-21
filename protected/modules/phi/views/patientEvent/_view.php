<?php
/* @var $this PatientEventController */
/* @var $data PatientEvent */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('patient_event_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('patient_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_event')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->patient_event_id); ?></td>
	<td><?php echo CHtml::encode($data->patient_id); ?></td>
	<td><?php echo CHtml::encode($data->type); ?></td>
	<td><?php echo CHtml::encode($data->date_event); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->user_mod); ?></td>
	<td><?php echo CHtml::encode($data->date_mod); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
</tr>
</table>

</div>
