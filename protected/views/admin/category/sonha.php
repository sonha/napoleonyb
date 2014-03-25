<div class="row-fluid">
    <div class="span12">
        <ul class="quick-actions-horizontal pull-right">
            <li>
                <a href="<?php echo Yii::app()->createAbsoluteUrl('developer/app/create');?>">
                    <i class="icon-plus"></i>
                    <span>Thêm ứng dụng mới</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type' => 'striped bordered',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'htmlOptions' => array(
                    'class' => 'widget-content nopadding'
                ),
                'template' => "{items}{pager}",
                'itemsCssClass' => 'items',
                'columns' => array(
                    array(
                        'name' => 'id',
                        'header' => 'Ứng dụng',
                        'type' => 'raw',
                        'value' => '$data->id',
                    ),
                    array(
                        'name' => 'name',
                        'header' => 'Ứng dụng',
                        'type' => 'raw',
                        'value' => '$data->name',
                    ),
                    array(
                        'name' => 'status',
                        'header' => 'Ứng dụng',
                        'type' => 'raw',
                        'value' => '$data->status',
                    ),
                    array(
                        'name' => 'rank',
                        'header' => 'Ứng dụng',
                        'type' => 'raw',
                        'value' => '$data->rank',
                    ),
                ),
            ));?>
        </div>
    </div>
</div>
