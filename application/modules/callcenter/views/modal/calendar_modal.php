<!-- Modal calendario de llamdas -->
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="calendarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="calenderModalLabel">Calendario de llamadas agendadas</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');

                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            eventColor: '#007BFF',
                            eventTextColor: '#fff',
                            height: 500,
                            locale: 'es',
                            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                            },
                            defaultDate: new Date(),
                            navLinks: true, // can click day/week names to navigate views
                            businessHours: true, // display business hours
                            editable: true,
                            events: <?php echo $schedule; ?>

                        });

                        calendar.render();
                    });
                </script>

                <div id='calendar'></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal calendario de llamdas -->