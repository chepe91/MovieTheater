<?php





class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function accessRules()
	{
        return array(
            array('allow', 'actions'=>array(''),
            'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
	}

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
		
		$this->render('index' , array());

/*
		$criteria=new CDbCriteria;
		$criteria->select='nUser';  // seleccionar solo la columna 'title'
		$criteria->condition='nUser=:nUser';
		$criteria->params=array(':nUser'=>1);
		$Usuario=Usuario::model()->find($criteria); // $params no es necesario

*/
		

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
			else
				$this->render('error', $error);
		}
	}






	/**
	 * Displays the contact page
	 */
	

	
}