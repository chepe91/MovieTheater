<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>




<div class="PeliculaForm">
	<h2 class="forms-controls"><?php echo $DatosPelicula->cTitulo ?></h2>
	<div class="row">
		<div class="col-sm-3 col-sm-offset-1">
			<img src="<?php echo Yii::app()->request->baseUrl;echo '/images/poster/'.$DatosPelicula->cImagenPoster ?>" alt="..." class="img-thumbnail">
		</div>

		<div id="infoPelicula" class="col-sm-4 form-horizontal">
			<div class="form-group">
				<label class="control-label">Título Original: </label>
				<span><?php echo $DatosPelicula->cTituloOriginal?>.</span>
			</div>
			<div class="form-group">
				<label class="control-label">Actores: </label>
				<span><?php echo $DatosPelicula->cActores?>.</span>
			</div>
			<div class="form-group">
				<label class="control-label">Director: </label>
				<span><?php echo $DatosPelicula->cDirector?>.</span>
			</div>
			<div class="form-group">
				<label class="control-label">Año: </label>
				<span><?php echo $DatosPelicula->nYear?>.</span>
			</div>
			<div class="form-group">
				<label class="control-label">Clasificación: </label>
				<span><?php echo $DatosPelicula->cClasificacion?>.</span>
			</div>
			<div class="form-group">
				<label class="control-label">Duración: </label>
				<span><?php echo $DatosPelicula->nDuracionMins?> mins.</span>
			</div>
			<div class="form-group">
				<label class="control-label">Género: </label>
				<span><?php echo $DatosPelicula->cActores?>.</span>
			</div>
			<div class="form-group">
				<label class="control-label">Idioma: </label>
				<span><?php echo $DatosPelicula->cIdioma?>.</span>
			</div>
		</div>

		<div class="col-sm-4" style="padding: 25px;padding-top: 0px;">
			<div class="col-sm-12 infoSalas">
				<div class="row" style="margin-bottom:5px;">
					<div class="well well-sm">Sala 1</div>
					<div class="salasxPelicula">
						<ul>
							<li data-toggle="tooltip" data-placement="left" title="Click para comprar boletos"><i class="fa fa-clock-o"></i> 7:20</li>
							<li><i class="fa fa-clock-o"></i> 7:20</li>
							<li><i class="fa fa-clock-o"></i> 7:20</li>
							<li><i class="fa fa-clock-o"></i> 7:20</li>
							<li><i class="fa fa-clock-o"></i> 7:20</li>
						</ul>
					</div>
				</div>
				<div class="row" style="margin-bottom:5px;">
					<div class="well well-sm">Sala 2</div>
					<div class="salasxPelicula">
						<ul>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
						</ul>
					</div>
				</div>
				<div class="row" style="margin-bottom:5px;">
					<div class="well well-sm">Sala 2</div>
					<div class="salasxPelicula">
						<ul>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
							<li><i class="fa fa-clock-o"></i> 2:20</li>
						</ul>
					</div>
				</div>

			</div>
		</div>


	</div>


	<div class="row ">
		<h2>Sala 1</h2>
		<div class="salasxPelicula col-sm-offset-1">


			<ul>
				<li><i class="fa fa-clock-o"></i>7:20</li><li>7:20</li><li>7:20</li>
			</ul>
			

		</div>


	</div>

</div>


