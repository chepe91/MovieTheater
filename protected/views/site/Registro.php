
<div class="RegistroForm"	style="">
	
	<h2 id="forms-controls" style="padding-top:45px;">Bienvenido al registro</h2>

	<form class="form-horizontal" role="form" style="padding-top:15px;">
		<div class="form-group">
			<label for="cEmailR" class="col-sm-4 control-label">Email</label>
			<div class="col-sm-5">
				<input type="email" class="form-control" id="cEmailR" placeholder="Email" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="cPasswordR" class="col-sm-4 control-label">Password</label>
			<div class="col-sm-5">
				<input type="password" class="form-control" id="cPasswordR" placeholder="Password" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="cNombre" class="col-sm-4 control-label">Nombre</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="cNombre" placeholder="Nombre" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="cPaterno" class="col-sm-4 control-label">Apellido paterno</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="cPaterno" placeholder="Apellido paterno" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="cMaterno" class="col-sm-4 control-label">Apellido materno</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="cMaterno" placeholder="Apellido materno" maxlength="50">
			</div>
		</div>
		<div class="form-group">
			<label for="nTarjeta" class="col-sm-4 control-label">Tarjeta cine</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nTarjeta" placeholder="Tarjeta cine" maxlength="20">
			</div>
		</div>
		<div class="form-group">
			<div id="form-sexo" class=" col-sm-offset">
				<label class="radio-inline">
				  <input type="radio" name="Sexo" id="inlineRadio2" value="0"> Hombre
				</label>
				<label class="radio-inline">
				  <input type="radio" name="Sexo" id="inlineRadio3" value="1"> Mujer
				</label>
			</div>
		</div>

		

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<span id="btn_Registrar" class="btn btn-primary">Registrarme</span>
			</div>
		</div>
	</form>



</div>



<script type="text/javascript">

$(document).ready(function(){

	
	$("#btn_Registrar").click(function(){

		params = {
			cEmailR : $("#cEmailR").val(),
			cPasswordR : $("#cPasswordR").val(),
			cNombre : $("#cNombre").val(),
			cPaterno : $("#cPaterno").val(),
			cMaterno : $("#cMaterno").val(),
			Sexo : $('input[name="Sexo"]:checked', '#form-sexo').val(),
			nTarjeta : $("#nTarjeta").val()
		};
	
		jQuery.ajax({
			'type':'POST',
			'data':params,
			'url':'/MovieTheater/index.php/site/Registrarme',
			'cache':false,
			success: function(response){
	       		
				if(response.result)
					swal({   
						title: "Registro completo!",   
						text: "Felicidades te has registrado correctamente!",  
						type: "success",   
						showCancelButton: false, 
						confirmButtonColor: "#DD6B55", 
						confirmButtonText: "Aceptar",
						cancelButtonText: "No, cancel plx!",
						closeOnConfirm: true,
						closeOnCancel: false },
						function(isConfirm){   
							if (isConfirm) {     
								$("#IniciarSesion").click(); 
							} 
							else {    
								//swal("Cancelled", "Your imaginary file is safe :)", "error");  
							} 
						});
				else
					sweetAlert("Error", response.Msg, "error");

          	},
	     	error: function(xhr){
		      	alert("failure: "+xhr.readyState+this.url)

    	  	}
		});
	});

});


	

</script>