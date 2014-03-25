<?php
/* @var $this DanhmucController */
/* @var $model Danhmuc */

$this->breadcrumbs=array(
	'Danhmucs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Danhmuc', 'url'=>array('index')),
	array('label'=>'Create Danhmuc', 'url'=>array('create')),
	array('label'=>'Update Danhmuc', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Danhmuc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Danhmuc', 'url'=>array('admin')),
);
?>

<h1>View Danhmuc #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'parent_id',
		'create_at',
		'slug',
		'description',
	),
)); ?>
