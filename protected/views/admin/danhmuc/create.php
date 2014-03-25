<?php
/* @var $this DanhmucController */
/* @var $model Danhmuc */

$this->breadcrumbs=array(
	'Danhmucs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Danhmuc', 'url'=>array('index')),
	array('label'=>'Manage Danhmuc', 'url'=>array('admin')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>