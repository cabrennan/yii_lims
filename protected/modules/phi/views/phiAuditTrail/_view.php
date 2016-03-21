<?php
/* @var $this PhiAuditTrailController */
/* @var $data PhiAuditTrail */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('old_value')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('new_value')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('action')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('model')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('field')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('stamp')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('model_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->old_value); ?></td>
	<td><?php echo CHtml::encode($data->new_value); ?></td>
	<td><?php echo CHtml::encode($data->action); ?></td>
	<td><?php echo CHtml::encode($data->model); ?></td>
	<td><?php echo CHtml::encode($data->field); ?></td>
	<td><?php echo CHtml::encode($data->stamp); ?></td>
	<td><?php echo CHtml::encode($data->user_id); ?></td>
	<td><?php echo CHtml::encode($data->model_id); ?></td>
</tr>
</table>

</div>
