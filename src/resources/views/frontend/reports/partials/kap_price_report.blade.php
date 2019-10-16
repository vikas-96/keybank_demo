<div class="row">
    <div id="kap_price_report" class="col-lg-12 offset-lg-6 col-md-12"></div>
</div>
@push('js')
<script>
    Highcharts.chart('kap_price_report', {
            chart: {
                type: 'column',
                width: 600
            },
            title: {
                text: 'Number of Properties by Value'
            },
            subtitle: {
                text: '(Based on KAP Price)'
            },
            credits: {
                enabled: false
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
            xAxis: {
                categories: @php echo json_encode($data['x'])."," @endphp
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'No. of Properties'
                }
            },
            legend: {
                title: {
                    text: '<span style="font-size: 9px; color: #666; font-weight: normal">In Lakhs</span>'
                },
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: @php echo json_encode($data['data']) @endphp
        });
</script>

@endpush