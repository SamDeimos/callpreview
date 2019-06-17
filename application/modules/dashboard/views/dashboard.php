<div class="main-content-inner">
    <div class="sales-report-area sales-style-two">
        <div class="row">
            <!-- inicio de primer bloque -->
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-layout-grid2"></i>Atuorizadas</div>
                            <h2><?php echo $cantidad_ventas_mes_completado->ventas_mes ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-bolt"></i> Total Ventas</div>
                            <h2><?php echo $importe_ventas_mes->importe_mes ?></h2>
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
            <div id="grafico_semanal"></div>
            <!-- <canvas id="myChart" width="400" height="150"></canvas> -->
            <script>
                Highcharts.chart('grafico_semanal', {
                    chart: {
                        type: 'areaspline'
                    },
                    title: false,
                    yAxis: {
                        title: false,
                        gridLineColor: '#fbf7f7',
                        gridLineWidth: 1
                    },
                    xAxis: {
                        categories: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
                        gridLineColor: '#fbf7f7',
                        gridLineWidth: 1
                    },
                    series: [{
                            name: 'Vetas Autorizadas',
                            data: [
                                <?php echo $ventas_semanales_completado->lunes; ?>,
                                <?php echo $ventas_semanales_completado->martes; ?>,
                                <?php echo $ventas_semanales_completado->miercoles; ?>,
                                <?php echo $ventas_semanales_completado->jueves; ?>,
                                <?php echo $ventas_semanales_completado->viernes; ?>,
                                <?php echo $ventas_semanales_completado->sabado; ?>,
                                <?php echo $ventas_semanales_completado->domingo; ?>
                            ],
                            fillColor: 'rgba(76, 57, 249, 0.5)',
                            lineColor: 'transparent'
                        },
                        {
                            name: 'Ventas Sin cupo',
                            data: [
                                <?php echo $ventas_semanales_sincupo->lunes; ?>,
                                <?php echo $ventas_semanales_sincupo->martes; ?>,
                                <?php echo $ventas_semanales_sincupo->miercoles; ?>,
                                <?php echo $ventas_semanales_sincupo->jueves; ?>,
                                <?php echo $ventas_semanales_sincupo->viernes; ?>,
                                <?php echo $ventas_semanales_sincupo->sabado; ?>,
                                <?php echo $ventas_semanales_sincupo->domingo; ?>
                            ],
                            fillColor: 'rgba(103, 13, 251, 0.5)',
                            lineColor: 'transparent'
                        }
                    ]
                });
                // var myChart = new Chart(ctx, {
                //     type: 'line',
                //     data: {
                //         labels: ['Lunes', 'Martes', 'Miercoles', 'jueves', 'viernes', 'Sábado', 'domingo'],
                //         datasets: [ventasDataSemanaCompletado, ventasDataSemanaSincupo]
                //     },
                //     options: {
                //         scales: {
                //             yAxes: [{
                //                 ticks: {
                //                     beginAtZero: true
                //                 }
                //             }]
                //         }
                //     }
                // });
            </script>
        </div>
    </div>
</div>

<!-- notas

Agregar estados a al venta
Reversado -> cuando se anulo la venta
• Competaldo -> cambiar a Autorizado Listo
• Fallido -> Negado 

reprote -> para vendedor y director (sin opcion a exportar)

detalles de la venta
• cedula de cleinte
producto => buscar la forma de incrustar lso detalles de la venta
• importe

directora puede ver lo borradores de sus vendedores
poder cambiar creador de venta solo admin


-->