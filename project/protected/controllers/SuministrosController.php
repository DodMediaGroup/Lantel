<?php

class SuministrosController extends Controller
{
	public function actionView($id){
		$post = $this->loadModel($id);

		$this->render('view', array(
			'post'=>$post
		));
	}

	private function loadModel($id)
    {
        $model=Posts::model()->findByAttributes(array('post__url'=>$id, 'category'=>6, 'status'=>1));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}