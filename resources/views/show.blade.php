@extends('layouts.app')
@section('title', 'Your Excel Files')
@section('colWidth', '8')
@section('content')
    <div class="card bg-primary-subtle">
        <h1 class="card-header">Show Imported Data</h1>
        <div class="card-body p-3 rounded-5">
            <table class="table table-striped table-hover bg-info" id="data-table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password(Hashed)</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    @if (!$users->isEmpty())
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ strlen($user->password) >= 15 ? substr($user->password, 0, 15) . '...' : hash($user->password) }}
                                </td>
                                <td>
                                    <a href="{{ Route('edit', ['id' => $user->id]) }}" class="btn btn-warning"><i
                                            class="bi bi-pen-fill"></i></a>
                                    <a href="{{ Route('delete', ['id' => $user->id]) }}" class="btn btn-danger"><i
                                            class="bi bi-trash3-fill"></i></a>
                                    <a href="{{ Route('mail', ['id' => $user->id]) }}" class="btn btn-primary"><i
                                            class="bi bi-envelope-at-fill"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-danger p-1 px-3 m-1">No data found</div>
                            </td>
                        </tr>
                    @endif


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

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('show') }}",
                columns: [{
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
