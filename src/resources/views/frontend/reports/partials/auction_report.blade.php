<div class="row">
    <div id="auction_report" class="col-lg-12 offset-lg-6 col-md-12"></div>
</div>

@push('js')
<script>
    // Build the chart
    Highcharts.chart('auction_report', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            width: 600
        },
        title: {
            text: 'Auctions conducted for unsold inventory'
        },
        tooltip: {
            
            formatter: function(){
                let options = this.point.options;
                let print="";
                let i = 0;
                print += '<b>' + this.point.options.name + '</b><br/>';
                $.each(options.value,function(value,key){
                    print += options.range[i]+ ': <b>' + key + ' </b><br/>';
                    i++;
                });
                return print;
            },
            useHTML: true,
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
            data: @php echo json_encode($data) @endphp
        }]
    });
</script>

@endpush