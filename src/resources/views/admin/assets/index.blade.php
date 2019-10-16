@extends('admin.layouts.auth')

@push('css')
<style type="text/css">
    #assets tr>td {
        text-transform: capitalize;
    }
</style>
@endpush

@section('title', 'Asset')

@section('page-header')
<div class="row">
    <div class="col-24">
        <div class="page-header">
            <div class="page-title">
                <h1>Asset List
                    <a href="{{ route('assets.create') }}" class="btn btn-success pull-right btn-sm">Add New Asset</a>
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-24">
        <table id="assets" class="table table-striped">
            <thead>
                <tr>
                    <th>Property #</th>
                    <th>Property Category</th>
                    <th>Property Type</th>
                    <th>Lender Name</th>
                    <th>Owner Name</th>
                    <th>Migrating Branch</th>
                  <!--   <th>Feature Image</th> -->
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
        $('#assets').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "searching": true,
        "ajax": "{{ route('list-assets') }}",
        "columns": [
            // {data: '_id', name: '_id'},
            //{data: 'property_id', name: 'property_id'},
            {
                "data": "property_id",
                //"name": 'property_id',
                mRender: function (data, type, row) {
                    
                    if(row.property_id != null )
                    {
                        return row.property_id
                    }
                    return '-'
                },
            },
            {data: 'customer.property_category', name: 'property_category',orderable:false},
            {data: 'customer.property_type', name: 'property_type',orderable:false},
            {
                mRender: function (data, type, row) {
                    if(row.banklist != null )
                    {
                        return row.banklist.bank_name
                    }
                    return '-'
                },orderable:false
            },
            {data: 'customer.owner_name', name: 'owner_name',orderable:false},
            //{data: 'migratingbranch.name', name: 'migrating_branch',orderable:false},
            {
                mRender: function (data, type, row) {
                    if(row.migratingbranch != null )
                    {
                        return row.migratingbranch.name
                    }
                    return '-'
                },orderable:false
            },
            /*{
                mRender: function (data, type, row) {
                    
                    if(row.feature_image != null )
                    {
                        var url = row.feature_image.url;
                        return '<img src='+url+' height="50px" width="80px"/>'
                    }
                    return '-'
                },orderable:false
            },*/
            {data: 'status', name: 'status',orderable:false},
            {
                mRender: function (data, type, row) {
                    var editurl = '{{ route("step1", ":id") }}'; 
                    editurl = editurl.replace(':id', row._id);
                    return '<a href='+editurl+' data-id="' + row._id + '">Edit</a>'
                },orderable:false
            }
        ],
        language: {
        searchPlaceholder: "property#,owner name, property category, property type...",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        "order": [[ 0, "desc" ]]
    
});
        });
   
</script>
@endpush