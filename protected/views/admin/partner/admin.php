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
            'name'        => 'id',
            'value'       => '$data->id',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'name'        => 'name',
            'value'       => '$data->name',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'name'        => 'address',
            'value'       => '$data->address',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'name'        => 'phone',
            'value'       => '$data->phone',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'name'        => 'email',
            'value'       => '$data->email',
            'type'        => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
<?php $this->endWidget(); ?>
