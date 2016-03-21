<?php
/* @var $this ReagentInvController */
/* @var $model ReagentInv */

$this->breadcrumbs = array('Lab' => array('../lab'),
    'Reagent Invs' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create ReagentInv', 'url' => array('create')),
    array('label' => 'Manage Reagents', 'url' => array('../lab/reagent/admin')),
    array('label' => 'Manage Reagent Kit Items', 'url'=>array('../lab/reagentKitItem/admin')),
    array('label' => 'Manage Suppliers', 'url' => array('../lab/supplier/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reagent-inv-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<div class="table">
    <?php
    $this->widget('CustomGridView', array(
        'id' => 'reagent-inv-grid',
        'tableHeader' => 'Manage Reagent Inventory',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            //'reagent_inv_id',
            array(
                'name' => 'supplier',
                'value' => '$data->supplier->name',
            ),
            array(
                'name' => 'reagent',
                'value' => '$data->reagent->name',
            ),
             array(
                'name' => 'reagentKitItem',
                'value' => '(!empty($data["reagent_kit_item_id"]))?$data->reagentKitItem->name:""',
            ),           
            
            array(
                'name'=>'reagent.catalog',
                'value'=>'$data->reagent->catalog',
                'filter'=>CHtml::activeTextField($model, 'catalog'), 
            ),

            array(
                'name' => 'qty',
                'value' => '$data["qty"]',
                'filterHtmlOptions' => array('style' => 'width: 25px;'),
            ),
            'lot',
            array('name' => 'date_rec', 'value' => '(!empty($data["date_rec"]))?date("m/d/Y", strtotime($data["date_rec"])):""',
                'htmlOptions' => array('style' => 'width: 75px;'),
                'filterHtmlOptions' => array('style' => 'width: 75px;'),
            ),
            array(
                'name' => 'user_rec',
                'value' => '$data->userRec->short_name',
            ),
            array('name' => 'date_exp', 'value' => '(!empty($data["date_exp"]))?date("m/d/Y", strtotime($data["date_exp"])):""',
                'htmlOptions' => array('style' => 'width: 75px;'),
                'filterHtmlOptions' => array('style' => 'width: 75px;'),
            ),
            array('name' => 'date_auth', 'value' => '(!empty($data["date_auth"]))?date("m/d/Y", strtotime($data["date_auth"])):""',
                'htmlOptions' => array('style' => 'width: 75px;'),
                'filterHtmlOptions' => array('style' => 'width: 75px;'),
            ),
            array(
                'name' => 'user_auth',
                'value' => '(!empty($data["user_auth"]))?$data->userAuth->short_name:""',
            ),
            array('name' => 'date_disc', 'value' => '(!empty($data["date_disc"]))?date("m/d/Y", strtotime($data["date_disc"])):""',
                'htmlOptions' => array('style' => 'width: 75px;'),
                'filterHtmlOptions' => array('style' => 'width: 75px;'),
            ),
            array(
                'name' => 'user_disc',
                'value' => '(!empty($data["user_disc"]))?$data->userDisc->short_name:""',
            ),
            'reason_disc',
            'datasheet',
            'note',
            array(
                'class' => 'CustomButtonColumn',
                'template' => '{edit}{delete}',
                'buttons' => array(
                    'edit' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_tech")',
                    ),
                    'delete' => array(
                        'visible' => 'Yii::app()->user->checkAccess("lab_mgr")',
                    ),
                )),
        ),
    ));
    ?>
</div><!-- table -->
