<?php
$this->pageTitle = Yii::app()->name . ' :Spend Manager';
?>
<div class="box">
<div class="content">
<div id="tab-device">
<div style="margin-bottom: 20px">
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title">
                            <span class="icon">
							    <i class="icon-th"></i>
						    </span>
            <h5>So sánh theo ngày, tuần, tháng</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Time</th>
                    <th>Income</th>
                    <th>Spend</th>
                    <th>Compare</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    $income_in_day = Income::getIncomeMoneyByDay(time());
                    $spend_in_day = Spend::getSpendMoneyByDay(time());
                    ?>
                    <td width="203px">Day<br>(<?php echo $today_date;?>)</td>
                    <td><?php echo $income_in_day;?></td>
                    <td><?php echo $spend_in_day;?></td>
                    <td><?php echo ($income_in_day - $spend_in_day); ?></td>
                </tr>
                <tr>
                    <td>Week<br>
                        (<?php echo $range_week['from_day'];?> - <?php echo $range_week['to_day'];?>)
                    </td>
                    <td><?php echo $income_in_week; ?></td>
                    <td><?php echo $spend_in_week; ?></td>
                    <td><?php echo ($income_in_week - $spend_in_week); ?></td>
                </tr>
                <tr>
                    <td>Month<br>
                        (<?php echo $range_month['from_day'];?>-<?php echo $range_month['to_day'];?>)
                    </td>
                    <td><?php echo $income_in_month; ?></td>
                    <td><?php echo $spend_in_month; ?></td>
                    <td><?php echo ($income_in_month - $spend_in_month); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <ul class="quick-actions-horizontal pull-right">
            <li>
                <a href="<?php echo Yii::app()->createAbsoluteUrl('spend/create'); ?>">
                    <i class="icon-plus"></i>
                    <span>Thêm khoản chi mới</span>
                </a>
            </li>
        </ul>
        <div class="widget-box">
            <div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
                <h5>Các khoản cho vay hiện tại</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Người cho vay</th>
                        <th>Số tiền</th>
                        <th>Ngày hẹn trả</th>
                        <th>Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total_lend = 0;
                    foreach ($lend_money as $lend) {
                        ?>
                        <tr>
                            <td><?php echo $lend['name']?></td>
                            <td><?php echo $lend['value']?></td>
                            <td><?php echo $lend['reference']?></td>
                            <td><?php echo $lend['note']?></td>
                        </tr>
                        <?php $total_lend += $lend['value'];
                    } ?>
                    <td>Tổng</td>
                    <td><?php echo $total_lend;?></td>
                    <td></td>
                    <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="span6">
        <ul class="quick-actions-horizontal pull-right">
            <li>
                <a href="<?php echo Yii::app()->createAbsoluteUrl('income/create'); ?>">
                    <i class="icon-plus"></i>
                    <span>Thêm khoản thu mới</span>
                </a>
            </li>
        </ul>
        <div class="widget-box">
            <div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
                <h5>Các khoản vay hiện tại</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Người vay</th>
                        <th>Số tiền</th>
                        <th>Ngày hẹn trả</th>
                        <th>Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total_loan = 0;
                    foreach ($loan_money as $loan) {
                        ?>
                        <tr>
                            <td><?php echo $loan['name']?></td>
                            <td><?php echo $loan['value']?></td>
                            <td><?php echo $loan['reference']?></td>
                            <td><?php echo $loan['note']?></td>
                        </tr>
                        <?php
                        $total_loan += $loan['value'];
                    } ?>
                    <td>Tổng</td>
                    <td><?php echo $total_loan;?></td>
                    <td></td>
                    <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo Yii::app()->createAbsoluteUrl('statistic/compare'); ?>" method="POST">
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
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Thống kê chi', 'htmlOptions' => array('name' => 'submit'))); ?>
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
//                                    array(
//                                        'header' => 'Action',
//                                        'class' => 'CButtonColumn',
//                                        'htmlOptions' => array('style' => 'width:80px'),
////                            'template' => '{delete}{update}',
//                                    ),
                ),
            )); ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
