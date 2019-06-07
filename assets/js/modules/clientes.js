//Cargar datos a modal Delete
$('#deleteModal').on('show.bs.modal', function (event) {
	let button = $(event.relatedTarget);
	let id = button.data('id');
	$('#tableDelete').val('md_clientes');
	$('#idDelete').val(id);
});

//Eliminar datos
$('#form-delete').submit(function (event) {
	event.preventDefault();
	$.ajax({
		type: 'POST',
		url: baseurl+'clientes/DeleteCliente',
		data: $(this).serialize(),
		success: function(data){
			//console.log(data);
			if(data == 'success') {
				output = '<div role="alert"  class="alert alert-success">'+
					'<strong>Buen trabajo!</strong> Usuario Eliminado Exitosamente.'+
					'</div>';
				$('#resultado').html(output);
				$('#deleteModal').modal('hide');
				Tablecliente.ajax.reload( null, false );
				hiddenAlert();
            }
        },
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
				Tablecliente.ajax.reload( null, false );
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

//Creamos data table de de nuestra tabla
//@Tablecliente
var Tablecliente = $('#Tablecliente').DataTable({
    language : {
        url : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    ajax: {
		url : baseurl+"clientes/ClienteTable",
		type : "POST",
		dataSrc: ''
    },
    columns : [
		{data: 'id_cliente'},
        {"orderable": true,
            render:function(data, type, row){
                return '<a target="_black" href="'+baseurl+'clientes/cliente/'+row.id_cliente+'">'+row.nombres+'</a>';
            }
        },
		{data: 'dni'},
		{data: 'email'},
		{data: 'cel'},
		{data: 'tel'},
        {data: 'address'},
        {data: 'genero'},
		{data: 'estado'},
		{"orderable": true,
			render:function (data, type, row) {
				return '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="'+row.id_cliente+'"><i class="far fa-trash-alt"></i></a>';
			},
			"className": "text-center"
		}
	],
});

//Validar datos de usuario SRI
function ValidateUserSRI(evt){
    evt.preventDefault();
	let Dni = $('#cedula').val();
	let parametros = { 'dni-validate' : Dni};
	$.ajax({
		type: "POST",
		url: baseurl+'tools/VerifyDataSRI',
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
                    $('#nombres').val(name);
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
    autoclose: true,
	language: "es"
});

//bootstrap-select
// $("select#cedula").select2({
//     theme: "bootstrap",
    // tags: true,
    // createTag: function (params) {
    //   return {
    //     id: params.term,
    //     text: params.term,
    //     newOption: true
    //   }
    // },
    // templateResult: function (data) {
    //   var $result = $("<span></span>");
    //   $result.text(data.text);
  
    //   if (data.newOption== true) {
    //     $result.append(" <em>(Crear cliente)</em>");
    //   }
    //   return $result;
    // },
//     containerCssClass: "input-sm",
//     minimumResultsForSearch: 5
//   });

//   $('#cedula').on('select2:select', function (e) {
//     var data = e.params.data;
//     let array = data.text.split('-');
//     let id = array[2].replace('#', '').trim();
//     console.log(id);
//     if(id > 0){
//         location.href = baseurl+"clientes/cliente/"+id;
//     }
//   });


