$(window).unload(function () {
    return "Bye now!";
});
$(document).ready(function () {
    //Data Table
    var Tableuser = $('#Tableuser').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        ajax: {
            "url": baseurl + "sistema/usuarios/UsuarioTable",
            "type": "POST",
            dataSrc: ''
        },
        columns: [
            { data: 'id_user' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<a target="_black" href="' + baseurl + 'sistema/usuarios/usuario/' + row.id_user + '">' + row.nombres + '</a>';
                }
            },
            { data: 'dni' },
            { data: 'email' },
            { data: 'tel' },
            { data: 'address' },
            { data: 'genero' },
            { data: 'estado' },
            { data: 'perfil' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    if (row.estadouser == 'habilitado') {
                        return '<i class="fa fa-check-circle"></i> Habilitado';
                    } else {
                        return '<i class="fa fa-times-circle"></i> Deshabilitado';
                    }
                }
            },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="' + row.id_user + '" data-modulo="Usuario"><i class="far fa-trash-alt""></i></a>';
                },
                "className": "text-center"
            }
        ],
        buttons: [{
            extend: 'collection',
            text: '<i class="fas fa-file-export"></i> Exportar',
            background: false,
            buttons: [
                // 'copy',
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i> Excel',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv"></i> CSV',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8, 9]
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
                        columns: [1, 2, 5, 6, 7, 8, 9]
                    }
                }
            ]
        },
        {
            text: "<i class='fas fa-sync-alt'></i>",
            action: function (e, dt, node, config) {
                Tableuser.ajax.reload(null, false)
            }
        }

        ],
        dom: "<'row'<'col-6'<'#exportarbtn btn-group'B>><'col-6'f>>tip",
    });

    //Cargar datos a modal Delete
    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        let modulo = button.data('modulo');

        switch (modulo) {
            case 'Usuario':
                var campaign = button.data('campaign');
                var extra = `
                    <small class="text-muted">ALERTA: Al eliminar esta campaña eliminará tambien su reporte de gestion, antes de eliminarla puede descargar el reporte <a href="https://192.168.0.229/xudo/callcenter/campaigns/export_csv?campaign=${campaign}campaign&id_campaign=${id}">CSV</a> - <a href="https://192.168.0.229/xudo/callcenter/campaigns/export_xlsx?campaign=${campaign}campaign&id_campaign=${id}">EXCEL</a></small>
                `;
                break;
            case 'Grupos':
                var extra = `
                    <small class="text-muted">ALERTA: Antes de eliminar este grupo confirme que no esta asignado en ninguna campaña</small>
                `;
                break;
        }
        $('#idDelete').val(id);
        $('#modulo').val(modulo);
        $('#extra').html(extra);

        $('#form-delete').submit(function (event) {
            event.preventDefault();
            modulo = $('#modulo').val();
            $.ajax({
                type: 'POST',
                url: baseurl + 'sistema/susuarios/' + modulo + 's/Delete' + modulo,
                data: $(this).serialize(),
                success: function (data) {
                    $('#deleteModal').modal('hide');
                    location.reload();
                },
            });
        });
    });

});



//Validar datos de usuario SRI
function ValidateUserSRI() {
    let Dni = $('#usCedula').val();
    let parametros = { 'dni-validate': Dni };
    $.ajax({
        type: "POST",
        url: baseurl + 'Tools/VerifyDataSRI',
        data: parametros,
        async: true,
        beforeSend: function () {
            $('#ValidateDni').attr('class', 'fa fa-gears');
        },
        success: function (data) {
            let result = jQuery.parseJSON(data);
            if (result != null) {
                let name = result.nombreCompleto;
                if (name) {
                    $('#usNombre').val(name);
                    $('#ValidateDni').attr('class', 'fa fa-check');

                } else {
                    $('#ValidateDni').attr('class', 'fa fa-times');
                }
            } else {
                $('#ValidateDni').attr('class', 'fa fa-times');
            }
        }
    });
}

//Validar datos usuario Debounce
function ValidateUserDebounce() {
    let Email = $('#usEmail').val();
    let parametros = { 'email-validate': Email };
    console.log(parametros);
    $.ajax({
        type: "POST",
        url: baseurl + 'Tools/VerifyDataDebounce',
        data: parametros,
        async: true,
        beforeSend: function () {
            $('#ValidateEmail').attr('class', 'fa fa-gears');
        },
        success: function (data) {
            console.log('Datos de respuesta:');
            let resultjson = jQuery.parseJSON(data);
            let result = resultjson.debounce.result;
            if (result === 'Safe to Send') {
                $('#ValidateEmail').attr('class', 'fa fa-check');
            } else {
                console.log(result);
                $('#ValidateEmail').attr('class', 'fa fa-times');
            }
        }
    });
}

