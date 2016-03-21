<?php
/* @var $this CaseLibraryController */
/* @var $data CaseLibrary */
?>

<div class="view">
<table>
<tr>
	<th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('case_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_status')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_preserve')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_use')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_antibody')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_treatment')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_knockdown')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_researcher')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_gene_mod')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_techology')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_vec')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_marker')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('sample_iso_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_type')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_rin')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_qual')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_status')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('iso_consumed')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_iso_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_id')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_label')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_name')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_bio_conc')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_bio_size')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_barcode')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_status')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_qual')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_cap_kit')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_tech')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_molarity')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_molarity_cal')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_note')); ?></th>
	<th><?php echo CHtml::encode($data->getAttributeLabel('lib_type_id')); ?></th>
</tr>
<tr>	<td><?php echo CHtml::encode($data->id); ?></td>
	<td><?php echo CHtml::encode($data->case_id); ?></td>
	<td><?php echo CHtml::encode($data->case_name); ?></td>
	<td><?php echo CHtml::encode($data->sample_id); ?></td>
	<td><?php echo CHtml::encode($data->sample_name); ?></td>
	<td><?php echo CHtml::encode($data->sample_status); ?></td>
	<td><?php echo CHtml::encode($data->sample_type); ?></td>
	<td><?php echo CHtml::encode($data->sample_preserve); ?></td>
	<td><?php echo CHtml::encode($data->sample_use); ?></td>
	<td><?php echo CHtml::encode($data->sample_antibody); ?></td>
	<td><?php echo CHtml::encode($data->sample_treatment); ?></td>
	<td><?php echo CHtml::encode($data->sample_knockdown); ?></td>
	<td><?php echo CHtml::encode($data->sample_researcher); ?></td>
	<td><?php echo CHtml::encode($data->sample_gene_mod); ?></td>
	<td><?php echo CHtml::encode($data->sample_techology); ?></td>
	<td><?php echo CHtml::encode($data->sample_vec); ?></td>
	<td><?php echo CHtml::encode($data->sample_marker); ?></td>
	<td><?php echo CHtml::encode($data->sample_note); ?></td>
	<td><?php echo CHtml::encode($data->iso_note); ?></td>
	<td><?php echo CHtml::encode($data->sample_iso_id); ?></td>
	<td><?php echo CHtml::encode($data->iso_id); ?></td>
	<td><?php echo CHtml::encode($data->iso_name); ?></td>
	<td><?php echo CHtml::encode($data->iso_type); ?></td>
	<td><?php echo CHtml::encode($data->iso_rin); ?></td>
	<td><?php echo CHtml::encode($data->iso_qual); ?></td>
	<td><?php echo CHtml::encode($data->iso_status); ?></td>
	<td><?php echo CHtml::encode($data->iso_consumed); ?></td>
	<td><?php echo CHtml::encode($data->lib_iso_id); ?></td>
	<td><?php echo CHtml::encode($data->lib_id); ?></td>
	<td><?php echo CHtml::encode($data->lib_label); ?></td>
	<td><?php echo CHtml::encode($data->lib_name); ?></td>
	<td><?php echo CHtml::encode($data->lib_bio_conc); ?></td>
	<td><?php echo CHtml::encode($data->lib_bio_size); ?></td>
	<td><?php echo CHtml::encode($data->lib_barcode); ?></td>
	<td><?php echo CHtml::encode($data->lib_status); ?></td>
	<td><?php echo CHtml::encode($data->lib_qual); ?></td>
	<td><?php echo CHtml::encode($data->lib_cap_kit); ?></td>
	<td><?php echo CHtml::encode($data->lib_tech); ?></td>
	<td><?php echo CHtml::encode($data->lib_molarity); ?></td>
	<td><?php echo CHtml::encode($data->lib_molarity_cal); ?></td>
	<td><?php echo CHtml::encode($data->lib_note); ?></td>
	<td><?php echo CHtml::encode($data->lib_type_id); ?></td>
</tr>
</table>

</div>
