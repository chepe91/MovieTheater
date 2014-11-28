
<div class="row">

<div clas="row" style="background-color:white;">
<?php 
	
	$Contador = 0;
	$Pagina= 1;

	foreach ($ListaGanado as $Ganado) {
	
	$Contador++;
	if($Contador > 4){
		$Contador= 1;
		$Pagina++;
	}

?>

	<div class="Page-<?php echo $Pagina ?>" "<?php if($Pagina != 1) { ?> style="display:none;" <?php } ?>" >

		<div class="col-md-6" style="padding:50px;">
			<div id="Ganado-<?php echo $Ganado->Id ?>" class="SeleccionarGanado row margs-0" style="border:2px solid #ddd;height:300px;border-radius: 5px;cursor: pointer;">
				<div class="col-md-6">
					<div class="row mrgs-0" style="margin-top: 20px;" >
						<label>Raza: </label>
						<span><?php echo $Ganado->Raza ?></span>
					</div>
					<div class="row mrgs-0" >
						<label>Nombre: </label>
						<span><?php echo $Ganado->Nom ?></span>
					</div>
					<div class="row mrgs-0" >
						<label>Fecha nacimiento: </label>
						<span><?php echo $Ganado->FechaNacimiento ?></span>
					</div>
					<div class="row mrgs-0" >
						<label>Peso: </label>
						<span><?php echo $Ganado->Peso ?> kg.</span>
					</div>

					<div class="row mrgs-0" >
						<label>Descripción: </label>
						<span><?php echo utf8_encode($Ganado->Descripcion) ?></span>
					</div>
				</div>

				<div class="col-md-6">
			 		<img clss="img-responsive" height='250px;' style="width:100%;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/Ganado/<?php echo $Ganado->Imagen?>" />		
			    </div>
		    </div>
		</div>
	</div>

<?php
		
	}

?>
</div>




</div>


<div class="container">
   <div class="row">
		<ul class="pagination  pagination-lg" style="  padding: 1em 3em;margin: 1em 38%;">
		  
		  
		  <li id="Pagina-1" class="SelectPage active"><a>1</a></li>
		  <?php for($i = 2; $i <= $Pagina; $i++) { ?>
  				<li id="Pagina-<?php echo $i?>" class="SelectPage"><a><?php echo $i?></a></li>
		  <?php } ?>
		
		</ul>
   </div>


</div>

<div class="row" style="margin-bottom:20px;">
	<div class="col-md-2 col-md-offset-3"> 
		<span id="GenerarPdfSeleccionados" class="btn btn-info btn-lg">Generar descripcion(elementos seleccionados)</span>
	</div>
	<div class="col-md-2 col-md-offset-2"> 
		<span id="GeneraPdf" class="btn btn-success btn-lg">Generar descripcion(todos)</span>
	</div>
</div>

<input id="PaginaActual" type="hidden" value="1" > 









<form id="Pls" action="/meat/index.php?r=site/GenerarPdf" method="POST"></form>

<form id="PDFSeleccionados" action="/meat/index.php?r=site/GenerarPdfSeleccionados" method="POST">
	<input id="Ids" type="hidden" name="Ids"  >
</form>

<!-- Modal -->
<div class="modal fade" id="ModalLoading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
	       
		

			<div class="progress-striped active progress ng-isolate-scope" value="dynamic" type="primary" style="height:30px;">
			<div class="progress-bar progress-bar-primary" ng-class="type &amp;&amp; 'progress-bar-' + type" ng-transclude="" style="width: 100%;">
			<span class="ng-scope ng-binding" style="font-size:30px;">Cargando</span><i ng-show="showWarning" class="ng-scope ng-hide"></i></div></div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div  class="modal-body">
	       <label>No hay elementos seleccionados</label>
			
      </div>
      <div class="modal-footer">
  		 	<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
	
var ElementosSeleccionados = "";


$(document).ready(function(){

	$("#ModalLoading").modal({
		backdrop:false,
		show:false
	});

	$("#Error").modal({
		backdrop:false,
		show:false
	});

	$(".SelectPage").click(function(){
		var NumPagina = this.id.replace('Pagina-',''); 
		var PaginaActual = $("#PaginaActual").val();
		

		$("#Pagina-"+PaginaActual).removeClass('active');
		$("#Pagina-"+NumPagina).addClass('active');

		$(".Page-"+PaginaActual).fadeOut(500,function(){
			$(".Page-"+NumPagina).fadeIn(500,function(){});
		});

		$("#PaginaActual").val(NumPagina);

	});

	$(".SeleccionarGanado").click(function(){
		
		var nSelecionado = this.id.replace('Ganado-','');
		debugger
		var Arreglo = ElementosSeleccionados.split(',');

		if(ElementosSeleccionados == ""){
			ElementosSeleccionados = nSelecionado+"";
			$("#"+this.id).addClass('SelectedItem');
			$("#GenerarPdfSeleccionados").fadeIn(500);
			return;
		}

		ElementosSeleccionados = "";
		var On = false;
		for(i=0;i< Arreglo.length ;i++){

			if(Arreglo[i] == nSelecionado){
				On = true;
			}
			else{
				ElementosSeleccionados+= ","+Arreglo[i];
			}

		}

		if(!On){
			ElementosSeleccionados+= ","+nSelecionado;
			$("#"+this.id).addClass('SelectedItem');
		}
		else{
			$("#"+this.id).removeClass('SelectedItem');
		}

		if(ElementosSeleccionados!=""){
			ElementosSeleccionados = ElementosSeleccionados.substring(1,ElementosSeleccionados.length);	
		}
		


	});



	$("#GenerarPdfSeleccionados").click(function(){

		if(ElementosSeleccionados == ""){
			$("#Error").modal('show');
			return;
		}

		$("#Ids").val(ElementosSeleccionados);

		$("#PDFSeleccionados").submit();

	});

	$("#GeneraPdf").click(function(){

		$("#ModalLoading").modal('show');
		
		$("#Pls").submit();


		setTimeout(function(){ $("#ModalLoading").modal('hide'); }, 3000);
		//$("#ModalLoading").modal('hide');
/*
		$.ajax({
	      type: "POST",
	      url:    "/meat/index.php?r=site/GenerarPdf",
	      data:  {},
	      dataType:'json',
	      success: function(msg){
	       //    window.open(msg);
          },
	      error: function(xhr){
	      alert("failure"+xhr.readyState+this.url)

	      }
	    });*/

	});


});

</script>
