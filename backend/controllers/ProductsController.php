<?php

class ProductsController extends Controller
{
   
        public function actionIndex()
	{
		$count=Products::model()->countByAttributes(array());
		$booklist=Products::model()->with('pid')->findAll();
               // echo "<pre>";print_r($booklist);die;
		$this->render('index',array('model'=>$booklist,'count'=>$count));
	}
    public function actionAddproduct()
	{
	  $model=new Products;
	  if(isset($_POST['Products']))
	  {
		  $model->attributes=$_POST['Products'];
		  if($model->validate())
		  {   
	                  $uploadedFile=CUploadedFile::getInstance($model,'image');
			  $ext=explode('.',$uploadedFile);
			  $ext=array_pop($ext);
			  $filename=time().'.'.$ext;
			  $model->image=$filename;
			  $path=Yii::app()->basepath .'\\..\\frontend\\www\\images\\'.$filename;
			  if($model->save() && $uploadedFile)
			  {
				  $uploadedFile->saveAs($path);				  
			  }
			  else
			  {   
		          $model->image='';
				  $model->save();
			  }
				  
		  }
		  
	  }
      $this->render('addproduct',array('model'=>$model));		
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function actionEdit($id)
	{    
            $model=Products::model()->findByPk($id);
	    if(isset($_POST['Products']))
		{
                //$model->scenario('onchange');
                if($model->validate())
		  {
                    $model->attributes=$_POST['Products'];
                    $uploadFile=  CUploadedFile::getInstance($model,'image');
                    $ext=  explode('.', $uploadFile);
                    $ext=  array_pop($ext);
                    $filename=time().'.'.$ext;
                    if($uploadFile)
                    $model->image=$filename;
                    $path=Yii::app()->basepath .'\\..\\frontend\\www\\images\\'.$filename;
                    if($model->update() && $uploadFile)
                       $uploadFile->saveAs($path);
                  else
                      $model->update();
		}
                }
		 $this->render('editproduct',array('model'=>$model));
	}
	public function actionDelete()
	{   
	        $id=$_REQUEST['id'];
		$post=Products::model()->deleteByPk($id);
	}
}