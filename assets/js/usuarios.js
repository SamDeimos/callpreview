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
		url: baseurl+'Usuarios/DeleteUser',
		data: $(this).serialize(),
		success: function(data){
			if(data == 'success') {
				output = '<div role="alert"  class="alert alert-success">'+
					'<strong>Buen trabajo!</strong> Usuario Eliminado Exitosamente.'+
					'</div>';
				$('#resultado').html(output);
				$('#deleteModal').modal('hide');
				Tableuser.ajax.reload( null, false );
				hiddenAlert();
			}},
	});
});

//Insertar Usuarios DB
$(document).ready(function(){
	$('#form-new-usuario').submit(function(event){
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data){
				if(data == 'success') {
					let output = '<div role="alert"  class="alert alert-success">'+
							'<strong>Buen trabajo!</strong> Usuario agregado Exitosamente.'+
							'</div>';
					$('#resultado').html(output);
					$('#userModalNew').modal('hide');
					$('#form-new-usuario')[0].reset();
				}else{
					let output = '<div role="alert"  class="alert alert-danger">'+
							'<strong>Error!</strong> Usuario Ya ingresado.'+
							'</div>';
					$('#resultado').html(output);
				}
				hiddenAlert();
				Tableuser.ajax.reload( null, false );
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

//Cargar datos a modal Editar Usuario
$('#userModalEdit').on('show.bs.modal', function (event) {
	let button = $(event.relatedTarget);
	let id = button.data('id');
	let parametros = { 'id_user_edit' : id};
	$.ajax({
		type: 'POST',
		url: baseurl+"admin/usuarios/FindUser",
		data: parametros,
		cache: false,
		success: function (data) {
			let result = jQuery.parseJSON(data);
			$('#usCedulaedit').val(result.dni);
			$('#usNombreedit').val(result.nombre);
			$('#usApellidoedit').val(result.apellido);
			$('#usPassedit').val(result.pass);
			$('#usAgentedit').val(result.num_agent);
			$('#usPermisosedit').val(result.id_permisos);
			$('#usEmailedit').val(result.email);
			$('#usTeledit').val(result.tel);
			$('#usEstadouseredit'+result.id_statususer).prop('checked', true);
			$('#usAddressedit').val(result.address);
			$('#usGeneroedit'+result.id_genero).prop('checked', true);
			$('#usStatusciviledit'+result.id_statuscivil).prop('checked', true);
		}
	});
	$('#userModalEditLabel').html('Actualizar Usuario '+id);
});

//Editar Usuarios DB
$(document).ready(function(){
	$('#form-edit-usuario').submit(function(event){
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data){
				console.log(data);
				if(data == 'success') {
					let output = '<div role="alert"  class="alert alert-success">'+
						'<strong>Buen trabajo!</strong> Usuario editado Exitosamente.'+
						'</div>';
					$('#resultado').html(output);
					$('#userModalEdit').modal('hide');
					$('#form-edit-usuario')[0].reset();
				}else{
					let output = '<div role="alert"  class="alert alert-danger">'+
						'<strong>Error!</strong> Usuario Ya ingresado.'+
						'</div>';
					$('#resultado').html(output);
				}
				hiddenAlert();
				Tableuser.ajax.reload( null, false );
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

//Data Table
var Tableuser = $('#Tableuser').DataTable( {
	language: {
		"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	},
	ajax: {
		"url" : baseurl+"admin/usuarios/UserTable",
		"type" : "POST",
		dataSrc: ''
	},
	columns : [
			{data: 'id_user'},
			{data: 'nombre'},
			{data: 'apellido'},
			{data: 'dni'},
			{data: 'email'},
			{data: 'tel'},
			{data: 'address'},
			{data: 'genero'},
			{data: 'estado'},
			{data: 'perfil'},
			{"orderable": true,
				render:function (data, type, row) {
					if (row.estadouser == 'habilitado'){
						return '<i class="fa fa-check-circle">Habilitado</i>';
					}else{
						return '<i class="fa fa-times-circle">Deshabilitado</i>';
					}
				}
			},
			{"orderable": true,
				render:function (data, type, row) {
					if(row.perfil == 'Admin'){
						return '<a href="#" data-toggle="modal" data-target="#userModalEdit" data-id="'+row.id_user+'"><i class="far fa-edit"></i></a>'+
							'<i class="far fa-trash-alt"></i>';
					}else{
						return '<a href="#" data-toggle="modal" data-target="#userModalEdit" data-id="'+row.id_user+'"><i class="far fa-edit"></i></a>'+
							'<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="'+row.id_user+'"><i class="far fa-trash-alt""></i></a>';
					}
				},
				"className": "text-center"
			}
		],
	buttons:[{
		extend: 'collection',
		text: '<i class="fas fa-file-export"></i> Exportar',
		background: false,
		buttons: [
			// 'copy',
			{
				extend: 'excel',
				text: '<i class="fa fa-file-excel-o"></i> Excel',
				exportOptions: {
					columns: [0, 1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13]
				}
			},
			{
				extend: 'csv',
				text: '<i class="fas fa-file-csv"></i> CSV',
				exportOptions: {
					columns: [0, 1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13]
				}
			},
			{
				extend: 'pdfHtml5',
				orientation: 'landscape',
				text: '<i class="fas fa-file-pdf"></i> PDF',
				pageSize: 'LEGAL',
				exportOptions: {
					columns: [0, 1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13]
				}
			},
			{
				extend: 'print',
				text: '<i class="fa fa-print"></i> Imprimir',
				customize: function (win) {

					var last = null;
					var current = null;
					var bod = [];

					var css = '@page { size: landscape; }',
						head = win.document.head || win.document.getElementsByTagName('head')[0],
						style = win.document.createElement('style');

					style.type = 'text/css';
					style.media = 'print';

					if (style.styleSheet) {
						style.styleSheet.cssText = css;
					} else {
						style.appendChild(win.document.createTextNode(css));
					}

					head.appendChild(style);
				},
				exportOptions: {
					columns: [1, 2, 5, 6, 7, 8, 9, 10, 11, 12]
				}
			}
			]
	},
		{
			text: "<i class='fas fa-sync-alt'></i>",
			action: function (e, dt, node, config) {
				dt.ajax.reload(null,false)
			}
		}

	],
	dom: "<'row'<'col-6'<'#exportarbtn btn-group'B>><'col-6'f>>tip",
	});

//Validar datos de usuario SRI
function ValidateUserSRI(){
	let Dni = $('#usCedula').val();
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
                    $('#usNombre').val(name);
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
	let Email = $('#usEmail').val();
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