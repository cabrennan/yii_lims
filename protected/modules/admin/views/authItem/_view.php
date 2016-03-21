<?php
/* @var $this AuthItemController */
/* @var $data AuthItem */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('description')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('bizrule')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('data')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->type); ?></td>
	<td><?php echo CHtml::encode($data->description); ?></td>
	<td><?php echo CHtml::encode($data->bizrule); ?></td>
	<td><?php echo CHtml::encode($data->data); ?></td>
</tr>
</table>

</div>
