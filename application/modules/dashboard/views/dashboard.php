<div class="main-content-inner">
    <div class="sales-report-area sales-style-two">
        <div class="row">
            <!-- inicio de primer bloque -->
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-layout-grid2"></i> Ventas</div>
                            <h2>22</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin de primer bloque -->
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-layout-grid3"></i> Monto</div>
                            <h2>3,984</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin de primer bloque -->
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-bolt"></i> Meta</div>
                            <h2>3,200</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grafico Completo -->
    <div class="card mt-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h4 class="header-title mb-0">últimos 7 días</h4>
            </div>
            <canvas id="myChart" width="400" height="150"></canvas>
            <script>
                var ventasDataSemana = {
                    label: 'Número de ventas semanales',
                    data: [
                        <?php echo $ventas_diarias->lunes; ?>,
                        <?php echo $ventas_diarias->martes; ?>,
                        <?php echo $ventas_diarias->miercoles; ?>,
                        <?php echo $ventas_diarias->jueves; ?>,
                        <?php echo $ventas_diarias->viernes; ?>,
                        <?php echo $ventas_diarias->sabado; ?>,
                        <?php echo $ventas_diarias->domingo; ?>
                    ],
                    backgroundColor: 'rgba(92, 109, 243, 0.6)',
                    borderColor: 'rgba(78, 93, 211, 1)',
                };

                var ventasData = {
                    label: 'Número de ventas',
                    data: [3, 0, 2, 1, 3, 4],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }

                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Lunes', 'Martes', 'Miercoles', 'jueves', 'viernes', 'Sábado', 'domingo'],
                        datasets: [ventasDataSemana]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: false
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>