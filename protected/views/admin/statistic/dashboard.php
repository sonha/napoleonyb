<?php
$this->pageTitle = Yii::app()->name . ' :Spend Manager';
?>
<div class="box">
    <div class="content">
        <div id="content-header">
            <h1>Grid Layout</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
                            <h5>Span6</h5>
                        </div>
                        <div class="widget-content">
                            <?php
                            $this->Widget('ext.highcharts.HighchartsWidget', array(
                                'options' => array(
                                    'title' => array('text' => 'Fruit Consumption'),
                                    'xAxis' => array(
                                        'categories' => array('Apples', 'Bananas', 'Oranges')
                                    ),
                                    'yAxis' => array(
                                        'title' => array('text' => 'Fruit eaten')
                                    ),
                                    'series' => array(
                                        array('name' => 'Jane', 'data' => array(1, 0, 4)),
                                        array('name' => 'John', 'data' => array(5, 7, 3))
                                    )
                                )
                            ));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
                            <h5>Span6</h5>
                        </div>
                        <div class="widget-content">
                            <?php
                            $this->Widget('ext.highcharts.HighchartsWidget', array(
                                'options' => array(
                                    'title' => array('text' => 'Fruit Consumption'),
                                    'xAxis' => array(
                                        'categories' => array('Apples', 'Bananas', 'Oranges')
                                    ),
                                    'yAxis' => array(
                                        'title' => array('text' => 'Fruit eaten')
                                    ),
                                    'series' => array(
                                        array('name' => 'Jane', 'data' => array(1, 0, 4)),
                                        array('name' => 'John', 'data' => array(5, 7, 3))
                                    )
                                )
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
                            <h5>Span12</h5>
                        </div>
                        <div class="widget-content">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
