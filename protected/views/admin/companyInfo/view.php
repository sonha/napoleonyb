<?php
/* @var $this CompanyInfoController */
/* @var $model CompanyInfo */

$this->breadcrumbs=array(
	'Company Infos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompanyInfo', 'url'=>array('index')),
	array('label'=>'Create CompanyInfo', 'url'=>array('create')),
	array('label'=>'Update CompanyInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyInfo', 'url'=>array('admin')),
);
?>

<h1>View CompanyInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address1',
		'address2',
		'phone1',
		'phone2',
		'email1',
		'email2',
		'website',
		'facebook',
		'desc1',
		'desc2',
	),
)); ?>
