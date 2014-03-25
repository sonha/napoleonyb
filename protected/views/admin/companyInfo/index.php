<?php
/* @var $this CompanyInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Company Infos',
);

$this->menu=array(
	array('label'=>'Create CompanyInfo', 'url'=>array('create')),
	array('label'=>'Manage CompanyInfo', 'url'=>array('admin')),
);
?>

<h1>Company Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
