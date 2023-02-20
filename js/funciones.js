var x = $(document).ready(eventos);

function eventos(){

	var x = $("#enviarForm").click(formularioIndex);
}

function formularioIndex(){
	var jonipoFormAjax = $("#jonipoForm").val();	
	var nombreFormAjax = $("#nombreForm").val();
	var telefonoFormAjax = $("#telefonoForm").val();
	var correoFormAjax = $("#correoForm").val();
	var asuntoFormAjax = $("#asuntoForm").val();
	var mensajeFormAjax = $("#mensajeForm").val();		

$.ajax({

	type:'POST',
	url:'funciones/procesar-contacto.php',
	data: {
		jonipoForm:jonipoFormAjax,
		nombreForm:nombreFormAjax,
		telefonoForm:telefonoFormAjax,
		correoForm:correoFormAjax,
		asuntoForm:asuntoFormAjax,
		mensajeForm:mensajeFormAjax
	},
	beforeSend: function() {
		$("#envioOk").html("<i class='fa fa-spinner fa-spin' style='font-size:24px'></i>");
	},
	success:function(mensaje){
		$("#envioOk").html(mensaje);
	}

});
return false;
}