@extends('admin.layouts.auth')

@section('title', 'User')

@section('page-header')
<div class="row">
    <div class="col-24">
    <div class="page-header">
        <div class="page-title">
            <h1>User List
                <a href="{{ route('users.create') }}" class="btn btn-success pull-right btn-sm">Add New User</a>
            </h1>
        </div>
    </div>
   
</div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-24">
        <table id="users" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
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
        let userid = "{{\Auth::user()->_id}}";
        $('#users').DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "searching": true,
            "ajax": "{{ route('list-users') }}",
            "columns": [
                // {data: '_id', name: '_id'},
                {data: 'firstname', name: 'firstname'},
                {data: 'lastname', name: 'lastname'},
                {data: 'contact_number', name: 'contact_number',orderable:false},
                {data: 'email', name: 'email',orderable:false},
                // {data:null,"defaultContent":"<button>View</button>"},
                {
                    mRender: function (data, type, row) {
                        let buttons = '';
                        var editurl = '{{ route("users.edit", ":id") }}'; 
                        editurl = editurl.replace(':id', row.id);
                        var delurl = '{{ route("users.destroy", ":id") }}'; 
                        delurl = delurl.replace(':id', row.id);
                        buttons += '<a href='+editurl+' data-id="' + row.id + '">Edit</a>';
                        if(userid != row.id){
                            buttons += '<form action='+delurl+' method="POST">@method("DELETE") @csrf<button type="submit">Delete</button></form>';
                        }
                        return buttons;
                    },orderable:false
                }
            ],
            language: {
                searchPlaceholder: "firstname, lastname, mobile or email..",
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            }
        });
    });
   
</script>
@endpush