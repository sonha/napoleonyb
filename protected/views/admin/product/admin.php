<?php
    /* @var $this ProductController */
    /* @var $model Product */
    Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/imageTooltip.js');
    $this->breadcrumbs = array(
        'Products' => array('index'),
        'Manage',
    );

    $this->menu = array(
        array('label' => 'Thêm mới', 'url' => array('create')),
        array('label' => 'Upload ảnh', 'url' => array('batchUpload')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Danh sách</h1>

<?php echo CHtml::link('Tìm kiếm', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => TRUE,
)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'             => 'product-grid',
    'dataProvider'   => $model->search(),
    'filter'         => $model,
    'selectableRows' => 2,
    'columns'        => array(
        array(
            'id'             => 'autoId',
            'class'          => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        array(
            'name'   => 'avatar',
            'value'  => '"<a href=\"".Yii::app()->request->baseUrl.$data->avatar."\"  class=\"preview\"><img src=\"".Yii::app()->request->baseUrl.$data->avatar."\" width=\"50\" height=\"50\"/></a>"',
            'type'   => 'raw',
            'filter' => FALSE,
            'sortable'   => FALSE,
        ),
        array(
            'name'   => 'categoryId',
            'value'  => 'isset($data->category)?$data->category->name:""',
            'filter' => CHtml::activeDropDownList($model, 'categoryId', CHtml::listData(Category::model()->findAll(), "id", "name"), array("empty" => "Chọn chuyên mục")),
        ),
        array(
            'name'        => 'name',
            'value'       => 'CHtml::textField("setName[$data->id]",$data->name,array("style"=>"width:150px;"))',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "150px"),
        ),
        array(
            'name'        => 'rank',
            'value'       => 'CHtml::textField("sortRank[$data->id]",$data->rank,array("style"=>"width:50px;"))',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'name'        => 'price',
            'value'       => 'CHtml::textField("setPrice[$data->id]",$data->price,array("style"=>"width:50px;"))',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'name'   => 'status',
            'value'  => '$data->status==1?"Hiện":"Ẩn"',
            'filter' => array(1 => 'Hiện', 0 => 'Ẩn'),
        ),
        array(
            'name'   => 'home',
            'value'  => '$data->home==1?"Có":"Không"',
            'filter' => array(1 => 'Có', 0 => 'Không'),
        ),
        array(
            'name'   => 'feature',
            'value'  => '$data->feature==1?"Có":"Không"',
            'filter' => array(1 => 'Có', 0 => 'Không'),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('product-grid');
    }
</script>
    <span>Tick chọn:</span>
<?php echo CHtml::ajaxSubmitButton('Filter', array('product/ajaxUpdate'), array(), array("style" => "display:none;")); ?>
<?php echo CHtml::ajaxSubmitButton('Hiện', array('product/ajaxUpdate', 'act' => 'doActive'), array('success' => 'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Ẩn', array('product/ajaxUpdate', 'act' => 'doInactive'), array('success' => 'reloadGrid')); ?>
|
<?php echo CHtml::ajaxSubmitButton('Đưa lên Home', array('product/ajaxUpdate', 'act' => 'doHome'), array('success' => 'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Gỡ khỏi Home', array('product/ajaxUpdate', 'act' => 'doNotHome'), array('success' => 'reloadGrid')); ?>
|
<?php echo CHtml::ajaxSubmitButton('Nổi bật', array('product/ajaxUpdate', 'act' => 'doFeature'), array('success' => 'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Không nổi bật', array('product/ajaxUpdate', 'act' => 'doNotFeature'), array('success' => 'reloadGrid')); ?>
<br/>
    <span>Không cần tick chọn: </span>
<?php echo CHtml::ajaxSubmitButton('Cập nhật tên', array('product/ajaxUpdate', 'act' => 'doName'), array('success' => 'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Cập nhật thứ hạng', array('product/ajaxUpdate', 'act' => 'doSortRank'), array('success' => 'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Cập nhật giá', array('product/ajaxUpdate', 'act' => 'doPrice'), array('success' => 'reloadGrid')); ?>
|
<?php echo CHtml::ajaxSubmitButton('Xóa', array('product/ajaxUpdate', 'act' => 'doDelete'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("Bạn có chắc chắn muốn xóa những sản phẩm được chọn?")
        }',)); ?>
<?php $this->endWidget(); ?>

<style>
    #preview {
        position: absolute;
        border: 1px solid #ccc;
        background: #333;
        padding: 5px;
        display: none;
        color: #fff;
    }

    #preview img {
        max-width: 500px;
        max-height: 500px;
    }
</style>