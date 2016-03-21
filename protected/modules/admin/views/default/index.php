<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1> MCTP LIMS Admin Area Main Page</h1>


<ul><li><a href="/mctp-lims/admin/auditTrail/admin">Lab Audit Trail</a></li>
    <li><a href="/mctp-lims/admin/user">User Table </a> (Add/Modify Users)</li>
    <li><a href="/mctp-lims/statusCode">Status Codes</a></li>
    <li><a href="/mctp-lims/authAssignment/">User Assigned Roles</a></li>
    <li><a href="/mctp-lims/admin/authItem/">List Roles</a></li>
    <li><a href="/mctp-lims/admin/authItemChild">List Role Inheritance</a></li>
    <li><a href="/mctp-lims/admin/yiiWebSessions">Active Web Sessions</a></li>
</ul>