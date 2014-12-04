$(document).ready(function() {
	$("#form").isHappy({
		fields: {
			'#div_cEmailR': {
				required: true,
				message: "Formato inválido.",
				test: isEmailValid
			},
			'#div_cPasswordR': {
				required: true,
				message: "Este campo es obligatorio."
			},
			'#div_cNombre': {
				required: true,
				message: "Este campo es obligatorio."
			},
			'#div_cPaterno': {
				required: true,
				message: "Este campo es obligatorio."
			}
		},
		submitButton: '#btn_Registrar',
		when: 'blur',
		classes: {
			field: 'has-error',
			message: 'col-sm-2 control-label text-left'
		}
	});
	$("#form-sexo").isHappy({
		fields: {
			'#form-sexo': {
				required: true,
				message: "Por favor selecciona tu sexo."
			}
		},
		submitButton: '#btn_Registrar',
		when: 'blur',
		classes: {
			field: 'has-error'
		}
	});
});



var isEmailValid = function(email) {
	debugger
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}