<?php
/* @var $this SampleController */
/* @var $model Sample */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

    $this->widget('ext.widgets.tabularinput.XTabularInput',array(
    'models'=>$models,
    //'inputLimit'=>10, // comment in to limit the number of input rows
    'containerTagName'=>'table',
    'headerTagName'=>'thead',
    'header'=>'<tr>' . 
            '<td>'.CHtml::activeLabelEX(Sample::model(),'sample_id').'</td> ' .
            '<td>'.CHtml::activeLabelEX(Sample::model(),'date_rec').'</td>' .
            '<td>'.CHtml::activeLabelEX(Sample::model(),'sample_type').'</td>' .
            '<td>'.CHtml::activeLabelEx(Sample::model(),'status').'</td>'.
            '<td>'. '</td>' . 
            '<td></td>' . 
        '</tr>',
   'inputContainerTagName'=>'tbody',
    'inputTagName'=>'tr',
    'inputView'=>'extensions/_tabularInputAsTable',
    'inputUrl'=>$this->createUrl('request/addTabularInputsAsTable'),
    'addTemplate'=>'<tbody><tr><td colspan="3">{link}</td></tr></tbody>',
  'addLabel'=>Yii::t('ui','Add new row'),
    'addHtmlOptions'=>array('class'=>'blue pill full-width'),
    'removeTemplate'=>'<td>{link}</td>',
    'removeLabel'=>Yii::t('ui','Delete'),
   'removeHtmlOptions'=>array('class'=>'red pill'),
));
    
    
    
    
    


?>


</div><!-- form -->