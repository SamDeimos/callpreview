//Campo de fecha
$('.fec_datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    language: "es"
});

function LvlUser() {
    var lvluser = $('#lvluser').html();
    return lvluser;
}

function hiddenAlert(){
    $('.alert').fadeTo(2000,1000).slideUp(1000, function () {
        $('.alert').slideUp(1500);
    });
}