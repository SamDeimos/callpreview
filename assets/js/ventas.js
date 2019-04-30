//Cargar datos a modal Delete
$('#deleteModal').on('show.bs.modal', function (event) {
	let button = $(event.relatedTarget);
	let id = button.data('id');
	$('#idDelete').val(id);
});

//Eliminar datos
$(document).ready(function () {
	$('#form-delete').submit(function (event) {
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: baseurl+'ventas/DeleteDami',
			data: $(this).serialize(),
			success: function(data){
				if(data == 'success') {
					output = '<div role="alert"  class="alert alert-success">'+
						'<strong>Buen trabajo!</strong> Usuario Eliminado Exitosamente.'+
						'</div>';
					$('#resultado').html(output);
					$('#deleteModal').modal('hide');
					hiddenAlert();
					TableDami.ajax.reload( null, false );
				}
			},
		});
	});
});

//Insertar Dami DB
$(document).ready(function(){
	$('#form-new-dami').submit(function(event){
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data){
				let result = jQuery.parseJSON(data);
				console.log(result);
				if(result['estado'] == 'success') {
					let output = '<div role="alert"  class="alert alert-success">'+
							'<strong>Buen trabajo!</strong>' + result['detalle']+
							'</div>';
					$('#resultado').html(output);
					$('#damiModal').modal('hide');
					$('#damiModalLabel').html('Crear cliente');
					$('#ValidateClient').attr('disabled', false);
					$('#clCedula').attr('disabled', false);
					$('#form-new-dami')[0].reset();
				}else{
					let result = jQuery.parseJSON(data);
					let output = '<div role="alert"  class="alert alert-danger">'+
						'<strong>Error!</strong> '+ result['estado'] + '</div>';
					$('#resultado').html(output);
				}
				hiddenAlert();
				TableDami.ajax.reload( null, false );
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

//Editar Dami y Cliente
$('#damiModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    const id = button.data('id');
    if(id != null) {
        $.ajax({
            type: 'GET',
            url: baseurl + 'ventas/findDAMI/' + id,
            success: function (data) {
                let result = jQuery.parseJSON(data);
                console.log(result);
                //Cliente
                $('#damiModalLabel').html('Actualizar Dami #' + result.id_dami);
                $('#clIdedit').val(result.id_cliente);
                $('#clCedula').val(result.dni);
                $('#clNombres').val(result.nombres);
                $('#clEmail').val(result.email);
                $('#clTel').val(result.tel);
                $('#clFecNac').val(result.fec_nac);
                $('#clAddress').val(result.address);
                $('#clLvlform').val(result.id_lvlformacion);
                $('#clGenero' + result.id_genero).prop('checked', true);
                $('#clStatuscivil' + result.id_statuscivil).prop('checked', true);

                //DAMI
                $('#clIddami').val(result.id_dami);
                $('#dmProd').val(result.id_producto);

                $('#ValidateData').attr('class', 'fa fa-check');
                $('#ValidateClient').attr('disabled', true);
                $('#clCedula').attr('readonly', true);
            }
        });
    }else{
        $('#ValidateClient').attr('disabled', false);
        $('#clCedula').attr('readonly', false);
    }
    $('#damiModal').on('hidden.bs.modal', function (event) {
        if(id != null){
            $('#damiModalLabel').html('Crear Dami');
            $('#form-new-dami')[0].reset();
        }
    });
});

//Data Table
var TableDami =	$('#Tabledami').DataTable( {
	"order": [[0, 'desc']],
	"language": {
		"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	},
	"ajax": {
		"url" : baseurl+"admin/callcenter/DamiTable",
		"type" : "POST",
		dataSrc: ''
	},
	"columns" : [
		{data: 'id_dami'},
		{data: 'nombres'},
		{data: 'dni'},
		{data: 'email'},
		{data: 'tel'},
		{data: 'fec_create'},
		{"orderable": true,
			render:function (data, type, row) {
			let lvl = LvlUser();
				if ( lvl == 9 ) {
					return '<a title="' + row.estado + '" href="#" data-toggle="modal" data-target="#ChangeStatusModal" data-id="'+ row.id_dami +'" data-status="'+ row.id_dami +'"><i class="' + row.icono + '"></i></a>';
				}else if ( lvl == 6 ) {
					if (row.estado == 'Auditar') {
						return '<a title="' + row.estado + '" href="#" data-toggle="modal" data-target="#ChangeStatusModal" data-id="'+ row.id_dami +'" data-status="'+ row.id_dami +'"><i class="' + row.icono + '"></i></a>';
					} else {
						return '<a title="' + row.estado + '" href="#" style="pointer-events: none;"><i class="' + row.icono + '"></i></a>';
					}
				}else if ( lvl == 4 ) {
					if (row.estado == 'Contactado') {
						return '<a title="' + row.estado + '" href="#" data-toggle="modal" data-target="#ChangeStatusModal" data-id="'+ row.id_dami +'" data-status="'+ row.id_dami +'"><i class="' + row.icono + '"></i></a>';
					} else {
						return '<a title="' + row.estado + '" href="#" style="pointer-events: none;"><i class="' + row.icono + '"></i></a>';
					}
				}else if ( lvl == 2 ) {
					if (row.estado == 'Borrador' || row.estado == 'Negado') {
						return '<a title="' + row.estado + '" href="#" data-toggle="modal" data-target="#ChangeStatusModal" data-id="'+ row.id_dami +'" data-status="'+ row.id_dami +'"><i class="' + row.icono + '"></i></a>';
					} else {
						return '<a title="' + row.estado + '" href="#" style="pointer-events: none;"><i class="' + row.icono + '"></i></a>';
					}
				}
			},
			"className": "text-center"
		},
		{data: 'vendedor'},
		{data: 'id_callcenter'},
		{"orderable": true,
			render:function (data, type, row) {
			if(row.perfil == 'Admin'){
				return '<a href="#" data-toggle="modal" data-target="#damiModal" data-id="'+row.id_dami+'"><i class="far fa-edit"></i></a>'+
					'<i class="far fa-trash-alt"></i>';
			}else{
				return '<a href="#" data-toggle="modal" data-target="#damiModal" data-id="'+row.id_dami+'"><i class="far fa-edit"></i></a>'+
					'<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="'+row.id_dami+'"><i class="far fa-trash-alt"></i></a>';
			}
			},
			"className": "text-center"
		}],
});

$('#ChangeStatusModal').on('show.bs.modal', function (event) {
	let button = $(event.relatedTarget);
	let id = button.data('id');
	let status = button.data('status');
	$('#idDami').val(id);
	$('#status').val(status);
});

//Validar datos existentes
function ValidarDatosExistentes() {
	let Dni = $('#clCedula').val();
	let parametros = { 'dni-validate' : Dni};
	$.ajax({
		type: "POST",
		url: baseurl+'Clientes/FIndClientDNI',
		data: parametros,
		async: true,
		beforeSend:function(){
			$('#ValidateData').attr('class', 'fa fa-gears');
		},
		success: function (data) {
			let result = jQuery.parseJSON(data);
			console.log(result);
			if(result != null){
				//Asignacion de datos
				$('#damiModalLabel').html('Actualizar Cliente #'+result.id_cliente);
				$('#clIdedit').val(result.id_cliente);
				$('#clCedula').val(result.dni);
				$('#clNombres').val(result.nombres);
				$('#clEmail').val(result.email);
				$('#clTel').val(result.tel);
				$('#clFecNac').val(result.fec_nac);
				$('#clLvlform').val(result.id_lvlformacion);
				$('#clAddress').val(result.address);
				$('#clGenero'+result.id_genero).prop('checked', true);
				$('#clStatuscivil'+result.id_statuscivil).prop('checked', true);


				$('#ValidateData').attr('class', 'fa fa-check');
				$('#ValidateClient').attr('disabled', true);
				$('#clCedula').attr('readonly', true);

				TableDami.ajax.reload( null, false );

			}else{
				ValidateUserSRI();
			}
		}
	});
}

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
            $('#ValidateData').attr('class', 'fa fa-gears');
		},
		success: function (data) {
		    let result = jQuery.parseJSON(data);
		    if(result != null){
                let name = result.nombreCompleto;
                if(name){
                    $('#clNombres').val(name);
                    $('#ValidateData').attr('class', 'fa fa-check');

                }else{
                    $('#ValidateData').attr('class', 'fa fa-times');
                }
				TableDami.ajax.reload( null, false );
            }else{
                $('#ValidateData').attr('class', 'fa fa-times');
            }
		}
	});
}

//Validar datos usuario Debounce
function ValidateUserDebounce(){
	let Email = $('#clEmail').val();
	let parametros = { 'email-validate' : Email};
	$.ajax({
		type: "POST",
		url: baseurl+'Tools/VerifyDataDebounce',
		data: parametros,
		async: true,
		beforeSend:function(){
			$('#ValidateEmail').attr('class', 'fa fa-gears');
		},
		success: function (data) {
			let resultjson = jQuery.parseJSON(data);
			let result =  resultjson.debounce.result;
			if (result === 'Safe to Send'){
                $('#ValidateEmail').attr('class', 'fa fa-check');
				TableDami.ajax.reload( null, false );
            }else{
                console.log(result);
                $('#ValidateEmail').attr('class', 'fa fa-times');
            }
		}
	});
}

//Campo de fecha
$(function () {
	$('#clFecNac').datepicker({
		format: 'yyyy-mm-dd',
		language: "es"
	}).datepicker("setDate", new Date());
});
