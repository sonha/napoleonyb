<?php
    /* @var $this ProductController */
    /* @var $model Product */
    /* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'product-form',
    'enableAjaxValidation' => FALSE,
    'htmlOptions'          => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>


    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'categoryId'); ?>
        <?php echo $form->dropDownList($model, 'categoryId', CHtml::listData(Category::model()->findAll(), 'id', 'name')) ?>
        <?php echo $form->error($model, 'categoryId'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'avatar'); ?>
        <?php echo $form->fileField($model, 'avatar'); ?>
        <?php echo $form->error($model, 'avatar'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price'); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->checkBox($model, 'status'); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'home'); ?>
        <?php echo $form->checkBox($model, 'home'); ?>
        <?php echo $form->error($model, 'home'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'feature'); ?>
        <?php echo $form->checkBox($model, 'feature'); ?>
        <?php echo $form->error($model, 'feature'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'rank'); ?>
        <?php echo $form->textField($model, 'rank'); ?>
        <?php echo $form->error($model, 'rank'); ?>
    </div>
    <div class="row">
		<?php echo $form->labelEx($model,'short_description'); ?>
		<?php	$this->widget('application.extensions.eckeditor.ECKEditor', array(
					'model'=>$model,
					'attribute'=>'short_description',
					'config' => array(
						'height'=>300,	
					),
				)); 
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php	$this->widget('application.extensions.eckeditor.ECKEditor', array(
					'model'=>$model,
					'attribute'=>'description',
					'config' => array(
						'height'=>300,	
					),
				)); 
		?>
	</div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->