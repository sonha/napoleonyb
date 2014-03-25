<?php
/* @var $this CompanyInfoController */
/* @var $model CompanyInfo */

$this->breadcrumbs=array(
	'Company Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CompanyInfo', 'url'=>array('index')),
	array('label'=>'Manage CompanyInfo', 'url'=>array('admin')),
);
?>

<h1>Create CompanyInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>