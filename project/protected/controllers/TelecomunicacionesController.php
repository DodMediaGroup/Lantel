<?php

class TelecomunicacionesController extends Controller
{
	public function actionView($id){
		$post = $this->loadModel($id);

		$posts = Posts::model()->findAllByAttributes(array('post__depende'=>$post->id_post));

		$this->render('view', array(
			'post'=>$post,
			'posts'=>$posts
		));
	}

	private function loadModel($id)
    {
        $model=Posts::model()->findByAttributes(array('post__url'=>$id, 'status'=>1));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}