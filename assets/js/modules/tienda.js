$(window).on('load', function () {
    sumar_venta();
    //Creamos data table de de nuestra tabla
    //@Tableventa
    var Tableventa = $('#Tableventa').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        ajax: {
            url: baseurl + "tienda/ventas/VentaTable",
            type: "POST",
            dataSrc: ''
        },
        order: [
            [0, 'desc'],
        ],
        columns: [
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<a href=' + baseurl + 'tienda/ventas/venta/' + row.id_venta + '>#' + row.id_venta + '</a>';
                }
            },
            { data: 'nombres_cliente' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    if (row.estado == 'Borrador') {
                        return '<button type="button" class="btn btn-outline-warning btn-xxs" disabled>' + row.estado + '</button>';
                    } else if (row.estado == 'Completado') {
                        return '<button type="button" class="btn btn-outline-success btn-xxs" disabled>' + row.estado + '</button>';
                    } else if (row.estado == 'Fallido' || row.estado == 'Sin cupo') {
                        return '<button type="button" class="btn btn-outline-danger btn-xxs" disabled>' + row.estado + '</button>';
                    } else if (row.estado == 'Pendiente') {
                        return '<button type="button" class="btn btn-outline-primary btn-xxs" disabled>' + row.estado + '</button>';
                    } else {
                        return '<button type="button" class="btn btn-outline-secondary btn-xxs" disabled>' + row.estado + '</button>';
                    }
                },
                "className": "text-center"
            },
            { data: 'fecha_venta' },
            { data: 'nombres_usuario' },
            { data: 'total' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<a href="' + baseurl + 'tienda/ventas/detalle/' + row.id_venta + '" target="_blank" title="Detalle venta" data-id="' + row.id_venta + '"><i class="far fa-list-alt"></i></a>' +
                        '<a href="#" title="Eliminar" data-toggle="modal" data-target="#deleteModal" data-id="' + row.id_venta + '" data-modulo="venta"><i class="far fa-trash-alt"></i></a>';
                },
                "className": "text-center"
            }
        ],
        buttons: [
            {
                text: "<i class='fas fa-sync-alt'></i>",
                action: function (e, dt, node, config) {
                    Tableventa.ajax.reload(null, false)
                }
            }
        ],
        dom: "<'row'<'col-6'B><'col-6'f>>t<'row'<'col-6'i><'col-6'p>>",
    });

    //Creamos data table de de nuestra tabla
    //@Tableventa
    var Tableproducto = $('#Tableproducto').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        ajax: {
            url: baseurl + "tienda/productos/ProductoTable",
            type: "POST",
            dataSrc: ''
        },
        columns: [
            { data: 'id_producto' },
            { data: 'producto' },
            { data: 'valor' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '%' + row.iva;
                },
                "className": "text-center"
            },
            { data: 'duracion_dias' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="' + row.id_cliente + '"><i class="far fa-trash-alt"></i></a>';
                },
                "className": "text-center"
            }
        ],
    });

    //Creamos data table de de nuestra tabla
    //@Tableventa
    var Tablepago = $('#Tablepago').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        ajax: {
            url: baseurl + "tienda/pagos/PagoTable",
            type: "POST",
            dataSrc: ''
        },
        order: [
            [0, 'desc'],
            [5, 'desc'],
        ],
        columns: [
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<a href=' + baseurl + 'tienda/pagos/pago/' + row.id_pago + '>#' + row.id_pago + '</a>';
                }
            },
            { data: 'nombres' },
            { data: 'metodo_pago' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    if (row.id_venta == null) {
                        return '<span>Cobro directo</span>';
                    } else {
                        return '<span>Venta</span>';
                    }
                },
                "className": "text-center"
            },
            {
                "orderable": true,
                render: function (data, type, row) {
                    if (row.estado == 'pendiente') {
                        return '<button href="" type="button" class="btn btn-outline-warning btn-xxs" disabled>' + row.estado + '</button>';
                    } else if (row.estado == 'aprobado') {
                        return '<button type="button" class="btn btn-outline-success btn-xxs" disabled>' + row.estado + '</button>';
                    } else {
                        return '<button type="button" class="btn btn-outline-danger btn-xxs" disabled>' + row.estado + '</button>';
                    }
                },
                "className": "text-center"
            },
            { data: 'fecha_pago' },
            {
                "orderable": true,
                render: function (data, type, row) {
                    var html;
                    var pago = JSON.parse(row.data_pago);
                    if (row.data_pago == null || pago.shorturl == null) {
                        html = '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="' + row.id_pago + '" data-modulo="pago"><i class="far fa-trash-alt"></i></a>';
                    } else {
                        if (row.cel != null) {
                            whatsapp = '<a title="Pagar" target="_blank" href="https://wa.me/593' + row.cel + '?text=' + encodeURIComponent(pago.shorturl) + '"><i class="fab fa-whatsapp"></i></a>';
                        } else {
                            whatsapp = '';
                        }
                        html = '<a title="Pagar" target="_blank" href=' + pago.shorturl + '><i class="far fa-share-square"></i></a>' +
                            whatsapp +
                            '<a href="#" data-toggle="modal" data-target="#deleteModal" data-id="' + row.id_pago + '" data-modulo="pago"><i class="far fa-trash-alt"></i></a>';
                    }
                    return html;
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

    //agregar producto a la venta
    $('#id_producto').on('change', function () {
        let data = $(this).val();
        $('#btn-agregar').val(data);
    });

    $('#btn-agregar').on('click', function () {
        let data = $(this).val();
        if (data != '') {
            let producto = data.split('*');

            html = "<tr>";
            html += "<td><input type='hidden' name='id_productos[]' value='" + producto[0] + "'>#" + producto[0] + "</td>";
            html += "<td>" + producto[1] + "</td>";
            html += "<td><input type='hidden' name='precios[]' value='" + producto[2] + "'>" + producto[2] + "</td>";
            html += "<td><input class='form-control form-control-sm cantidades' type='number' name='cantidades[]' value=1></td>";
            html += "<td><input type='hidden' name='total[]' value='" + producto[2] + "'><p>" + producto[2] + "</p></td>";
            html += "<td><button type='button' class='btn btn-xs btn-danger btn-remover-prod'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";

            $('#tbventas tbody').append(html);
            sumar_venta();

        } else {
            alert('Seleccione un producto');
        }
    });

    $(document).on('click', '.btn-remover-prod', function () {
        $(this).closest('tr').remove();
        sumar_venta();
    });

    $(document).on('change', '#tbventas input.cantidades', function () {
        let cantidad = $(this).val();
        let precio = $(this).closest('tr').find('td:eq(2)').text();
        let total = cantidad * precio;
        $(this).closest('tr').find('td:eq(4)').children('p').text(total.toFixed(2));
        $(this).closest('tr').find('td:eq(4)').children('input').val(total.toFixed(2));
        sumar_venta();
    });

    $(document).on('change', '#id_metodopago', function () {
        let metodo = $(this).val();
        if (metodo == 2) {
            //Placetopay seleccionado
            $status = $('#id_statuspago');
            $status.val(1);
            $status.prop('disabled', true);
        } else {
            $status.prop('disabled', false);
        }
    });

    //Validar que tenga productos seleccionados
    $('#form-add-venta').submit(function (event) {
        if ($('#total_venta').val() == 0) {
            alert('Para poder crear una venta debe de ingrese un producto.');
            return false;
        }
    });

    //Pagar Venta
    //Cargar datos al modal Pago
    $('#pagarModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let idventa = button.data('idventa');
        $('input[name=id_venta]').val(idventa);

    });
    //Insertar datos de pago de la venta
    $('#form-pagar').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: baseurl + 'tienda/pagos/pago',
            data: $(this).serialize(),
            success: function (data) {
                location.reload();
                $('#pagarModal').modal('hide');
            }
        });
    });

    //Eliminar datos
    //Cargar datos a modal Delete
    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        $('#idDelete').val(id);
        let modulo = button.data('modulo');
        $('#modulo').val(modulo);

    });

    //Eliminar datos
    $('#form-delete').submit(function (event) {
        event.preventDefault();
        modulo = $('#modulo').val();
        $.ajax({
            type: 'POST',
            url: baseurl + 'tienda/' + modulo + 's/Delete' + modulo,
            data: $(this).serialize(),
            success: function (data) {
                //console.log(data);
                if (data == 'success') {
                    output = '<div role="alert"  class="alert alert-success">' +
                        '<strong>Buen trabajo!</strong> Usuario Eliminado Exitosamente.' +
                        '</div>';
                    $('#resultado').html(output);
                    let Tablareload = eval('Table' + modulo);
                    Tablareload.ajax.reload(null, false);
                    $('#deleteModal').modal('hide');
                    hiddenAlert();
                }
            },
        });
    });
});

function sumar_venta() {
    let total = 0;
    $('#tbventas tbody tr').each(function () {
        total = total + Number($(this).find('td:eq(4)').text());
    });
    $('input[name=total_venta]').val(total.toFixed(2));
}