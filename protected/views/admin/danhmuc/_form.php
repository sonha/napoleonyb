<?php
/* @var $this DanhmucController */
/* @var $model Danhmuc */
/* @var $form CActiveForm */
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'income-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'inlineErrors' => true
)); ?>
<div class="widget-box">
    <div class="widget-title">
        <span class="icon"><i class="icon-info-sign"></i></span>
        <h5>Thêm khoản chi mới</h5>
    </div>
    <div class="widget-content nopadding">
        <?php
        //        echo $form->errorSummary($model);
        echo $form->textFieldRow($model, 'name');
        echo $form->dropDownListRow($model, 'parent_id',
            CHtml::listData(Danhmuc::model()->findAll('parent_id IS NULL'),'id', 'name'),  array('prompt'=>'Chọn danh mục cha'));
        echo $form->textFieldRow($model, 'slug');
        echo $form->textFieldRow($model, 'description');
        ?>
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Thêm mới', 'htmlOptions' => array('name' => 'submit'))); ?>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->