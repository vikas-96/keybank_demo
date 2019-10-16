@extends('frontend.layouts.auth')

@section('content')
<div class="compare_wrapper">

</div>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function() {
    var partialurl = '{{ route("asset-compare-partial") }}';
    loadCompare();

    $('.compare_wrapper').on("click",".close_compare",function() {
        var id = $(this).data("property");
        var lists = $.parseJSON(localStorage.getItem('compareList'));
        for( var i = 0; i < lists.length; i++){ 
            if (lists[i]['asset_id'] === id) {
              lists.splice(i, 1);
            }
        }
        localStorage.compareList = '[]';
        localStorage.compareList = JSON.stringify(lists);
        loadCompare();
    });

    function loadCompare(){
        var lists = localStorage.getItem('compareList');
        var compare = '?compare=';
        compareList = JSON.parse(lists);
        if(compareList.length != 0){
            $.each(compareList, function(i, val){
                compare = compare+val.asset_id+',';
            });
            var compare_detail_url = partialurl+compare
            $.ajax({
                url:compare_detail_url,
                type:"GET",
                success: function (response) {
                    $('.compare_wrapper').html(response.html);
                },
                error: function () {
                    $('.compare_wrapper').html('');                
                }
            });
        } else {
            $('.compare_wrapper').html('Nothing to compare');
        }
    }
});    
</script>
@endpush('js')