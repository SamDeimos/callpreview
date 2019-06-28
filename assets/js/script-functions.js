//Campo de fecha
$('.fec_datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    language: "es"
});

//bootstrap-select
$("select.select_single").select2({
    theme: "bootstrap",
    containerCssClass: "input-sm",
    minimumInputLength: 3,
});

function get_permisos_ventas_delete(idpermiso, id_statusventa) {
    switch (idpermiso) {
        case 1:
            //Mostramos todas las ventas si es administrador
            return true;
        case 2:
            //Listado de vestas para vendedores
            if (id_statusventa == '1') {
                return true;
            }
            return false;
        case 3:
            //Listado de vestas para DIRECTORES O DUEÑOS DE GRUPO
            if (id_statusventa == '1') {
                return true;
            }
            return false;
        case 4:
            //Mosmotramos todas las ventas si es Autorizador
            return false;

    }

}

function get_permisos_clientes_delete(idpermiso) {
    switch (idpermiso) {
        case 1:
            //Mostramos todas las ventas si es administrador
            return true;
        default:
            return false;

    }

}

function hiddenAlert() {
    $('.alert').fadeTo(2000, 1000).slideUp(1000, function () {
        $('.alert').slideUp(1500);
    });
}

$('.fecha_daterangepicker').daterangepicker({
    "autoApply": true,
    startDate: moment().subtract(1, 'month'),
    endDate: moment(),
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "fromLabel": "Desde",
        "toLabel": "A",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    }
});

function secondsToHms(d) {
    d = Number(d);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    h = (h < 9) ? (h = '0' + h) : h;
    m = (m < 9) ? (m = '0' + m) : m;
    s = (s < 9) ? (s = '0' + s) : s;

    return h + ':' + m + ':' + s;
} 