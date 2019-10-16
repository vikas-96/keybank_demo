@extends('admin.layouts.auth')

@section('title', 'Loan')

@section('page-header')
<div class="row">
    <div class="col-24">
        <div class="page-header">
            <div class="page-title">
                <h1>Loan List
                    <a href="{{ route('loan.create') }}" class="btn btn-success pull-right btn-sm">Add New Loan</a>
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-24">
        <table id="loans" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Account No.</th>
                    <th>First Sanction Date</th>
                    <th>Banking Arrangement</th>
                    <th>Lead Bank</th>
                    <th>SBI Share</th>
                    <th>NPA Date</th>
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
        $('#loans').DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "searching": true,
            "ajax": "{{ route('list-loan') }}",
            "columns": [
                {data: 'account_no', name: 'account_no'},
                {data: 'first_sanction_date', name: 'first_sanction_date',orderable:false},
                {data: 'banking_arrangement', name: 'banking_arrangement',orderable:false},
                {data: 'bank_name', name: 'bank_name',orderable:false},
                {data: 'sbi_share', name: 'sbi_share',orderable:false},
                {data: 'npa_date', name: 'npa_date',orderable:false},
                {
                    mRender: function (data, type, row) {
                        return (row.is_active == '1')?'active':'inactive';
                    },orderable:false
                },
                {
                    mRender: function (data, type, row) {
                        var editurl = '{{ route("loan.edit", ":id") }}'; 
                        editurl = editurl.replace(':id', row.id);
                        return '<a href='+editurl+' data-id="' + row._id + '">Edit</a>'
                    },orderable:false
                }
            ],
            language: {
            searchPlaceholder: "account no. , bank name ,..",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
        }
            
        });
    });
   
</script>
@endpush
