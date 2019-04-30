var Tableuser = $('#Tableworkflow').DataTable( {
	language: {
		"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	},
	ajax: {
		"url" : baseurl+"admin/workflows/WorkflowTable",
		"type" : "POST",
		dataSrc: ''
	},
	columns : [
			{data: 'id_task'},
            {"orderable": true,
                render:function (data, type, row) {
                    return '<a target="_blank" href="clientes/cliente/'+row.id_cliente+'">'+row.nombres+'</a>';
                }
            },
			{data: 'estado'},
			{data: 'fecha_create'},
		]
	});