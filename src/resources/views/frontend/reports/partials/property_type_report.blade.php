<div class="row">
    <div id="property_type_report" class="col-lg-12 col-md-12"></div>
    <div id="property_type_fair_value_report" class="col-lg-12 col-md-12"></div>
</div>
@push('js')
<script>
    // Build the chart
    Highcharts.chart('property_type_report', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            width: 600
        },
        title: {
            text: 'Property Type Based on Number'
        },
        tooltip: {
            pointFormat: '{point.name}: <b>{point.y:1f}</b>'
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
            name: 'Brands',
            colorByPoint: true,
            data: @php echo json_encode($data['property_type']['data']) @endphp
        }]
    });

    // Build the chart
    Highcharts.chart('property_type_fair_value_report', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            width: 600
        },
        title: {
            text: 'Property Type Based on Market Value'
        },
        tooltip: {
            pointFormat: 'Fair Market Value: <b>₹ {point.y:1f}</b>'
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
            name: 'Brands',
            colorByPoint: true,
            data: @php echo json_encode($data['market_value']['data']) @endphp
        }]
    });
</script>

@endpush