<?php
/* @var $this Icd3Controller */
/* @var $data Icd3 */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('site_recode')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('site_desc')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('hist')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('hist_desc')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('hist_behv')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('hist_behv_desc')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->site_recode); ?></td>
	<td><?php echo CHtml::encode($data->site_desc); ?></td>
	<td><?php echo CHtml::encode($data->hist); ?></td>
	<td><?php echo CHtml::encode($data->hist_desc); ?></td>
	<td><?php echo CHtml::encode($data->hist_behv); ?></td>
	<td><?php echo CHtml::encode($data->hist_behv_desc); ?></td>
</tr>
</table>

</div>
