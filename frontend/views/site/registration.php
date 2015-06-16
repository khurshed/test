<h1>New Registration</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'message-_messagesend-form',
    'enableAjaxValidation'=>true,
	//'action' => array( '/pages/messageSend' ),
)); ?>
<div class="error-msg">
<?php echo $form->errorSummary($model); ?>
</div>
<div class="row">
<?php echo $form->label( $model,'name', array('class'=>'lbl') ); ?>
<?php echo $form->textField($model,'name',array('placeholder'=>'Your Name')); ?>
</div>
<div class="row">
<?php echo $form->label( $model,'userid', array('class'=>'lbl') ); ?>
<?php echo $form->textField($model,'userid',array('placeholder'=>'Enter Your Email'));?>
</div>
<div class="row">
<?php echo $form->label( $model,'password', array('class'=>'lbl') ); ?>
<?php echo $form->textField($model,'password',array('placeholder'=>'Create Password')); ?>
</div>
<div>
<?php echo  CHtml::submitButton('Create User', array('confirm'=>'You agree to the term to register.\n\nPress OK to continue.'));?>
</div>
<?php $this->endWidget(); ?>
