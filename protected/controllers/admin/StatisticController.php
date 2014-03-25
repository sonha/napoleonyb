<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ha Anh Son
 * Date: 4/25/13
 * Time: 10:04 AM
 * Class thong ke cac khoan chi tieu
 */
class StatisticController extends AdminController
{
    public $breadcrumbs = array(
        'Thống kê' => array('statistic/index')
    );

    public function actionDashboard() {
        $this->render('dashboard');
    }

    public function actionIndex()
    {
        $this->heading = 'income Manager';
        $model = new Income('user_search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Income']))
            $model->attributes = $_GET['Income'];
        if (!Yii::app()->request->isAjaxRequest) {
            Yii::app()->session['income_time_up_from'] = (isset($_POST['time_up_from'])) ? $_POST['time_up_from'] : date('m/d/Y', strtotime('-6 day'));
            Yii::app()->session['income_time_up_to'] = (isset($_POST['time_up_to'])) ? $_POST['time_up_to'] : date('m/d/Y', time());
        }

        $tmpFromDate = $fromDate = Yii::app()->session['income_time_up_from'];
        $toDate = Yii::app()->session['income_time_up_to'];
        if (!empty($tmpFromDate) && !empty($toDate)) {
            $model->time_up_from = strtotime($tmpFromDate);
            $model->time_up_to = strtotime($toDate) + 86399;
        }
        $this->render('index', array(
            'model' => $model,
            'fromDate' => $tmpFromDate,
            'toDate' => $toDate,
        ));
    }

    public function actionSpend()
    {
        $this->heading = 'Spend Manager';
        $model = new Spend('user_search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Spend']))
            $model->attributes = $_GET['Spend'];
        if (!Yii::app()->request->isAjaxRequest) {
            Yii::app()->session['time_up_from'] = (isset($_POST['time_up_from'])) ? $_POST['time_up_from'] : date('m/d/Y', strtotime('-6 day'));
            Yii::app()->session['time_up_to'] = (isset($_POST['time_up_to'])) ? $_POST['time_up_to'] : date('m/d/Y', time());
        }

        $tmpFromDate = $fromDate = Yii::app()->session['time_up_from'];
        $toDate = Yii::app()->session['time_up_to'];
        if (!empty($tmpFromDate) && !empty($toDate)) {
            $model->time_up_from = strtotime($tmpFromDate);
            $model->time_up_to = strtotime($toDate) + 86399;
        }
        $this->render('spend', array(
            'model' => $model,
            'fromDate' => $tmpFromDate,
            'toDate' => $toDate,
        ));
    }

    /**
     * Ham hien thi tong thu va tong chi trong vong 1 ngay, 1 tuan, 1 thang
     */
    public function actionCompare()
    {
        $this->heading = 'Spend Manager';
        $today = time();
        $today_date = date("d/m/Y", $today);
        $week_number = date('W', $today);
        $month_number = date('m', $today);
        $year_number = date('Y', $today);
        $range_week = $this->getWeekDates($year_number, $week_number);
        $range_month = $this->getMonthDates($year_number, $month_number);
        $week_start_time = strtotime($range_week['from_day']);
        $week_end_time = strtotime($range_week['to_day']);
        $month_start_time = strtotime($range_month['from_day']);
        $month_end_time = strtotime($range_month['to_day']);
        $spend_in_week = Spend::getSpendMoneyByRange($week_start_time, $week_end_time);
        $income_in_week = Income::getIncomeMoneyByRange($week_start_time, $week_end_time);
        $spend_in_month = Spend::getSpendMoneyByRange($month_start_time, $month_end_time);
        $income_in_month = Income::getIncomeMoneyByRange($month_start_time, $month_end_time);

        $lend_money = Spend::getLend();
        $loan_money = Spend::getLoan();
//        var_dump($lend_money);die;

        $model = new Spend('user_search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Spend']))
            $model->attributes = $_GET['Spend'];
        if (!Yii::app()->request->isAjaxRequest) {
            Yii::app()->session['time_up_from'] = (isset($_POST['time_up_from'])) ? $_POST['time_up_from'] : date('m/d/Y', strtotime('-6 day'));
            Yii::app()->session['time_up_to'] = (isset($_POST['time_up_to'])) ? $_POST['time_up_to'] : date('m/d/Y', time());
        }

        $tmpFromDate = $fromDate = Yii::app()->session['time_up_from'];
        $toDate = Yii::app()->session['time_up_to'];
        if (!empty($tmpFromDate) && !empty($toDate)) {
            $model->time_up_from = strtotime($tmpFromDate);
            $model->time_up_to = strtotime($toDate) + 86399;
        }


        $this->render('compare', array(
            'model' => $model,
            'today_date' => $today_date,
            'range_week' => $range_week,
            'range_month' => $range_month,
            'fromDate' => $tmpFromDate,
            'toDate' => $toDate,
            'spend_in_week' => $spend_in_week,
            'spend_in_month' => $spend_in_month,
            'income_in_week' => $income_in_week,
            'income_in_month' => $income_in_month,
            'lend_money' => $lend_money,
            'loan_money' => $loan_money,
        ));

    }

    /**
     * Ham lay ngay thang nam cua ngay bat dau va ngay ket thuc cua 1 tuan dua vao nam va so thu tu cua tuan
     * @param $year
     * @param $week
     * @return array
     */
    function getWeekDates($year, $week)
    {
        $arr_time = array();
        $arr_time['from_day'] = date("Y/m/d", strtotime("{$year}-W{$week}-1")); //Returns the date of monday in week
        $arr_time['to_day'] = date("Y/m/d", strtotime("{$year}-W{$week}-7")); //Returns the date of sunday in week
        return $arr_time;
    }

    /**
     * Ham lay ngay thang nam cua ngay bat dau va ngay ket thuc cua 1 thang dua vao nam va thang
     * @param $year
     * @param $month
     * @return array
     */
    function getMonthDates($year, $month)
    {
        $arr_time = array();
        $arr_time['from_day'] = date('Y/m/d', mktime(0, 0, 0, $month, 1, $year));
        $arr_time['to_day'] = date('Y/m/t', mktime(0, 0, 0, $month, 1, $year));
        return $arr_time;
    }
}
