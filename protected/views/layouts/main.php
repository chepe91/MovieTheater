<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css" />

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bower_components/weather-icons/css/weather-icons.min.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="background-principal">
	<nav id="navBar" class='navbar navbar-inverse navbar-static-top' role='navigation' style='z-index:1000000;margin-bottom: 0px !important;margin:0 auto;width:70%;border-radius: 5px;margin-top: 15px;'>
		<div class='container-fluid'>
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class='navbar-header'>
				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
					<span class='sr-only'>Toggle navigation</span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
				</button>
				<a class='navbar-brand' href='<?php echo Yii::app()->request->baseUrl; ?>' style='padding: 5px 15px;margin-left:-75px;'><img style='' src='<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png' class='css-logo-btn' ></a>
			</div>
			<div id='bs-example-navbar-collapse-1'class='collapse navbar-collapse' >
				<ul class='nav navbar-nav'>
					
				</ul>
				<?php 
					if(!Yii::app()->user->isGuest) 
						//<li><span class='btn btn-icon icon icon-user just-icon'><span class='glyphicon glyphicon-shopping-cart'></span></span></li>
						echo "<ul class='nav navbar-nav navbar-right'> 
								
								<li><span href='' class='btn btn-icon icon icon-user'>
									<span class='glyphicon glyphicon-user'></span>
									Perfil
								</span></li>
							
								<li id='LogoutBtn' title='Cerrar sesion'><span href='' class='btn btn-icon icon icon-user just-icon'>
									<span class='glyphicon glyphicon-log-out'></span>
								</span></li>
							</ul>";
					else
						echo "<ul class='nav navbar-nav navbar-right'> 
								<li id='IniciarSesion'><span href='' class='btn btn-icon icon icon-user'>
									<span class='glyphicon glyphicon-user'></span>
									Ingresar
								</span></li>
								<li><a href='/MovieTheater/index.php/site/Registro' class='btn btn-icon icon icon-user'>
									<span class='glyphicon glyphicon-pencil'></span>
									Registrarse
								</a></li>
							</ul>";

				?>
				
			</div>
		</div>
	</nav>
	
		<?php echo $content; ?>
	

	<footer>
        <div class='container text-center'>
            <div class='row'>
                    <div class='col-md-4 contact-details'>
                        <h4><i class='fa fa-phone'></i> Teléfono</h4>
                        <p class='txt-center' id="cookie">
                        	
                        </p>
                    </div>
                    <div class='col-md-4 contact-details'>
                        <h4><i class='fa fa-map-marker'></i> Visit</h4>
                        <p class='txt-center'>Alvaro Obregón 49 Ote<br>Col Centro Culiacán,Sinaloa, CP 80000</p>
                    </div>
                    <div class='col-md-4 contact-details'>
                        <h4><i class='fa fa-envelope'></i> Email</h4>
                        <p class='txt-center'><a href=''>preguntas@meatdairy.com</a>
                        </p>
                    </div>
             </div>
             <div class='row social'>
                <div class='col-lg-12'>
                    <ul class='list-inline'>
                        <li><a href='http://www.facebook.com'><i class='fa fa-facebook fa-fw fa-2x'></i></a>
                        </li>
                        <li><a href='http://www.twitter.com'><i class='fa fa-twitter fa-fw fa-2x'></i></a>
                        </li>
                        <li><a href='http://www.linked.in'><i class='fa fa-linkedin fa-fw fa-2x'></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
     </footer>	



     <!-- Modal login -->
	<div class="modal fade" id="ModalLogIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <label class="modal-title control-label" id="myModalLabel">Inicio Sesion</h4>
	      </div>
	      <div class="modal-body">
	        	
	      		<div class="form-horizontal" role="form">
				  <div class="form-group">
				    <label for="cEmail" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" id="cEmail" placeholder="Introduzca su email" maxlength="50">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="cPassword" class="col-sm-2 control-label">Contraseña</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="cPassword" placeholder="Password" maxlength="30">
				    </div>
				 </div>


	      </div>
	      <div class="modal-footer">
	        <span id='LoginBtn' onclick="" class="btn btn-primary">Entrar</span>
	       
	      </div>
	    </div>
	  </div>
	</div>
</body>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery-1.11.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.cookie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/app.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/ui.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/vendor.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/Layout.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/sweet-alert.min.js"></script>


</html>
