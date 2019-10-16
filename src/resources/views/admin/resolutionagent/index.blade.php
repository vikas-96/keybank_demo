@extends('admin.layouts.auth')

@section('title', 'Resolution Agent')

@section('page-header')
<div class="row">
    <div class="col-24">
    <div class="page-header">
        <div class="page-title">
            <h1>Resolution Agent List
                <a href="{{ route('resolutionagent.create') }}" class="btn btn-success pull-right btn-sm">Add New Resolution Agent</a>
            </h1>
        </div>
    </div>
   
</div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-24">
        <table id="resolutionagents" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            
        </table>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function() {      
        $('#resolutionagents').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "searching": true,
        "ajax": "{{ route('list-resolutionagent') }}",
        "columns": [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {
                mRender: function (data, type, row) {
                    return (row.contact !=null)?row.contact:'';
                },orderable:false
            },
            {
                mRender: function (data, type, row) {
                    return (row.is_active == '1')?'active':'inactive';
                },orderable:false
            },
            {
                mRender: function (data, type, row) {
                    var editurl = '{{ route("resolutionagent.edit", ":id") }}'; 
                    editurl = editurl.replace(':id', row._id);
                    return '<a href='+editurl+' data-id="' + row._id + '">Edit</a>'
                },orderable:false
            }
        ],
        language: {
        searchPlaceholder: "name,email..",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
    }
    
});
        });
   
</script>
@endpush
