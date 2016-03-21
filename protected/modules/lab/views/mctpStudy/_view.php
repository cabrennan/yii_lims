<?php
/* @var $this MctpStudyController */
/* @var $data MctpStudy */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('study_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->study_id); ?></td>
	<td><?php echo CHtml::encode($data->name); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
</tr>
</table>

</div>
