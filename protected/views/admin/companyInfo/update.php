<?php
/* @var $this CompanyInfoController */
/* @var $model CompanyInfo */

$this->breadcrumbs=array(
	'Company Infos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CompanyInfo', 'url'=>array('index')),
	array('label'=>'Create CompanyInfo', 'url'=>array('create')),
	array('label'=>'View CompanyInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CompanyInfo', 'url'=>array('admin')),
);
?>

<h1>Update CompanyInfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>