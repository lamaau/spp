<div>
    <div id="{!! $chartId !!}"></div>
    @push('scripts')
        <script type="text/javascript">
            (function() {
                var options = {
                    colors: ['#6777ef', '#dc3545'],
                    chart: {
                        height: 400,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    series: {!! $chartData !!},
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return new Intl.NumberFormat('id-ID', {
                                    currency: 'IDR',
                                    style: 'currency',
                                    maximumSignificantDigits: 3
                                }).format(value);
                            }
                        },
                    },
                    xaxis: {
                        categories: {!! $chartCategory !!}
                    }
                };

                var chart = new ApexCharts(document.getElementById(`{!! $chartId !!}`), options);
                chart.render();

                // document.addEventListener('livewire:load', () => {
                //     @this.on(`refreshChartData-{!! $chartId !!}`, (chartData) => {
                //         ApexCharts.exec(`{!! $chartId !!}`, "updateSeries", chartData.chartData);
                //     });
                // });
            }());

        </script>
    @endpush
</div>
