<?php
/* @var $this DanhmucController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Danhmucs',
);

$this->menu=array(
	array('label'=>'Create Danhmuc', 'url'=>array('create')),
	array('label'=>'Manage Danhmuc', 'url'=>array('admin')),
);
?>

<h1>Danhmucs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
