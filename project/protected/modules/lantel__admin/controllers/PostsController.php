<?php

class PostsController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='/layouts/main';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array(
                    'admin',
                    'create',
                    'view',
                    'update',
                    'status',
                    'delete_post'
                ),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $scriptsAdd = array(
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/jquery-datatables/css/dataTables.bootstrap'
            ),
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/js/jquery.dataTables.min'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/js/dataTables.bootstrap'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min'
            )
        );
        $this->addScripts($scriptsAdd);
        $this->writeScripts();

        $posts = Posts::model()->findAll(array('condition'=>'t.status != 2', 'order'=>'t.id_post DESC'));

        $this->render('admin',array(
            'posts'=>$posts,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $scriptsAdd = array(
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/ckeditor'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model=new Posts;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Posts']))
        {
            $errors = false;

            $model->attributes=$_POST['Posts'];
            $model->date = new CDbExpression('now()');

            $model->post__url = MyMethods::normalizarUrl(strip_tags($model->title));
            $existUrl = Posts::model()->findAllByAttributes(array('post__url'=>$model->post__url));
            if(count($existUrl) > 0)
                $model->post__url = (count($existUrl) + 1).'_'.$model->post__url;

            $model->clearErrors();

            if($model->validate(null, false)){
                if(($_FILES['image']['size'] > 0)){
                    $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                    
                    $uploadLogo = MyMethods::uploadImage($_FILES['image'], 200, 'posts/');

                    if(!$uploadLogo['status']){
                        $model->addError('image', $uploadLogo['message']);
                        $errors = true;
                    }
                    else{
                        $model->image = $uploadLogo['imageName'];

                        MyMethods::resizeImage($server.'posts/', $model->image, 150, 150);
                        MyMethods::resizeImage($server.'posts/', $model->image, 300, 300);
                    }
                }

                /*if($_FILES['file']['size'] > (2048*1024)){
                    $model->addError('file', 'El archivo es demasiado pesado!!!');
                    $errors = true;
                }
                else if(($_FILES['file']['size'] > 0)){
                    $model->file = MyMethods::uploadFile($_FILES['file'],'files/');
                }*/

                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->id_post));
                }
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->writeScripts();

        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $scriptsAdd = array(
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/ckeditor'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Posts']))
        {
            $errors = false;

            $model->attributes=$_POST['Posts'];

            $model->post__url = MyMethods::normalizarUrl(strip_tags($model->title));
            $existUrl = Posts::model()->findAllByAttributes(array('post__url'=>$model->post__url), array('condition'=>'t.id_post != '.$model->id_post));
            if(count($existUrl) > 0)
                $model->post__url = (count($existUrl) + 1).'_'.$model->post__url;

            $model->clearErrors();

            if($model->validate(null, false)){
                if(($_FILES['image']['size'] > 0)){
                    $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                    $currentImage = $model->image;
                    
                    $uploadLogo = MyMethods::uploadImage($_FILES['image'], 200, 'posts/');

                    if(!$uploadLogo['status']){
                        $model->addError('image', $uploadLogo['message']);
                        $errors = true;
                    }
                    else{
                        $model->image = $uploadLogo['imageName'];
                        MyMethods::resizeImage($server.'posts/', $model->image, 150, 150);
                        MyMethods::resizeImage($server.'posts/', $model->image, 300, 300);

                        if($currentImage != ""){
                            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/posts/".$currentImage);
                            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/posts/150x150/".$currentImage);
                            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/posts/300x300/".$currentImage);
                        }
                    }
                }

                /*if($_FILES['file']['size'] > (2048*1024)){
                    $model->addError('file', 'El archivo es demasiado pesado!!!');
                    $errors = true;
                }
                else if(($_FILES['file']['size'] > 0)){
                    $current = $model->file;
                    $model->file = MyMethods::uploadFile($_FILES['file'],'files/');
                    @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/files/".$current);
                }*/

                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->id_post));
                }
            }
        }

        $postsCurrent = Posts::model()->findAll(array('condition'=>('t.id_post!='.$id.' AND status != 2'),'order'=>'t.title ASC'));

        $this->render('update',array(
            'model'=>$model,
            'postsCurrent'=>$postsCurrent
        ));
    }

    public function actionStatus($id){
        $post = $this->loadModel($id);
        if($post->status == 1)
            $post->status = 0;
        else if($post->status == 0)
            $post->status = 1;
        else
            throw new CHttpException(404,'The requested page does not exist.');

        $post->save();
        $this->redirect(array('admin'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_post($id)
    {
        $post = $this->loadModel($id);

        $post->status = 2;
        if($post->save()){
            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/posts/".$post->image);
            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/posts/150x150/".$post->image);
            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/posts/300x300/".$post->image);
        }

        $this->redirect(array('admin'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Posts the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Posts::model()->findByAttributes(array('id_post'=>$id), array('condition'=>'t.status != 2'));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Posts $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='Posts-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}