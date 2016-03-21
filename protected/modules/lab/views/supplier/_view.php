<?php
/* @var $this SupplierController */
/* @var $data Supplier */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('supplier_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('short_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->supplier_id); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->short_name); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
</tr>
</table>

</div>
