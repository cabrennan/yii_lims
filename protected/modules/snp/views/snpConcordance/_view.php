<?php
/* @var $this SnpConcordanceController */
/* @var $data SnpConcordance */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('md5sum')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('library_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('flowcell')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lane')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('md5sum_2')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_id_2')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('library_id_2')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('flowcell_2')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lane_2')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('concordant_pos_count')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('total_pos_count')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('pct_concordant')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('status')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->md5sum); ?></td>
	<td><?php echo CHtml::encode($data->case_id); ?></td>
	<td><?php echo CHtml::encode($data->library_id); ?></td>
	<td><?php echo CHtml::encode($data->flowcell); ?></td>
	<td><?php echo CHtml::encode($data->lane); ?></td>
	<td><?php echo CHtml::encode($data->md5sum_2); ?></td>
	<td><?php echo CHtml::encode($data->case_id_2); ?></td>
	<td><?php echo CHtml::encode($data->library_id_2); ?></td>
	<td><?php echo CHtml::encode($data->flowcell_2); ?></td>
	<td><?php echo CHtml::encode($data->lane_2); ?></td>
	<td><?php echo CHtml::encode($data->concordant_pos_count); ?></td>
	<td><?php echo CHtml::encode($data->total_pos_count); ?></td>
	<td><?php echo CHtml::encode($data->pct_concordant); ?></td>
	<td><?php echo CHtml::encode($data->note); ?></td>
	<td><?php echo CHtml::encode($data->status); ?></td>
</tr>
</table>

</div>
