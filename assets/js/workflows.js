var Tableworkflow = $('#Tableworkflow').DataTable( {
	language: {
		"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	},
	ajax: {
		"url" : baseurl+"workflows/WorkflowTable",
		"type" : "POST",
		dataSrc: ''
	},
	columns : [
			{data: 'id_task'},
            {"orderable": true,
                render:function (data, type, row) {
                    return '<a target="_blank" href="workflows/workflow/'+row.id_task+'">'+row.nombres+'</a>';
                }
            },
			{data: 'estado'},
            {data: 'fecha_create'},
            {"orderable": true,
                render:function (data, type, row) {
				    return '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="'+row.id_cliente+'"><i class="far fa-trash-alt"></i></a>';
			    },
			    "className": "text-center"
		    }
		]
    });
    
//bootstrap-select
$("select.select_single").select2({
    theme: "bootstrap",
    containerCssClass: "input-sm",
    minimumResultsForSearch: 5
});