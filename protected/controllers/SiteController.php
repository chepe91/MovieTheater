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

	public function actionLogin(){

		
		header('Content-type: application/json');

		$username = isset($_POST['cEmail'])?$_POST['cEmail'] : null;
		$password = isset($_POST['cPassword'])?$_POST['cPassword'] : null;


		
		//$identity=new UserIdentity($username,$password);

		$Result = true;

		// if($identity->authenticate()){
		//     Yii::app()->user->login($identity);
		//     $Result = true;
		// }
	    
	    echo CJavaScript::jsonEncode(array('result' => $Result));

	}

	public function actionLogout(){
		header('Content-type: application/json');

		Yii::app()->user->logout();

	    echo CJavaScript::jsonEncode(array('result' => true ));
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

	public function actionCookie(){
		header('Content-type: application/json');

	    echo CJavaScript::jsonEncode(array('Cookie' => crypt( mt_rand(1,999999), 'llavedeecriptacionparalascookies')));
	}


	/**
	 * Displays the contact page
	 */
	

	
}