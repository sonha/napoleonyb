<?php $this->pageTitle=Yii::app()->name;
    Yii::app()->clientScript->registerCoreScript('jquery');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/oocharts.js');
?>

<h1>Thống kê truy cập</h1>
<hr/>
<!--New google analytics-->
<script type="text/javascript">
    //Set your ooid
    oo.setOOId("ee18549053164444ba86fab37e94cb04");
    var aid = "69767048";
    var startDate = new Date("01/01/2013");
    var endDate = new Date();
    startDate.setDate(endDate.getDate() - 15);
    //load reqs
    oo.load(function () {
        //Create a new timeline (aid, startDate, endDate)
        var tl = new oo.Timeline(aid, startDate, endDate);
        //Add the metric to pull from the visitor count
        tl.addMetric('ga:visitors', 'Visits');
        //Add metric for bounces
        tl.addMetric('ga:bounces', 'Bounces');
        //Set Google visualization options for line colors
        tl.setOption('colors', ['red', 'orange', 'yellow', 'green']);
        //Set Google visualization option for chart title
        tl.setOption('title', 'My Timeline');
        //draw in the div element with id 'timeline'
        tl.draw('timeline');

        var pie = new oo.Pie(aid, startDate, endDate);
        pie.setDimension('ga:browser');
        pie.setMetric('ga:visitors', 'Visitors');
        pie.draw('pie');
        var metric1 = new oo.Metric(aid, startDate, endDate);
        metric1.setMetric('ga:pageviews');
        metric1.draw('met1');

        var met2 = new oo.Metric(aid, startDate, endDate);
        met2.setMetric('ga:visitors');
        met2.draw('met2');

        var met3 = new oo.Metric(aid, startDate, endDate);
        met3.setMetric('ga:bounces');
        met3.draw('met3');
    });
</script>
<h1 id="timeline"></h1>
<div class="row-fluid">
    <div class="span6">
        <table class="table">
            <thead>
            <tr>
                <th>Page Views</th>
                <th>Visitors</th>
                <th>Bounces</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><h1 id="met1"></h1></td>
                <td><h1 id="met2"></h1></td>
                <td><h1 id="met3"></h1></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="span6">
        <h1 id="pie"></h1>
    </div>
</div>
