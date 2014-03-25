<?php
/* @var $this DanhmucController */
/* @var $model Danhmuc */
?>
<div class="row-fluid">
    <div class="span12">
        <ul class="quick-actions-horizontal pull-right">
            <li>
                <a href="<?php echo Yii::app()->createAbsoluteUrl('danhmuc/create'); ?>">
                    <i class="icon-plus"></i>
                    <span>Thêm chuyên mục mới</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="widget-box">
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'id',
            'value' => '$data->id',
        ),
        array(
            'name' => 'name',
            'value' => '$data->name',
        ),
        array(
            'name' => 'slug',
            'value' => '$data->slug',
        ),
        array(
            'name' => 'description',
            'value' => '$data->description',
        ),
        array(
            'name' => 'parent_id',
            'value' => '$data->parent_id',
        ),
        array(
            'name' => 'create_at',
            'value' => 'date("d/m/Y", $data->create_at)',
        ),
        array(
            'name' => 'type',
            'value' => '$data->type',
        ),
        array(
            'header' => 'Action',
            'class' => 'CButtonColumn',
            'htmlOptions' => array('style'=>'width:80px'),
//                            'template' => '{delete}{update}',
        ),

	),
)); ?>
</div>
</div>
</div>
