<?php
/* @var $this ProductsController */

$this->breadcrumbs=array(
	'Products',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php 
$form=$this->beginWidget('CActiveForm',array(
    
    'enableClientValidation'=>true,'htmlOptions'=>array('enctype'=>'multipart/form-data')));
?>
<table>

<tr>
<td><?php echo $form->label( $model,'category',array('class'=>'lbl'));?></td>
<td><?php echo $form->dropDownList($model,'category',array(''=>'Select Category','book'=>'Book'));?><span><?php echo $form->error($model,'category');?></span></td>
</tr>
<tr>
<td><?php echo  $form->label($model,'name',array('class'=>'lbl'));?></td>
<td><?php echo  $form->textField($model,'name',array('placeholder'=>'Enter Title of The Book'));?><span><?php echo $form->error($model,'name');?></span></td>
</tr>
<tr>
<td><?php echo  $form->label($model,'author',array('class'=>'lbl'));?></td>
<td><?php echo  $form->textField($model,'author',array('placeholder'=>'Enter Author of The Book'));?><span><?php echo $form->error($model,'author');?></span></td>
</tr>
<tr>
<td><?php echo  $form->label($model,'publisher',array('class'=>'lbl'));?></td>
<td><?php echo  $form->textField($model,'publisher',array('placeholder'=>'Enter Publisher of The Book'));?><span><?php echo $form->error($model,'publisher');?></span></td>
</tr>
<tr>
<td><?php echo  $form->label($model,'edition',array('class'=>'lbl'));?></td>
<td><?php echo  $form->textField($model,'edition',array('placeholder'=>'Enter Edition of The Book'));?><span><?php echo $form->error($model,'edition');?></span></td>
</tr>
<tr>
<td><?php echo  $form->label($model,'price',array('class'=>'lbl'));?></td>
<td><?php echo  $form->textField($model,'price',array('placeholder'=>'Enter Price of The Book'));?><span><?php echo $form->error($model,'price');?></span></td>
</tr>
<tr>
<td><?php echo  $form->label($model,'image',array('class'=>'lbl'));?></td>
<td><?php echo  $form->fileField($model,'image');?> <span><?php echo $form->error($model,'image');?></span><span><img class="img-admin" src="<?php echo yii::app()->params['frontendUrl'].'/images/'.$model->image;?>" /></span></td>
</tr>
<tr>
<td colspan="2"><?php echo  CHtml::submitButton('Update');?></td>
</tr>
<tr></tr>
</table>
<?php
$this->endWidget();
?>