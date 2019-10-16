<div class="nav-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-24">

                <ul class="progressbar">

                    @php
                    $config = config('template.steps.'.$template_id);
                    $current_key = array_search($step,array_keys($config));
                    $count = count($config);
                    $completed_steps_key="";
                    if($completed_before!==""){
                      $completed_steps_key = array_search($completed_before,array_keys($config));
                    }
                    $url = '#';
                    
                    @endphp

                    <?php
                    for($i=0;$i<$count;$i++) {
                        $step_status='' ;                       
                        if($i<$completed_steps_key || $completed_before == 8){
                            $step_status='active';
                        }        
                        if($i==$current_key) {
                            $step_status='current';
                        }                
                    ?>
                    <li class="{{$step_status}}">
                        @php
                          $key = array_keys($config);
                          if(isset($asset_id))
                            $url = route('step'.$key[$i],['id'=>$asset_id]);
                        @endphp
                         <a href="{{$url}}"></a>
                        <span class="arrow"></span>
                    </li>
                    <?php } ?>




                    {{-- @for($p=1;$p<=$count;$p++)
                     @php $step_status='' ;
                      @endphp 
                      @if($p===$step) 
                      @php
                        $step_status='current' ;
                         @endphp
                         @elseif($p < $step) 
                         @php 
                         $step_status='active' ;
                          @endphp
                           @endif
                        <li class="{{$step_status}}">
                    <span class="arrow"></span>
                    </li>
                    @endfor --}}

                </ul>

            </div>
        </div>
    </div>
</div>