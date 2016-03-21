<?php
/* @var $this PatientHistoryController */
/* @var $data PatientHistory */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('patient_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->patient_id); ?></td>
	<td><?php echo CHtml::encode($data->summary); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->date_mod); ?></td>
	<td><?php echo CHtml::encode($data->user_mod); ?></td>
</tr>
</table>

</div>
