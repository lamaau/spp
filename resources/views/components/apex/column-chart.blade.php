<div id="{!! $chartId !!}"></div>
@push('scripts')
    <script>
        (function() {
            var options = {
                series: {!! $chartData !!},
                colors: ['#47c363', '#3abaf4', '#6777ef', '#fc544b'],
                chart: {
                    type: 'bar',
                    height: 400,
                    toolbar: {
                        show: false
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '95%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: {!! $chartCategory !!},
                },
                yaxis: {
                    title: {
                        text: 'Jumlah'
                    }
                },
                fill: {
                    opacity: 1
                },
            };

            const chart = new ApexCharts(document.getElementById(`{!! $chartId !!}`), options);
            chart.render();
        }());

    </script>
@endpush
