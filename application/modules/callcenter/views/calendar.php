<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            eventColor: '#007BFF',
            eventTextColor: '#fff',
            height: 550,
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
            events: <?php echo $schedule;?>

        });

        calendar.render();

        console.log(calendar.getEventById(1));
    });
</script>

<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>callcenter/calls">volver</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <div id='calendar'></div>
    </div>
</div>