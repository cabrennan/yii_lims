<?php
/* @var $this PedigreeController */
/* @var $data Pedigree */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('pedigree_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('patient_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('img_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->pedigree_id); ?></td>
	<td><?php echo CHtml::encode($data->patient_id); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->img_id); ?></td>
</tr>
</table>

</div>
