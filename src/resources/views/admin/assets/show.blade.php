@extends('admin.layouts.auth')

@section('title', 'User Dashboard')

@section('page-header')
<ul class="nav mb-1" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" >User Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-family-tab" data-toggle="pill" href="#pills-family" role="tab" >Family Detail</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" >Important Contact</a>
  </li>
</ul>
@endsection

@section('content')

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" >
  	@include('admin.user.partials.profile')
  </div>
  <div class="tab-pane fade" id="pills-family" role="tabpanel" >
  	@include('admin.user.partials.family')
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" >
  	@include('admin.user.partials.contact')
  </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(function() {
        $( ".delete-button" ).on( "click", function(event) {
            event.preventDefault();
            if(confirm("Are you sure want to remove ?")) {
                $(this).closest('form').submit();
            }
        });
    })
</script>
@endpush