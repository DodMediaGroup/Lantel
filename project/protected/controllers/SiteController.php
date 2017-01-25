<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$slides = Posts::model()->findAllByAttributes(array('status'=>1,'category'=>3), array('order'=>'t.id_post DESC'));
		$news = Noticias::model()->findAllByAttributes(array('estado'=>1), array('order'=>'t.id DESC', 'limit'=>3));
		$this->render('index', array(
			'slides'=>$slides,
			'news'=>$news
		));
	}

	public function actionNosotros(){
		$posts = Posts::model()->findAllByAttributes(array('status'=>1,'category'=>1));
		$personas = Posts::model()->findAllByAttributes(array('status'=>1,'category'=>2));
		$this->render('nosotros',array(
			'posts'=>$posts,
			'personas'=>$personas
		));
	}

	public function actionConsultoria(){
		$posts = Posts::model()->findAllByAttributes(array('status'=>1,'category'=>4));
		$this->render('consultoria',array(
			'posts'=>$posts
		));
	}

	public function actionTelecomunicaciones(){
		$posts = Posts::model()->findAllByAttributes(array('status'=>1,'category'=>5));
		$this->render('telecomunicaciones',array(
			'posts'=>$posts
		));
	}

	public function actionSuministros(){
		$posts = Posts::model()->findAllByAttributes(array('status'=>1,'category'=>6, 'post__depende'=>null));
		$this->render('suministros',array(
			'posts'=>$posts
		));
	}

	public function actionEnergia(){
		$posts = Posts::model()->findAllByAttributes(array('status'=>1,'category'=>7, 'post__depende'=>null));
		$this->render('energia',array(
			'posts'=>$posts
		));
	}

	public function actionVentaCapacidad(){
		$this->render('ventaCapacidad');
	}
	public function actionContacto(){
		$this->showSectionContact = false;
		$this->render('contact',array(
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->layout = 'error';
				$this->render('error', $error);
			}
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		if(Yii::app()->request->isAjaxRequest){
			$arrayReturn = array(
				'status'=>false,
				'message'=>'No se pudo enviar el mensaje. Intente mas tarde.'
			);
			$emailContact = GeneralValue::model()->findByPk(1);
			$emailContent = '<p>Un usuario envio un mensaje desde el formulario de contacto de la web de Lantel.</p><br>'.
			'<p><strong>Nombre: </strong>'.trim($_POST['name']).'</p>'.
			'<p><strong>Correo electrónico: </strong>'.trim($_POST['email']).'</p>';
			if(isset($_POST['city']))
				$emailContent .= '<p><strong>Ciudad: </strong>'.trim($_POST['city']).'</p>';
			if(isset($_POST['phone']))
				$emailContent .= '<p><strong>Teléfono: </strong>'.trim($_POST['phone']).'</p>';
			$emailContent .= '<p><strong>Mensaje: </strong>'.trim($_POST['message']).'</p><br>';

			if(MyMethods::sentMail('Mensaje contacto web Lantel', $_POST['email'], $emailContact->value, $emailContent, array('fromName'=>$_POST['name']))){
				$arrayReturn = array(
					'status'=>true,
					'message'=>'Tu mensaje fue enviado con exito. Muy pronto nos comunicaremos contigo.'
				);
			}

			echo CJSON::encode($arrayReturn);
		}
		else
			throw new CHttpException(404,'The requested page does not exist.');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}