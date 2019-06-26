$(document).ready(function () {
    var Tableregistry = $('#Tableregistry').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        pageLength : 25,
        order: [[ 0, 'desc' ]]
    });

    var Tablecall = $('#Tablecall').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        ajax: {
            "url": baseurl + "callcenter/calls/CallTable",
            "type": "POST",
            dataSrc: ''
        },
        columns: [
            { data: 'id_call' },
            { data: 'campaign' },
            { data: 'nombres' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    var html = '<div class="dropdown">' +
                        '<button class="btn btn-success dropdown-toggle btn-xxs" type="button" data-toggle="dropdown" aria-expanded="false">' +
                        'Llamar' +
                        '</button>' +
                        '<div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(15px, -107px, 0px); top: 0px; left: 0px; will-change: transform;">';
                    $.each(JSON.parse(row.phones), function (index, value) {
                        html += '<a href="#" class="dropdown-item llamar" data-id_call="' + row.id_call + '" data-tel="' + value + '" data-nombres="' + row.nombres + '">' + value + '</a>';
                    });
                    html += '</div>' +
                        '</div>';
                    return html;
                }
            },
            { data: 'estado' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<a href="#" data-toggle="modal" data-target="#userModalEdit" data-id=""><i class="far fa-edit"></i></a>' +
                        '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id=""><i class="far fa-trash-alt""></i></a>';

                },
                "className": "text-center"
            }
        ],
        buttons: [{
            text: "<i class='fas fa-sync-alt'></i>",
            action: function (e, dt, node, config) {
                Tablecall.ajax.reload(null, false)
            }
        }

        ],
        dom: "<'row'<'col-6'<B>><'col-6'f>>tip",
        initComplete: function () {
            $('.llamar').click(function (event) {
                event.preventDefault();
                var ext = localStorage.getItem('ext');
                if (ext != null && ext != 'undefined') {
                    let nombres = $(this).data('nombres');
                    let parametros = {
                        'id_call': $(this).data('id_call'),
                        'tel': $(this).data('tel'),
                        'ext': localStorage.getItem('ext')
                    };
                    $.ajax({
                        type: "POST",
                        url: baseurl + 'callcenter/calls/realizar_llamada_AMI',
                        data: parametros,
                        async: true,
                        success: function (data) {
                            $('#caja_data_attribute').append('<div class="col-6 data_attribute"><p><strong>Nombres: </strong>' + nombres + '</p></div>');
                            arrayDATA = JSON.parse(data);

                            //inserta el valor del registro actual en input #id_registry
                            $('#id_registry').val(arrayDATA['id_registry']);

                            //se llena div #caja_data_attribute con los datos de cada llamda
                            if (typeof arrayDATA['data_attribute'] == 'string') {
                                mapdata_attribute = new Map(Object.entries((JSON.parse(arrayDATA['data_attribute']))));
                                for (var [key, value] of mapdata_attribute) {
                                    $('#caja_data_attribute').append('<div class="col-6 data_attribute"><p class=" text-capitalize"><strong>' + key + ': </strong>' + value + '</p></div>');
                                }
                                $('#callModal').modal({
                                    backdrop: 'static',
                                    keyboard: false,
                                    show: true
                                });
                            } else {
                                console.log('Llamada sin datos');
                                $('#caja_data_attribute').append('<div class="col-6 data_attribute"><p><strong>Sin datos</strong></p></div>');
                                $('#callModal').modal({
                                    backdrop: 'static',
                                    keyboard: false,
                                    show: true
                                });
                            }
                        }
                    });
                } else {
                    $('#extModal').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                }
            });
        }
    });

    var ext = localStorage.getItem('ext');
    if (ext == null || ext == 'undefined') {
        $('#extModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }

    $('#form-ext').submit(function (event) {
        event.preventDefault();
        localStorage.setItem('ext', $('input[name="ext"]').val());
        $('#extModal').modal('hide');
    });

    $('#form-calificar').submit(function (event) {
        event.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            type: "POST",
            url: baseurl + 'callcenter/calls/calificar_llamada',
            data: $(this).serialize(),
            async: true,
            success: function (data) {
                $('#callModal').modal('hide');
                Tablecall.ajax.reload(null, false);
            }
        });

    });

    $("#callModal").on('hidden.bs.modal', function () {
        $('.data_attribute').remove();
    });
});

