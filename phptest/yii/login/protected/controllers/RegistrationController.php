<?php

class RegistrationController extends Controller {

    public function actionRegister() {
        $model = new Registration();
        if (isset($_POST['Registration'])) {
            $model->attributes = $_POST['Registration'];
                if ($model->save()) {
                   $this->redirect(array('viewdetail','id'=>$model->id));
                }
                // $this->refresh();
        }
        $this->render('register', array('model' => $model));
    }

    public function actionViewdetail($id) {
           $this->render('viewdetail',array(
            'model'=>$this->loadModel($id)
        ));
//          $model = Registration::model()->findAllByPk(array(1,2,3));
//                                  
//        $this->render('viewdetail', array('model' => $model));
    }
   //this action for popup window 
    public function actionViewData($id){
         $this->renderPartial('viewdetail',array(
            'model'=>$this->loadModel($id)
        ));
    }
    public function actionEdit(){
        $model = Registration::model()->findAll();
                                 
      $this->render('edit', array('data' => $model));
    }
    
    public function actionUpdate($id){
        $model = $this->loadModel($id);
        if (isset($_POST['Registration'])) {
            $model->attributes = $_POST['Registration'];            
                if ($model->save()) {
                   $this->redirect(array('edit'));
                }
        }
        $this->render('update', array('model'=>$model));
    }
    
    public function actionDelete($id){
//        $model = $this->loadModel($id)->delete();
//        $this->redirect(array("edit"));
        $this->loadModel($id)->delete();
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('edit'));
    }

    public function loadModel($id)
    {
        $model=Registration::model()->findByPk($id);
        if($model===null){
            throw new CHttpException(404,'The requested page does not exist.');
            }
        return $model;
    }


}
