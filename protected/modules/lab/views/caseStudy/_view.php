<?php
/* @var $this CaseStudyController */
/* @var $data CaseStudy */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('study_id')); ?></th>
        	<th><?php echo CHtml::encode($data->getAttributeLabel('case_study_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->case_id); ?></td>
	<td><?php echo CHtml::encode($data->study_id); ?></td>
        <td><?php echo CHtml::encode($data->case_study_id); ?></td>
</tr>
</table>

</div>
