<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',	
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	
		<?php echo $form->error($model,'username'); ?>
		<p style="margin-bottom: 30px">
        	<input type="text" id="LoginForm_username" class="full" value="" name="LoginForm[username]" required="required" placeholder="Username" />        	
        </p> 
               
        <?php echo $form->error($model,'password'); ?>
        <p style="margin-bottom: 30px">
        	<input type="password" id="LoginForm_password" class="full" value="" name="LoginForm[password]" required="required" placeholder="Password" />        	
        </p>
                
        <p class="clearfix">
        	<span class="fl" style="line-height: 23px;">
            	<label class="choice" for="remember">
                	<input type="checkbox" id="remember" class="" value="1" name="LoginForm[rememberMe]"/>
                	Remember me
                </label>
          	</span>
          	
            <button class="fr" type="submit">Đăng nhập</button>
       	</p>	
<?php $this->endWidget(); ?>
</div><!-- form -->
