<?php
/* @var $this BenchStepController */
/* @var $data BenchStep */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('bench_step_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('title')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('view')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('url')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('content')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->bench_step_id); ?></td>
	<td><?php echo CHtml::encode($data->title); ?></td>
	<td><?php echo CHtml::encode($data->view); ?></td>
	<td><?php echo CHtml::encode($data->url); ?></td>
	<td><?php echo CHtml::encode($data->content); ?></td>
</tr>
</table>

</div>
