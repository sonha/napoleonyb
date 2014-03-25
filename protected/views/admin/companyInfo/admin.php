<?php
/* @var $this CompanyInfoController */
/* @var $model CompanyInfo */

$this->breadcrumbs=array(
	'Company Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CompanyInfo', 'url'=>array('index')),
	array('label'=>'Create CompanyInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#company-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Company Infos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'company-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'address1',
		'address2',
		'phone1',
		'phone2',
		/*
		'email1',
		'email2',
		'website',
		'facebook',
		'desc1',
		'desc2',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
