<?php
/* @var $this AuthItemChildController */
/* @var $data AuthItemChild */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('child')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->parent); ?></td>
	<td><?php echo CHtml::encode($data->child); ?></td>
	<td><?php echo CHtml::encode($data->id); ?></td>
</tr>
</table>

</div>
