var tableRxFinal = document.querySelector('#RxFinal');
if (tableRxFinal != null){
    $('#RxFinal').Tabledit({
        editButton: false,
        eventType: 'click',
        inputClass: 'form-control form-control-sm',
        deleteButton: false,
        hideIdentifier: true,
        columns: {
            identifier: [0, 'id'],
            editable: [[2, 'esfera'], [3, 'cyl'], [4, 'eje'], [5, 'A'], [6, 'base'], [7, 'av'], [8, 'add'], [9, 'atl'], [10, 'di']]
        }
    });
}