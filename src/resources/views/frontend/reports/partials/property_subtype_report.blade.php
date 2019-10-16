<div class="row">
    <div id="property_type_residential" class="col-lg-12 col-md-12"></div>
    <div id="property_type_commercial" class="col-lg-12 col-md-12"></div>
</div>
<hr>
<div class="row">
    <div id="property_type_industrial" class="col-lg-12 col-md-12"></div>
    <div id="property_type_agricultural" class="col-lg-12 col-md-12"></div>
</div>

@push('js')
<script>
    // Build the chart Residential
    Highcharts.chart('property_type_residential', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            width: 600
        },
        title: {
            text: 'Residential Property Type'
        },
        tooltip: {
            pointFormat: 'count: <b>{point.y:1f}</b>'
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
            data: @php echo isset($data['residential'])? json_encode($data['residential']):'null' @endphp
        }]
    });

    // Build the chart: Commercial

    Highcharts.chart('property_type_commercial', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            width: 600
        },
        title: {
            text: 'Commercial Property Type'
        },
        tooltip: {
            pointFormat: 'count: <b>{point.y:1f}</b>'
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
            data: @php echo isset($data['commercial'])? json_encode($data['commercial']):'null' @endphp
        }]
    });

      // Build the chart: Industrial

      Highcharts.chart('property_type_industrial', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            width: 600
        },
        title: {
            text: 'Industrial Property Type'
        },
        tooltip: {
            pointFormat: 'count: <b>{point.y:1f}</b>'
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
            data: @php echo isset($data['industrial'])? json_encode($data['industrial']):'null' @endphp
        }]
    });

      // Build the chart: Agricultural

      Highcharts.chart('property_type_agricultural', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            width: 600
        },
        title: {
            text: 'Agricultural Property Type'
        },
        tooltip: {
            pointFormat: 'count: <b>{point.y:1f}</b>'
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
            
           data: @php echo isset($data['agricultural'])? json_encode($data['agricultural']):'null' @endphp
           
        }]
    });
  
</script>

@endpush