<?php
/* @var $this LibBatchController */
/* @var $data LibBatch */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_batch_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_batch')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_protocol_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->lib_batch_id); ?></td>
	<td><?php echo CHtml::encode($data->date); ?></td>
	<td><?php echo CHtml::encode($data->user_batch); ?></td>
	<td><?php echo CHtml::encode($data->lib_protocol_id); ?></td>
</tr>
</table>

</div>
