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

		$username = isset($_POST['cEmail'])? $_POST['cEmail'] : null;
		$password = isset($_POST['cPassword'])?$_POST['cPassword'] : null;

		$identity= new UserIdentity($username,$password);

		$Result = false;

		 if($identity->authenticate()){
		     Yii::app()->user->login($identity);
	     	$Result = true;
	    }
	    
	    echo CJavaScript::jsonEncode(array('result' => $Result , 'u' => $username , 'p' => $password ));

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

	public function actionRegistro(){

		if(!Yii::app()->user->isGuest)
			$this->render('Index',array());
		else
			$this->render('Registro',array());
	}

	public function actionRegistrarme(){
		header('Content-type: application/json');
		$model=Usuario::model();
		$transaction=$model->dbConnection->beginTransaction();

		$Result = false;
		$Mensaje = '';
		
		$Usuario = new Usuario;
		
		try
		{
			$Usuario->cEmail = isset($_POST['cEmailR'])? $_POST['cEmailR'] : null;
			$Usuario->cPassword = isset($_POST['cPasswordR'])? $_POST['cPasswordR'] : null;
			
			$Usuario->cPassword = crypt($Usuario->cPassword,$Usuario->cPassword);

			$Usuario->cNombre = isset($_POST['cNombre'])? $_POST['cNombre'] : null;

			$Usuario->cApellidoPaterno = isset($_POST['cPaterno'])? $_POST['cPaterno'] : null;
			$Usuario->cApellidoMaterno = isset($_POST['cMaterno'])? $_POST['cMaterno'] : null;
			$Usuario->Sexo = isset($_POST['Sexo'])? $_POST['Sexo'] : null;
			$Usuario->nTarjetaCine = isset($_POST['nTarjeta']) && $_POST['nTarjeta']!= "" ? $_POST['nTarjeta'] : null;

			$Usuario->save();
			$transaction->commit();

			$Result = true;
			$Mensaje = 'Felicidades te has registrado con éxito';
		}
		catch(Exception $e){
				
			 $transaction->rollBack();
			 if( $e->getMessage() =="CDbCommand failed to execute the SQL statement: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '' for key 'cEmail'. The SQL statement executed was: INSERT INTO `Usuario` (`cEmail`, `cPassword`, `cNombre`, `cApellidoPaterno`, `cApellidoMaterno`, `nTarjetaCine`) VALUES (:yp0, :yp1, :yp2, :yp3, :yp4, :yp5)" )
			 	$Mensaje = 'El correo ya existe';
			 else 
			 	$Mensaje = 'Ocurrió un error favor intentarlo mas tarde.';
		}

		 echo CJavaScript::jsonEncode(array('result' => $Result , 'Msg' => $Mensaje , 'error'=> $Usuario->getErrors()));
	}

	public function actionCookie(){
		header('Content-type: application/json');

	    echo CJavaScript::jsonEncode(array('Cookie' => crypt( mt_rand(1,999999), 'llavedeecriptacionparalascookies')));
	}


	/**
	 * Displays the contact page
	 */
	

	
}