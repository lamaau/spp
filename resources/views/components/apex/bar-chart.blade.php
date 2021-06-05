<div id="{!! $chartId !!}"></div>
@push('scripts')
    <script type="text/javascript">
        (function() {
            var options = {
                series: [{
                    data: {!! $chartData !!}
                }],
                fill: {
                    colors: ['#6777ef']
                },
                chart: {
                    height: 430,
                    type: 'bar',
                    toolbar: {
                        show: false
                    },
                    events: {
                        click: function(chart, w, e) {
                            // console.log(chart, w, e)
                        }
                    }
                },
                // colors: colors,
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                        distributed: false,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: {!! $chartCategory !!},
                    labels: {
                        style: {
                            // colors: colors,
                            fontSize: '12px'
                        }
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
            };

            const chart = new ApexCharts(document.getElementById(`{!! $chartId !!}`), options);
            chart.render();

            document.addEventListener('livewire:load', () => {
                @this.on(`refreshChart-{!! $chartId !!}`, (event) => {
                    chart.updateOptions({
                        xaxis: {
                            categories: event.categories
                        }
                    });
                    chart.updateSeries([{
                        data: event.series
                    }]);
                });
            });
        }())

    </script>
@endpush
