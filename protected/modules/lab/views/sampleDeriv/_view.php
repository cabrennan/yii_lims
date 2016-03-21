<?php
/* @var $this SampleDerivController */
/* @var $data SampleDeriv */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('deriv_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('user_add')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->sample_id); ?></td>
	<td><?php echo CHtml::encode($data->deriv_id); ?></td>
	<td><?php echo CHtml::encode($data->user_add); ?></td>
	<td><?php echo CHtml::encode($data->date_add); ?></td>
</tr>
</table>

</div>
