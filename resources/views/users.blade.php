@extends('layouts.app')
@section('title', 'Your Excel Files')
@section('colWidth', '12')
@section('content')
    <div class="card bg-primary-subtle mt-5">
        <h1 class="card-header">Data in Yajra Table</h1>
        <div class="card-body p-3 rounded-5">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password(Hashed)</th>
                        <th>Added On</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <a href="{{ Route('export') }}" class="btn btn-success"><i class="bi bi-download"></i> Export Data to Excel
                File</a>
            <a href="{{ Route('deleteAll') }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Empty Dataset</a>
            <a href="{{ Route('index') }}" class="btn btn-dark">Back</a>
        </div>
        @include('layouts.footer')
    </div>
    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'password',
                        name: 'password',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return data.length > 10 ? data.substring(0, 10) + '...' : data;
                            }
                            return data;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return data.length > 10 ? data.substring(0, 10) : data;
                            }
                            return data;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
