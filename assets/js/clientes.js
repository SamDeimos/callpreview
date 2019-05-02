//Cargar datos a modal Delete
$('#deleteModal').on('show.bs.modal', function (event) {
	let button = $(event.relatedTarget);
	let id = button.data('id');
	$('#idDelete').val(id);
});

//Eliminar datos
$('#form-delete').submit(function (event) {
	event.preventDefault();
	$.ajax({
		type: 'POST',
		url: baseurl+'admin/clientes/DeleteClient',
		data: $(this).serialize(),
		success: function(data){
			console.log(data);
			if(data == 'success') {
				output = '<div role="alert"  class="alert alert-success">'+
					'<strong>Buen trabajo!</strong> Usuario Eliminado Exitosamente.'+
					'</div>';
				$('#resultado').html(output);
				$('#deleteModal').modal('hide');
				Tableclient.ajax.reload( null, false );
				hiddenAlert();
			}},
	});
});

//Insertar Cliente DB
$(document).ready(function(){
	$('#form-new-cliente').submit(function(event){
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data){
				console.log(data);
				if(data == 'success') {
					let output = '<div role="alert"  class="alert alert-success">'+
							'<strong>Buen trabajo!</strong> Usuario agregado Exitosamente.'+
							'</div>';
					$('#resultado').html(output);
					$('#clientModalNew').modal('hide');
					$('#form-new-cliente')[0].reset();
				}else{
					let output = '<div role="alert"  class="alert alert-danger">'+
							'<strong>Error!</strong> '+ data + '</div>';
					$('#resultado').html(output);
				}
				hiddenAlert();
				Tableclient.ajax.reload( null, false );
			},
			error: function(data){
				output = '<div role="alert"  class="alert alert-danger">'+
					'<strong>Error fatal!</strong> No se enviaron datos.'+
					'</div>';
				$('#resultado').html(output);
				hiddenAlert();
			}
		});
	});
});

//Cargar datos a modal Editar Cliente
$('#clientModalEdit').on('show.bs.modal', function (event) {
	let button = $(event.relatedTarget);
	let id = button.data('id');
	$('#clIdedit').val(id);
	let parametros = { 'id_client_edit' : id};
	$.ajax({
		type: 'POST',
		url: baseurl+"admin/clientes/FindClientID",
		data: parametros,
		cache: false,
		success: function (data) {
			let result = jQuery.parseJSON(data);
			$('#clCedulaedit').val(result.dni);
			$('#clNombresedit').val(result.nombres);
			$('#clEmailedit').val(result.email);
			$('#clTeledit').val(result.tel);
			$('#clFecNacedit').val(result.fec_nac);
			$('#clLvlformedit').val(result.id_lvlformacion);
			$('#clAddressedit').val(result.address);
			$('#clGeneroedit'+result.id_genero).prop('checked', true);
			$('#clStatusciviledit'+result.id_statuscivil).prop('checked', true);
		}
	});
    $('#userModalEditLabel').html('Actualizar Usuario '+id);
    // $('#clFecNacedit').datepicker({
	// 	format: 'yyyy-mm-dd',
	// 	language: "es"
	// });
});

//Editar Usuarios DB
$(document).ready(function(){
	$('#form-edit-cliente').submit(function(event){
        event.preventDefault();
        console.log($(this).serialize());
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
            data: $(this).serialize(),
			success: function(data){
				if(data == 'success') {
					let output = '<div role="alert"  class="alert alert-success">'+
						'<strong>Buen trabajo!</strong> Usuario editado Exitosamente.'+
						'</div>';
					$('#resultado').html(output);
					$('#clientModalEdit').modal('hide');
					$('#form-edit-cliente')[0].reset();
				}else{
					let output = '<div role="alert"  class="alert alert-danger">'+
						'<strong>Error!</strong> Usuario Ya ingresado.'+
						'</div>';
					$('#resultado').html(output);
				}
				hiddenAlert();
				Tableclient.ajax.reload( null, false );
			},
			error: function(data){
				output = '<div role="alert"  class="alert alert-danger">'+
					'<strong>Error fatal!</strong> No se enviaron datos.'+
					data+
					'</div>';
				$('#resultado').html(output);
				hiddenAlert();
			}
		});
	});
});

//Creamos data table de de nuestra tabla
//@Tablecliente
$(document).ready(function(){
	$('#Tablecliente').DataTable({
		language: {
			url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		}
	});
});
//Data Table
// var Tableclient = $('#Tableclient').DataTable( {
// 		"language": {
// 			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
// 		},
// 		"ajax": {
// 			"url" : baseurl+"clientes/ClientTable",
// 			"type" : "POST",
// 			dataSrc: ''
// 		},
// 		"columns" : [
// 			{data: 'id_cliente'},
// 			{data: 'nombres'},
// 			{data: 'dni'},
// 			{data: 'genero'},
// 			{data: 'email'},
// 			{data: 'tel'},
// 			{data: 'address'},
// 			{data: 'estado'},
// 			{"orderable": true,
// 				render:function (data, type, row) {
// 					var lvluser = $('#lvluser').html();
// 					if(lvluser < 9){
// 						return '<a href="#" data-toggle="modal" data-target="#clientModalEdit" data-id="'+row.id_cliente+'"><i class="far fa-edit"></i></a>'+
// 							'<i class="far fa-trash-alt"></i>';
// 					}else{
// 						return '<a href="#" data-toggle="modal" data-target="#clientModalEdit" data-id="'+row.id_cliente+'"><i class="far fa-edit"></i></a>'+
// 							'<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="'+row.id_cliente+'"><i class="far fa-trash-alt"></i></a>';
// 					}
// 				},
// 				"className": "text-center"
// 			}
// 		],
// 	});

//Validar datos de usuario SRI
function ValidateUserSRI(){
	let Dni = $('#clCedula').val();
	let parametros = { 'dni-validate' : Dni};
	$.ajax({
		type: "POST",
		url: baseurl+'Tools/VerifyDataSRI',
		data: parametros,
		async: true,
		beforeSend:function(){
            $('#ValidateDni').attr('class', 'fa fa-gears');
		},
		success: function (data) {
		    let result = jQuery.parseJSON(data);
		    if(result != null){
                let name = result.nombreCompleto;
                if(name){
                    $('#clNombres').val(name);
                    $('#ValidateDni').attr('class', 'fa fa-check');

                }else{
                    $('#ValidateDni').attr('class', 'fa fa-times');
                }
            }else{
                $('#ValidateDni').attr('class', 'fa fa-times');
            }
		}
	});
}

//Validar datos usuario Debounce
function ValidateUserDebounce(){
	let Email = $('#clEmail').val();
	let parametros = { 'email-validate' : Email};
	console.log(parametros);
	$.ajax({
		type: "POST",
		url: baseurl+'Tools/VerifyDataDebounce',
		data: parametros,
		async: true,
		beforeSend:function(){
			$('#ValidateEmail').attr('class', 'fa fa-gears');
		},
		success: function (data) {
			console.log('Datos de respuesta:');
			let resultjson = jQuery.parseJSON(data);
			let result =  resultjson.debounce.result;
			if (result === 'Safe to Send'){
                $('#ValidateEmail').attr('class', 'fa fa-check');
            }else{
                console.log(result);
                $('#ValidateEmail').attr('class', 'fa fa-times');
            }
		}
	});
}

//Campo de fecha
$('#fec_nac').datepicker({
	format: 'yyyy-mm-dd',
	language: "es"
});

//bootstrap-select

$("#cedula").select2({
    theme: "bootstrap",
    tags: true,
    createTag: function (params) {
      return {
        id: params.term,
        text: params.term,
        newOption: true
      }
    },
    templateResult: function (data) {
      var $result = $("<span></span>");
      $result.text(data.text);
  
      if (data.newOption== true) {
        $result.append(" <em>(Crear cliente)</em>");
      }
      return $result;
    },
    containerCssClass: "input-sm",
    minimumResultsForSearch: 5
  });

  $('#cedula').on('select2:select', function (e) {
    var data = e.params.data;
    let array = data.text.split('-');
    let id = array[2].replace('#', '').trim();
    console.log(id);
    if(id > 0){
        location.href = baseurl+"clientes/cliente/"+id;
    }
  });


