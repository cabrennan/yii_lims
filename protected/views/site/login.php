<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Author: Christine A. Brennan christine@cabrennan.com
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';

?>

<h1>MCTP LIMS Login </h1>
<h3>UMICH uniquename and Level-1 password required </h3>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'uniquename'); ?>
		<?php echo $form->textField($model,'uniquename'); ?>
		<?php echo $form->error($model,'uniquename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<!-- <div class="row rememberMe">
		<?php //echo $form->checkBox($model,'rememberMe'); 
		      //echo $form->label($model,'rememberMe'); 
		      // echo $form->error($model,'rememberMe'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->




