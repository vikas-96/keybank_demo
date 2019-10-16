$(document).ready(function() {
	var compareList = [];
    loadList();

    $('.search-submit').submit(function() {
        localStorage.compareList = '[]';
    });
    
    $('.compare-check').on('click', function (e) {
		var resp = {};
        var id = $(this).data("property");

        if($(this).prop("checked") == true){

            if(compareList.length == 3) {
                alert('Only 3 Compare Allowed');
                $(this).prop("checked", false);
            } else {
                localStorage.compareList = '[]';
                removeCompare(id);
                var asset_detail_url = asseturl.replace(':id', id);
                $.ajax({
                    url:asset_detail_url,
                    type:"GET",
                    success: function (response) {
                        resp.property_id = response.property_id;
                        // resp.kap_price = response.kapdata.kap_price;
                        // resp.district = response.address.district;
                        resp.asset_id = response._id
                        compareList.push(resp);
                        localStorage.compareList = JSON.stringify(compareList);
                        updateCompareList()
                    }
                });
            }


        } else {
            removeCompare(id);
           	localStorage.compareList = JSON.stringify(compareList);
            updateCompareList()
        }

    });

    function removeCompare(id)
    {
        for( var i = 0; i < compareList.length; i++){ 
           if (compareList[i]['asset_id'] === id) {
             compareList.splice(i, 1);
           }
        }
    }

    function loadList()
    {
        var lists = localStorage.getItem('compareList');
        if(lists == null) {
            localStorage.compareList = '[]';
        } else {
            compareList = JSON.parse(lists);

            $.each($('.compare-check:checkbox'), function(){
                var property_id = $(this).data("property");
                for( var i = 0; i < compareList.length; i++){ 
                    if (compareList[i]['asset_id'] === property_id) {
                       $(this).prop("checked", true);
                    }
                }
            });
        }
    }

    function updateCompareList()
    {
    	var list = localStorage.getItem('compareList');
        var compareLists = JSON.parse(list);
    }

});