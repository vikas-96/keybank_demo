<div class="row">
    <div id="area_pincode_report" class="col-lg-6 col-md-12"></div>
</div>

@push('js')
    <script>

        // Build the chart
        Highcharts.chart('area_pincode_report', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Area (Pincode)'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:1f}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: @php echo json_encode($data['data']) @endphp
            }]
        });
    </script>

@endpush