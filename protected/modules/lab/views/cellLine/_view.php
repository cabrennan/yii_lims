<?php
/* @var $this CellLineController */
/* @var $data CellLine */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('tissue')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('cell_type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('morphology')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('disease')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('age')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('atcc_cat')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('atcc_link')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->tissue); ?></td>
	<td><?php echo CHtml::encode($data->cell_type); ?></td>
	<td><?php echo CHtml::encode($data->morphology); ?></td>
	<td><?php echo CHtml::encode($data->disease); ?></td>
	<td><?php echo CHtml::encode($data->age); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->atcc_cat); ?></td>
	<td><?php echo CHtml::encode($data->atcc_link); ?></td>
</tr>
</table>

</div>
