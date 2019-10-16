@extends('admin.layouts.auth')

@section('title', 'Borrower')

@section('page-header')
<div class="row">
    <div class="col-24">
    <div class="page-header">
        <div class="page-title">
            <h1>Borrower List
                <a href="{{ route('borrower.create') }}" class="btn btn-success pull-right btn-sm">Add New Borrower</a>
            </h1>
        </div>
    </div>
   
</div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-24">
        <table id="borrowers" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>CIF</th>
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
        $('#borrowers').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "searching": true,
        "ajax": "{{ route('list-borrower') }}",
        "columns": [
            {data: 'name', name: 'name'},
            {data: 'cif', name: 'cif',orderable: false},
            {
                mRender: function (data, type, row) {
                    return (row.is_active == '1')?'active':'inactive';
                },orderable: false
            },
            {
                mRender: function (data, type, row) {
                    var editurl = '{{ route("borrower.edit", ":id") }}'; 
                    editurl = editurl.replace(':id', row._id);
                    return '<a href='+editurl+' data-id="' + row._id + '">Edit</a>'
                },orderable: false
            }
        ],
        language: {
        searchPlaceholder: "name,cif...",
        processing: '<i class="fa fa-spinner fa-spinner fa-5x fa-fw"></i><span   class="sr-only">Loading...</span> '
        // processing:'<img src={{asset("images/login-background.png")}}>'
    }
    
});
        });
   
</script>
@endpush
