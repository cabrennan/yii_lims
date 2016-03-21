<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<ul>
        <li><a href="/mctp-lims/lab/">Lab Area </a> (Sample Tracking)</li>
        <li><a href="/mctp-lims/sample_db/">Sample DB Area </a>(Legacy Data - Read Only)</li>
        <li><a href="/mctp-lims/admin/">Admin Area</a></li>
        <li><a href="/mctp-lims/phi/">PHI Area</a></li>
        <li><a href="/mctp-lims/snp/">SNP Area</a></li>
</ul>



