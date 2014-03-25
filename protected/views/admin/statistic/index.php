<?php
$this->pageTitle = Yii::app()->name . ' :Thống kê chi tiêu';
?>
<div class="box">
    <div class="content">
        <div id="tab-device">
            <div style="margin-bottom: 20px">
                <form action="<?php echo Yii::app()->createAbsoluteUrl('statistic/index'); ?>" method="POST">
                    <div class="controls">
                    Từ ngày:<br> <?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'time_up_from',
                        'value' => $fromDate,
                        'options' => array(
                            'showAnim' => 'fold',
                            'constrainInput' => 'true',
                        ),
                        'htmlOptions' => array(
                            'style' => 'height:20px;'
                        ),
                    )); ?>
                        </div>
                        Đến ngày:
                    <div class="controls">
                    <?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'time_up_to',
                        'value' => $toDate,
                        'options' => array(
                            'showAnim' => 'fold',
                            'constrainInput' => 'true',
                        ),
                        'htmlOptions' => array(
                            'style' => 'height:20px;'
                        ),
                    )); ?>
                    </div>
                    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Thống kê', 'htmlOptions' => array('name' => 'submit'))); ?>
                </form>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <?php $this->widget('bootstrap.widgets.TbGridView', array(
                                'id' => 'income-grid',
                                'dataProvider' => $model->user_search(),
                                'filter' => $model,
                                'columns' => array(
                                    array(
                                        'name' => 'id',
                                        'value' => '$data->id',
                                        'footer' => 'Tổng'
                                    ),
                                    array(
                                        'name' => 'name',
                                        'value' => '$data->name',
                                    ),
                                    array(
                                        'name' => 'note',
                                        'value' => '$data->note',
                                    ),
                                    array(
                                        'name' => 'time',
                                        'value' => 'date("d/m/Y", $data->time)',
                                    ),
                                    array(
                                        'name' => 'reference',
                                        'value' => '$data->reference',
                                    ),
                                    array(
                                        'name' => 'value',
                                        'value' => '$data->value',
                                        'footer' => $model->user_search()->itemCount === 0 ? '' : $model->totalMoney($model->user_search()),
                                    ),
                                    array(
                                        'header' => 'Action',
                                        'class' => 'CButtonColumn',
                                        'htmlOptions' => array('style' => 'width:80px'),
//                            'template' => '{delete}{update}',
                                    ),
                                ),
                            )); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
