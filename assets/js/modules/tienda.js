//Creamos data table de de nuestra tabla
//@Tableventa
var Tableventa = $('#Tableventa').DataTable({
    language : {
        url : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    ajax: {
		url : baseurl+"tienda/ventas/VentaTable",
		type : "POST",
		dataSrc: ''
    },
    columns : [
		{data: 'id_venta'},
		{data: 'nombres'},
		{data: 'producto'},
		{"orderable": true,
			render:function (data, type, row) {
                if(row.estado == 'pendiente'){
                    return '<button type="button" class="btn btn-outline-warning btn-xxs" disabled>'+row.estado+'</button>';
                }else if(row.estado == 'pagada'){
                    return '<button type="button" class="btn btn-outline-success btn-xxs" disabled>'+row.estado+'</button>';
                }else{
                    return '<button type="button" class="btn btn-outline-danger btn-xxs" disabled>'+row.estado+'</button>';
                }
			},
			"className": "text-center"
        },
		{"orderable": true,
			render:function (data, type, row) {
                return '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="'+row.id_cliente+'"><i class="fa fa-eye"></i></a>'+
                    '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="'+row.id_cliente+'"><i class="far fa-trash-alt"></i></a>';
			},
			"className": "text-center"
        }
	],
});

//Creamos data table de de nuestra tabla
//@Tableventa
var Tableproducto = $('#Tableproducto').DataTable({
    language : {
        url : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    ajax: {
		url : baseurl+"tienda/productos/ProductoTable",
		type : "POST",
		dataSrc: ''
    },
    columns : [
		{data: 'id_producto'},
		{data: 'producto'},
        {data: 'valor'},
        {"orderable": true,
            render:function (data, type, row) {
                return '%'+row.iva;
            },
            "className": "text-center"
        },
		{data: 'duracion_dias'},
		{"orderable": true,
			render:function (data, type, row) {
				return '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="'+row.id_cliente+'"><i class="far fa-trash-alt"></i></a>';
			},
			"className": "text-center"
		}
	],
});

//bootstrap-select
$("select.select_single").select2({
    theme: "bootstrap",
    containerCssClass: "input-sm",
    minimumInputLength: 3,
});