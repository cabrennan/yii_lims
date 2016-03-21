<?php
/* @var $this LibProtocolStepController */
/* @var $data LibProtocolStep */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_protocol_step_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('protocol_step_num')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_protocol_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('bench_step_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->lib_protocol_step_id); ?></td>
	<td><?php echo CHtml::encode($data->protocol_step_num); ?></td>
	<td><?php echo CHtml::encode($data->lib_protocol_id); ?></td>
	<td><?php echo CHtml::encode($data->bench_step_id); ?></td>
</tr>
</table>

</div>
