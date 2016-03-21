<?php
/* @var $this DerivativeController */
/* @var $data Derivative */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('deriv_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('cell_select')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('cell_count')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('deriv_use')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('status')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->deriv_id); ?></td>
	<td><?php echo CHtml::encode($data->type); ?></td>
	<td><?php echo CHtml::encode($data->cell_select); ?></td>
	<td><?php echo CHtml::encode($data->cell_count); ?></td>
	<td><?php echo CHtml::encode($data->deriv_use); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
	<td><?php echo CHtml::encode($data->user_mod); ?></td>
	<td><?php echo CHtml::encode($data->date_mod); ?></td>
	<td><?php echo CHtml::encode($data->status); ?></td>
</tr>
</table>

</div>
