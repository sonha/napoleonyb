<?php
/* @var $this DanhmucController */
/* @var $model Danhmuc */

$this->breadcrumbs=array(
	'Danhmucs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Danhmuc', 'url'=>array('index')),
	array('label'=>'Create Danhmuc', 'url'=>array('create')),
	array('label'=>'View Danhmuc', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Danhmuc', 'url'=>array('admin')),
);
?>

<h1>Update Danhmuc <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>