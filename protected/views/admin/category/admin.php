<?php
    /* @var $this CategoryController */
    /* @var $model Category */

    $this->breadcrumbs = array(
        'Categories' => array('index'),
        'Manage',
    );

    $this->menu = array(
        array('label' => 'Thêm mới', 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<!---->
<!--<h1>Chuyên mục</h1>-->
<!---->
<?php //echo CHtml::link('Tìm kiếm', '#', array('class' => 'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<!--    --><?php //$this->renderPartial('_search', array(
//    'model' => $model,
//)); ?>
<!--</div>-->
    <!-- search-form -->
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => TRUE,
)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'           => 'category-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'selectableRows' => 2,
    'columns'      => array(
        array(
            'id'             => 'autoId',
            'class'          => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
//        'id',
        array(
            'name'   => 'parentId',
            'value'  => 'isset($data->parent)?$data->parent->name:""',
            'filter' => CHtml::activeDropDownList($model, 'parentId', CHtml::listData(Category::model()->findAll("parentId is null"), "id", "name"), array("empty" => "Chọn chuyên mục")),
        ),
        'name',
        array(
            'name'        => 'rank',
            'value'       => 'CHtml::textField("sortOrder[$data->id]",$data->rank,array("style"=>"width:50px;"))',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'name'   => 'status',
            'value'  => '$data->status==1?"Hiện":"Ẩn"',
            'filter' => array(1 => 'Hiện', 0 => 'Ẩn'),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('category-grid');
    }
</script>
<?php echo CHtml::ajaxSubmitButton('Filter', array('category/ajaxUpdate'), array(), array("style" => "display:none;")); ?>
<?php echo CHtml::ajaxSubmitButton('Hiện', array('category/ajaxUpdate', 'act' => 'doActive'), array('success' => 'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Ẩn', array('category/ajaxUpdate', 'act' => 'doInactive'), array('success' => 'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Xóa', array('category/ajaxUpdate', 'act' => 'doDelete'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("Bạn có chắc chắn muốn xóa những chuyên mục được chọn?")
        }',)); ?>
<?php echo CHtml::ajaxSubmitButton('Cập nhật thứ hạng', array('category/ajaxUpdate', 'act' => 'doSortOrder'), array('success' => 'reloadGrid')); ?>
<?php $this->endWidget(); ?>