<div class="row">
    <div id="marketability_report" class="col-lg-12 offset-lg-6 col-md-12"></div>
</div>

@push('js')
<script>
    // Build the chart
        Highcharts.chart('marketability_report', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                width: 600
            },
            title: {
                text: 'Marketability'
            },
            tooltip: {
                pointFormat: '{point.name}: <b>{point.y:1f}</b><br>Market Value: <b> ₹ {point.fair_market_avg}</b>'
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    color: '#303030'
                }
            },
            lang: {
                noData:'No data available.'
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
                colorByPoint: true,
                data: @php echo json_encode($data['data']) @endphp
            }]
        });
</script>

@endpush