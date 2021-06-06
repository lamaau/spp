<div id="{!! $chartId !!}"></div>
@push('scripts')
    <script type="text/javascript">
        (function() {
            var options = {
                series: [{
                    data: {!! $chartData !!}
                }],
                fill: {
                    colors: ['{{ $chartFill }}']
                },
                chart: {
                    height: 430,
                    type: 'bar',
                    toolbar: {
                        show: false
                    },
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
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: {!! $chartCategory !!},
                    labels: {
                        style: {
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
