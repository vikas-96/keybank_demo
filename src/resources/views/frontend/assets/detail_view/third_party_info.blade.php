@if(isset($assets['third_party_info']))
<div class="col-lg-24">
    <div class="card-detail">
        <h4>Third Party Information</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="property-detail">
                    @if(isset($assets['third_party_info']['latest_valuer_name_1']))
                        @if(isset($assets['valuer1']['name']))
                            <li>
                                <span>Name of Latest Valuer -1</span>{{ $assets['valuer1']['name'] }}
                            </li>
                        @endif
                        @if(isset($assets['valuer1']['email']))
                            <li>
                                <span>Email of Valuer - 1</span>{{ $assets['valuer1']['email'] }}
                            </li>
                        @endif
                        @if(isset($assets['valuer1']['contact']))
                            <li>
                                <span>Contact Number of Valuer - 1</span>{{ $assets['valuer1']['contact'] }}
                            </li>
                        @endif
                    @endif
                    @if(isset($assets['third_party_info']['latest_valuer_name_2']))
                        @if(isset($assets['valuer2']['name']))
                            <li>
                                <span>Name of Latest Valuer -2</span>{{ $assets['valuer2']['name'] }}
                            </li>
                        @endif
                        @if(isset($assets['valuer2']['email']))
                            <li>
                                <span>Email of Valuer - 2</span>{{ $assets['valuer2']['email'] }}
                            </li>
                        @endif
                        @if(isset($assets['valuer2']['contact']))
                            <li>
                                <span>Contact Number of Valuer - 2</span>{{ $assets['valuer2']['contact'] }}
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
            <div class="col-lg-12">
                <ul class="property-detail bl">
                    @if(isset($assets['third_party_info']['resolution_agent_name']))
                        @if(isset($assets['resolution_agent']['name']))
                            <li>
                                <span>Name of Resolution Agent</span>{{ $assets['resolution_agent']['name'] }}
                            </li>
                        @endif
                        @if(isset($assets['resolution_agent']['email']))
                            <li>
                                <span>Email of Resolution Agent</span>{{ $assets['resolution_agent']['email'] }}
                            </li>
                        @endif
                        @if(isset($assets['resolution_agent']['contact']))
                            <li>
                                <span>Contact Number of Resolution Agent</span>{{ $assets['resolution_agent']['contact'] }}
                            </li>
                        @endif
                    @endif
                    @if(isset($assets['third_party_info']['advocate_name']))
                        @if(isset($assets['advocate']['name']))
                            <li>
                                <span>Name of Advocate</span>{{ $assets['advocate']['name'] }}
                            </li>
                        @endif
                        @if(isset($assets['advocate']['email']))
                            <li>
                                <span>Email of Advocate</span>{{ $assets['advocate']['email'] }}
                            </li>
                        @endif
                        @if(isset($assets['advocate']['contact']))
                            <li>
                                <span>Contact Number of Advocate</span>{{ $assets['advocate']['contact'] }}
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endif