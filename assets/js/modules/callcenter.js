/**
 * Validar si al ventana modal de callModal esta abierta
 * para mostrar alerta que se perdera la informacion de la gestion
 */
$(window).on('beforeunload', function () {
    if ($('#callModal').hasClass('show')) {
        return false;
    }
});

/**
 * Script Modulo de callcenter
 */
$(document).ready(function () {
    //Valdiar si hay una extension en en localstorage
    var ext = localStorage.getItem('ext');
    if (ext == null || ext == 'undefined') {
        $('#extModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }

    //Tabla de registro de llamadas
    var Tableregistry = $('#Tableregistry').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        pageLength: 25,
        order: [[0, 'desc']]
    });

    //Tabla de listado de campañas
    var Tablecampaign = $('#Tablecampaign').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

    //Tabla de listado de llamdas para gestion
    var Tablecall = $('#Tablecall').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        order: [[3, 'desc']],
        ajax: {
            "url": baseurl + "callcenter/calls/CallTable",
            "type": "POST",
            dataSrc: ''
        },
        columns: [
            { data: 'nombres' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<span class="text-secondary">'+row.campaign+'</span>';
                    // return '<small>' + row.campaign + '</small>'
                }
            },
            {
                "orderable": true,
                render: function (data, type, row) {
                    var html = '<div class="dropdown">' +
                        '<button class="btn btn-success dropdown-toggle btn-xxs" type="button" data-toggle="dropdown" aria-expanded="false">' +
                        'Llamar' +
                        '</button>' +
                        '<div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(15px, -107px, 0px); top: 0px; left: 0px; will-change: transform;">';
                    $.each(JSON.parse(row.phones), function (index, value) {
                        html += '<a href="#" class="dropdown-item llamar" data-id_call="' + row.id_call + '" data-tel="' + value + '" data-nombres="' + row.nombres + '" data-id_form="' + row.id_form + '" data-id_script="' + row.id_script + '">' + value + '</a>';
                    });
                    html += '</div>' +
                        '</div>';
                    return html;
                },
                "className": "text-center"
            },
            {
                "orderable": true,
                render: function (data, type, row) {
                    if (row.id_call_status == '1') {
                        return '<span class="status-p bg-danger">' + row.estado + '</span>';
                    } else if (row.id_call_status == '2') {
                        return '<span class="status-p bg-success">' + row.estado + '</span>';
                    } else if (row.id_call_status == '3') {
                        return '<span class="status-p bg-primary">' + row.estado + '</span>';
                    } else if (row.id_call_status == '4') {
                        return '<span class="status-p bg-warning">' + row.estado + '</span>';
                    } else {
                        return '<span class="status-p bg-secundary">' + row.estado + '</span>';
                    }
                },
                "className": "text-center"
            },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<a href="#" class="datalleCall" data-id="' + row.id_call + '"><i class="far fa-list-alt"></i></a>';
                },
                "className": "text-center"
            }
        ],
        fnDrawCallback: function (oSettings) {

            /**
             * Envio de parametros para realizar llamda
             */
            $('.llamar').click(function (event) {
                event.preventDefault();
                var ext = localStorage.getItem('ext');
                if (ext != null && ext != 'undefined') {
                    let nombres = $(this).data('nombres');
                    let parametros = {
                        'id_call': $(this).data('id_call'),
                        'id_form': $(this).data('id_form'),
                        'id_script': $(this).data('id_script'),
                        'tel': $(this).data('tel'),
                        'ext': localStorage.getItem('ext')
                    };
                    $.ajax({
                        type: "POST",
                        url: baseurl + 'callcenter/calls/realizar_llamada_AMI',
                        data: parametros,
                        async: true,
                        success: function (data) {
                            let arrayDATA = JSON.parse(data);

                            if (arrayDATA['id_registry'] != null) {
                                //insertamos nombres
                                $('#caja_data_attribute .col').append('<div><p><strong>Nombres: </strong>' + nombres + '</p></div>');

                                //insertar formulario de gestion
                                $('#caja_form').append(arrayDATA['form']);

                                //insertar script de gestion
                                $('#ver_script').trumbowyg('html', arrayDATA['script']);

                                //inserta el valor del registro actual en input #id_registry
                                $('#id_registry').val(arrayDATA['id_registry']);

                                //se llena div #caja_data_attribute con los datos de cada llamda
                                if (typeof arrayDATA['data_attribute'] == 'string') {
                                    mapdata_attribute = new Map(Object.entries((JSON.parse(arrayDATA['data_attribute']))));
                                    for (var [key, value] of mapdata_attribute) {
                                        $('#caja_data_attribute .col').append('<div><p class=" text-capitalize"><strong>' + key + ': </strong>' + value + '</p></div>');
                                    }
                                    $('#callModal').modal({
                                        backdrop: 'static',
                                        keyboard: false,
                                        show: true
                                    });
                                } else {
                                    console.log('Llamada sin datos');
                                    $('#caja_data_attribute .col').append('<div><p><strong>Sin datos</strong></p></div>');
                                    $('#callModal').modal({
                                        backdrop: 'static',
                                        keyboard: false,
                                        show: true
                                    });
                                }
                            } else {
                                console.log('Error: Conexión con ext fallida.');
                            }

                            /**
                            * Envio de form_data_recolected
                            */
                            $('#form_data_recolected').on('submit', function (e) {
                                e.preventDefault();
                                $.ajax({
                                    type: "POST",
                                    url: baseurl + 'callcenter/calls/guardar_data_form_recolected',
                                    data: $(this).serialize(),
                                    async: true,
                                    success: function (data) {
                                        console.log('data guardada');
                                        $('#form_data_recolected').children('input[type="submit"]').val('Datos Guardados')
                                            .addClass("btn-success")
                                            .removeClass("btn-primary");
                                    }
                                });
                            });
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

            /**
             * Mostrar data_attibute junto con el historial de llamdas
             * con información de formularios
             */
            $('a.datalleCall').click(function (event) {
                event.preventDefault();
                let parametros = {
                    'id_call': $(this).data('id'),
                };
                $.ajax({
                    type: "POST",
                    url: baseurl + 'callcenter/calls/registro_call',
                    data: parametros,
                    async: true,
                    success: function (data) {
                        //limpia los datos del modal antes de mostrar datos nuevos
                        $('#timeline-area').children().remove();
                        $('#regModalLabel').children('span').text('');

                        //Se crea todo el timeline con la infromacion de las llamdas
                        let arrayDATA = JSON.parse(data);
                        html = '<div class="timeline-area">';
                        $.each(arrayDATA['call_registry'], function (ind, elem) {
                            html += '<div class="timeline-task">';
                            html += '<a title="' + elem.estado + '"><div class="icon bg' + elem.id_call_status + '">';
                            html += '<i class="fa fa-phone"></i>';
                            html += '</div></a>';
                            html += '<div class="tm-title">';
                            html += '<h4>' + (elem.cdr_calldate == null ? elem.reg_calldate : elem.cdr_calldate) + '</h4>';
                            html += '<span class="time"><i class="ti-time"></i>' + secondsToHms(elem.billsec) + '</span>'
                            html += '</div>';
                            html += '<div class="row">';
                            $.each(JSON.parse(elem.data), function (key, value) {
                                html += '<div class="col-4"><strong>' + key.replace(/_/gi, " ") + ': </strong>' + value + '</div>';
                            });
                            html += '</div>';
                            html += '</div>';
                        });
                        html += '</div>';

                        //Se carga el timeline y la cantidad de llamadas en en el modal
                        $('#timeline-area').append(html);
                        $('#regModalLabel').children('span').text(arrayDATA['call_registry'].length);

                        $('.timeline-area').slimScroll({
                            height: '350px',
                            color: '#000000',
                            size: '10px',
                            distance: '10px'
                        });

                        $('#regModal').modal({
                            show: true,
                        });

                    }
                });
            });
        }
    });

    /**
     * Guardar estado de cada gention
     */
    $('#button-form-calificar').on('click', function (e) {
        if ($('#form_data_recolected').children('input[type="submit"]').val() == 'Datos Guardados') {
            calificar();
        } else {
            let option = confirm('Aun no se ha guardado el formulario de gestion, ¿Desea guardarlo?');
            if (option == true) {
                calificar();
            }
        }
        e.preventDefault();
    });

    function calificar() {
        $.ajax({
            type: "POST",
            url: baseurl + 'callcenter/calls/calificar_llamada',
            data: $('#form-calificar').serialize(),
            async: true,
            success: function (data) {
                $('#callModal').modal('hide');
                Tablecall.ajax.reload(null, false);
            }
        });
    }
    /**
     * Fin guardar estado de cada gestion
     */

    $("#callModal").on('hidden.bs.modal', function () {
        $('#caja_data_attribute').children().children().remove();
        $('#caja_form').children().remove();
        $('#form_data_recolected').children('input[type="submit"]').val('Guardar Datos');
        $('#ver_script').trumbowyg('empty');
    });

    $("#regModal").on('hidden.bs.modal', function () {
        $('#timeline-area').children().remove();
        $('#regModalLabel').children('span').text('');
    });

    /**
     * Creacion de formularios
     */
    $('#add_campo').on('click', function () {
        let input = $('#create_form tr:last').find('td:eq(0)').children('input').val();
        if (input == '' || input == null) {
            alert('Debe de llenar "nombre de campo"');
        } else {
            html = '<tr>';
            html += '<td><input class="form-control form-control-sm" name="label[]" placeholder="nombre de campo" type="text" required></td>';
            html += '<td><select class="custom-select custom-select-sm type" name="id_form_type[]" id="id_form_type"><option value="0">texto</option><option value="1">lista</option></select></td>';
            html += '<td><input class="values_camp" name="values_camp[]" type="hidden"></td>';
            html += '<td><button class="btn btn-primary btn-xs remove_campo">-</button></td>';
            html += '</tr>';

            $('#create_form tbody').append(html);
        }
    });

    $(document).on('click', '.remove_campo', function (e) {
        e.preventDefault();
        if ($('#create_form tr').length > 2) {
            $(this).closest('tr').remove();
        } else {
            console.log('no puede eliminar este elemnto');
        }
    });

    $(document).on('change', '#create_form select.type', function () {
        let row = $(this).parent().parent().index();
        if ($(this).val() == 1) {
            html = '<div class="row">' +
                '<div class="col-6">' +
                '<button class="btn btn-primary btn-xxs add_val">add</button>' +
                '<input class="form-control form-control-sm mt-2 val" name="val[]" placeholder="valor" type="text">' +
                '</div>' +
                '<div class="col-6">' +
                '<button class="btn btn-primary btn-xxs remove_val">remove</button>' +
                '<select multiple class="custom-select custom-select-sm mt-2" name="values_camp_select[]" id="values_camp_select" size="3"></select>' +
                '</div>' +
                '<input class="values_camp" name="values_camp[]" type="hidden">' +
                '</div >';
        } else {
            html = '<input class="values_camp" name="values_camp[]" type="hidden">';
        }
        $(this).closest('tr').find('td:eq(2)').html(html);
    });

    //Añadir valores a lista
    $(document).on('click', '.add_val', function (e) {
        e.preventDefault();
        let col = $(this).closest('tr').find('td:eq(2)').children('.row').children('.col-6');
        let valInput = col.children('input[name="val[]"]');
        let values_campInput = col.parent().children('.values_camp');
        let select = col.children('select');
        if (valInput.val() != '') {
            select.append('<option value="' + valInput.val() + '" selected>' + valInput.val() + '</option>');
        }
        //Cargan los valores en input oculto para insertar
        if (values_campInput.val() == '') {
            values_campInput.val(valInput.val());
        } else {
            values_campInput.val(values_campInput.val() + ',' + valInput.val());
        }
        valInput.val('');
    });

    //remover valores de lista
    $(document).on('click', '.remove_val', function (e) {
        e.preventDefault();
        let col = $(this).closest('tr').find('td:eq(2)').children('.row').children('.col-6');
        let values_campInput = col.parent().children('.values_camp');
        let select = col.children('select');
        select.children('option[value="' + select.val() + '"]').remove();

        values_campInput.val('');
        select.children('option').each(function () {
            if (values_campInput.val() == '') {
                values_campInput.val($(this).text());
            } else {
                values_campInput.val(values_campInput.val() + ',' + $(this).text());
            }
        });

    });

    /**
     * Cambiar estado de campaña
     */
    $(document).on('change', '#status_camp', function () {
        if ($(this).prop('checked') == true) {
            id_campaign_status = 1;
        } else {
            id_campaign_status = 2;
        }
        let parametros = {
            'id_campaign': $(this).data('id_campaign'),
            'id_campaign_status': id_campaign_status,
        };
        $.ajax({
            type: "POST",
            url: baseurl + 'callcenter/campaigns/update_campaign_status',
            data: parametros,
            async: true,
            success: function (data) {
            }
        });
    });

    /**
     * Asignar extensión
     */
    $(document).on('click', '#btn-ext', function (e) {
        e.preventDefault();
        $('#form-ext input[name="ext"]').val(localStorage.getItem('ext'));
        $('#extModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    });

    $('#form-ext').submit(function (event) {
        event.preventDefault();
        localStorage.setItem('ext', $('input[name="ext"]').val());
        $('#extModal').modal('hide');
    });

    /**
     * Abrir Modal con calendario
     */
    $(document).on('click', '#btn-calendar', function (e) {
        e.preventDefault();
        $('#calendarModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    });

    /**
     * Guardar guion
     */
    $(document).on('click', '#save-script', function (e) {
        e.preventDefault();
        let parametros = {
            'id_script': $('#id_script').val(),
            'script': $('#script').val(),
            'descripcion': $('#desc_script').val(),
            'contenido_script': $('.trumbowyg-editor').html()
        }
        $.ajax({
            type: "POST",
            url: baseurl + 'callcenter/scripts/AddScript',
            data: parametros,
            async: true,
            success: function (data) {
                if (data != '') {
                    location.href = data;
                }
            }
        });
    });

    /**
     * Eliminar Campaña
     */
    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        let modulo = button.data('modulo');

        switch (modulo) {
            case 'Campaign':
                var campaign = button.data('campaign');
                var extra = `
                    <small class="text-muted">ALERTA: Al eliminar esta campaña eliminará tambien su reporte de gestion, antes de eliminarla puede descargar el reporte <a href="https://192.168.0.229/xudo/callcenter/campaigns/export_csv?campaign=${campaign}campaign&id_campaign=${id}">CSV</a> - <a href="https://192.168.0.229/xudo/callcenter/campaigns/export_xlsx?campaign=${campaign}campaign&id_campaign=${id}">EXCEL</a></small>
                `;
                break;
            case 'Form':
                var extra = `
                    <small class="text-muted">ALERTA: Antes de eliminar este formulario confirme que no esta asignado en ninguna campaña</small>
                `;
                break;
            case 'Script':
                var extra = 'ALERTA: Antes de eliminar este guion confirme que no esta asignado a ninguna campaña';
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
                url: baseurl + 'callcenter/' + modulo + 's/Delete' + modulo,
                data: $(this).serialize(),
                success: function (data) {
                    $('#deleteModal').modal('hide');
                    location.reload();
                },
            });
        });
    });
});