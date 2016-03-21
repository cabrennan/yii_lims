<?php
/* @var $this CancersController */
/* @var $data Cancers */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('origin_site')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('cancer_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->origin_site); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->cancer_id); ?></td>
</tr>
</table>

</div>
