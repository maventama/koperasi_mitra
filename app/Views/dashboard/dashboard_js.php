<script>
    (function($) {
        'use strict';
        $(function() {
            setInterval(function() {
                refresh_data();
            }, 3000);

            function refresh_data() {
                data_json();
            }

            function data_json() {
                $.ajax({
                    url: "<?= base_url('dashboard/data_card'); ?>",
                    type: 'post',
                    success: function(result_card) {
                        $('.card-iuran-wajib').html(result_card[0]);
                        $('.peminjaman-berlangsung').html(result_card[1]);
                    }
                })
            }
            // chart js
            $.ajax({
                url: "<?= base_url('/dashboard/data_grafik_batang'); ?>",
                type: 'post',
                success: function(res_gb) {
                    var data = {
                        labels: res_gb.labels,
                        datasets: [{
                            label: res_gb.datasets[0].label,
                            data: res_gb.datasets[0].data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1,
                            fill: false
                        }]
                    };
                    if ($("#lineChart").length) {
                        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
                        var lineChart = new Chart(lineChartCanvas, {
                            type: 'line',
                            data: data,
                            options: options
                        });
                    }
                }
            });
            var multiLineData = {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                        label: 'Dataset 1',
                        data: [12, 19, 3, 5, 2, 3],
                        borderColor: [
                            '#587ce4'
                        ],
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Dataset 2',
                        data: [5, 23, 7, 12, 42, 23],
                        borderColor: [
                            '#ede190'
                        ],
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Dataset 3',
                        data: [15, 10, 21, 32, 12, 33],
                        borderColor: [
                            '#f44252'
                        ],
                        borderWidth: 2,
                        fill: false
                    }
                ]
            };
            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            color: "rgba(204, 204, 204,0.1)"
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: "rgba(204, 204, 204,0.1)"
                        }
                    }]
                },
                legend: {
                    display: false
                },
                elements: {
                    point: {
                        radius: 0
                    }
                }
            };

            $.ajax({
                url: "<?= base_url('/dashboard/data_grafik_pie'); ?>",
                type: 'post',
                success: function(res_pie) {
                    var doughnutPieData = {
                        datasets: [{
                            data: res_pie,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255,99,132,1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                        }],

                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: [
                            'Sudah Bayar',
                            'Belum Bayar',
                        ]
                    };

                    if ($("#doughnutChart").length) {
                        var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
                        var doughnutChart = new Chart(doughnutChartCanvas, {
                            type: 'doughnut',
                            data: doughnutPieData,
                            options: doughnutPieOptions
                        });
                    }
                }
            });
            var doughnutPieOptions = {
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };
            // Get context with jQuery - using jQuery's .get() method.


            if ($("#linechart-multi").length) {
                var multiLineCanvas = $("#linechart-multi").get(0).getContext("2d");
                var lineChart = new Chart(multiLineCanvas, {
                    type: 'line',
                    data: multiLineData,
                    options: options
                });
            }
            if ($("#browserTrafficChart").length) {
                var doughnutChartCanvas = $("#browserTrafficChart").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                    type: 'doughnut',
                    data: browserTrafficData,
                    options: doughnutPieOptions
                });
            }
        });
    })(jQuery);
</script>