<?php

class NoticiasController extends Controller
{
	public function actionView($id){
		$id = explode('_', $id);
		$new = $this->loadModel($id[0]);

		$this->render('view', array(
			'new'=>$new
		));
	}

	private function loadModel($id)
    {
        $model=Noticias::model()->findByAttributes(array('id'=>$id, 'estado'=>1));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}