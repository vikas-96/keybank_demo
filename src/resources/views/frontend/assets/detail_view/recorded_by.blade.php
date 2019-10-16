@if(isset($assets['recorded_by']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Recorded By</h4>
        <ul class="property-detail">
        	@if(isset($assets['recorded_by']['user_id']))
                <li>
                    <span>Recorded By</span>{{ isset($assets['user'])?$assets['user']['firstname']." ".$assets['user']['lastname']:'' }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif